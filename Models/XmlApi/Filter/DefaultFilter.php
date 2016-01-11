<?php

namespace Wk\AfterbuyApi\Models\XmlApi\Filter;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class DefaultFilter
 *
 * @package Wk\AfterbuyApi\Models\XmlApi
 */
class DefaultFilter extends AbstractFilter
{
    public function __construct()
    {
        parent::__construct('DefaultFilter');
    }
}