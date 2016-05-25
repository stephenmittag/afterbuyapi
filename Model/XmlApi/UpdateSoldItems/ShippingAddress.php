<?php

namespace Wk\AfterbuyApiBundle\Model\XmlApi\UpdateSoldItems;

use JMS\Serializer\Annotation as Serializer;
use Wk\AfterbuyApiBundle\Model\XmlApi\AbstractAddress;

/**
 * Class ShippingAddress
 */
class ShippingAddress extends AbstractAddress
{
    /**
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("UseShippingAddress")
     * @var bool
     */
    private $useShippingAddress;

    /**
     * @return bool
     */
    public function isUseShippingAddress()
    {
        return $this->useShippingAddress;
    }

    /**
     * @param bool $useShippingAddress
     *
     * @return $this
     */
    public function setUseShippingAddress($useShippingAddress)
    {
        $this->useShippingAddress = $useShippingAddress;

        return $this;
    }

    /**
     * @param string $firstName
     *
     * @return $this
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @param string $lastName
     *
     * @return $this
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @param string $company
     *
     * @return $this
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * @param string $street
     *
     * @return $this
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * @param string $postalCode
     *
     * @return $this
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * @param string $city
     *
     * @return $this
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @param string $country
     *
     * @return $this
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }
}
