<?php

namespace Module\ApiCommonBundle\ModuleContact\Request;

class Login
{
    /**
     * @var string
     */
    private $username;

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
     * @param string $encryptedPassword
     * @param string $iv
     */
    public function __construct($username, $encryptedPassword, $iv)
    {
        $this->username = $username;
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
