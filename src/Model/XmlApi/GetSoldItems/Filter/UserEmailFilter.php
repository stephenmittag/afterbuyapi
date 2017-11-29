<?php

namespace Wk\AfterbuyApiBundle\Model\XmlApi\GetSoldItems\Filter;

use Wk\AfterbuyApiBundle\Model\XmlApi\AbstractFilter;

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
