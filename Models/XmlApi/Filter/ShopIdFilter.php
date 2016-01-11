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
    /**
     * @param int $shopId
     */
    public function __construct($shopId)
    {
        parent::__construct('ShopId');

        $this->filterValues['FilterValue'] = strval($shopId);
    }
}