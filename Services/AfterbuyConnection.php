<?php


namespace Wk\AfterbuyApi\Services;

use Monolog\Logger;
use Wk\AfterbuyApi\Models\AfterbuyOrder;
use Wk\GuzzleCommandClient\Lib\GuzzleCommandClient;

/**
 * Class AfterbuyConnection
 * Implements the Singleton pattern
 */
class AfterbuyConnection extends GuzzleCommandClient
{

    const MAX_ATTEMPTS = 10;

    /** @var AfterbuyAdapter to generate the requests and responses out of the AfterbuyConnection */
    protected $adapter;

    protected static $instance = null;

    /** @var  \GuzzleHttp\Client */
    protected $guzzleClient;

    protected $partnerId;

    protected $partnerPassword;

    protected $userId;

    protected $userPassword;

    protected $detailLevel;

    protected $errorLanguage;

    /** @var array */
    protected $apiUrls;

    /** @var \Monolog\Logger */
    private $logger;

    /**
     * Constructor for the class
     */
    public function __construct()
    {
        $this->adapter = new AfterbuyAdapter();
        $json = file_get_contents(__DIR__ . "/../Resources/config/service.json");
        parent::__construct($json);
    }

    /**
     * @param Logger $logger
     */
    public function setLogger(Logger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param AfterbuyAdapter $adapter
     */
    public function setAdapter(AfterbuyAdapter $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @return AfterbuyAdapter
     */
    public function getAdapter()
    {
        return $this->adapter;
    }

    /**
     * Setter for the urls
     *
     * @param array $urls
     */
    public function setApiUrls(array $urls)
    {
        $this->apiUrls = $urls;
    }

    /**
     * Method to set the parameters for Afterbuy
     *
     * @param array $params
     */
    public function setParams(array $params)
    {
        $this->partnerId = isset($params['partner_id']) ? $params['partner_id'] : null;
        $this->partnerPassword = isset($params['partner_pass']) ? $params['partner_pass'] : null;
        $this->userId = isset($params['user_id']) ? $params['user_id'] : null;
        $this->userPassword = isset($params['user_pass']) ? $params['user_pass'] : null;
        $this->detailLevel = isset($params['detail_level']) ? $params['detail_level'] : null;
        $this->errorLanguage = isset($params['error_language']) ? $params['error_language'] : null;
    }

    /**
     * Instance of the AfterbuyConnection
     *
     * @return AfterbuyConnection
     */
    public static function getInstance()
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    /**
     * @param string $apiName
     *
     * @throws \RuntimeException
     */
    public function setBaseUrl($apiName)
    {
        if (array_key_exists($apiName, $this->apiUrls)) {
            parent::setBaseUrl($this->apiUrls[$apiName]);
        } else {
            throw new \RuntimeException(sprintf('Api "%s" not defined for Afterbuy', $apiName));
        }

    }

    /**
     * Build the xml string for getting the Afterbuy time
     *
     * @return string
     */
    public function generateAfterbuyTimeRequest()
    {
        return "<Request>" . $this->buildAfterbuyGlobalCredentials('GetAfterbuyTime') . "</Request>";
    }

    /**
     * Build the xml string for getting the Afterbuy sold items
     *
     * @param array $params
     *
     * @return string
     */
    public function generateAfterbuySoldItemsRequest(array $params)
    {

        $request = "<Request>" . $this->buildAfterbuyGlobalCredentials('GetSoldItems');
        $request .= $this->adapter->buildAfterbuySoldItemsXmlString($params);
        $request .= "</Request>";

        return $request;
    }

    /**
     * Build the xml string for updating the Afterbuy sold items
     *
     * @param array $params
     *
     * @return string
     */
    public function generateAfterbuyUpdateSoldItemsRequest(array $params)
    {

        $request = "<Request>" . $this->buildAfterbuyGlobalCredentials('UpdateSoldItems');
        $request .= $this->adapter->buildUpdateAfterbuySoldItemsXmlString($params);
        $request .= "</Request>";

        return $request;
    }

    /**
     * Build the xml string for the credentials
     *
     * @param string $callName Name of the method to call in the api
     *
     * @return string
     */
    private function generateAfterbuyGlobalCredentials($callName)
    {
        return "<AfterbuyGlobal>
                    <PartnerID>$this->partnerId</PartnerID>
                    <PartnerPassword>$this->partnerPassword</PartnerPassword>
                    <UserID>$this->userId</UserID>
                    <UserPassword>$this->userPassword</UserPassword>
                    <CallName>$callName</CallName>
                    <DetailLevel>$this->detailLevel</DetailLevel>
                    <ErrorLanguage>$this->errorLanguage</ErrorLanguage>
                </AfterbuyGlobal>";
    }

    /**
     * @param AfterbuyOrder $order
     *
     * @return bool
     */
    public function createOrder(AfterbuyOrder $order)
    {
        $connectionParams = array(
            'Partnerid' => $this->partnerId,
            'PartnerPass' => $this->partnerPassword,
            'Action' => 'new',
            'UserID' => $this->userId,
        );
        $orderParams = $order->toArray();

        $this->logger->addInfo("\n\n" . date(DATE_RFC822) . "\nOrder ID: " . $order->getId());
        $this->logger->addInfo("\nItem to create: \n" . print_r($orderParams, true));

        $this->setBaseUrl('shop');

        $result = $this->executeCommand('createOrder', array_merge($connectionParams, $orderParams));

        $response = $this->adapter->getResponse($result['message']->xml());

        //$this->logger->addInfo("\n\nAfterbuy Response Data:\n" . $result['message']->xml()->asXML());

        return $response;
    }
}
