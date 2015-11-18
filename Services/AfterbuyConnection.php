<?php


namespace Wk\AfterbuyApi\Services;

use GuzzleHttp\Client;
use Wk\GuzzleCommandClient\Lib\GuzzleCommandClient;

/**
 * Class AfterbuyConnection
 * Implements the Singleton pattern
 */
class AfterbuyConnection extends GuzzleCommandClient
{
    /**
     * @var Client
     */
    protected $guzzleClient;

    /**
     * @var string
     */
    protected $partnerId;

    /**
     * @var string
     */
    protected $partnerPassword;

    /**
     * @var string
     */
    protected $userId;

    /**
     * @var string
     */
    protected $userPassword;

    /**
     * @param string $serviceDescriptionFile
     */
    public function __construct($serviceDescriptionFile)
    {
        $json = file_get_contents(__DIR__ . '/../Resources/config/' . $serviceDescriptionFile);
        parent::__construct($json);
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
    }

    /**
     * @param string $commandName
     * @param array  $params
     *
     * @return array
     */
    public function executeCommand($commandName, array $params = array())
    {
        $connectionParams = array(
            'Partnerid' => $this->partnerId,
            'PartnerPass' => $this->partnerPassword,
            'Action' => 'new',
            'UserID' => $this->userId,
        );

        $result = parent::executeCommand($commandName, array_merge($connectionParams, $params));

        return $result;
    }
}
