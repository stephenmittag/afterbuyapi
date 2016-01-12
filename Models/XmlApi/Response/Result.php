<?php

namespace Wk\AfterbuyApi\Models\XmlApi\Response;

use JMS\Serializer\Annotation as Serializer;
use Wk\AfterbuyApi\Models\XmlApi\AbstractModel;

/**
 * Class Result
 */
class Result extends AbstractModel
{
    /**
     * @Serializer\Type("array<Wk\AfterbuyApi\Models\XmlApi\Response\Error>")
     * @Serializer\SerializedName("ErrorList")
     * @Serializer\XmlList(entry="Error")
     * @var Error[]
     */
    private $errors;

    /**
     * @Serializer\Type("integer")
     * @Serializer\Accessor(setter="setHasMoreItemsFromInteger")
     * @var bool
     */
    private $hasMoreItems;

    /**
     * @Serializer\Type("integer")
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
     * @var int
     */
    private $itemsCount;

    /**
     * @Serializer\Type("array<Wk\AfterbuyApi\Models\XmlApi\Response\Order>")
     * @Serializer\XmlList(entry="Order")
     * @var Order[]
     */
    private $orders;

    /**
     * @param int $value
     */
    public function setHasMoreItemsFromInteger($value) {
        $this->hasMoreItems = $this->setBooleanFromInteger($value);
    }

    /**
     * @return Error[]
     */
    public function getErrors()
    {
        return $this->errors;
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