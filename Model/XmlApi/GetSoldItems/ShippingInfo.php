<?php

namespace Wk\AfterbuyApi\Model\XmlApi\GetSoldItems;

use JMS\Serializer\Annotation as Serializer;
use Wk\AfterbuyApi\Model\XmlApi\AbstractShippingInfo;

/**
 * Class ShippingInfo
 */
class ShippingInfo extends AbstractShippingInfo
{
    /**
     * @Serializer\Type("float")
     * @Serializer\SerializedName("ShippingAdditionalCost")
     * @var float
     */
    private $shippingAdditionalCost;

    /**
     * @Serializer\Type("float")
     * @Serializer\SerializedName("ShippingTotalCost")
     * @var float
     */
    private $shippingTotalCost;

    /**
     * @Serializer\Type("float")
     * @Serializer\SerializedName("ShippingTaxRate")
     * @var float
     */
    private $shippingTaxRate;

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
}