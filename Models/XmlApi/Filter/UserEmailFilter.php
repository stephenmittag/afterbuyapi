<?php

namespace Wk\AfterbuyApi\Models\XmlApi\Filter;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class UserEmailFilter
 *
 * @package Wk\AfterbuyApi\Models\XmlApi
 */
class UserEmailFilter extends AbstractFilter
{
    public function __construct()
    {
        parent::__construct('AfterbuyUserEmail');
    }
}