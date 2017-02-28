<?php

namespace Module\ApiCommonBundle\ModuleQuoteHistory\Validator\Constraint;

use Symfony\Component\Validator\Constraint;

class CreateContact extends Constraint
{
    /**
     * @var string
     */
    public $invalidMessage = 'module_api_common.module_quote_history.create_contact.invalid';

    /**
     * @return array
     */
    public function getTargets()
    {
        return array(
            self::CLASS_CONSTRAINT
        );
    }
}
