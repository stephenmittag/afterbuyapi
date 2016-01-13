<?php

namespace Wk\AfterbuyApi\Model\XmlApi\UpdateSoldItems;

use JMS\Serializer\Annotation as Serializer;
use \DateTime;
use Wk\AfterbuyApi\Model\XmlApi\AbstractShippingInfo;

/**
 * Class ShippingInfo
 */
class ShippingInfo extends AbstractShippingInfo
{
    /**
     * @Serializer\Type("string")
     * @var string
     */
    private $shippingGroup;

    /**
     * @Serializer\Type("float")
     * @Serializer\SerializedName("eBayShippingCost")
     * @var float
     */
    private $eBayShippingCost;

    /**
     * @Serializer\Type("integer")
     * @Serializer\Accessor(getter="getSendShippingMailAsInteger", setter="setSendShippingMailFromInteger")
     * @var bool
     */
    private $sendShippingMail;

    /**
     * @return int
     */
    public function getSendShippingMailAsInteger()
    {
        return $this->getBooleanAsInteger($this->sendShippingMail);
    }

    /**
     * @param int $value
     */
    public function setSendShippingMailFromInteger($value)
    {
        $this->sendShippingMail = $this->setBooleanFromInteger($value);
    }

    /**
     * @param string $shippingMethod
     *
     * @return $this
     */
    public function setShippingMethod($shippingMethod)
    {
        $this->shippingMethod = $shippingMethod;

        return $this;
    }

    /**
     * @return string
     */
    public function getShippingGroup()
    {
        return $this->shippingGroup;
    }

    /**
     * @param string $shippingGroup
     *
     * @return $this
     */
    public function setShippingGroup($shippingGroup)
    {
        $this->shippingGroup = $shippingGroup;

        return $this;
    }

    /**
     * @param float $shippingCost
     *
     * @return $this
     */
    public function setShippingCost($shippingCost)
    {
        $this->shippingCost = $shippingCost;

        return $this;
    }

    /**
     * @param DateTime $deliveryDate
     *
     * @return $this
     */
    public function setDeliveryDate(DateTime $deliveryDate = null)
    {
        $this->deliveryDate = $deliveryDate;

        return $this;
    }

    /**
     * @return float
     */
    public function getEBayShippingCost()
    {
        return $this->eBayShippingCost;
    }

    /**
     * @param float $eBayShippingCost
     *
     * @return $this
     */
    public function setEBayShippingCost($eBayShippingCost)
    {
        $this->eBayShippingCost = $eBayShippingCost;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isSendShippingMail()
    {
        return $this->sendShippingMail;
    }

    /**
     * @param bool $sendShippingMail
     *
     * @return $this
     */
    public function setSendShippingMail($sendShippingMail)
    {
        $this->sendShippingMail = $sendShippingMail;

        return $this;
    }
}