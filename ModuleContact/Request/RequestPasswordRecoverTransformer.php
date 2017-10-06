<?php

namespace Module\ApiCommonBundle\ModuleContact\Request;

use Symfony\Component\HttpFoundation\ParameterBag;

class RequestPasswordRecoverTransformer
{
    /**
     * @param ParameterBag $parameterBag
     *
     * @return RequestPasswordRecover
     */
    public static function fromParameters(ParameterBag $parameterBag)
    {
        return new RequestPasswordRecover($parameterBag->get('username'));
    }

    /**
     * @param RequestPasswordRecover $requestPasswordRecover
     *
     * @return array
     */
    public static function toParameters(RequestPasswordRecover $requestPasswordRecover)
    {
        return array(
            'username' => $requestPasswordRecover->getUsername()
        );
    }
}
