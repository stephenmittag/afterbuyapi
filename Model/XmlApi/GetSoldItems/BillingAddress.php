<?php

namespace Wk\AfterbuyApi\Model\XmlApi\GetSoldItems;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class BillingAddress
 */
class BillingAddress extends ShippingAddress
{
    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("AfterbuyUserID")
     * @var string
     */
    private $afterbuyUserId;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("AfterbuyUserIDAlt")
     * @var string
     */
    private $afterbuyUserIdAlt;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("UserIDPlattform")
     * @var string
     */
    private $userIdPlatform;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Title")
     * @var string
     */
    private $title;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Fax")
     * @var string
     */
    private $fax;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Mail")
     * @var string
     */
    private $mail;

    /**
     * @Serializer\Type("integer")
     * @Serializer\Accessor(setter="setIsMerchantFromInteger")
     * @Serializer\SerializedName("IsMerchant")
     * @var bool
     */
    private $merchant;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("TaxIDNumber")
     * @var string
     */
    private $taxIdNumber;

    /**
     * @param int $value
     */
    public function setIsMerchantFromInteger($value)
    {
        $this->merchant = $this->setBooleanFromInteger($value);
    }

    /**
     * @return string
     */
    public function getAfterbuyUserId()
    {
        return $this->afterbuyUserId;
    }

    /**
     * @return string
     */
    public function getAfterbuyUserIdAlt()
    {
        return $this->afterbuyUserIdAlt;
    }

    /**
     * @return string
     */
    public function getUserIdPlatform()
    {
        return $this->userIdPlatform;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @return bool
     */
    public function isMerchant()
    {
        return $this->merchant;
    }

    /**
     * @return string
     */
    public function getTaxIdNumber()
    {
        return $this->taxIdNumber;
    }
}