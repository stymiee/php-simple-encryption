<?php

declare(strict_types=1);

namespace Encryption\Traits;

use Exception;
use RuntimeException;

trait GenerateIv
{
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
                    throw new RuntimeException('Unable to generate initialization vector (IV)');
                }
            }
        }
        return $random;
    }

    protected function generateInsecureIv(int $length): string
    {
        $permitted_chars = implode(
            '',
            array_merge( // @codeCoverageIgnore
                range('A', 'z'),
                range(0, 9),
                str_split('~!@#$%&*()-=+{};:"<>,.?/\'')
            )
        );
        try {
            $random = '';
            for ($i = 0; $i < $length; $i++) {
                $random .= $permitted_chars[random_int(0, ($length) - 1)];
            }
            return $random;
        } catch (Exception $e) {
            throw new RuntimeException('Unable to generate insecure initialization vector (IV)');
        }
    }
}
