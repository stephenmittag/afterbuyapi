<?php

namespace Wk\AfterbuyApi\Model\XmlApi;

use JMS\Serializer\Annotation as Serializer;
use \DateTime;

/**
 * Class AbstractPaymentInfo
 */
abstract class AbstractPaymentInfo extends AbstractModel
{
    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $paymentMethod;

    /**
     * @Serializer\Type("DateTime<'d.m.Y H:i:s'>")
     * @var DateTime
     */
    protected $paymentDate;

    /**
     * @Serializer\Type("float")
     * @var float
     */
    protected $alreadyPaid;

    /**
     * @return string
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
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
}