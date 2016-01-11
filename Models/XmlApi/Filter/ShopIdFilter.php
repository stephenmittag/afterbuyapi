<?php

namespace Wk\AfterbuyApi\Models\XmlApi\Filter;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class ShopIdFilter
 *
 * @package Wk\AfterbuyApi\Models\XmlApi
 */
class ShopIdFilter extends AbstractFilter
{
    public function __construct()
    {
        parent::__construct('ShopId');
    }
}