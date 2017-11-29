<?php

namespace Wk\AfterbuyApiBundle\Model\XmlApi\GetSoldItems\Filter;

use Wk\AfterbuyApiBundle\Model\XmlApi\AbstractFilter;

/**
 * Class UserDefinedFlagFilter
 */
class UserDefinedFlagFilter extends AbstractFilter
{
    /**
     * @param string $flagId
     */
    public function __construct($flagId)
    {
        parent::__construct('UserDefinedFlag');

        $this->filterValues['FilterValue'] = $flagId;
    }
}
