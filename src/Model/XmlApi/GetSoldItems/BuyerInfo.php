<?php

namespace Wk\AfterbuyApiBundle\Model\XmlApi\GetSoldItems;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class BuyerInfo
 */
class BuyerInfo
{
    /**
     * @Serializer\Type("Wk\AfterbuyApiBundle\Model\XmlApi\GetSoldItems\BillingAddress")
     * @Serializer\SerializedName("BillingAddress")
     * @var BillingAddress
     */
    private $billingAddress;

    /**
     * @Serializer\Type("Wk\AfterbuyApiBundle\Model\XmlApi\GetSoldItems\ShippingAddress")
     * @Serializer\SerializedName("ShippingAddress")
     * @var ShippingAddress
     */
    private $shippingAddress;

    /**
     * @return BillingAddress
     */
    public function getBillingAddress()
    {
        return $this->billingAddress;
    }

    /**
     * @return ShippingAddress
     */
    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }
}
