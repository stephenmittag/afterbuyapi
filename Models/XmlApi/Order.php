<?php

namespace Wk\AfterbuyApi\Models\XmlApi;

use JMS\Serializer\Annotation as Serializer;
use \DateTime;

/**
 * Class Order
 *
 * @package Wk\AfterbuyApi\Models
 */
class Order extends AbstractModel
{
    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("OrderID")
     * @var int
     */
    private $orderId;

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("ItemID")
     * @var int
     */
    private $itemId;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    private $userDefinedFlag;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    private $additionalInfo;

    /**
     * @Serializer\Type("DateTime<'d.m.Y H:i:s'>")
     * @var DateTime
     */
    private $mailDate;

    /**
     * @Serializer\Type("DateTime<'d.m.Y H:i:s'>")
     * @var DateTime
     */
    private $reminderMailDate;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    private $userComment;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    private $orderMemo;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    private $invoiceMemo;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    private $invoiceNumber;

    /**
     * @Serializer\Type("integer")
     * @Serializer\Accessor(getter="getOrderExportedAsInteger", setter="setOrderExportedFromInteger")
     * @var bool
     */
    private $orderExported;

    /**
     * @Serializer\Type("DateTime<'d.m.Y H:i:s'>")
     * @var DateTime
     */
    private $invoiceDate;

    /**
     * @Serializer\Type("integer")
     * @Serializer\Accessor(getter="getHideOrderAsInteger", setter="setHideOrderFromInteger")
     * @var bool
     */
    private $hideOrder;

    /**
     * @Serializer\Type("DateTime<'d.m.Y H:i:s'>")
     * @var DateTime
     */
    private $reminder1Date;

    /**
     * @Serializer\Type("DateTime<'d.m.Y H:i:s'>")
     * @var DateTime
     */
    private $reminder2Date;

    /**
     * @Serializer\Type("DateTime<'d.m.Y H:i:s'>")
     * @var DateTime
     */
    private $feedbackDate;

    /**
     * @Serializer\Type("DateTime<'d.m.Y H:i:s'>")
     * @var DateTime
     */
    private $xmlDate;

    /**
     * @Serializer\Type("Wk\AfterbuyApi\Models\XmlApi\BuyerInfo")
     * @var BuyerInfo
     */
    private $buyerInfo;

    /**
     * @Serializer\Type("Wk\AfterbuyApi\Models\XmlApi\PaymentInfo")
     * @var PaymentInfo
     */
    private $paymentInfo;

    /**
     * @Serializer\Type("Wk\AfterbuyApi\Models\XmlApi\ShippingInfo")
     * @var ShippingInfo
     */
    private $shippingInfo;

    /**
     * @Serializer\Type("Wk\AfterbuyApi\Models\XmlApi\VorgangsInfo")
     * @var VorgangsInfo
     */
    private $vorgangsInfo;

    /**
     * @return int
     */
    public function getOrderExportedAsInteger() {
        return $this->getBooleanAsInteger($this->orderExported);
    }

    /**
     * @param int $value
     */
    public function setOrderExportedFromInteger($value) {
        $this->orderExported = $this->setBooleanFromInteger($value);
    }

    /**
     * @return int
     */
    public function getHideOrderAsInteger() {
        return $this->getBooleanAsInteger($this->hideOrder);
    }

    /**
     * @param int $value
     */
    public function setHideOrderFromInteger($value) {
        $this->hideOrder = $this->setBooleanFromInteger($value);
    }

    /**
     * @return int
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @param int $orderId
     *
     * @return $this
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * @return int
     */
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * @param int $itemId
     *
     * @return $this
     */
    public function setItemId($itemId)
    {
        $this->itemId = $itemId;

        return $this;
    }

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
        $this->userDefinedFlag = $userDefinedFlag;

