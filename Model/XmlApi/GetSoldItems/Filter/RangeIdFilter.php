<?php

namespace Wk\AfterbuyApiBundle\Model\XmlApi\GetSoldItems\Filter;

use Wk\AfterbuyApiBundle\Model\XmlApi\AbstractFilter;

/**
 * Class RangeIdFilter
 */
class RangeIdFilter extends AbstractFilter
{
    public function __construct()
    {
        parent::__construct('RangeID');
    }

    /**
     * @return int
     */
    public function getValueFrom()
    {
        return $this->filterValues['ValueFrom'];
    }

    /**
     * @param int $valueFrom
     *
     * @return $this
     */
    public function setValueFrom($valueFrom)
    {
        $this->filterValues['ValueFrom'] = $valueFrom;

        return $this;
    }

    /**
     * @return int
     */
    public function getValueTo()
    {
        return $this->filterValues['ValueTo'];
    }

    /**
     * @param int $valueTo
     *
     * @return $this
     */
    public function setValueTo($valueTo)
    {
        $this->filterValues['ValueTo'] = $valueTo;

        return $this;
    }
}
