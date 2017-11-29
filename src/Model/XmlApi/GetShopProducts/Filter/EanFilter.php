<?php

namespace Wk\AfterbuyApiBundle\Model\XmlApi\GetShopProducts\Filter;

use Wk\AfterbuyApiBundle\Model\XmlApi\AbstractFilter;

/**
 * Class EANFilter
 */
class EanFilter extends AbstractFilter
{
    /**
     * @param int $anr
     */
    public function __construct($value)
    {
        parent::__construct('Ean');
        $this->filterValues['FilterValue'] = strval($value);
    }
}
