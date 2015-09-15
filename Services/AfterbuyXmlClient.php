<?php

namespace Wk\AfterbuyApi\Services;


use GuzzleHttp\Client;

final class AfterbuyXmlClient
{

    private $httpClient;

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
        'partner_id' => '',
        'partner_pass' => '',
        'user_id' => '',
        'user_pass' => ''
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
     * @return object AfterbuyXmlClient
     */
    public function setCredentials($credentials)
    {
        $this->credentials = (array)$credentials;

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
     * @return object AfterbuyXmlClient
     */
    public function setUri($uri)
    {
        $this->uri = (string)$uri;

        return $this;
    }


    /**
     * @param object $httpClient
     *
     * @return object AfterbuyXmlClient
     */
    public function setHttpClient($httpClient)
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
     * @return object
     */
    public function getServiceProvider()
    {
        return $this->serviceProvider;
    }

    /**
     * @param XmlWebserviceInterface $provider
     *
     * @return object AfterbuyXmlClient
     */
    public function setServiceProvider($provider)
    {
        $this->serviceProvider = $provider;

        return $this;
    }

    /**
     * @return bool
     */
    private function isValidCredentialStructure()
    {
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
     * @return array | Exception
     */
    private function getValidCredentialStructure()
    {
       if($this->isValidCredentialStructure() === false) {
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

        return simplexml_load_string( (string) $request->getBody());
    }
}