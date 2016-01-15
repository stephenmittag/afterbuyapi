<?php

namespace Wk\AfterbuyApi\Services\Xml;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\BadResponseException;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Wk\AfterbuyApi\Model\XmlApi\AfterbuyGlobal;
use Wk\AfterbuyApi\Model\XmlApi\GetSoldItems\Filter\AbstractFilter;
use Wk\AfterbuyApi\Model\XmlApi\GetSoldItems\GetSoldItemsRequest;
use Wk\AfterbuyApi\Model\XmlApi\GetSoldItems\GetSoldItemsResponse;
use Wk\AfterbuyApi\Model\XmlApi\UpdateSoldItems\Order;
use Wk\AfterbuyApi\Model\XmlApi\UpdateSoldItems\UpdateSoldItemsResponse;
use JMS\Serializer\SerializerInterface;

/**
 * Class Client
 */
class Client implements LoggerAwareInterface
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * @var AfterbuyGlobal
     */
    private $afterbuyGlobal;

    /**
     * @param string $userId
     * @param string $userPassword
     * @param int    $partnerId
     * @param string $partnerPassword
     */
    public function __construct($userId, $userPassword, $partnerId, $partnerPassword, $errorLanguage)
    {
        $this->afterbuyGlobal = new AfterbuyGlobal($userId, $userPassword, $partnerId, $partnerPassword, $errorLanguage);
        $this->client = new \GuzzleHttp\Client(['base_uri' => 'https://api.afterbuy.de/afterbuy/ABInterface.aspx']);
    }

    /**
     * @return ClientInterface
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param ClientInterface $client
     *
     * @return $this
     */
    public function setClient(ClientInterface $client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return SerializerInterface
     */
    public function getSerializer()
    {
        return $this->serializer;
    }

    /**
     * @param SerializerInterface $serializer
     *
     * @return $this
     */
    public function setSerializer(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;

        return $this;
    }

    /**
     * @return LoggerInterface
     */
    public function getLogger()
    {
        return $this->logger;
    }

    /**
     * @param LoggerInterface $logger
     *
     * @return $this
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;

        return $this;
    }

    /**
     * @param AbstractFilter[] $filters
     * @param bool             $orderDirection
     * @param int              $maxSoldItems
     * @param int              $detailLevel
     *
     * @return GetSoldItemsResponse|null
     */
    public function getSoldItems(array $filters = [], $orderDirection = false, $maxSoldItems = 250, $detailLevel = AfterbuyGlobal::DETAIL_LEVEL_PROCESS_DATA)
    {
        $request = new GetSoldItemsRequest($this->afterbuyGlobal);
        $request
            ->setFilters($filters)
            ->setDetailLevel($detailLevel)
            ->setMaxSoldItems($maxSoldItems)
            ->setOrderDirection(intval($orderDirection));

        $xml = $this->serializer->serialize($request, 'xml');
        $options = ['body' => $xml, '_conditional' => ['Content-Type' => 'text/xml']];
        $this->logger->debug(sprintf('Posted to Afterbuy with the following options: %s', json_encode($options)));
        try {
            $response = $this->client->request('POST', null, $options);
            $this->logger->debug(sprintf('Afterbuy response: %s', $response->getBody()));
        } catch (BadResponseException $exception) {
            $this->logger->error($exception->getMessage());

            return null;
        }

        if ($response->getStatusCode() != 200) {
            $this->logger->error(sprintf('Afterbuy responded with HTTP status code %d', $response->getStatusCode()));

            return null;
        }

        try {
            $object = $this->serializer->deserialize($response->getBody(), GetSoldItemsResponse::class, 'xml');
        } catch (\Exception $exception) {
            $this->logger->error($exception->getMessage());

            return null;
        }

        return $object;
    }

    /**
     * @param Order[] $orders
     *
     * @return UpdateSoldItemsResponse|null
     */
    public function updateSoldItems(array $orders)
    {
        // TODO: not yet implemeted
        return null;
    }
}