<?php

namespace Module\ApiCommonBundle\ModuleContact\Request;

use Symfony\Component\HttpFoundation\ParameterBag;

class LoginTransformer
{
    /**
     * @param ParameterBag $parameterBag
     *
     * @return Login
     */
    public static function fromParameters(ParameterBag $parameterBag)
    {
        return new Login($parameterBag->get('username'), $parameterBag->get('encryptedPassword'), $parameterBag->get('iv'));
    }

    /**
     * @param Login $login
     *
     * @return array
     */
    public static function toParameters(Login $login)
    {
        return array(
            'username' => $login->getUsername(),
            'encryptedPassword' => $login->getEncryptedPassword(),
            'iv' => $login->getIv()
        );
    }
}
