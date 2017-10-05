<?php

namespace Module\ApiCommonBundle\ModuleNews\Request;

class _List
{
    /**
     * @var string
     */
    private $language;

    /**
     * @var int
     */
    private $limit;

    /**
     * @param string $language
     * @param int $limit
     */
    public function __construct($language, $limit)
    {
        $this->language = $language;
        $this->limit = $limit;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }
}
