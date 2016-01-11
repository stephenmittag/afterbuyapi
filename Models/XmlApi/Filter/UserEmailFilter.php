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
    /**
     * @param string $email
     */
    public function __construct($email)
    {
        parent::__construct('AfterbuyUserEmail');

        $this->filterValues['FilterValue'] = $email;
    }
}