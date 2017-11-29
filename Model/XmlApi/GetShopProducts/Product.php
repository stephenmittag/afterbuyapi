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
     * @Serializer\SerializedName("FooterID")
     * @var string
     */
    private $footerID;


    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("FooterDescriptionName")
     * @var string
     */
    private $footerDescriptionName;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("FooterDescriptionValue")
     * @var string
     */
    private $footerDescriptionValue;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("GoogleBaseShipping")
     * @var string
     */
    private $googleBaseShipping;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Keywords")
     * @var string
     */
    private $keywords;

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("AvailableShop")
     * @var integer
     */
    private $availableShop;

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("Quantity")
     * @var integer
     */
    private $quantity;

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("AuctionQuantity")
     * @var integer
     */
    private $auctionQuantity;

    /**
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("Stock")
     * @var boolean
     */
    private $stock;

    /**
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("Discontinued")
     * @var boolean
     */
    private $discontinued;

    /**
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("MergeStock")
     * @var boolean
     */
    private $mergeStock;

    /**
     * @Serializer\Type("float")
     * @Serializer\SerializedName("UnitOfQuantity")
     * @var float
     */
    private $unitOfQuantity;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("BasepriceFactor")
     * @var string
     */
    private $basepriceFactor;

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("MinimumStock")
     * @var integer
     */
    private $minimumStock;

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("MinimumOrderQuantity")
     * @var integer
     */
    private $minimumOrderQuantity;

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("FullFilmentQuantity")
     * @var integer
     */
    private $fullFilmentQuantity;

    /**
     * @Serializer\Type("DateTime<'d.m.Y H:i:s', 'UTC', '!d.m.Y'>")
     * @Serializer\SerializedName("FullFilmentImport")
     * @var DateTime
     */
    private $fullFilmentImport;

    /**
     * @Serializer\Type("float")
     * @Serializer\SerializedName("SellingPrice")
     * @var float
     */
    private $sellingPrice;

    /**
     * @Serializer\Type("float")
     * @Serializer\SerializedName("BuyingPrice")
     * @var float
     */
    private $buyingPrice;

    /**
     * @Serializer\Type("float")
     * @Serializer\SerializedName("DealerPrice")
     * @var float
     */
    private $dealerPrice;

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("Level")
     * @var integer
     */
    private $level;

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("Position")
     * @var integer
     */
    private $position;

    /**
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("TitleReplace")
     * @var boolean
     */
    private $titleReplace;

    /**
     * @Serializer\Type("array<Wk\AfterbuyApiBundle\Model\XmlApi\GetShopProducts\ScaledDiscount>")
     * @Serializer\SerializedName("ScaledDiscounts")
     * @Serializer\XmlList(entry="ScaledDiscount")
     * @var ScaledDiscount[]
     */
    private $scaledDiscounts = [];

    /**
     * @Serializer\Type("float")
     * @Serializer\SerializedName("TaxRate")
     * @var float
     */
    private $taxRate;

    /**
     * @Serializer\Type("float")
     * @Serializer\SerializedName("Weight")
     * @var float
     */
    private $weight;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("SearchAlias")
     * @var string
     */
    private $searchAlias;

    /**
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("Froogle")
     * @var boolean
     */
    private $froogle;

    /**
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("Kelkoo")
     * @var boolean
     */
    private $kelkoo;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ShippingGroup")
     * @var string
     */
    private $shippingGroup;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ShopShippingGroup")
     * @var string
     */
    private $shopShippingGroup;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("SearchEngineShipping")
     * @var string
     */
    private $searchEngineShipping;

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("CrossCatalogID")
     * @var integer
     */
    private $crossCatalogID;

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
     * @Serializer\SerializedName("FreeValue3")
     * @var string
     */
    private $freeValue3;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("FreeValue4")
     * @var string
     */
    private $freeValue4;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("FreeValue5")
     * @var string
     */
    private $freeValue5;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("FreeValue6")
     * @var string
     */
    private $freeValue6;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("FreeValue7")
     * @var string
     */
    private $freeValue7;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("FreeValue8")
     * @var string
     */
    private $freeValue8;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("FreeValue9")
     * @var string
     */
    private $freeValue9;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("FreeValue10")
     * @var string
     */
    private $freeValue10;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("DeliveryTime")
     * @var string
     */
    private $deliveryTime;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Stocklocation_1")
     * @var string
     */
    private $stocklocation_1;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Stocklocation_2")
     * @var string
     */
    private $stocklocation_2;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Stocklocation_3")
     * @var string
     */
    private $stocklocation_3;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Stocklocation_4")
     * @var string
     */
    private $stocklocation_4;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("CountryOfOrigin")
     * @var string
     */
    private $countryOfOrigin;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ImageSmallURL")
     * @var string
     */
    private $imageSmallURL;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ImageLargeURL")
     * @var string
     */
    private $imageLargeURL;


    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ManufacturerStandardProductIDType")
     * @var string
     */
    private $manufacturerStandardProductIDType;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ManufacturerStandardProductIDValue")
     * @var string
     */
    private $manufacturerStandardProductIDValue;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ProductBrand")
     * @var string
     */
    private $productBrand;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("CustomsTariffNumber")
     * @var string
     */
    private $customsTariffNumber;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("GoogleProductCategory")
     * @var string
     */
    private $googleProductCategory;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ManufacturerPartNumber")
     * @var string
     */
    private $manufacturerPartNumber;

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("Condition")
     * @var integer
     */
    private $condition;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Pattern")
     * @var string
     */
    private $pattern;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Material")
     * @var string
     */
    private $material;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ItemColor")
     * @var string
     */
    private $itemColor;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ItemSize")
     * @var string
     */
    private $itemSize;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("CanonicalUrl")
     * @var string
     */
    private $canonicalUrl;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("EnergyClass")
     * @var string
     */
    private $energyClass;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("EnergyClassPictureUrl")
     * @var string
     */
    private $energyClassPictureUrl;

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
    public function getFooterID()
    {
        return $this->footerID;
    }

    /**
     * @return string
     */
    public function getFooterDescriptionName()
    {
        return $this->footerDescriptionName;
    }

    /**
     * @return string
     */
    public function getFooterDescriptionValue()
    {
        return $this->footerDescriptionValue;
    }

    /**
     * @return string
     */
    public function getGoogleBaseShipping()
    {
        return $this->googleBaseShipping;
    }

    /**
     * @return string
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @return int
     */
    public function getAvailableShop()
    {
        return $this->availableShop;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return int
     */
    public function getAuctionQuantity()
    {
        return $this->auctionQuantity;
    }

    /**
     * @return bool
     */
    public function isStock()
    {
        return $this->stock;
    }

    /**
     * @return bool
     */
    public function isDiscontinued()
    {
        return $this->discontinued;
    }

    /**
     * @return bool
     */
    public function isMergeStock()
    {
        return $this->mergeStock;
    }

    /**
     * @return float
     */
    public function getUnitOfQuantity()
    {
        return $this->unitOfQuantity;
    }

    /**
     * @return string
     */
    public function getBasepriceFactor()
    {
        return $this->basepriceFactor;
    }

    /**
     * @return int
     */
    public function getMinimumStock()
    {
        return $this->minimumStock;
    }

    /**
     * @return int
     */
    public function getMinimumOrderQuantity()
    {
        return $this->minimumOrderQuantity;
    }

    /**
     * @return int
     */
    public function getFullFilmentQuantity()
    {
        return $this->fullFilmentQuantity;
    }

    /**
     * @return DateTime
     */
    public function getFullFilmentImport()
    {
        return $this->fullFilmentImport;
    }

    /**
     * @return float
     */
    public function getSellingPrice()
    {
        return $this->sellingPrice;
    }

    /**
     * @return float
     */
    public function getBuyingPrice()
    {
        return $this->buyingPrice;
    }

    /**
     * @return float
     */
    public function getDealerPrice()
    {
        return $this->dealerPrice;
    }

    /**
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @return bool
     */
    public function isTitleReplace()
    {
        return $this->titleReplace;
    }

    /**
     * @return ScaledDiscount[]
     */
    public function getScaledDiscounts()
    {
        return $this->scaledDiscounts;
    }

    /**
     * @return float
     */
    public function getTaxRate()
    {
        return $this->taxRate;
    }

    /**
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @return string
     */
    public function getSearchAlias()
    {
        return $this->searchAlias;
    }

    /**
     * @return bool
     */
    public function isFroogle()
    {
        return $this->froogle;
    }

    /**
     * @return bool
     */
    public function isKelkoo()
    {
        return $this->kelkoo;
    }

    /**
     * @return string
     */
    public function getShippingGroup()
    {
        return $this->shippingGroup;
    }

    /**
     * @return string
     */
    public function getShopShippingGroup()
    {
        return $this->shopShippingGroup;
    }

    /**
     * @return string
     */
    public function getSearchEngineShipping()
    {
        return $this->searchEngineShipping;
    }

    /**
     * @return int
     */
    public function getCrossCatalogID()
    {
        return $this->crossCatalogID;
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
    public function getFreeValue3()
    {
        return $this->freeValue3;
    }

    /**
     * @return string
     */
    public function getFreeValue4()
    {
        return $this->freeValue4;
    }

    /**
     * @return string
     */
    public function getFreeValue5()
    {
        return $this->freeValue5;
    }

    /**
     * @return string
     */
    public function getFreeValue6()
    {
        return $this->freeValue6;
    }

    /**
     * @return string
     */
    public function getFreeValue7()
    {
        return $this->freeValue7;
    }

    /**
     * @return string
     */
    public function getFreeValue8()
    {
        return $this->freeValue8;
    }

    /**
     * @return string
     */
    public function getFreeValue9()
    {
        return $this->freeValue9;
    }

    /**
     * @return string
     */
    public function getFreeValue10()
    {
        return $this->freeValue10;
    }

    /**
     * @return string
     */
    public function getDeliveryTime()
    {
        return $this->deliveryTime;
    }

    /**
     * @return string
     */
    public function getStocklocation1()
    {
        return $this->stocklocation_1;
    }

    /**
     * @return string
     */
    public function getStocklocation2()
    {
        return $this->stocklocation_2;
    }

    /**
     * @return string
     */
    public function getStocklocation3()
    {
        return $this->stocklocation_3;
    }

    /**
     * @return string
     */
    public function getStocklocation4()
    {
        return $this->stocklocation_4;
    }

    /**
     * @return string
     */
    public function getCountryOfOrigin()
    {
        return $this->countryOfOrigin;
    }

    /**
     * @return string
     */
    public function getImageSmallURL()
    {
        return $this->imageSmallURL;
    }

    /**
     * @return string
     */
    public function getImageLargeURL()
    {
        return $this->imageLargeURL;
    }

    /**
     * @return string
     */
    public function getManufacturerStandardProductIDType()
    {
        return $this->manufacturerStandardProductIDType;
    }

    /**
     * @return string
     */
    public function getManufacturerStandardProductIDValue()
    {
        return $this->manufacturerStandardProductIDValue;
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
    public function getCustomsTariffNumber()
    {
        return $this->customsTariffNumber;
    }

    /**
     * @return string
     */
    public function getGoogleProductCategory()
    {
        return $this->googleProductCategory;
    }

    /**
     * @return string
     */
    public function getManufacturerPartNumber()
    {
        return $this->manufacturerPartNumber;
    }

    /**
     * @return int
     */
    public function getCondition()
    {
        return $this->condition;
    }

    /**
     * @return string
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    /**
     * @return string
     */
    public function getMaterial()
    {
        return $this->material;
    }

    /**
     * @return string
     */
    public function getItemColor()
    {
        return $this->itemColor;
    }

    /**
     * @return string
     */
    public function getItemSize()
    {
        return $this->itemSize;
    }

    /**
     * @return string
     */
    public function getCanonicalUrl()
    {
        return $this->canonicalUrl;
    }

    /**
     * @return string
     */
    public function getEnergyClass()
    {
        return $this->energyClass;
    }

    /**
     * @return string
     */
    public function getEnergyClassPictureUrl()
    {
        return $this->energyClassPictureUrl;
    }

    /**
     * @return string
     */
    public function getCatalogs()
    {
        return $this->catalogs;
    }
}
