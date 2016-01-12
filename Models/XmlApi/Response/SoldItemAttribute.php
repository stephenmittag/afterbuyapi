<?php

namespace Wk\AfterbuyApi\Models\XmlApi\Response;

use JMS\Serializer\Annotation as Serializer;
use Wk\AfterbuyApi\Models\XmlApi\AbstractModel;

/**
 * Class SoldItemAttribute
 */
class SoldItemAttribute extends AbstractModel
{
    /**
     * @Serializer\Type("string")
     * @var string
     */
    private $attributeName;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    private $attributeValue;

    /**
     * @Serializer\Type("integer")
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