<?php

namespace Wk\AfterbuyApiBundle\Model\XmlApi\GetSoldItems\Filter;

use JMS\Serializer\Annotation as Serializer;

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