<?php

namespace Wk\AfterbuyApi\Model\XmlApi\GetSoldItems;

use JMS\Serializer\Annotation as Serializer;
use Wk\AfterbuyApi\Model\XmlApi\AbstractModel;

/**
 * Class ShopProductDetails
 */
class ShopProductDetails extends AbstractModel
{
    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("ProductID")
     * @var int
     */
    private $productId;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("EAN")
     * @var string
     */
    private $ean;

    /**
     * @Serializer\Type("float")
     * @var float
     */
    private $anr;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    private $unitOfQuantity;

    /**
     * @Serializer\Type("float")
     * @var float
     */
    private $basepriceFactor;

    /**
     * @Serializer\Type("Wk\AfterbuyApi\Model\XmlApi\GetSoldItems\BaseProductData")
     * @var BaseProductData
     */
    private $baseProductData;

    /**
     * @return int
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @return string
     */
    public function getEan()
    {
        return $this->ean;
    }

    /**
     * @return float
     */
    public function getAnr()
    {
        return $this->anr;
    }

    /**
     * @return string
     */
    public function getUnitOfQuantity()
    {
        return $this->unitOfQuantity;
    }

    /**
     * @return float
     */
    public function getBasepriceFactor()
    {
        return $this->basepriceFactor;
    }

    /**
     * @return BaseProductData
     */
    public function getBaseProductData()
    {
        return $this->baseProductData;
    }
}