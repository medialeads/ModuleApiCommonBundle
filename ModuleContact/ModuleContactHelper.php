<?php

namespace Module\ApiCommonBundle\ModuleContact;

class ModuleContactHelper
{
    /**
     * @var string
     */
    const ENCRYPTION_METHOD = 'aes-256-cbc';

    /**
     * @param string $plainPassword
     * @param string $encryptionKey
     *
     * @return array
     */
    public function getEncryptedPasswordAndIv($plainPassword, $encryptionKey)
    {
        $iv = openssl_random_pseudo_bytes(16);

        return array(
            openssl_encrypt($plainPassword, self::ENCRYPTION_METHOD, $encryptionKey, OPENSSL_RAW_DATA, $iv),
            $iv
        );
    }

    /**
     * @param string $encryptedPassword
     * @param string $iv
     * @param string $encryptionKey
     *
     * @return string
     */
    public function getDecryptedPassword($encryptedPassword, $iv, $encryptionKey)
    {
        return openssl_decrypt($encryptedPassword, self::ENCRYPTION_METHOD, $encryptionKey, true, $iv);
    }
}
