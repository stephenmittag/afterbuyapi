<?php

namespace Wk\AfterbuyApiBundle\Model\XmlApi\GetSoldItems\Filter;

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