<?php

namespace Wk\AfterbuyApi\Model\XmlApi;

use JMS\Serializer\Annotation as Serializer;
use \DateTime;

/**
 * Class AbstractShippingInfo
 */
abstract class AbstractShippingInfo extends AbstractModel
{
    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $shippingMethod;

    /**
     * @Serializer\Type("float")
     * @var float
     */
    protected $shippingCost;

    /**
     * @Serializer\Type("DateTime<'d.m.Y H:i:s'>")
     * @var DateTime
     */
    protected $deliveryDate;

    /**
     * @return string
     */
    public function getShippingMethod()
    {
        return $this->shippingMethod;
    }

    /**
     * @return float
     */
    public function getShippingCost()
    {
        return $this->shippingCost;
    }

    /**
     * @return DateTime
     */
    public function getDeliveryDate()
    {
        return $this->deliveryDate;
    }
}