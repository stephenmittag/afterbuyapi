<?php

namespace Wk\AfterbuyApi\Model\XmlApi\GetSoldItems;

use JMS\Serializer\Annotation as Serializer;
use Wk\AfterbuyApi\Model\XmlApi\AbstractModel;
use \DateTime;

/**
 * Class SoldItem
 */
class SoldItem extends AbstractModel
{
    /**
     * @Serializer\Type("integer")
     * @Serializer\Accessor(setter="setItemDetailsDoneFromInteger")
     * @Serializer\SerializedName("ItemDetailsDone")
     * @var bool
     */
    private $itemDetailsDone;

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("ItemID")
     * @var int
     */
    private $itemId;

    /**
     * @Serializer\Type("float")
     * @Serializer\SerializedName("Anr")
     * @var float
     */
    private $anr;

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("eBayTransactionID")
     * @var int
     */
    private $ebayTransactionId;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("AlternativeItemNumber1")
     * @var string
     */
    private $alternativeItemNumber1;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("AlternativeItemNumber")
     * @var string
     */
    private $alternativeItemNumber;

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("InternalItemType")
     * @var int
     */
    private $internalItemType;

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("UserDefinedFlag")
     * @var int
     */
    private $userDefinedFlag;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ItemTitle")
     * @var string
     */
    private $itemTitle;

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("ItemQuantity")
     * @var int
     */
    private $itemQuantity;

    /**
     * @Serializer\Type("float")
     * @Serializer\SerializedName("ItemPrice")
     * @var float
     */
    private $itemPrice;

    /**
     * @Serializer\Type("DateTime<'d.m.Y H:i:s'>")
     * @Serializer\SerializedName("ItemEndDate")
     * @var DateTime
     */
    private $itemEndDate;

    /**
     * @Serializer\Type("float")
     * @Serializer\SerializedName("TaxRate")
     * @var float
     */
    private $taxRate;

    /**
     * @Serializer\Type("float")
     * @Serializer\SerializedName("ItemWeight")
     * @var float
     */
    private $itemWeight;

    /**
     * @Serializer\Type("DateTime<'d.m.Y H:i:s'>")
     * @Serializer\SerializedName("ItemXmlDate")
     * @var DateTime
     */
    private $itemXmlDate;

    /**
     * @Serializer\Type("DateTime<'d.m.Y H:i:s'>")
     * @Serializer\SerializedName("ItemModDate")
     * @var DateTime
     */
    private $itemModDate;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ItemPlatformName")
     * @var string
     */
    private $itemPlatformName;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ItemLink")
     * @var string
     */
    private $itemLink;

    /**
     * @Serializer\Type("integer")
     * @Serializer\Accessor(setter="setEbayFeedbackCompletedFromInteger")
     * @Serializer\SerializedName("eBayFeedbackCompleted")
     * @var bool
     */
    private $ebayFeedbackCompleted;

    /**
     * @Serializer\Type("integer")
     * @Serializer\Accessor(setter="setEbayFeedbackReceivedFromInteger")
     * @Serializer\SerializedName("eBayFeedbackReceived")
     * @var bool
     */
    private $ebayFeedbackReceived;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("eBayFeedbackCommentType")
     * @var string
     */
    private $ebayFeedbackCommentType;

    /**
     * @Serializer\Type("Wk\AfterbuyApi\Model\XmlApi\GetSoldItems\ShopProductDetails")
     * @Serializer\SerializedName("ShopProductDetails")
     * @var ShopProductDetails
     */
    private $shopProductDetails;

    /**
     * @Serializer\Type("array<Wk\AfterbuyApi\Model\XmlApi\GetSoldItems\SoldItemAttribute>")
     * @Serializer\XmlList(entry="SoldItemAttribute")
     * @Serializer\SerializedName("SoldItemAttributes")
     * @var SoldItemAttribute[]
     */
    private $soldItemAttributes;

    /**
     * @param int $value
     */
    public function setItemDetailsDoneFromInteger($value)
    {
        $this->itemDetailsDone = $this->setBooleanFromInteger($value);
    }

    /**
     * @param int $value
     */
    public function setEbayFeedbackCompletedFromInteger($value)
    {
        $this->ebayFeedbackCompleted = $this->setBooleanFromInteger($value);
    }

    /**
     * @param int $value
     */
    public function setEbayFeedbackReceivedFromInteger($value)
    {
        $this->ebayFeedbackReceived = $this->setBooleanFromInteger($value);
    }

    /**
     * @return boolean
     */
    public function isItemDetailsDone()
    {
        return $this->itemDetailsDone;
    }

    /**
     * @return int
     */
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * @return float
     */
    public function getAnr()
    {
        return $this->anr;
    }

    /**
     * @return int
     */
    public function getEbayTransactionId()
    {
        return $this->ebayTransactionId;
    }

    /**
     * @return string
     */
    public function getAlternativeItemNumber1()
    {
        return $this->alternativeItemNumber1;
    }

    /**
     * @return string
     */
    public function getAlternativeItemNumber()
    {
        return $this->alternativeItemNumber;
    }

    /**
     * @return int
     */
    public function getInternalItemType()
    {
        return $this->internalItemType;
    }

    /**
     * @return int
     */
    public function getUserDefinedFlag()
    {
        return $this->userDefinedFlag;
    }

    /**
     * @return string
     */
    public function getItemTitle()
    {
        return $this->itemTitle;
    }

    /**
     * @return int
     */
    public function getItemQuantity()
    {
        return $this->itemQuantity;
    }

    /**
     * @return float
     */
    public function getItemPrice()
    {
        return $this->itemPrice;
    }

    /**
     * @return DateTime
     */
    public function getItemEndDate()
    {
        return $this->itemEndDate;
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
    public function getItemWeight()
    {
        return $this->itemWeight;
    }

    /**
     * @return DateTime
     */
    public function getItemXmlDate()
    {
        return $this->itemXmlDate;
    }

    /**
     * @return DateTime
     */
    public function getItemModDate()
    {
        return $this->itemModDate;
    }

    /**
     * @return string
     */
    public function getItemPlatformName()
    {
        return $this->itemPlatformName;
    }

    /**
     * @return string
     */
    public function getItemLink()
    {
        return $this->itemLink;
    }

    /**
     * @return boolean
     */
    public function isEbayFeedbackCompleted()
    {
        return $this->ebayFeedbackCompleted;
    }

    /**
     * @return boolean
     */
    public function isEbayFeedbackReceived()
    {
        return $this->ebayFeedbackReceived;
    }

    /**
     * @return string
     */
    public function getEbayFeedbackCommentType()
    {
        return $this->ebayFeedbackCommentType;
    }

    /**
     * @return ShopProductDetails
     */
    public function getShopProductDetails()
    {
        return $this->shopProductDetails;
    }

    /**
     * @return SoldItemAttribute[]
     */
    public function getSoldItemAttributes()
    {
        return $this->soldItemAttributes;
    }
}