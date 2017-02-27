<?php

namespace Module\ApiCommonBundle\ModuleQuoteHistory\Model;

class QuoteLine
{
    /**
     * @var string
     */
    private $variantInternalReference;

    /**
     * @var string
     */
    private $variantSupplierReference;

    /**
     * @var string
     */
    private $variantBrandName;

    /**
     * @var float|null
     */
    private $variantPriceValue;

    /**
     * @var int
     */
    private $quantity;

    /**
     * @var string
     */
    private $comment;

    /**
     * @var array
     */
    private $quoteLineTranslations;

    /**
     * @param string $variantInternalReference
     * @param string $variantSupplierReference
     * @param string $variantBrandName
     * @param float|null $variantPriceValue
     * @param int $quantity
     * @param string $comment
     * @param array $quoteLineTranslations
     */
    public function __construct($variantInternalReference, $variantSupplierReference, $variantBrandName, $variantPriceValue,
        $quantity, $comment, array $quoteLineTranslations)
    {
        $this->variantInternalReference = $variantInternalReference;
        $this->variantSupplierReference = $variantSupplierReference;
        $this->variantBrandName = $variantBrandName;
        $this->variantPriceValue = $variantPriceValue;
        $this->quantity = $quantity;
        $this->comment = $comment;
        $this->quoteLineTranslations = $quoteLineTranslations;
    }

    /**
     * @return string
     */
    public function getVariantInternalReference()
    {
        return $this->variantInternalReference;
    }

    /**
     * @return string
     */
    public function getVariantSupplierReference()
    {
        return $this->variantSupplierReference;
    }

    /**
     * @return string
     */
    public function getVariantBrandName()
    {
        return $this->variantBrandName;
    }

    /**
     * @return float|null
     */
    public function getVariantPriceValue()
    {
        return $this->variantPriceValue;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @return array
     */
    public function getQuoteLineTranslations()
    {
        return $this->quoteLineTranslations;
    }
}
