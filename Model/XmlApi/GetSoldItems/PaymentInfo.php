<?php

namespace Wk\AfterbuyApiBundle\Model\XmlApi\GetSoldItems;

use JMS\Serializer\Annotation as Serializer;
use Wk\AfterbuyApiBundle\Model\XmlApi\AbstractPaymentInfo;
use \DateTime;

/**
 * Class PaymentInfo
 */
class PaymentInfo extends AbstractPaymentInfo
{
    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("PaymentID")
     * @var string
     */
    private $paymentId;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("PaymentFunction")
     * @var string
     */
    private $paymentFunction;

    /**
     * @Serializer\Type("Wk\AfterbuyApiBundle\Model\XmlApi\GetSoldItems\PaymentData")
     * @Serializer\SerializedName("PaymentData")
     * @var PaymentData
     */
    private $paymentData;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("PaymentTransactionID")
     * @var string
     */
    private $paymentTransactionId;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("PaymentStatus")
     * @var string
     */
    private $paymentStatus;

    /**
     * @Serializer\Type("float")
     * @Serializer\SerializedName("FullAmount")
     * @var float
     */
    private $fullAmount;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("PaymentInstruction")
     * @var string
     */
    private $paymentInstruction;

    /**
     * @Serializer\Type("DateTime<'d.m.Y H:i:s', 'UTC', '!d.m.Y'>")
     * @Serializer\SerializedName("InvoiceDate")
     * @var DateTime
     */
    private $invoiceDate;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("EFTID")
     * @var string
     */
    private $eftid;

    /**
     * @return string
     */
    public function getPaymentId()
    {
        return $this->paymentId;
    }

    /**
     * @return string
     */
    public function getPaymentFunction()
    {
        return $this->paymentFunction;
    }

    /**
     * @return PaymentData
     */
    public function getPaymentData()
    {
        return $this->paymentData;
    }

    /**
     * @return string
     */
    public function getPaymentTransactionId()
    {
        return $this->paymentTransactionId;
    }

    /**
     * @return string
     */
    public function getPaymentStatus()
    {
        return $this->paymentStatus;
    }

    /**
     * @return float
     */
    public function getFullAmount()
    {
        return $this->fullAmount;
    }

    /**
     * @return string
     */
    public function getPaymentInstruction()
    {
        return $this->paymentInstruction;
    }

    /**
     * @return DateTime
     */
    public function getInvoiceDate()
    {
        return $this->invoiceDate;
    }

    /**
     * @return string
     */
    public function getEftid()
    {
        return $this->eftid;
    }
}