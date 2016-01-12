<?php

namespace Wk\AfterbuyApi\Models\XmlApi\Response;

use JMS\Serializer\Annotation as Serializer;
use Wk\AfterbuyApi\Models\XmlApi\AbstractModel;
use \DateTime;

/**
 * Class PaymentInfo
 */
class PaymentInfo extends AbstractModel
{
    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("PaymentID")
     * @var string
     */
    private $paymentId;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    private $paymentMethod;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    private $paymentFunction;

    /**
     * @Serializer\Type("Wk\AfterbuyApi\Models\XmlApi\Response\PaymentData")
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
     * @var string
     */
    private $paymentStatus;

    /**
     * @Serializer\Type("DateTime<'d.m.Y H:i:s'>")
     * @var DateTime
     */
    private $paymentDate;

    /**
     * @Serializer\Type("float")
     * @var float
     */
    private $alreadyPaid;

    /**
     * @Serializer\Type("float")
     * @var float
     */
    private $fullAmount;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    private $paymentInstruction;

    /**
     * @Serializer\Type("DateTime<'d.m.Y H:i:s'>")
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
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
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
     * @return DateTime
     */
    public function getPaymentDate()
    {
        return $this->paymentDate;
    }

    /**
     * @return float
     */
    public function getAlreadyPaid()
    {
        return $this->alreadyPaid;
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