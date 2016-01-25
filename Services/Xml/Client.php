<?php

namespace Wk\AfterbuyApiBundle\Services\Xml;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\BadResponseException;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Wk\AfterbuyApiBundle\Model\XmlApi\AbstractRequest;
use Wk\AfterbuyApiBundle\Model\XmlApi\AbstractResponse;
use Wk\AfterbuyApiBundle\Model\XmlApi\AfterbuyGlobal;
use Wk\AfterbuyApiBundle\Model\XmlApi\GetSoldItems\Filter\AbstractFilter;
use Wk\AfterbuyApiBundle\Model\XmlApi\GetSoldItems\GetSoldItemsRequest;
use Wk\AfterbuyApiBundle\Model\XmlApi\GetSoldItems\GetSoldItemsResponse;
use Wk\AfterbuyApiBundle\Model\XmlApi\UpdateSoldItems\Order;
use Wk\AfterbuyApiBundle\Model\XmlApi\UpdateSoldItems\UpdateSoldItemsRequest;
use Wk\AfterbuyApiBundle\Model\XmlApi\UpdateSoldItems\UpdateSoldItemsResponse;
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
     * @param string $errorLanguage
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
        $request = (new GetSoldItemsRequest($this->afterbuyGlobal))
            ->setFilters($filters)
            ->setDetailLevel($detailLevel)
            ->setMaxSoldItems($maxSoldItems)
            ->setOrderDirection(intval($orderDirection));

        return $this->serializeAndSubmitRequest($request, GetSoldItemsResponse::class);
    }

    /**
     * @param Order[] $orders
     * @param int     $detailLevel
     *
     * @return UpdateSoldItemsResponse|null
     */
    public function updateSoldItems(array $orders, $detailLevel = AfterbuyGlobal::DETAIL_LEVEL_PROCESS_DATA)
    {
        $request = (new UpdateSoldItemsRequest($this->afterbuyGlobal))
            ->setDetailLevel($detailLevel)
            ->setOrders($orders);

        return $this->serializeAndSubmitRequest($request, UpdateSoldItemsResponse::class);
    }

    /**
     * @param AbstractRequest $request
     * @param string          $type
     *
     * @return AbstractResponse|null
     */
    private function serializeAndSubmitRequest(AbstractRequest $request, $type)
    {
        $xml = $this->serializer->serialize($request, 'xml');
        $options = ['body' => $xml, '_conditional' => ['Content-Type' => 'text/xml']];
        $this->logger->debug('Posted to Afterbuy with the following options: ', $options);

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
            $object = $this->serializer->deserialize($response->getBody(), $type, 'xml');
        } catch (\Exception $exception) {
            $this->logger->error($exception->getMessage());

            return null;
        }

        return $object;
    }
}