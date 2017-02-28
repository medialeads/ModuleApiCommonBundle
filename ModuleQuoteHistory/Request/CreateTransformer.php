<?php

namespace Module\ApiCommonBundle\ModuleQuoteHistory\Request;

use libphonenumber\PhoneNumber;
use Module\ApiCommonBundle\ModuleQuoteHistory\Model\Contact;
use Module\ApiCommonBundle\ModuleQuoteHistory\Model\QuoteLine;
use Module\ApiCommonBundle\ModuleQuoteHistory\Model\QuoteLineTranslation;
use Symfony\Component\HttpFoundation\ParameterBag;

class CreateTransformer
{
    /**
     * @param ParameterBag $parameterBag
     *
     * @return Create
     */
    public static function fromParameters(ParameterBag $parameterBag)
    {
        $contact = null;
        $contactType = $parameterBag->get('contactType');
        $contactData = $parameterBag->get('contact');
        switch ($contactType) {
            case Create::CONTACT_TYPE_MODULE_CONTACT:
                $contact = $contactData;

                break;
            case Create::CONTACT_TYPE_MODULE_QUOTE_HISTORY:
                if (is_array($contactData)) {
                    $contactParameterBag = new ParameterBag($contactData);

                    $contactPhoneNumber = null;
                    if ($contactParameterBag->has('phoneNumber')) {
                        $contactPhoneNumber = new PhoneNumber();
                        $contactPhoneNumber->unserialize($contactParameterBag->get('phoneNumber'));
                    }

                    $contact = new Contact($contactParameterBag->get('companyName'), $contactParameterBag->get('lastName'),
                        $contactParameterBag->get('firstName'), $contactParameterBag->get('email'), $contactPhoneNumber,
                        $contactParameterBag->get('countryCode'), $contactParameterBag->get('administrativeArea'),
                        $contactParameterBag->get('locality'), $contactParameterBag->get('dependentLocality'),
                        $contactParameterBag->get('postalCode'), $contactParameterBag->get('sortingCode'),
                        $contactParameterBag->get('addressLine1'), $contactParameterBag->get('addressLine2'));
                }

                break;
        }

        $quoteLines = array();
        $quoteLinesData = $parameterBag->get('quoteLines');
        if (is_array($quoteLinesData)) {
            foreach ($quoteLinesData as $quoteLineData) {
                if (!is_array($quoteLineData)) {
                    continue;
                }

                $quoteLineParameterBag = new ParameterBag($quoteLineData);

                $quoteLineTranslations = array();
                $quoteLineTranslationsData = $quoteLineParameterBag->get('quoteLineTranslations');
                if (is_array($quoteLineTranslationsData)) {
                    foreach ($quoteLineTranslationsData as $language => $quoteLineTranslationData) {
                        $quoteLineTranslationParameterBag = new ParameterBag($quoteLineTranslationData);

                        $variantAttributesData = $quoteLineTranslationParameterBag->get('variantAttributesData');
                        if (!is_array($variantAttributesData)) {
                            $variantAttributesData = array();
                        }

                        $quoteLineTranslations[] = new QuoteLineTranslation($language,
                            $quoteLineTranslationParameterBag->get('variantName'), $variantAttributesData);
                    }
                }

                $quoteLines[] = new QuoteLine($quoteLineParameterBag->get('supplierName'),
                    $quoteLineParameterBag->get('variantInternalReference'),
                    $quoteLineParameterBag->get('variantSupplierReference'), $quoteLineParameterBag->get('variantBrandName'),
                    $quoteLineParameterBag->get('variantPriceValue'), $quoteLineParameterBag->get('quantity'),
                    $quoteLineParameterBag->get('comment'), $quoteLineTranslations);
            }
        }

        return new Create($parameterBag->get('comment'), $contact, $contactType, $quoteLines);
    }

    /**
     * @param Create $create
     *
     * @return array
     */
    public static function toParameters(Create $create)
    {
        $contactType = $create->getContactType();
        $contact = $create->getContact();
        switch ($contactType) {
            case Create::CONTACT_TYPE_MODULE_CONTACT:
                break;
            case Create::CONTACT_TYPE_MODULE_QUOTE_HISTORY:
                if (!$contact instanceof Contact) {
                    throw new \LogicException();
                }

                $contactPhoneNumber = $contact->getPhoneNumber();
                if ($contactPhoneNumber instanceof PhoneNumber) {
                    $contactPhoneNumber = $contactPhoneNumber->serialize();
                }

                $contact = array(
                    'companyName' => $contact->getCompanyName(),
                    'lastName' => $contact->getLastName(),
                    'firstName' => $contact->getFirstName(),
                    'email' => $contact->getEmail(),
                    'phoneNumber' => $contactPhoneNumber,
                    'countryCode' => $contact->getCountryCode(),
                    'administrativeArea' => $contact->getAdministrativeArea(),
                    'locality' => $contact->getLocality(),
                    'dependentLocality' => $contact->getDependentLocality(),
                    'postalCode' => $contact->getPostalCode(),
                    'sortingCode' => $contact->getSortingCode(),
                    'addressLine1' => $contact->getAddressLine1(),
                    'addressLine2' => $contact->getAddressLine2()
                );

                break;
            default:
                throw new \Exception();
        }

        $quoteLines = $create->getQuoteLines();
        if (!empty($quoteLines)) {
            $quoteLines = array();
            /* @var QuoteLine $quoteLine */
            foreach ($create->getQuoteLines() as $quoteLine) {
                $quoteLineTranslations = $quoteLine->getQuoteLineTranslations();
                if (!empty($quoteLineTranslations)) {
                    $quoteLineTranslations = array();
                    /* @var QuoteLineTranslation $quoteLineTranslation */
                    foreach ($quoteLine->getQuoteLineTranslations() as $quoteLineTranslation) {
                        $quoteLineTranslations[$quoteLineTranslation->getLanguage()] = array(
                            'variantName' => $quoteLineTranslation->getVariantName(),
                            'variantAttributesData' => $quoteLineTranslation->getVariantAttributesData()
                        );
                    }
                }

                $quoteLines[] = array(
                    'supplierName' => $quoteLine->getSupplierName(),
                    'variantInternalReference' => $quoteLine->getVariantInternalReference(),
                    'variantSupplierReference' => $quoteLine->getVariantSupplierReference(),
                    'variantBrandName' => $quoteLine->getVariantBrandName(),
                    'variantPriceValue' => $quoteLine->getVariantPriceValue(),
                    'quantity' => $quoteLine->getQuantity(),
                    'comment' => $quoteLine->getComment(),
                    'quoteLineTranslations' => $quoteLineTranslations
                );
            }
        }

        return array(
            'comment' => $create->getComment(),
            'contact' => $contact,
            'contactType' => $contactType,
            'quoteLines' => $quoteLines
        );
    }
}
