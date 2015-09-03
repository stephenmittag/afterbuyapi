<?php

namespace Wk\AfterbuyApi\Services;


final class AfterbuyXmlClient
{
    private $httpClient = null;

    private $serviceprovider = null;

    private $credentials = array();

    private $uri = null;

    /**
     * @param array $credentials
     *
     * @return object AfterbuyXmlClient
     */
    public function setCredentials($credentials)
    {
        $this->credentials = (array) $credentials;

        return $this;
    }

    /**
     * @param $uri
     *
     * @return object AfterbuyXmlClient
     */
    public function setUri($uri)
    {
        $this->uri = (string) $uri;

        return $this;
    }


    /**
     * @param object $httpclient
     *
     * @return object AfterbuyXmlClient
     */
    public function setHttpClient($httpclient)
    {
        $this->httpClient = (object) $httpclient;

        return $this;
    }

    /**
     * @param object $provider
     *
     * @return object AfterbuyXmlClient
     */
    public function setServiceProvider($provider)
    {
        $this->serviceprovider = (object) $provider;

        return $this;
    }

    /**
     * @return mixed
     */
    public function send()
    {
        $postdata = $this->serviceprovider->getData($this->credentials);
        $request = $this->httpClient->post($this->uri, array(
            'body' => $postdata
        ));

        return $request->getBody();
    }
}