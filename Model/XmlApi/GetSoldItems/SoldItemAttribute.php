<?php

namespace Wk\AfterbuyApiBundle\Model\XmlApi\GetSoldItems;

use JMS\Serializer\Annotation as Serializer;
use Wk\AfterbuyApiBundle\Model\XmlApi\AbstractModel;

/**
 * Class SoldItemAttribute
 */
class SoldItemAttribute extends AbstractModel
{
    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("AttributeName")
     * @var string
     */
    private $attributeName;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("AttributeValue")
     * @var string
     */
    private $attributeValue;

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("AttributePosition")
     * @var int
     */
    private $attributePosition;

    /**
     * @return string
     */
    public function getAttributeName()
    {
        return $this->attributeName;
    }

    /**
     * @return string
     */
    public function getAttributeValue()
    {
        return $this->attributeValue;
    }

    /**
     * @return int
     */
    public function getAttributePosition()
    {
        return $this->attributePosition;
    }
}