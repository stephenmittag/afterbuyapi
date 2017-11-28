<?php

namespace Wk\AfterbuyApiBundle\Model\XmlApi\GetSoldItems\Filter;

use Wk\AfterbuyApiBundle\Model\XmlApi\AbstractFilter;

/**
 * Class PlatformFilter
 */
class PlatformFilter extends AbstractFilter
{
    /**
     * @param string $platform
     * @param bool   $negateFilter
     */
    public function __construct($platform, $negateFilter = false)
    {
        parent::__construct('Plattform');

        $this->filterValues['FilterValue'] = $negateFilter ? ('not_' . $platform) : $platform;
    }
}
