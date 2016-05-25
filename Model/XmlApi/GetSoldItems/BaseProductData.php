<?php

namespace Wk\AfterbuyApiBundle\Model\XmlApi\GetSoldItems;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class BaseProductData
 */
class BaseProductData
{
    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("BaseProductType")
     * @var int
     */
    private $baseProductType;

    /**
     * @Serializer\Type("Wk\AfterbuyApiBundle\Model\XmlApi\GetSoldItems\ChildProduct")
     * @Serializer\SerializedName("ChildProduct")
     * @var ChildProduct
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
