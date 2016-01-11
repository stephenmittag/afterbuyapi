<?php

namespace Wk\AfterbuyApi\Models\XmlApi\Filter;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class UserIdFilter
 *
 * @package Wk\AfterbuyApi\Models\XmlApi
 */
class UserIdFilter extends AbstractFilter
{
    public function __construct()
    {
        parent::__construct('AfterbuyUserID');
    }
}