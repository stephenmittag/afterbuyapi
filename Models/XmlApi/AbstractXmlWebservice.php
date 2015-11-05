<?php

namespace Wk\AfterbuyApi\Models\XmlApi;

/**
 * Class AbstractXmlWebservice
 * @package Wk\AfterbuyApi\Models\XmlApi
 */
abstract class AbstractXmlWebservice
{
    /**
     * @var int
     */
    protected $userDefinedFlag;

    /**
     * @return int
     */
    public function getUserDefinedFlag()
    {
        return $this->userDefinedFlag;
    }

    /**
     * @param int $userDefinedFlag
     *
     * @return $this
     */
    public function setUserDefinedFlag($userDefinedFlag)
    {
        $this->userDefinedFlag = (int) $userDefinedFlag;

        return $this;
    }

    /**
     * @param array $credentials
     *
     * @return string
     */
    abstract public function getData(array $credentials);
}
