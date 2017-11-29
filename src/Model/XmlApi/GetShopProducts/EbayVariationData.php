<?php

namespace Wk\AfterbuyApiBundle\Model\XmlApi\GetShopProducts;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class BaseProductData
 */
class EbayVariationData
{

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("eBayVariationName")
     * @var string
     */
    private $eBayVariationName;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("eBayVariationValue")
     * @var string
     */
    private $eBayVariationValue;

    /**
     * @return string
     */
    public function getEBayVariationName()
    {
        return $this->eBayVariationName;
    }

    /**
     * @return string
     */
    public function getEBayVariationValue()
    {
        return $this->eBayVariationValue;
    }
}
