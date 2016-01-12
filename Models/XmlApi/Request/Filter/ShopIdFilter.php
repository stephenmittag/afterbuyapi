<?php

namespace Wk\AfterbuyApi\Models\XmlApi\Request\Filter;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class ShopIdFilter
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