<?php

namespace Module\ApiCommonBundle\ModuleContact\Request;

class SubmitPasswordRecover
{
    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $token;

    /**
     * @var string
     */
    private $encryptedPassword;

    /**
     * @var string
     */
    private $iv;

    /**
     * @param string $username
     * @param string $token
     * @param string $encryptedPassword
     * @param string $iv
     */
    public function __construct($username, $token, $encryptedPassword, $iv)
    {
        $this->username = $username;
        $this->token = $token;
        $this->encryptedPassword = $encryptedPassword;
        $this->iv = $iv;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @return string
     */
    public function getEncryptedPassword()
    {
        return $this->encryptedPassword;
    }

    /**
     * @return string
     */
    public function getIv()
    {
        return $this->iv;
    }
}
