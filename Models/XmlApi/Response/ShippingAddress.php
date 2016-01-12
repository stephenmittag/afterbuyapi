<?php

namespace Wk\AfterbuyApi\Models\XmlApi\Response;

use JMS\Serializer\Annotation as Serializer;
use Wk\AfterbuyApi\Models\XmlApi\AbstractModel;

/**
 * Class ShippingAddress
 */
class ShippingAddress extends AbstractModel
{
    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $firstName;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $lastName;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $company;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $street;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $street2;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $postalCode;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $stateOrProvince;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $city;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $phone;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $country;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("CountryISO")
     * @var string
     */
    protected $countryIso;

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @return string
     */
    public function getStreet2()
    {
        return $this->street2;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @return string
     */
    public function getStateOrProvince()
    {
        return $this->stateOrProvince;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getCountryIso()
    {
        return $this->countryIso;
    }
}