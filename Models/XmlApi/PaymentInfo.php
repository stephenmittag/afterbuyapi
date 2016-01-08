<?php

namespace Wk\AfterbuyApi\Models\XmlApi;

use JMS\Serializer\Annotation as Serializer;
use \DateTime;

/**
 * Class PaymentInfo
 *
 * @Serializer\XmlRoot("PaymentInfo")
 *
 * @package Wk\AfterbuyApi\Models\XmlApi
 */
class PaymentInfo
{
    /**
     * @Serializer\Type("string")
     * @var string
     */
    private $paymentMethod;

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
     * @Serializer\SerializedName("PaymentAadditionalCost")
     * @var float
     */
    private $paymentAdditionalCost;

    /**
     * @Serializer\Type("boolean")
     * @var bool
     */
    private $sendPaymentMail;

    /**
     * @return string
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * @param string $paymentMethod
     *
     * @return $this
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getPaymentDate()
    {
        return $this->paymentDate;
    }

    /**
     * @param DateTime $paymentDate
     *
     * @return $this
     */
    public function setPaymentDate(DateTime $paymentDate = null)
    {
        $this->paymentDate = $paymentDate;

        return $this;
    }

    /**
     * @return float
     */
    public function getAlreadyPaid()
    {
        return $this->alreadyPaid;
    }

    /**
     * @param float $alreadyPaid
     *
     * @return $this
     */
    public function setAlreadyPaid($alreadyPaid)
    {
        $this->alreadyPaid = $alreadyPaid;

        return $this;
    }

    /**
     * @return float
     */
    public function getPaymentAdditionalCost()
    {
        return $this->paymentAdditionalCost;
    }

    /**
     * @param float $paymentAdditionalCost
     *
     * @return $this
     */
    public function setPaymentAdditionalCost($paymentAdditionalCost)
    {
        $this->paymentAdditionalCost = $paymentAdditionalCost;

        return $this;
    }

    /**
     * @return bool
     */
    public function isSendPaymentMail()
    {
        return $this->sendPaymentMail;
    }

    /**
     * @param bool $sendPaymentMail
     *
     * @return $this
     */
    public function setSendPaymentMail($sendPaymentMail)
    {
        $this->sendPaymentMail = $sendPaymentMail;

        return $this;
    }
}