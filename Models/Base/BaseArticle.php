<?php

namespace Wk\AfterbuyApi\Models\Base;

/**
 * Class BaseArticle
 */
class BaseArticle
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var float
     */
    protected $price;

    /**
     * @var int
     */
    protected $quantity;

    /**
     * @var int
     */
    protected $weight;

    /**
     * @var string
     */
    protected $alternativeId1;

    /**
     * @var string
     */
    protected $alternativeId2;

    /**
     * @var float
     */
    protected $tax;

    /**
     * @return string
     */
    public function getAlternativeId2()
    {
        return $this->alternativeId2;
    }

    /**
     * @param string $alternativeId2
     *
     * @return $this
     */
    public function setAlternativeId2($alternativeId2)
    {
        $this->alternativeId2 = $alternativeId2;

        return $this;
    }

    /**
     * @return string
     */
    public function getAlternativeId1()
    {
        return $this->alternativeId1;
    }

    /**
     * @param string $alternativeId1
     *
     * @return $this
     */
    public function setAlternativeId1($alternativeId1)
    {
        $this->alternativeId1 = $alternativeId1;

        return $this;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     *
     * @return $this
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     *
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return float
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * @param float $tax
     *
     * @return $this
     */
    public function setTax($tax)
    {
        $this->tax = $tax;

        return $this;
    }

    /**
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param int $weight
     *
     * @return $this
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }
}