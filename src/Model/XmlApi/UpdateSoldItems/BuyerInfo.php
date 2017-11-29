<?php

namespace Wk\AfterbuyApiBundle\Model\XmlApi\UpdateSoldItems;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class BuyerInfo
 */
class BuyerInfo
{
    /**
     * @Serializer\Type("Wk\AfterbuyApiBundle\Model\XmlApi\UpdateSoldItems\ShippingAddress")
     * @Serializer\SerializedName("ShippingAddress")
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
