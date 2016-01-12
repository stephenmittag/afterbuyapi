<?php

namespace Wk\AfterbuyApi\Model\XmlApi\Request\Filter;

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