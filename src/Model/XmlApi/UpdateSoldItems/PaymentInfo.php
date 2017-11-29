<?php

namespace Wk\AfterbuyApiBundle\Model\XmlApi\UpdateSoldItems;

use JMS\Serializer\Annotation as Serializer;
use \DateTime;
use Wk\AfterbuyApiBundle\Model\XmlApi\AbstractPaymentInfo;

/**
 * Class PaymentInfo
 */
class PaymentInfo extends AbstractPaymentInfo
{
    /**
     * @Serializer\Type("float")
     * @Serializer\SerializedName("PaymentAadditionalCost")
     * @var float
     *
     * Info: PaymentAadditionalCost is correct it is a bug in the afterbuy xml api
     */
    private $paymentAdditionalCost;

    /**
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("SendPaymentMail")
     * @var bool
     */
    private $sendPaymentMail;

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
