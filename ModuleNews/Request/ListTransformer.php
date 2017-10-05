<?php

namespace Module\ApiCommonBundle\ModuleNews\Request;

use Symfony\Component\HttpFoundation\ParameterBag;

class ListTransformer
{
    /**
     * @param ParameterBag $parameterBag
     *
     * @return _List
     */
    public static function fromParameters(ParameterBag $parameterBag)
    {
        return new _List($parameterBag->get('language'), $parameterBag->get('limit'));
    }

    /**
     * @param _List $list
     *
     * @return array
     */
    public static function toParameters(_List $list)
    {
        $parameters = array(
            'limit' => $list->getLimit()
        );

        $language = $list->getLanguage();
        if (null !== $language) {
            $parameters['language'] = $language;
        }

        return $parameters;
    }
}
