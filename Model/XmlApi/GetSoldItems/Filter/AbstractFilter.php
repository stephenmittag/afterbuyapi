<?php

namespace Wk\AfterbuyApiBundle\Model\XmlApi\GetSoldItems\Filter;

use JMS\Serializer\Annotation as Serializer;
use Wk\AfterbuyApiBundle\Model\XmlApi\AbstractModel;

/**
 * Class AbstractFilter
 */
abstract class AbstractFilter extends AbstractModel
{
    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("FilterName")
     * @var string
     */
    private $filterName;

    /**
     * @Serializer\Type("array<string,string>")
     * @Serializer\XmlKeyValuePairs()
     * @Serializer\SerializedName("FilterValues")
     * @var array
     */
    protected $filterValues;

    /**
     * @param string $filterName
     */
    public function __construct($filterName)
    {
        $this->filterName = $filterName;
    }

    /**
     * @return string
     */
    public function getFilterName()
    {
        return $this->filterName;
    }

    /**
     * @param string $filterName
     *
     * @return $this
     */
    public function setFilterName($filterName)
    {
        $this->filterName = $filterName;

        return $this;
    }
}