<?php

namespace Wk\AfterbuyApi\Models\XmlApi\Request\Filter;

use JMS\Serializer\Annotation as Serializer;

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