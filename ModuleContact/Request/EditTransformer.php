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
    public static function fromRequest(ParameterBag $parameterBag)
    {
        $phoneNumber = null;
        if ($parameterBag->has('phoneNumber')) {
            $phoneNumber = new PhoneNumber();
            $phoneNumber->unserialize($parameterBag->get('phoneNumber'));
        }

        return new Edit($parameterBag->get('companyName'), $parameterBag->get('lastName'), $parameterBag->get('firstName'),
            $parameterBag->get('email'), $phoneNumber, $parameterBag->get('countryCode'), $parameterBag->get('locality'),
            $parameterBag->get('postalCode'), $parameterBag->get('addressLine1'), $parameterBag->get('addressLine2'),
            $parameterBag->get('username'));
    }

    /**
     * @param Edit $edit
     *
     * @return array
     */
    public static function toParameters(Edit $edit)
    {
        return array(
            'companyName' => $edit->getCompanyName(),
            'lastName' => $edit->getLastName(),
            'firstName' => $edit->getFirstName(),
            'email' => $edit->getEmail(),
            'phoneNumber' => $edit->getPhoneNumber()->serialize(),
            'countryCode' => $edit->getCountryCode(),
            'locality' => $edit->getLocality(),
            'postalCode' => $edit->getPostalCode(),
            'addressLine1' => $edit->getAddressLine1(),
            'addressLine2' => $edit->getAddressLine2(),
            'username' => $edit->getUsername()
        );
    }
}
