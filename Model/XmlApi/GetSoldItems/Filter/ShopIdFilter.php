<?php

namespace Wk\AfterbuyApiBundle\Model\XmlApi\GetSoldItems\Filter;

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
