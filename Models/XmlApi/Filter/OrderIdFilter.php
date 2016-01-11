<?php

namespace Wk\AfterbuyApi\Models\XmlApi\Filter;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class OrderIdFilter
 *
 * @package Wk\AfterbuyApi\Models\XmlApi
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