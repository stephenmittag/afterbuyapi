<?php

namespace Wk\AfterbuyApi\Models\XmlApi\Response;

use JMS\Serializer\Annotation as Serializer;
use Wk\AfterbuyApi\Models\XmlApi\AbstractModel;

/**
 * Class BuyerInfo
 */
class BuyerInfo extends AbstractModel
{
    /**
     * @Serializer\Type("Wk\AfterbuyApi\Models\XmlApi\Response\BillingAddress")
     * @var BillingAddress
     */
    private $billingAddress;

    /**
     * @Serializer\Type("Wk\AfterbuyApi\Models\XmlApi\Response\ShippingAddress")
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