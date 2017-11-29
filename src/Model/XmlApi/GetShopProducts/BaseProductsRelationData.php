<?php

namespace Wk\AfterbuyApiBundle\Model\XmlApi\GetShopProducts;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class BaseProductData
 */
class BaseProductsRelationData
{

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("Quantity")
     * @var int
     */
    private $quantity;

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("VariationLabel")
     * @var int
     */
    private $variationLabel;

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("DefaultProduct")
     * @var int
     */
    private $defaultProduct;

    /**
     * @Serializer\Type("Wk\AfterbuyApiBundle\Model\XmlApi\GetShopProducts\EbayVariationData")
     * @Serializer\SerializedName("eBayVariationData")
     * @var EbayVariationData
     */
    private $eBayVariationData;

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return int
     */
    public function getVariationLabel()
    {
        return $this->variationLabel;
    }

    /**
     * @return int
     */
    public function getDefaultProduct()
    {
        return $this->defaultProduct;
    }

    /**
     * @return EbayVariationData
     */
    public function getEBayVariationData()
    {
        return $this->eBayVariationData;
    }



}
