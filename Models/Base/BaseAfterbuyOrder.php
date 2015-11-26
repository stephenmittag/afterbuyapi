<?php

namespace Wk\AfterbuyApi\Models\Base;

use Wk\AfterbuyApi\Models\Address;
use Wk\AfterbuyApi\Models\Article;

/**
 * Class BaseAfterbuyOrder
 */
class BaseAfterbuyOrder
{
    /**
     * @var string
     */
    protected $shippingMethod;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var bool
     */
    protected $checkId;

    /**
     * @var \DateTime
     */
    protected $buyDate;

    /**
     * @var string
     */
    protected $customerUsername;

    /**
     * @var string
     */
    protected $customerEmail;

    /**
     * @var int
     */
    protected $noFeedback;

    /**
     * @var float
     */
    protected $shippingCost;

    /**
     * @var string
     */
    protected $paymentMethod;

    /**
     * @var bool
     */
    protected $paid;

    /**
     * @var int
     */
    protected $customerRecognition;

    /**
     * @var int
     */
    protected $noEbayNameUpdate;

    /**
     * @var bool
     */
    protected $accountingForVat;

    /**
     * @var int
     */
    protected $markerId;

    /**
     * @var Address
     */
    protected $billingAddress;

    /**
     * @var Address
     */
    protected $shippingAddress;

    /**
     * @var Article[]
     */
    protected $articles;

    /**
     * @var string
     */
    protected $comment;

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     *
     * @return $this
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getBuyDate()
    {
        return $this->buyDate;
    }

    /**
     * @param \DateTime $buyDate
     *
     * @return $this
     */
    public function setBuyDate($buyDate)
    {
        $this->buyDate = $buyDate;

        return $this;
    }

    /**
     * @return bool
     */
    public function isAccountingForVat()
    {
        return $this->accountingForVat;
    }

    /**
     * @param bool $accountingForVat
     *
     * @return $this
     */
    public function setAccountingForVat($accountingForVat)
    {
        $this->accountingForVat = $accountingForVat;

        return $this;
    }

    /**
     * @return Article[]
     */
    public function getArticles()
    {
        return $this->articles;
    }

    /**
     * @param Article[] $articles
     *
     * @return $this
     */
    public function setArticles($articles)
    {
        $this->articles = $articles;

        return $this;
    }

    /**
     * @return Address
     */
    public function getBillingAddress()
    {
        return $this->billingAddress;
    }

    /**
     * @param Address $billingAddress
     *
     * @return $this
     */
    public function setBillingAddress($billingAddress)
    {
        $this->billingAddress = $billingAddress;

        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerEmail()
    {
        return $this->customerEmail;
    }

    /**
     * @param string $customerEmail
     *
     * @return $this
     */
    public function setCustomerEmail($customerEmail)
    {
        $this->customerEmail = $customerEmail;

        return $this;
    }

    /**
     * @return int
     */
    public function getCustomerRecognition()
    {
        return $this->customerRecognition;
    }

    /**
     * @param int $customerRecognition
     *
     * @return $this
     */
    public function setCustomerRecognition($customerRecognition)
    {
        $this->customerRecognition = $customerRecognition;

        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerUsername()
    {
        return $this->customerUsername;
    }

    /**
     * @param string $customerUsername
     *
     * @return $this
     */
    public function setCustomerUsername($customerUsername)
    {
        $this->customerUsername = $customerUsername;

        return $this;
    }

    /**
     * @return int
     */
    public function getMarkerId()
    {
        return $this->markerId;
    }

    /**
     * @param int $markerId
     *
     * @return $this
     */
    public function setMarkerId($markerId)
    {
        $this->markerId = $markerId;

        return $this;
    }

    /**
     * @return int
     */
    public function getNoEbayNameUpdate()
    {
        return $this->noEbayNameUpdate;
    }

    /**
     * @param int $noEbayNameUpdate
     *
     * @return $this
     */
    public function setNoEbayNameUpdate($noEbayNameUpdate)
    {
        $this->noEbayNameUpdate = $noEbayNameUpdate;

        return $this;
    }

    /**
     * @return int
     */
    public function getNoFeedback()
    {
        return $this->noFeedback;
    }

    /**
     * @param int $noFeedback
     *
     * @return $this
     */
    public function setNoFeedback($noFeedback)
    {
        $this->noFeedback = $noFeedback;

        return $this;
    }

    /**
     * @return bool
     */
    public function isPaid()
    {
        return $this->paid;
    }

    /**
     * @param bool $paid
     *
     * @return $this
     */
    public function setPaid($paid)
    {
        $this->paid = $paid;

        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * @param string $paymentMethod
     *
     * @return $this
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    /**
     * @return Address
     */
    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    /**
     * @param Address $shippingAddress
     *
     * @return $this
     */
    public function setShippingAddress($shippingAddress)
    {
        $this->shippingAddress = $shippingAddress;

        return $this;
    }

    /**
     * @return float
     */
    public function getShippingCost()
    {
        return $this->shippingCost;
    }

    /**
     * @param float $shippingCost
     *
     * @return $this
     */
    public function setShippingCost($shippingCost)
    {
        $this->shippingCost = $shippingCost;

        return $this;
    }

    /**
     * @return string
     */
    public function getShippingMethod()
    {
        return $this->shippingMethod;
    }

    /**
     * @param string $shippingMethod
     *
     * @return $this
     */
    public function setShippingMethod($shippingMethod)
    {
        $this->shippingMethod = $shippingMethod;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCheckId()
    {
        return $this->checkId;
    }

    /**
     * @param bool $checkId
     *
     * @return $this
     */
    public function setCheckId($checkId)
    {
        $this->checkId = $checkId;

        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}