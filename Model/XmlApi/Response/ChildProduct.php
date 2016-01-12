<?php

namespace Wk\AfterbuyApi\Model\XmlApi\Response;

use JMS\Serializer\Annotation as Serializer;
use Wk\AfterbuyApi\Model\XmlApi\AbstractModel;

/**
 * Class ChildProduct
 */
class ChildProduct extends AbstractModel
{
    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("ProductID")
     * @var int
     */
    private $productId;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ProductEAN")
     * @var string
     */
    private $productEan;

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("ProductANr")
     * @var int
     */
    private $productAnr;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    private $productName;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    private $productQuantity;

    /**
     * @Serializer\Type("float")
     * @Serializer\SerializedName("ProductVAT")
     * @var float
     */
    private $productVat;

    /**
     * @Serializer\Type("float")
     * @var float
     */
    private $productWeight;

    /**
     * @Serializer\Type("float")
     * @var float
     */
    private $productUnitPrice;

    /**
     * @return int
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @return string
     */
    public function getProductEan()
    {
        return $this->productEan;
    }

    /**
     * @return int
     */
    public function getProductAnr()
    {
        return $this->productAnr;
    }

    /**
     * @return string
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * @return int
     */
    public function getProductQuantity()
    {
        return $this->productQuantity;
    }

    /**
     * @return float
     */
    public function getProductVat()
    {
        return $this->productVat;
    }

    /**
     * @return float
     */
    public function getProductWeight()
    {
        return $this->productWeight;
    }

    /**
     * @return float
     */
    public function getProductUnitPrice()
    {
        return $this->productUnitPrice;
    }
}