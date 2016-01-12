<?php

namespace Wk\AfterbuyApi\Model\XmlApi\Request\Filter;

use JMS\Serializer\Annotation as Serializer;

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