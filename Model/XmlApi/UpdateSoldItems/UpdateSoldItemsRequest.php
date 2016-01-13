<?php

namespace Wk\AfterbuyApi\Model\XmlApi\UpdateSoldItems;

use JMS\Serializer\Annotation as Serializer;
use Wk\AfterbuyApi\Model\XmlApi\AbstractRequest;
use Wk\AfterbuyApi\Model\XmlApi\AfterbuyGlobal;

/**
 * Class UpdateSoldItemsRequest
 *
 * @Serializer\XmlRoot("Request")
 */
class UpdateSoldItemsRequest extends AbstractRequest
{
    const CALL_NAME = 'UpdateSoldItems';

    /**
     * @Serializer\Type("array<Wk\AfterbuyApi\Model\XmlApi\UpdateSoldItems\Order>")
     * @Serializer\XmlList(entry="Order")
     * @var Order[]
     */
    private $orders;

    /**
     * @param AfterbuyGlobal $afterbuyGlobal
     */
    public function __construct(AfterbuyGlobal $afterbuyGlobal)
    {
        parent::__construct($afterbuyGlobal);

        $this->setCallName(self::CALL_NAME);
    }

    /**
     * @param Order $order
     *
     * @return $this
     */
    public function addOrder(Order $order)
    {
        $this->orders[] = $order;

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