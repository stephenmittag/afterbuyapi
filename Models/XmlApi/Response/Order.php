<?php

namespace Wk\AfterbuyApi\Models\XmlApi\Response;

use JMS\Serializer\Annotation as Serializer;
use Wk\AfterbuyApi\Models\XmlApi\AbstractModel;
use \DateTime;

/**
 * Class Order
 */
class Order extends AbstractModel
{
    /**
     * @Serializer\Type("integer")
     * @var int
     */
    private $invoiceNumber;

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("OrderID")
     * @var int
     */
    private $orderId;

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
     * @Serializer\Type("DateTime<'d.m.Y H:i:s'>")
     * @var DateTime
     */
    private $feedbackDate;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    private $userComment;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    private $additionalInfo;

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
    private $invoiceMemo;

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
     * @Serializer\Type("Wk\AfterbuyApi\Models\XmlApi\Response\PaymentInfo")
     * @var PaymentInfo
     */
    private $paymentInfo;

    /**
     * @Serializer\Type("Wk\AfterbuyApi\Models\XmlApi\Response\BuyerInfo")
     * @var BuyerInfo
     */
    private $buyerInfo;

    /**
     * @Serializer\Type("Wk\AfterbuyApi\Models\XmlApi\Response\ShippingInfo")
     * @var ShippingInfo
     */
    private $shippingInfo;

    /**
     * @Serializer\Type("array<Wk\AfterbuyApi\Models\XmlApi\Response\SoldItem>")
     * @Serializer\XmlList(entry="SoldItem")
     * @var SoldItem[]
     */
    private $soldItems;

    /**
     * @return int
     */
    public function getInvoiceNumber()
    {
        return $this->invoiceNumber;
    }

    /**
     * @return int
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

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
     * @return DateTime
     */
    public function getFeedbackDate()
    {
        return $this->feedbackDate;
    }

    /**
     * @return string
     */
    public function getUserComment()
    {
        return $this->userComment;
    }

    /**
     * @return string
     */
    public function getAdditionalInfo()
    {
        return $this->additionalInfo;
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
    public function getInvoiceMemo()
    {
        return $this->invoiceMemo;
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