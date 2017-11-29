<?php

namespace Wk\AfterbuyApiBundle\Model\XmlApi\GetShopProducts;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class BaseProduct
 */
class BaseProduct
{

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("BaseProductID")
     * @var int
     */
    private $baseProductID;

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("BaseProductType")
     * @var int
     */
    private $baseProductType;

    /**
     * @Serializer\Type("Wk\AfterbuyApiBundle\Model\XmlApi\GetShopProducts\BaseProductsRelationData")
     * @Serializer\SerializedName("BaseProductsRelationData")
     * @var BaseProductsRelationData
     */
    private $childProduct;

    /**
     * @return int
     */
    public function getBaseProductType()
    {
        return $this->baseProductType;
    }

    /**
     * @return ChildProduct
     */
    public function getChildProduct()
    {
        return $this->childProduct;
    }
}
