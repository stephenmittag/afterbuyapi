<?php

namespace Wk\AfterbuyApi\Model\XmlApi\GetSoldItems;

use JMS\Serializer\Annotation as Serializer;
use Wk\AfterbuyApi\Model\XmlApi\AbstractOrder;
use \DateTime;

/**
 * Class Order
 */
class Order extends AbstractOrder
{
    /**
     * @Serializer\Type("string")
     * @var string
     */
    private $ebayAccount;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    private $amazonAccount;

    /**
     * @Serializer\Type("float")
     * @var float
     */
    private $anr;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    private $alternativeItemNumber1;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    private $trackingLink;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    private $memo;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    private $feedbackLink;

    /**
     * @Serializer\Type("DateTime<'d.m.Y H:i:s'>")
     * @var DateTime
     */
    private $orderDate;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("OrderIDAlt")
     * @var string
     */
    private $orderIdAlt;

    /**
     * @Serializer\Type("Wk\AfterbuyApi\Model\XmlApi\GetSoldItems\PaymentInfo")
     * @var PaymentInfo
     */
    private $paymentInfo;

    /**
     * @Serializer\Type("Wk\AfterbuyApi\Model\XmlApi\GetSoldItems\BuyerInfo")
     * @var BuyerInfo
     */
    private $buyerInfo;

    /**
     * @Serializer\Type("Wk\AfterbuyApi\Model\XmlApi\GetSoldItems\ShippingInfo")
     * @var ShippingInfo
     */
    private $shippingInfo;

    /**
     * @Serializer\Type("array<Wk\AfterbuyApi\Model\XmlApi\GetSoldItems\SoldItem>")
     * @Serializer\XmlList(entry="SoldItem")
     * @var SoldItem[]
     */
    private $soldItems;

    /**
     * @return string
     */
    public function getEbayAccount()
    {
        return $this->ebayAccount;
    }

    /**
     * @return string
     */
    public function getAmazonAccount()
    {
        return $this->amazonAccount;
    }

    /**
     * @return float
     */
    public function getAnr()
    {
        return $this->anr;
    }

    /**
     * @return string
     */
    public function getAlternativeItemNumber1()
    {
        return $this->alternativeItemNumber1;
    }

    /**
     * @return string
     */
    public function getTrackingLink()
    {
        return $this->trackingLink;
    }

    /**
     * @return string
     */
    public function getMemo()
    {
        return $this->memo;
    }

    /**
     * @return string
     */
    public function getFeedbackLink()
    {
        return $this->feedbackLink;
    }

    /**
     * @return DateTime
     */
    public function getOrderDate()
    {
        return $this->orderDate;
    }

    /**
     * @return string
     */
    public function getOrderIdAlt()
    {
        return $this->orderIdAlt;
    }

    /**
     * @return PaymentInfo
     */
    public function getPaymentInfo()
    {
        return $this->paymentInfo;
    }

    /**
     * @return BuyerInfo
     */
    public function getBuyerInfo()
    {
        return $this->buyerInfo;
    }

    /**
     * @return ShippingInfo
     */
    public function getShippingInfo()
    {
        return $this->shippingInfo;
    }

    /**
     * @return SoldItem[]
     */
    public function getSoldItems()
    {
        return $this->soldItems;
    }
}