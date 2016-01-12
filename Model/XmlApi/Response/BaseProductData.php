<?php

namespace Wk\AfterbuyApi\Model\XmlApi\Response;

use JMS\Serializer\Annotation as Serializer;
use Wk\AfterbuyApi\Model\XmlApi\AbstractModel;

/**
 * Class BaseProductData
 */
class BaseProductData extends AbstractModel
{
    /**
     * @Serializer\Type("integer")
     * @var int
     */
    private $baseProductType;

    /**
     * @Serializer\Type("Wk\AfterbuyApi\Model\XmlApi\Response\ChildProduct")
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