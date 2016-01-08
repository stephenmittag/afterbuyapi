<?php

namespace Wk\AfterbuyApi\Models\XmlApi;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class UpdateSoldItems
 *
 * @Serializer\XmlRoot("Request")
 *
 * @package Wk\AfterbuyApi\Models\XmlApi
 */
class UpdateSoldItems extends AbstractModel
{
    /**
     * @Serializer\Type("Wk\AfterbuyApi\Models\XmlApi\AfterbuyGlobal")
     * @var AfterbuyGlobal
     */
    private $afterbuyGlobal;

    /**
     * @Serializer\Type("array<Wk\AfterbuyApi\Models\XmlApi\Order>")
     * @Serializer\XmlList(entry="Order")
     * @var Order[]
     */
    private $orders;

    /**
     * @return AfterbuyGlobal
     */
    public function getAfterbuyGlobal()
    {
        return $this->afterbuyGlobal;
    }

    /**
     * @param AfterbuyGlobal $afterbuyGlobal
     *
     * @return $this
     */
    public function setAfterbuyGlobal(AfterbuyGlobal $afterbuyGlobal = null)
    {
        $this->afterbuyGlobal = $afterbuyGlobal;

        return $this;
    }

    /**
     * @return Order[]
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * @param Order[] $orders
     *
     * @return $this
     */
    public function setOrders(array $orders)
    {
        $this->orders = $orders;

        return $this;
    }
}