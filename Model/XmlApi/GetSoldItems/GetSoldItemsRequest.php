<?php

namespace Wk\AfterbuyApiBundle\Model\XmlApi\GetSoldItems;

use JMS\Serializer\Annotation as Serializer;
use Wk\AfterbuyApiBundle\Model\XmlApi\AbstractRequest;
use Wk\AfterbuyApiBundle\Model\XmlApi\AfterbuyGlobal;
use Wk\AfterbuyApiBundle\Model\XmlApi\GetSoldItems\Filter\AbstractFilter;

/**
 * Class GetSoldItemsRequest
 *
 * @Serializer\XmlRoot("Request")
 */
class GetSoldItemsRequest extends AbstractRequest
{
    const CALL_NAME = 'GetSoldItems';

    /**
     * @Serializer\Type("integer")
     * @Serializer\Accessor(getter="getRequestAllItemsAsInteger", setter="setRequestAllItemsFromInteger")
     * @Serializer\SerializedName("RequestAllItems")
     * @var bool
     */
    private $requestAllItems;

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("MaxSoldItems")
     * @var int
     */
    private $maxSoldItems;

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("OrderDirection")
     * @var int
     */
    private $orderDirection;

    /**
     * @Serializer\Type("array<Wk\AfterbuyApiBundle\Model\XmlApi\GetSoldItems\Filter\AbstractFilter>")
     * @Serializer\XmlList(entry="Filter")
     * @Serializer\SerializedName("DataFilter")
     * @var AbstractFilter[]
     */
    private $filters;

    /**
     * @param AfterbuyGlobal $afterbuyGlobal
     */
    public function __construct(AfterbuyGlobal $afterbuyGlobal)
    {
        parent::__construct($afterbuyGlobal);

        $this->setCallName(self::CALL_NAME);
    }

    /**
     * @return int
     */
    public function getRequestAllItemsAsInteger()
    {
        return $this->getBooleanAsInteger($this->requestAllItems);
    }

    /**
     * @param int $value
     */
    public function setRequestAllItemsFromInteger($value)
    {
        $this->requestAllItems = $this->setBooleanFromInteger($value);
    }

    /**
     * @return bool
     */
    public function getRequestAllItems()
    {
        return $this->requestAllItems;
    }

    /**
     * @param bool $requestAllItems
     *
     * @return $this
     */
    public function setRequestAllItems($requestAllItems)
    {
        $this->requestAllItems = $requestAllItems;

        return $this;
    }

    /**
     * @return int
     */
    public function getMaxSoldItems()
    {
        return $this->maxSoldItems;
    }

    /**
     * @param int $maxSoldItems
     *
     * @return $this
     */
    public function setMaxSoldItems($maxSoldItems)
    {
        $this->maxSoldItems = $maxSoldItems;

        return $this;
    }

    /**
     * @return int
     */
    public function getOrderDirection()
    {
        return $this->orderDirection;
    }

    /**
     * @param int $orderDirection
     *
     * @return $this
     */
    public function setOrderDirection($orderDirection)
    {
        $this->orderDirection = $orderDirection;

        return $this;
    }

    /**
     * @return $this
     */
    public function setOrderDirectionAscending()
    {
        $this->orderDirection = 0;

        return $this;
    }

    /**
     * @return $this
     */
    public function setOrderDirectionDescending()
    {
        $this->orderDirection = 1;

        return $this;
    }

    /**
     * @return AbstractFilter
     */
    public function getFilters()
    {
        return $this->filters;
    }

    /**
     * @param AbstractFilter[] $filters
     *
     * @return $this
     */
    public function setFilters(array $filters)
    {
        $this->filters = $filters;

        return $this;
    }

    /**
     * @param AbstractFilter $filter
     *
     * @return $this
     */
    public function addFilter(AbstractFilter $filter)
    {
        $this->filters[] = $filter;

        return $this;
    }
}