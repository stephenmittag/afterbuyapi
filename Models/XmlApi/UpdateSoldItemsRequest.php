<?php

namespace Wk\AfterbuyApi\Models\XmlApi;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class UpdateSoldItemsRequest
 *
 * @Serializer\XmlRoot("Request")
 *
 * @package Wk\AfterbuyApi\Models\XmlApi
 */
class UpdateSoldItemsRequest extends AbstractRequest
{
    const CALL_NAME = 'UpdateSoldItems';
    
    /**
     * @Serializer\Type("array<Wk\AfterbuyApi\Models\XmlApi\Order>")
     * @Serializer\XmlList(entry="Order")
     * @var Order[]
     */
    private $orders;

    /**
     * @param string $userId
     * @param string $userPassword
     * @param int    $partnerId
     * @param string $partnerPassword
     * @param int    $detailLevel
     */
    public function __construct($userId, $userPassword, $partnerId, $partnerPassword, $detailLevel) {
        parent::__construct($userId, $userPassword, $partnerId, $partnerPassword, $detailLevel);

        $this->setCallName(self::CALL_NAME);
    }

    /**
     * @param Order $order
     *
     * @return $this
     */
    public function addOrder(Order $order) {
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