<?php

namespace Wk\AfterbuyApiBundle\Model\XmlApi\GetSoldItems\Filter;

/**
 * Class OrderIdFilter
 */
class OrderIdFilter extends AbstractFilter
{
    /**
     * @param int $orderId
     */
    public function __construct($orderId)
    {
        parent::__construct('OrderID');

        $this->filterValues['FilterValue'] = strval($orderId);
    }
}
