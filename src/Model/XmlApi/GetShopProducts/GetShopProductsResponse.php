<?php

namespace Wk\AfterbuyApiBundle\Model\XmlApi\GetShopProducts;

use JMS\Serializer\Annotation as Serializer;
use Wk\AfterbuyApiBundle\Model\XmlApi\AbstractResponse;

/**
 * Class GetShopProductsResponse
 *
 * @Serializer\XmlRoot("Afterbuy")
 */
class GetShopProductsResponse extends AbstractResponse
{
    /**
     * @Serializer\Type("Wk\AfterbuyApiBundle\Model\XmlApi\GetShopProducts\Result")
     * @Serializer\SerializedName("Result")
     * @var Result
     */
    private $result;

    /**
     * @return Result
     */
    public function getResult()
    {
        return $this->result;
    }
}
