<?php

namespace Wk\AfterbuyApi\Models\XmlApi;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class AfterbuyGlobal
 *
 * @Serializer\XmlRoot("AfterbuyGlobal")
 *
 * @package Wk\AfterbuyApi\Models
 */
class AfterbuyGlobal extends AbstractModel
{
    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("PartnerID")
     * @var int
     */
    private $partnerId;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    private $partnerPassword;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("UserID")
     * @var string
     */
    private $userId;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    private $userPassword;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    private $callName;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    private $detailLevel;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    private $errorLanguage;

    /**
     * @return int
     */
    public function getPartnerId()
    {
        return $this->partnerId;
    }

    /**
     * @param int $partnerId
     *
     * @return $this
     */
    public function setPartnerId($partnerId)
    {
        $this->partnerId = $partnerId;

        return $this;
    }

    /**
     * @return string
     */
    public function getPartnerPassword()
    {
        return $this->partnerPassword;
    }

    /**
     * @param string $partnerPassword
     *
     * @return $this
     */
    public function setPartnerPassword($partnerPassword)
    {
        $this->partnerPassword = $partnerPassword;

        return $this;
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     *
     * @return $this
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return string
     */
    public function getUserPassword()
    {
        return $this->userPassword;
    }

    /**
     * @param string $userPassword
     *
     * @return $this
     */
    public function setUserPassword($userPassword)
    {
        $this->userPassword = $userPassword;

        return $this;
    }

    /**
     * @return string
     */
    public function getCallName()
    {
        return $this->callName;
    }

    /**
     * @param string $callName
     *
     * @return $this
     */
    public function setCallName($callName)
    {
        $this->callName = $callName;

        return $this;
    }

    /**
     * @return int
     */
    public function getDetailLevel()
    {
        return $this->detailLevel;
    }

    /**
     * @param int $detailLevel
     *
     * @return $this
     */
    public function setDetailLevel($detailLevel)
    {
        $this->detailLevel = $detailLevel;

        return $this;
    }

    /**
     * @return string
     */
    public function getErrorLanguage()
    {
        return $this->errorLanguage;
    }

    /**
     * @param string $errorLanguage
     *
     * @return $this
     */
    public function setErrorLanguage($errorLanguage)
    {
        $this->errorLanguage = $errorLanguage;

        return $this;
    }
}