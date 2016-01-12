<?php

namespace Wk\AfterbuyApi\Model\XmlApi\UpdateSoldItems;

use JMS\Serializer\Annotation as Serializer;
use Wk\AfterbuyApi\Model\XmlApi\AbstractRequest;

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