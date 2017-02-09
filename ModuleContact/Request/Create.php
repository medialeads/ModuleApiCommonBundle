<?php

namespace Module\ApiCommonBundle\ModuleContact\Request;

use libphonenumber\PhoneNumber;

class Create
{
    /**
     * @var string
     */
    private $companyName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $email;

    /**
     * @var PhoneNumber
     */
    private $phoneNumber;

    /**
     * @var string
     */
    private $countryCode;

    /**
     * @var string
     */
    private $administrativeArea;

    /**
     * @var string
     */
    private $locality;

    /**
     * @var string
     */
    private $dependentLocality;

    /**
     * @var string
     */
    private $postalCode;

    /**
     * @var string
     */
    private $sortingCode;

    /**
     * @var string
     */
    private $addressLine1;

    /**
     * @var string
     */
    private $addressLine2;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $encryptedPassword;

    /**
     * @var string
     */
    private $iv;

    /**
     * @param string $companyName
     * @param string $lastName
     * @param string $firstName
     * @param string $email
     * @param PhoneNumber|null $phoneNumber
     * @param string $countryCode
     * @param string $administrativeArea
     * @param string $locality
     * @param string $dependentLocality
     * @param string $postalCode
     * @param string $sortingCode
     * @param string $addressLine1
     * @param string $addressLine2
     * @param string $username
     * @param string $encryptedPassword
     * @param string $iv
     */
    public function __construct($companyName, $lastName, $firstName, $email, PhoneNumber $phoneNumber = null, $countryCode,
        $administrativeArea, $locality, $dependentLocality, $postalCode, $sortingCode, $addressLine1, $addressLine2, $username,
        $encryptedPassword, $iv)
    {
        $this->companyName = $companyName;
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->countryCode = $countryCode;
        $this->administrativeArea = $administrativeArea;
        $this->locality = $locality;
        $this->dependentLocality = $dependentLocality;
        $this->postalCode = $postalCode;
        $this->sortingCode = $sortingCode;
        $this->addressLine1 = $addressLine1;
        $this->addressLine2 = $addressLine2;
        $this->username = $username;
        $this->encryptedPassword = $encryptedPassword;
        $this->iv = $iv;
    }

    /**
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
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
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return PhoneNumber
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @return string
     */
    public function getAdministrativeArea()
    {
        return $this->administrativeArea;
    }

    /**
     * @return string
     */
    public function getLocality()
    {
        return $this->locality;
    }

    /**
     * @return string
     */
    public function getDependentLocality()
    {
        return $this->dependentLocality;
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
    public function getSortingCode()
    {
        return $this->sortingCode;
    }

    /**
     * @return string
     */
    public function getAddressLine1()
    {
        return $this->addressLine1;
    }

    /**
     * @return string
     */
    public function getAddressLine2()
    {
        return $this->addressLine2;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getEncryptedPassword()
    {
        return $this->encryptedPassword;
    }

    /**
     * @return string
     */
    public function getIv()
    {
        return $this->iv;
    }
}
