<?php

namespace Wk\AfterbuyApi\Models\XmlApi;

/**
 * Interface XmlWebserviceInterface
 * @package Wk\AfterbuyApi\Models\XmlApi
 */
interface XmlWebserviceInterface
{
    /**
     * @param array $credentials
     * @return mixed
     */
    public function getData(array $credentials);
}
