<?php

namespace Wk\AfterBuyApi\Models\Base;

use Wk\AfterBuyApi\Models\Address;
use Wk\AfterBuyApi\Models\Article;

/**
 * Class BaseItem
 */
class BaseItem
{
    /**
     * @var string
     */
    protected $shippingMethod;

    /**
     * @var string
     */
    protected $vid;

    /**
     * @var boolean
     */
    protected $checkVid;

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
     * @var integer
     */
    protected $paymentId;

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
     * @return boolean
     */
    public function isCheckVid()
    {
        return $this->checkVid;
    }

    /**
     * @param boolean $checkVid
     */
    public function setCheckVid($checkVid)
    {
        $this->checkVid = $checkVid;
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
     * @return int
     */
    public function getPaymentId()
    {
        return $this->paymentId;
    }

    /**
     * @param int $paymentId
     */
    public function setPaymentId($paymentId)
    {
        $this->paymentId = $paymentId;
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
     * @return string
     */
    public function getVid()
    {
        return $this->vid;
    }

    /**
     * @param string $vid
     */
    public function setVid($vid)
    {
        $this->vid = $vid;
    }
}