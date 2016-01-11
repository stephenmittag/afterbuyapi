<?php

namespace Wk\AfterbuyApi\Models\XmlApi\Filter;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class PlatformFilter
 *
 * @package Wk\AfterbuyApi\Models\XmlApi
 */
class PlatformFilter extends AbstractFilter
{
    public function __construct()
    {
        parent::__construct('Plattform');
    }
}