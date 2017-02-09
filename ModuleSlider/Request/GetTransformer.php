<?php

namespace Module\ApiCommonBundle\ModuleSlider\Request;

use Symfony\Component\HttpFoundation\ParameterBag;

class GetTransformer
{
    /**
     * @param ParameterBag $parameterBag
     *
     * @return Get
     */
    public static function fromParameters(ParameterBag $parameterBag)
    {
        return new Get($parameterBag->get('language'));
    }

    /**
     * @param Get $get
     *
     * @return array
     */
    public static function toParameters(Get $get)
    {
        $language = $get->getLanguage();
        if (null === $language) {
            return array();
        }

        return array(
            'language' => $language
        );
    }
}
