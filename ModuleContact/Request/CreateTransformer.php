<?php

namespace Module\ApiCommonBundle\ModuleContact\Request;

use libphonenumber\PhoneNumber;
use Symfony\Component\HttpFoundation\ParameterBag;

class CreateTransformer
{
    /**
     * @param ParameterBag $parameterBag
     *
     * @return Create
     */
    public static function fromRequest(ParameterBag $parameterBag)
    {
        $phoneNumber = null;
        if ($parameterBag->has('phoneNumber')) {
            $phoneNumber = new PhoneNumber();
            $phoneNumber->unserialize($parameterBag->get('phoneNumber'));
        }

        return new Create($parameterBag->get('companyName'), $parameterBag->get('lastName'), $parameterBag->get('firstName'),
            $parameterBag->get('email'), $phoneNumber, $parameterBag->get('countryCode'), $parameterBag->get('administrativeArea'),
            $parameterBag->get('locality'), $parameterBag->get('dependentLocality'), $parameterBag->get('postalCode'),
            $parameterBag->get('sortingCode'), $parameterBag->get('addressLine1'), $parameterBag->get('addressLine2'),
            $parameterBag->get('username'), $parameterBag->get('encryptedPassword'), $parameterBag->get('iv'));
    }

    /**
     * @param Create $create
     *
     * @return array
     */
    public static function toParameters(Create $create)
    {
        return array(
            'companyName' => $create->getCompanyName(),
            'lastName' => $create->getLastName(),
            'firstName' => $create->getFirstName(),
            'email' => $create->getEmail(),
            'phoneNumber' => $create->getPhoneNumber()->serialize(),
            'countryCode' => $create->getCountryCode(),
            'administrativeArea' => $create->getAdministrativeArea(),
            'locality' => $create->getLocality(),
            'dependentLocality' => $create->getDependentLocality(),
            'postalCode' => $create->getPostalCode(),
            'sortingCode' => $create->getSortingCode(),
            'addressLine1' => $create->getAddressLine1(),
            'addressLine2' => $create->getAddressLine2(),
            'username' => $create->getUsername(),
            'encryptedPassword' => $create->getEncryptedPassword(),
            'iv' => $create->getIv()
        );
    }
}
