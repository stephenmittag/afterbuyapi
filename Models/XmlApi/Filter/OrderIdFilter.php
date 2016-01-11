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
    public function __construct()
    {
        parent::__construct('OrderID');
    }
}