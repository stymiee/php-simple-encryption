<?php

declare(strict_types=1);

namespace Encryption\Traits;

use Encryption\Exceptions\GenerateIvException;
use Exception;

/**
 * Trait GenerateIv
 * @package Encryption\Traits
 */
trait GenerateIv
{
    /**
     * Generates an initialization vector. Defaults to using openssl_random_pseudo_bytes() but will fall back to
     * random_bytes() if false is returned. If random_bytes() fails and $allowLessSecureIv is set to TRUE an IV
     * will be generated using random characters.
     *
     * @param bool $allowLessSecureIv
     * @return string
     * @throws GenerateIvException
     */
    public function generateIv(bool $allowLessSecureIv = false): string
    {
        $success = false;
        $random = openssl_random_pseudo_bytes(openssl_cipher_iv_length(static::CIPHER), $success);
        if (!$success) {
            try {
                $random = random_bytes(static::IV_LENGTH);
            } catch (Exception $e) {
                if ($allowLessSecureIv) {
                    $random = $this->generateInsecureIv(static::IV_LENGTH);
                } else {
                    throw new GenerateIvException('Unable to generate initialization vector (IV)');
                }
            }
        }
        return $random;
    }

    /**
     * Generates an insecure initialization vector using random characters.
     * This is not recommended for production use.
     *
     * @param int $length
     * @return string
     * @throws GenerateIvException
     */
    private function generateInsecureIv(int $length): string
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        try {
            $iv = '';
            for ($i = 0; $i < $length; $i++) {
                $iv .= $chars[random_int(0, strlen($chars) - 1)];
            }
            return $iv;
        } catch (Exception $e) {
            throw new GenerateIvException('Unable to generate insecure initialization vector (IV)');
        }
    }
}
