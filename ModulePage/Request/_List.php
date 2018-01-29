<?php

namespace Module\ApiCommonBundle\ModulePage\Request;

class _List
{
    /**
     * @var string|null
     */
    private $language;

    /**
     * @var int|null
     */
    private $limit;

    /**
     * @param string|null $language
     * @param int|null $limit
     */
    public function __construct($language = null, $limit = null)
    {
        $this->language = $language;
        $this->limit = $limit;
    }

    /**
     * @return string|null
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @return int|null
     */
    public function getLimit()
    {
        return $this->limit;
    }
}
