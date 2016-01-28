<?php

namespace Wk\AfterbuyApiBundle\Model\XmlApi\UpdateSoldItems;

use JMS\Serializer\Annotation as Serializer;
use Wk\AfterbuyApiBundle\Model\XmlApi\AbstractModel;

/**
 * Class BuyerInfo
 */
class BuyerInfo extends AbstractModel
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
