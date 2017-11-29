<?php

namespace Wk\AfterbuyApiBundle\Model\XmlApi\GetShopProducts;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Catalog
 */
class Catalog
{

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("CatalogID")
     * @var string
     */
    private $catalogId;

    /**
     * @return string
     */
    public function getCatalogId()
    {
        return $this->catalogId;
    }
}
