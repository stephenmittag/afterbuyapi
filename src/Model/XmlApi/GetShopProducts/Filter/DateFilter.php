<?php

namespace Wk\AfterbuyApiBundle\Model\XmlApi\GetShopProducts\Filter;

use \DateTime;
use Wk\AfterbuyApiBundle\Model\XmlApi\AbstractFilter;

/**
 * Class DateFilter
 */
class DateFilter extends AbstractFilter
{
    /**
     * date of last update
     */
    const FILTER_MOD_DATE = 'ModDate';

    /**
     * @param string $filterValue
     */
    public function __construct($filterValue)
    {
        parent::__construct('DateFilter');
        $this->filterValues['FilterValue'] = $filterValue;
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
    public function setDateFrom(DateTime $dateFrom)
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
    public function setDateTo(DateTime $dateTo)
    {
        $this->filterValues['DateTo'] = $dateTo->format('d.m.Y H:i:s');

        return $this;
    }
}
