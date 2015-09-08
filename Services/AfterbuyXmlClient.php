<?php

namespace Wk\AfterbuyApi\Services;


use GuzzleHttp\Client;

final class AfterbuyXmlClient
{
    private $httpClient = null;

    private $serviceProvider = null;

    private $credentials = array();

    private $uri = null;

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
     * @param object $httpclient
     *
     * @return object AfterbuyXmlClient
     */
    public function setHttpClient($httpclient)
    {
        $this->httpClient = $httpclient;

        return $this;
    }

    /**
     * @return object
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
     * @param object $provider
     *
     * @return object AfterbuyXmlClient
     */
    public function setServiceProvider($provider)
    {
        $this->serviceProvider = (object)$provider;

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
     * @return SimpleXMLElement
     */
    public function send()
    {
        $postData = $this->serviceProvider->getData($this->isValidCredentialStructure() ? $this->credentials : $this->validStructure);
        $request = $this->httpClient->post($this->uri,
            array(
                'body' => $postData
            ));

        return $request->xml();
    }
}