<?php

namespace Wk\AfterbuyApiBundle\Model\XmlApi\GetShopProducts;

use JMS\Serializer\Annotation as Serializer;
use Wk\AfterbuyApiBundle\Model\XmlApi\AbstractOrder;
use \DateTime;

/**
 * Class Product
 */
class Product
{

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("Shop20ID")
     * @var integer
     */
    private $shop20ID;


    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("ProductID")
     * @var integer
     */
    private $productId;

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("Anr")
     * @var integer
     */
    private $anr;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("EAN")
     * @var string
     */
    private $ean;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Name")
     * @var string
     */
    private $name;

    /**
     * @Serializer\Type("DateTime<'d.m.Y H:i:s', 'UTC', '!d.m.Y'>")
     * @Serializer\SerializedName("ModDate")
     * @var DateTime
     */
    private $modDate;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("VariationName")
     * @var string
     */
    private $variationName;

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("BaseProductFlag")
     * @var integer
     */
    private $baseProductFlag;

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("BaseProductShowMode")
     * @var integer
     */
    private $baseProductShowMode;

    /**
     * @Serializer\Type("array<Wk\AfterbuyApiBundle\Model\XmlApi\GetShopProducts\BaseProduct>")
     * @Serializer\SerializedName("BaseProducts")
     * @Serializer\XmlList(entry="BaseProduct")
     * @var BaseProduct[]
     */
    private $baseProducts = [];

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ShortDescription")
     * @var string
     */
    private $shortDescription;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Memo")
     * @var string
     */
    private $memo;

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("HeaderID")
     * @var integer
     */
    private $headerID;


    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("HeaderDescriptionName")
     * @var string
     */
    private $headerDescriptionName;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("HeaderDescriptionValue")
     * @var string
     */
    private $headerDescriptionValue;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Description")
     * @var string
     */
    private $description;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("FreeValue1")
     * @var string
     */
    private $freeValue1;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("FreeValue2")
     * @var string
     */
    private $freeValue2;


    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ProductBrand")
     * @var string
     */
    private $productBrand;


    /**
     * @Serializer\Type("array<Wk\AfterbuyApiBundle\Model\XmlApi\GetShopProducts\Catalog>")
     * @Serializer\SerializedName("Catalogs")
     * @Serializer\XmlList(entry="Catalog")
     * @var string
     */
    private $catalogs;

    /**
     * @return int
     */
    public function getShop20ID()
    {
        return $this->shop20ID;
    }

    /**
     * @return int
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @return int
     */
    public function getAnr()
    {
        return $this->anr;
    }

    /**
     * @return string
     */
    public function getEan()
    {
        return $this->ean;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return DateTime
     */
    public function getModDate()
    {
        return $this->modDate;
    }

    /**
     * @return string
     */
    public function getVariationName()
    {
        return $this->variationName;
    }

    /**
     * @return int
     */
    public function getBaseProductFlag()
    {
        return $this->baseProductFlag;
    }

    /**
     * @return int
     */
    public function getBaseProductShowMode()
    {
        return $this->baseProductShowMode;
    }

    /**
     * @return BaseProduct[]
     */
    public function getBaseProducts()
    {
        return $this->baseProducts;
    }

    /**
     * @return string
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * @return string
     */
    public function getMemo()
    {
        return $this->memo;
    }

    /**
     * @return int
     */
    public function getHeaderID()
    {
        return $this->headerID;
    }

    /**
     * @return string
     */
    public function getHeaderDescriptionName()
    {
        return $this->headerDescriptionName;
    }

    /**
     * @return string
     */
    public function getHeaderDescriptionValue()
    {
        return $this->headerDescriptionValue;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getFreeValue1()
    {
        return $this->freeValue1;
    }

    /**
     * @return string
     */
    public function getFreeValue2()
    {
        return $this->freeValue2;
    }

    /**
     * @return string
     */
    public function getProductBrand()
    {
        return $this->productBrand;
    }

    /**
     * @return string
     */
    public function getCatalogs()
    {
        return $this->catalogs;
    }


}
