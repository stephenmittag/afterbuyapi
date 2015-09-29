<?php

namespace Wk\AfterbuyApi\Services;

use GuzzleHttp\Client;
use Wk\AfterbuyApi\Models\XmlApi\XmlWebserviceInterface;

/**
 * Class AfterbuyXmlClient
 *
 * @package Wk\AfterbuyApi\Services
 */
final class AfterbuyXmlClient
{
    /**
     * @var Client
     */
    private $httpClient;

    /**
     * @var XmlWebserviceInterface
     */
    private $serviceProvider;

    /**
     * @var array
     */
    private $credentials = array();

    /**
     * @var string
     */
    private $uri = 'https://api.afterbuy.de/afterbuy/ABInterface.aspx';

    /**
     * @var array
     */
    private $validStructure = array(
        'partner_id'   => '',
        'partner_pass' => '',
        'user_id'      => '',
        'user_pass'    => ''
    );

    /**
     */
    public function __construct()
    {
        $this->setHttpClient(new Client());
    }

    /**
     * @param array $credentials
     *
     * @return AfterbuyXmlClient
     */
    public function setCredentials(array $credentials)
    {
        $this->credentials = (array) $credentials;

        return $this;
    }

    /**
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @param $uri
     *
     * @return AfterbuyXmlClient
     */
    public function setUri($uri)
    {
        $this->uri = (string) $uri;

        return $this;
    }


    /**
     * @param Client $httpClient
     *
     * @return AfterbuyXmlClient
     */
    public function setHttpClient(Client $httpClient)
    {
        $this->httpClient = $httpClient;

        return $this;
    }

    /**
     * @return Client
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }

    /**
     * @return array
     */
    public function getCredentials()
    {
        return $this->credentials;
    }

    /**
     * @return XmlWebserviceInterface
     */
    public function getServiceProvider()
    {
        return $this->serviceProvider;
    }

    /**
     * @param XmlWebserviceInterface $provider
     *
     * @return AfterbuyXmlClient
     */
    public function setServiceProvider(XmlWebserviceInterface $provider)
    {
        $this->serviceProvider = $provider;

        return $this;
    }

    /**
     * @return bool
     */
    private function isValidCredentialStructure()
    {
        if (empty($this->credentials)) {
            return false;
        }

        $diffResult = array_diff_key($this->validStructure,
            $this->credentials);
        /**
         * when found differences in credential structure
         * then return false
         */
        if (count($diffResult) > 0) {
            return false;
        }

        return true;
    }

    /**
     * @return array
     * @throws \Exception
     */
    private function getValidCredentialStructure()
    {
        if ($this->isValidCredentialStructure() === false) {
            throw new \Exception('invalid credential data structure set in method setCredentials()');
        }

        return $this->credentials;
    }


    /**
     * @return SimpleXMLElement
     */
    public function send()
    {
        $postData = $this->serviceProvider
            ->getData($this->getValidCredentialStructure());

        $request = $this->httpClient->request('POST', $this->uri,
            array(
                'body' => $postData
            ));

        return simplexml_load_string((string) $request->getBody());
    }
}