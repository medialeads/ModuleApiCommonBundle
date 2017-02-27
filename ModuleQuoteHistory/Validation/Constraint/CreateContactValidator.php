<?php

namespace Module\ApiCommonBundle\ModuleQuoteHistory\Validator\Constraint;

use Module\ApiCommonBundle\ModuleQuoteHistory\Model\Contact;
use Module\ApiCommonBundle\ModuleQuoteHistory\Request\Create;
use Module\CoreBundle\Exception\NotImplementedException;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\ConstraintDefinitionException;

class CreateContactValidator extends ConstraintValidator
{
    /**
     * @param mixed $value
     * @param Constraint $constraint
     */
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof CreateContact) {
            throw new \InvalidArgumentException();
        }

        if (!is_string($constraint->invalidMessage)) {
            throw new ConstraintDefinitionException();
        }

        if (!$value instanceof Create) {
            return;
        }

        switch ($value->getContactType()) {
            case Create::CONTACT_TYPE_MODULE_CONTACT:
                if ($value->getContact() instanceof Contact) {
                    return;
                }

                break;
            case Create::CONTACT_TYPE_MODULE_QUOTE_HISTORY:
                if (is_scalar($value->getContact())) {
                    return;
                }

                break;
            case null:
                return;
            default:
                throw new NotImplementedException();
        }

        $this->context->buildViolation($constraint->invalidMessage)->addViolation();
    }
}
