<?php

namespace Wk\AfterbuyApiBundle\Model\XmlApi\GetShopProducts;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Catalog
 */
class ScaledDiscount
{

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("ScaledQuantity")
     * @var integer
     */
    private $scaledQuantity;

    /**
     * @Serializer\Type("float")
     * @Serializer\SerializedName("ScaledPrice")
     * @var float
     */
    private $scaledPrice;

    /**
     * @Serializer\Type("float")
     * @Serializer\SerializedName("ScaledDPrice")
     * @var float
     */
    private $scaledDPrice;

    /**
     * @return int
     */
    public function getScaledQuantity()
    {
        return $this->scaledQuantity;
    }

    /**
     * @return float
     */
    public function getScaledPrice()
    {
        return $this->scaledPrice;
    }

    /**
     * @return float
     */
    public function getScaledDPrice()
    {
        return $this->scaledDPrice;
    }


}
