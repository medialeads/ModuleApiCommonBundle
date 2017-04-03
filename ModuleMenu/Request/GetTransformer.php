<?php

namespace Module\ApiCommonBundle\ModuleMenu\Request;

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
        return new Get($parameterBag->get('urlMasks', array()), $parameterBag->get('language'));
    }

    /**
     * @param Get $get
     *
     * @return array
     */
    public static function toParameters(Get $get)
    {
        $parameters = array(
            'urlMasks' => $get->getUrlMasks()
        );

        $language = $get->getLanguage();
        if (null !== $language) {
            $parameters['language'] = $language;
        }

        return $parameters;
    }
}
