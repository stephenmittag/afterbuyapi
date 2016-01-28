<?php

namespace Wk\AfterbuyApiBundle\Model\XmlApi\GetSoldItems;

use JMS\Serializer\Annotation as Serializer;
use Wk\AfterbuyApiBundle\Model\XmlApi\Result as BaseResult;

/**
 * Class Result
 */
class Result extends BaseResult
{
    /**
     * @Serializer\Type("integer")
     * @Serializer\Accessor(setter="setHasMoreItemsFromInteger")
     * @Serializer\SerializedName("HasMoreItems")
     * @var bool
     */
    private $hasMoreItems;

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("OrdersCount")
     * @var int
     */
    private $ordersCount;

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("LastOrderID")
     * @var int
     */
    private $lastOrderId;

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("ItemsCount")
     * @var int
     */
    private $itemsCount;

    /**
     * @Serializer\Type("array<Wk\AfterbuyApiBundle\Model\XmlApi\GetSoldItems\Order>")
     * @Serializer\SerializedName("Orders")
     * @Serializer\XmlList(entry="Order")
     * @var Order[]
     */
    private $orders;

    /**
     * @param int $value
     */
    public function setHasMoreItemsFromInteger($value)
    {
        $this->hasMoreItems = $this->setBooleanFromInteger($value);
    }

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
    public function getOrdersCount()
    {
        return $this->ordersCount;
    }

    /**
     * @return int
     */
    public function getLastOrderId()
    {
        return $this->lastOrderId;
    }

    /**
     * @return int
     */
    public function getItemsCount()
    {
        return $this->itemsCount;
    }

    /**
     * @return Order[]
     */
    public function getOrders()
    {
        return $this->orders;
    }
}
