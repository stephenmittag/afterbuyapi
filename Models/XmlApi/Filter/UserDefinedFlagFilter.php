<?php

namespace Wk\AfterbuyApi\Models\XmlApi\Filter;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class UserDefinedFlagFilter
 *
 * @package Wk\AfterbuyApi\Models\XmlApi
 */
class UserDefinedFlagFilter extends AbstractFilter
{
    public function __construct()
    {
        parent::__construct('UserDefinedFlag');
    }
}