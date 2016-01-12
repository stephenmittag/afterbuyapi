<?php

namespace Wk\AfterbuyApi\Models\XmlApi\Response;

use JMS\Serializer\Annotation as Serializer;
use Wk\AfterbuyApi\Models\XmlApi\AbstractModel;
use \DateTime;

/**
 * Class ShippingInfo
 */
class ShippingInfo extends AbstractModel
{
    /**
     * @Serializer\Type("string")
     * @var string
     */
    private $shippingMethod;

    /**
     * @Serializer\Type("float")
     * @var float
     */
    private $shippingCost;

    /**
     * @Serializer\Type("float")
     * @var float
     */
    private $shippingAdditionalCost;

    /**
     * @Serializer\Type("float")
     * @var float
     */
    private $shippingTotalCost;

    /**
     * @Serializer\Type("float")
     * @var float
     */
    private $shippingTaxRate;

    /**
     * @Serializer\Type("DateTime<'d.m.Y H:i:s'>")
     * @var DateTime
     */
    private $deliveryDate;

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
     * @return float
     */
    public function getShippingAdditionalCost()
    {
        return $this->shippingAdditionalCost;
    }

    /**
     * @return float
     */
    public function getShippingTotalCost()
    {
        return $this->shippingTotalCost;
    }

    /**
     * @return float
     */
    public function getShippingTaxRate()
    {
        return $this->shippingTaxRate;
    }

    /**
     * @return DateTime
     */
    public function getDeliveryDate()
    {
        return $this->deliveryDate;
    }
}