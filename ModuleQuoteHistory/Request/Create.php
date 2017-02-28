<?php

namespace Module\ApiCommonBundle\ModuleQuoteHistory\Request;

class Create
{
    /**
     * @var string
     */
    const CONTACT_TYPE_MODULE_CONTACT = 'module_contact';

    /**
     * @var string
     */
    const CONTACT_TYPE_MODULE_QUOTE_HISTORY = 'module_quote_history';

    /**
     * @var string
     */
    private $comment;

    /**
     * @var mixed
     */
    private $contact;

    /**
     * @var string
     */
    private $contactType;

    /**
     * @var array
     */
    private $quoteLines;

    /**
     * @param string $comment
     * @param mixed $contact
     * @param string $contactType
     * @param array $quoteLines
     */
    public function __construct($comment, $contact, $contactType, array $quoteLines)
    {
        $this->comment = $comment;
        $this->contact = $contact;
        $this->contactType = $contactType;
        $this->quoteLines = $quoteLines;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @return mixed
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @return string
     */
    public function getContactType()
    {
        return $this->contactType;
    }

    /**
     * @return array
     */
    public function getQuoteLines()
    {
        return $this->quoteLines;
    }

    /**
     * @return array
     */
    public static function getContactTypes()
    {
        return array(
            self::CONTACT_TYPE_MODULE_CONTACT,
            self::CONTACT_TYPE_MODULE_QUOTE_HISTORY
        );
    }
}
