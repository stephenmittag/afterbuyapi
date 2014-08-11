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
     * @var string
     */
    protected $id;

    /**
     * @var boolean
     */
    protected $checkId;

    /**
     * @var string
     */
    protected $customerUsername;

    /**
     * @var string
     */
    protected $customerEmail;

    /**
     * @var integer
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
     * @var boolean
     */
    protected $paid;

    /**
     * @var integer
     */
    protected $customerRecognition;

    /**
     * @var integer
     */
    protected $noEbayNameUpdate;

    /**
     * @var boolean
     */
    protected $accountingForVat;

    /**
     * @var integer
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
     * @return boolean
     */
    public function isAccountingForVat()
    {
        return $this->accountingForVat;
    }

    /**
     * @param boolean $accountingForVat
     */
    public function setAccountingForVat($accountingForVat)
    {
        $this->accountingForVat = $accountingForVat;
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
     */
    public function setArticles($articles)
    {
        $this->articles = $articles;
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
     */
    public function setBillingAddress($billingAddress)
    {
        $this->billingAddress = $billingAddress;
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
     */
    public function setCustomerEmail($customerEmail)
    {
        $this->customerEmail = $customerEmail;
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
     */
    public function setCustomerRecognition($customerRecognition)
    {
        $this->customerRecognition = $customerRecognition;
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
     */
    public function setCustomerUsername($customerUsername)
    {
        $this->customerUsername = $customerUsername;
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
     */
    public function setMarkerId($markerId)
    {
        $this->markerId = $markerId;
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
     */
    public function setNoEbayNameUpdate($noEbayNameUpdate)
    {
        $this->noEbayNameUpdate = $noEbayNameUpdate;
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
     */
    public function setNoFeedback($noFeedback)
    {
        $this->noFeedback = $noFeedback;
    }

    /**
     * @return boolean
     */
    public function isPaid()
    {
        return $this->paid;
    }

    /**
     * @param boolean $paid
     */
    public function setPaid($paid)
    {
        $this->paid = $paid;
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
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
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
     */
    public function setShippingAddress($shippingAddress)
    {
        $this->shippingAddress = $shippingAddress;
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
     */
    public function setShippingCost($shippingCost)
    {
        $this->shippingCost = $shippingCost;
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
     */
    public function setShippingMethod($shippingMethod)
    {
        $this->shippingMethod = $shippingMethod;
    }

    /**
     * @return boolean
     */
    public function isCheckId()
    {
        return $this->checkId;
    }

    /**
     * @param boolean $checkId
     */
    public function setCheckId($checkId)
    {
        $this->checkId = $checkId;
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
     */
    public function setId($id)
    {
        $this->id = $id;
    }
}