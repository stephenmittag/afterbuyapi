<?php

namespace Wk\AfterbuyApi\Model\XmlApi\GetSoldItems;

use JMS\Serializer\Annotation as Serializer;
use Wk\AfterbuyApi\Model\XmlApi\AbstractModel;

/**
 * Class PaymentData
 */
class PaymentData extends AbstractModel
{
    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("BankCode")
     * @var string
     */
    private $bankCode;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("AccountHolder")
     * @var string
     */
    private $accountHolder;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("BankName")
     * @var string
     */
    private $bankName;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("AccountNumber")
     * @var string
     */
    private $accountNumber;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Iban")
     * @var string
     */
    private $iban;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Bic")
     * @var string
     */
    private $bic;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ReferenceNumber")
     * @var string
     */
    private $referenceNumber;

    /**
     * @return string
     */
    public function getBankCode()
    {
        return $this->bankCode;
    }

    /**
     * @return string
     */
    public function getAccountHolder()
    {
        return $this->accountHolder;
    }

    /**
     * @return string
     */
    public function getBankName()
    {
        return $this->bankName;
    }

    /**
     * @return string
     */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * @return string
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * @return string
     */
    public function getBic()
    {
        return $this->bic;
    }

    /**
     * @return string
     */
    public function getReferenceNumber()
    {
        return $this->referenceNumber;
    }
}