<?php

namespace Wk\AfterbuyApi\Models\XmlApi\Filter;

use JMS\Serializer\Annotation as Serializer;
use \DateTime;

/**
 * Class DateFilter
 *
 * @package Wk\AfterbuyApi\Models\XmlApi
 */
class DateFilter extends AbstractFilter
{
    public function __construct()
    {
        parent::__construct('DateFilter');
    }

    /**
     * @return DateTime
     */
    public function getDateFrom()
    {
        return new DateTime($this->filterValues['DateFrom']);
    }

    /**
     * @param DateTime $dateFrom
     *
     * @return $this
     */
    public function setDateFrom($dateFrom)
    {
        $this->filterValues['DateFrom'] = $dateFrom->format('d.m.Y H:i:s');

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDateTo()
    {
        return new DateTime($this->filterValues['DateTo']);
    }

    /**
     * @param DateTime $dateTo
     *
     * @return $this
     */
    public function setDateTo($dateTo)
    {
        $this->filterValues['DateTo'] = $dateTo->format('d.m.Y H:i:s');

        return $this;
    }
}