<?php

namespace Module\ApiCommonBundle\ModuleContact\Request;

use libphonenumber\PhoneNumber;
use Symfony\Component\HttpFoundation\ParameterBag;

class EditTransformer
{
    /**
     * @param ParameterBag $parameterBag
     *
     * @return Edit
     */
    public static function fromParameters(ParameterBag $parameterBag)
    {
        $phoneNumber = null;
        if ($parameterBag->has('phoneNumber')) {
            $phoneNumber = new PhoneNumber();
            $phoneNumber->unserialize($parameterBag->get('phoneNumber'));
        }

        return new Edit($parameterBag->get('companyName'), $parameterBag->get('lastName'), $parameterBag->get('firstName'),
            $parameterBag->get('email'), $phoneNumber, $parameterBag->get('countryCode'), $parameterBag->get('administrativeArea'),
            $parameterBag->get('locality'), $parameterBag->get('dependentLocality'), $parameterBag->get('postalCode'),
            $parameterBag->get('sortingCode'), $parameterBag->get('addressLine1'), $parameterBag->get('addressLine2'),
            $parameterBag->get('username'));
    }

    /**
     * @param Edit $edit
     *
     * @return array
     */
    public static function toParameters(Edit $edit)
    {
        $phoneNumber = $edit->getPhoneNumber();
        if ($phoneNumber instanceof PhoneNumber) {
            $phoneNumber = $phoneNumber->serialize();
        }

        return array(
            'companyName' => $edit->getCompanyName(),
            'lastName' => $edit->getLastName(),
            'firstName' => $edit->getFirstName(),
            'email' => $edit->getEmail(),
            'phoneNumber' => $phoneNumber,
            'countryCode' => $edit->getCountryCode(),
            'administrativeArea' => $edit->getAdministrativeArea(),
            'locality' => $edit->getLocality(),
            'dependentLocality' => $edit->getDependentLocality(),
            'postalCode' => $edit->getPostalCode(),
            'sortingCode' => $edit->getSortingCode(),
            'addressLine1' => $edit->getAddressLine1(),
            'addressLine2' => $edit->getAddressLine2(),
            'username' => $edit->getUsername()
        );
    }
}