        return $this;
    }

    /**
     * @return string
     */
    public function getAdditionalInfo()
    {
        return $this->additionalInfo;
    }

    /**
     * @param string $additionalInfo
     *
     * @return $this
     */
    public function setAdditionalInfo($additionalInfo)
    {
        $this->additionalInfo = $additionalInfo;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getMailDate()
    {
        return $this->mailDate;
    }

    /**
     * @param DateTime $mailDate
     *
     * @return $this
     */
    public function setMailDate(DateTime $mailDate = null)
    {
        $this->mailDate = $mailDate;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getReminderMailDate()
    {
        return $this->reminderMailDate;
    }

    /**
     * @param DateTime $reminderMailDate
     *
     * @return $this
     */
    public function setReminderMailDate(DateTime $reminderMailDate = null)
    {
        $this->reminderMailDate = $reminderMailDate;

        return $this;
    }

    /**
     * @return string
     */
    public function getUserComment()
    {
        return $this->userComment;
    }

    /**
     * @param string $userComment
     *
     * @return $this
     */
    public function setUserComment($userComment)
    {
        $this->userComment = $userComment;

        return $this;
    }

    /**
     * @return string
     */
    public function getOrderMemo()
    {
        return $this->orderMemo;
    }

    /**
     * @param string $orderMemo
     *
     * @return $this
     */
    public function setOrderMemo($orderMemo)
    {
        $this->orderMemo = $orderMemo;

        return $this;
    }

    /**
     * @return string
     */
    public function getInvoiceMemo()
    {
        return $this->invoiceMemo;
    }

    /**
     * @param string $invoiceMemo
     *
     * @return $this
     */
    public function setInvoiceMemo($invoiceMemo)
    {
        $this->invoiceMemo = $invoiceMemo;

        return $this;
    }

    /**
     * @return int
     */
    public function getInvoiceNumber()
    {
        return $this->invoiceNumber;
    }

    /**
     * @param int $invoiceNumber
     *
     * @return $this
     */
    public function setInvoiceNumber($invoiceNumber)
    {
        $this->invoiceNumber = $invoiceNumber;

        return $this;
    }

    /**
     * @return bool
     */
    public function isOrderExported()
    {
        return $this->orderExported;
    }

    /**
     * @param bool $orderExported
     *
     * @return $this
     */
    public function setOrderExported($orderExported)
    {
        $this->orderExported = $orderExported;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getInvoiceDate()
    {
        return $this->invoiceDate;
    }

    /**
     * @param DateTime $invoiceDate
     *
     * @return $this
     */
    public function setInvoiceDate(DateTime $invoiceDate = null)
    {
        $this->invoiceDate = $invoiceDate;

        return $this;
    }

    /**
     * @return bool
     */
    public function isHideOrder()
    {
        return $this->hideOrder;
    }

    /**
     * @param bool $hideOrder
     *
     * @return $this
     */
    public function setHideOrder($hideOrder)
    {
        $this->hideOrder = $hideOrder;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getReminder1Date()
    {
        return $this->reminder1Date;
    }

    /**
     * @param DateTime $reminder1Date
     *
     * @return $this
     */
    public function setReminder1Date(DateTime $reminder1Date = null)
    {
        $this->reminder1Date = $reminder1Date;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getReminder2Date()
    {
        return $this->reminder2Date;
    }

    /**
     * @param DateTime $reminder2Date
     *
     * @return $this
     */
    public function setReminder2Date(DateTime $reminder2Date = null)
    {
        $this->reminder2Date = $reminder2Date;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getFeedbackDate()
    {
        return $this->feedbackDate;
    }

    /**
     * @param DateTime $feedbackDate
     *
     * @return $this
     */
    public function setFeedbackDate(DateTime $feedbackDate = null)
    {
        $this->feedbackDate = $feedbackDate;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getXmlDate()
    {
        return $this->xmlDate;
    }

    /**
     * @param DateTime $xmlDate
     *
     * @return $this
     */
    public function setXmlDate(DateTime $xmlDate = null)
    {
        $this->xmlDate = $xmlDate;

        return $this;
    }

    /**
     * @return BuyerInfo
     */
    public function getBuyerInfo()
    {
        return $this->buyerInfo;
    }

    /**
     * @param BuyerInfo $buyerInfo
     *
     * @return $this
     */
    public function setBuyerInfo(BuyerInfo $buyerInfo = null)
    {
        $this->buyerInfo = $buyerInfo;

        return $this;
    }

    /**
     * @return PaymentInfo
     */
    public function getPaymentInfo()
    {
        return $this->paymentInfo;
    }

    /**
     * @param PaymentInfo $paymentInfo
     *
     * @return $this
     */
    public function setPaymentInfo(PaymentInfo $paymentInfo = null)
    {
        $this->paymentInfo = $paymentInfo;

        return $this;
    }

    /**
     * @return ShippingInfo
     */
    public function getShippingInfo()
    {
        return $this->shippingInfo;
    }

    /**
     * @param ShippingInfo $shippingInfo
     *
     * @return $this
     */
    public function setShippingInfo(ShippingInfo $shippingInfo = null)
    {
        $this->shippingInfo = $shippingInfo;

        return $this;
    }

    /**
     * @return VorgangsInfo
     */
    public function getVorgangsInfo()
    {
        return $this->vorgangsInfo;
    }

    /**
     * @param VorgangsInfo $vorgangsInfo
     *
     * @return $this
     */
    public function setVorgangsInfo(VorgangsInfo $vorgangsInfo = null)
    {
        $this->vorgangsInfo = $vorgangsInfo;

        return $this;
    }
}