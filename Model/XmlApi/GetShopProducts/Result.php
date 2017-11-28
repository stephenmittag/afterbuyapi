<?php

namespace Wk\AfterbuyApiBundle\Model\XmlApi\GetShopProducts;

use JMS\Serializer\Annotation as Serializer;
use Wk\AfterbuyApiBundle\Model\XmlApi\Result as BaseResult;

/**
 * Class Result
 */
class Result extends BaseResult
{
    /**
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("HasMoreItems")
     * @var bool
     */
    private $hasMoreItems;

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("ItemsCount")
     * @var int
     */
    private $itemsCount;

    /**
     * @Serializer\Type("array<Wk\AfterbuyApiBundle\Model\XmlApi\GetShopProducts\Product>")
     * @Serializer\SerializedName("Products")
     * @Serializer\XmlList(entry="Product")
     * @var Product[]
     */
    private $products = [];

    /**
     * @return bool
     */
    public function isHasMoreItems()
    {
        return $this->hasMoreItems;
    }

    /**
     * @return int
     */
    public function getItemsCount()
    {
        return $this->itemsCount;
    }

    /**
     * @return Product[]
     */
    public function getProducts()
    {
        return $this->products;
    }

}
