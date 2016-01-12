<?php

namespace Wk\AfterbuyApi\Model\XmlApi\Request\Filter;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class UserEmailFilter
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