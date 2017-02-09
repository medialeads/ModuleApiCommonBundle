<?php

namespace Module\ApiCommonBundle\ModuleMenu\Request;

class Get
{
    /**
     * @var string
     */
    private $urlMask;

    /**
     * @var string
     */
    private $language;

    /**
     * @param string $urlMask
     * @param string $language
     */
    public function __construct($urlMask, $language)
    {
        $this->urlMask = $urlMask;
        $this->language = $language;
    }

    /**
     * @return string
     */
    public function getUrlMask()
    {
        return $this->urlMask;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }
}
