<?php

namespace Wk\AfterbuyApiBundle\Model\XmlApi\GetSoldItems\Filter;

use Wk\AfterbuyApiBundle\Model\XmlApi\AbstractFilter;

/**
 * Class UserIdFilter
 */
class UserIdFilter extends AbstractFilter
{
    /**
     * @param int $userId
     */
    public function __construct($userId)
    {
        parent::__construct('AfterbuyUserID');

        $this->filterValues['FilterValue'] = strval($userId);
    }
}
