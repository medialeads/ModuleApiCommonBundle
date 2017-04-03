<?php

namespace Module\ApiCommonBundle\ModuleMenu\Request;

class Get
{
    /**
     * @var array
     */
    private $urlMasks;

    /**
     * @var string
     */
    private $language;

    /**
     * @param array $urlMasks
     * @param string $language
     */
    public function __construct(array $urlMasks, $language)
    {
        $this->urlMasks = $urlMasks;
        $this->language = $language;
    }

    /**
     * @return array
     */
    public function getUrlMasks()
    {
        return $this->urlMasks;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }
}
