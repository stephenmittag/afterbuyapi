<?php

namespace Wk\AfterbuyApi\Models\XmlApi;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class BuyerInfo
 *
 * @Serializer\XmlRoot("BuyerInfo")
 *
 * @package Wk\AfterbuyApi\Models\XmlApi
 */
class BuyerInfo
{
    /**
     * @Serializer\Type("Wk\AfterbuyApi\Models\XmlApi\ShippingAddress")
     * @var ShippingAddress
     */
    private $shippingAddress;

    /**
     * @return ShippingAddress
     */
    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    /**
     * @param ShippingAddress $shippingAddress
     *
     * @return $this
     */
    public function setShippingAddress(ShippingAddress $shippingAddress = null)
    {
        $this->shippingAddress = $shippingAddress;

        return $this;
    }
}