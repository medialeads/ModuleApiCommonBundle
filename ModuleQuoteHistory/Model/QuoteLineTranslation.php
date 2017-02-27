<?php

namespace Module\ApiCommonBundle\ModuleQuoteHistory\Model;

class QuoteLineTranslation
{
    /**
     * @var string
     */
    private $language;

    /**
     * @var string
     */
    private $variantName;

    /**
     * @var array
     */
    private $variantAttributesData;

    /**
     * @param string $language
     * @param string $variantName
     * @param array $variantAttributesData
     */
    public function __construct($language, $variantName, array $variantAttributesData)
    {
        $this->language = $language;
        $this->variantName = $variantName;
        $this->variantAttributesData = $variantAttributesData;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @return string
     */
    public function getVariantName()
    {
        return $this->variantName;
    }

    /**
     * @return array
     */
    public function getVariantAttributesData()
    {
        return $this->variantAttributesData;
    }
}
