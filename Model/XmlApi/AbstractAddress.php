<?php

namespace Wk\AfterbuyApi\Model\XmlApi;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class AbstractAddress
 */
abstract class AbstractAddress extends AbstractModel
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
    protected $postalCode;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $city;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $country;

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
    public function getPostalCode()
    {
        return $this->postalCode;
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
    public function getCountry()
    {
        return $this->country;
    }
}