<?php

namespace Wk\AfterbuyApiBundle\Model\XmlApi\GetShopProducts;

use JMS\Serializer\Annotation as Serializer;
use Wk\AfterbuyApiBundle\Model\XmlApi\AbstractRequest;
use Wk\AfterbuyApiBundle\Model\XmlApi\AfterbuyGlobal;
use Wk\AfterbuyApiBundle\Model\XmlApi\AbstractFilter;

/**
 * Class GetShopProducts
 *
 * @Serializer\XmlRoot("Request")
 */
class GetShopProductsRequest extends AbstractRequest
{
    const CALL_NAME = 'GetShopProducts';

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("MaxShopItems")
     * @var bool
     */
    private $maxShopItems;

    /**
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("PaginationEnabled")
     * @var int
     */
    private $paginationEnabled;

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("SuppressBaseProductRelatedData")
     * @var int
     */
    private $suppressBaseProductRelatedData;

    /**
     * @Serializer\Type("array<Wk\AfterbuyApiBundle\Model\XmlApi\AbstractFilter>")
     * @Serializer\XmlList(entry="Filter")
     * @Serializer\SerializedName("DataFilter")
     * @var AbstractFilter[]
     */
    private $filters = [];

    /**
     * @param AfterbuyGlobal $afterbuyGlobal
     */
    public function __construct(AfterbuyGlobal $afterbuyGlobal)
    {
        parent::__construct($afterbuyGlobal);
        $this->setCallName(self::CALL_NAME);
    }

    /**
     * @return bool
     */
    public function isMaxShopItems()
    {
        return $this->maxShopItems;
    }

    /**
     * @param bool $maxShopItems
     */
    public function setMaxShopItems($maxShopItems)
    {
        $this->maxShopItems = $maxShopItems;
        return $this;
    }

    /**
     * @return int
     */
    public function getPaginationEnabled()
    {
        return $this->paginationEnabled;
    }

    /**
     * @param int $paginationEnabled
     */
    public function setPaginationEnabled($paginationEnabled)
    {
        $this->paginationEnabled = $paginationEnabled;
        return $this;
    }

    /**
     * @return int
     */
    public function getSuppressBaseProductRelatedData()
    {
        return $this->suppressBaseProductRelatedData;
    }

    /**
     * @param int $suppressBaseProductRelatedData
     */
    public function setSuppressBaseProductRelatedData($suppressBaseProductRelatedData)
    {
        $this->suppressBaseProductRelatedData = $suppressBaseProductRelatedData;
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
