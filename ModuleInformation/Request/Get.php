<?php

namespace Module\ApiCommonBundle\ModuleInformation\Request;

class Get
{
    /**
     * @var string
     */
    private $language;

    /**
     * @param string $language
     */
    public function __construct($language)
    {
        $this->language = $language;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }
}
