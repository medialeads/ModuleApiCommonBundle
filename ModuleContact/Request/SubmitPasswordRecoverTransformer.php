<?php

namespace Module\ApiCommonBundle\ModuleContact\Request;

use Symfony\Component\HttpFoundation\ParameterBag;

class SubmitPasswordRecoverTransformer
{
    /**
     * @param ParameterBag $parameterBag
     *
     * @return SubmitPasswordRecover
     */
    public static function fromParameters(ParameterBag $parameterBag)
    {
        return new SubmitPasswordRecover($parameterBag->get('username'), $parameterBag->get('encryptedPassword'), $parameterBag->get('iv'));
    }

    /**
     * @param SubmitPasswordRecover $submitPasswordRecover
     *
     * @return array
     */
    public static function toParameters(SubmitPasswordRecover $submitPasswordRecover)
    {
        return array(
            'username' => $submitPasswordRecover->getUsername(),
            'encryptedPassword' => $submitPasswordRecover->getEncryptedPassword(),
            'iv' => $submitPasswordRecover->getIv()
        );
    }
}
