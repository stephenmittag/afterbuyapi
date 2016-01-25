<?php

namespace Wk\AfterbuyApiBundle\Model\XmlApi\GetSoldItems;

use JMS\Serializer\Annotation as Serializer;
use Wk\AfterbuyApiBundle\Model\XmlApi\AbstractOrder;
use \DateTime;

/**
 * Class Order
 */
class Order extends AbstractOrder
{
    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("EbayAccount")
     * @var string
     */
    private $ebayAccount;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("AmazonAccount")
     * @var string
     */
    private $amazonAccount;

    /**
     * @Serializer\Type("float")
     * @Serializer\SerializedName("Anr")
     * @var float
     */
    private $anr;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("AlternativeItemNumber1")
     * @var string
     */
    private $alternativeItemNumber1;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("TrackingLink")
     * @var string
     */
    private $trackingLink;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Memo")
     * @var string
     */
    private $memo;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("FeedbackLink")
     * @var string
     */
    private $feedbackLink;

    /**
     * @Serializer\Type("DateTime<'d.m.Y H:i:s', 'UTC', '!d.m.Y'>")
     * @Serializer\SerializedName("OrderDate")
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
     * @Serializer\Type("Wk\AfterbuyApiBundle\Model\XmlApi\GetSoldItems\PaymentInfo")
     * @Serializer\SerializedName("PaymentInfo")
     * @var PaymentInfo
     */
    private $paymentInfo;

    /**
     * @Serializer\Type("Wk\AfterbuyApiBundle\Model\XmlApi\GetSoldItems\BuyerInfo")
     * @Serializer\SerializedName("BuyerInfo")
     * @var BuyerInfo
     */
    private $buyerInfo;

    /**
     * @Serializer\Type("Wk\AfterbuyApiBundle\Model\XmlApi\GetSoldItems\ShippingInfo")
     * @Serializer\SerializedName("ShippingInfo")
     * @var ShippingInfo
     */
    private $shippingInfo;

    /**
     * @Serializer\Type("array<Wk\AfterbuyApiBundle\Model\XmlApi\GetSoldItems\SoldItem>")
     * @Serializer\XmlList(entry="SoldItem")
     * @Serializer\SerializedName("SoldItems")
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