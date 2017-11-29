<?php

namespace Wk\AfterbuyApiBundle\Model\XmlApi\GetShopProducts\Filter;

use Wk\AfterbuyApiBundle\Model\XmlApi\AbstractFilter;

/**
 * Class ProductIdFilter
 */
class ProductIdFilter extends AbstractFilter
{
    /**
     * @param int $anr
     */
    public function __construct($value)
    {
        parent::__construct('ProductID');
        $this->filterValues['FilterValue'] = strval($value);
    }
}
