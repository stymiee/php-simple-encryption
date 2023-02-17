<?php

namespace functional;

use Encryption\Cipher\AES\Aes128ccm;
use Encryption\Cipher\AES\Aes128gcm;
use Encryption\Cipher\AES\Aes192ccm;
use Encryption\Cipher\AES\Aes192gcm;
use Encryption\Cipher\AES\Aes256ccm;
use Encryption\Cipher\AES\Aes256gcm;
use Encryption\Cipher\ARIA\Aria128ccm;
use Encryption\Cipher\ARIA\Aria128gcm;
use Encryption\Cipher\ARIA\Aria192ccm;
use Encryption\Cipher\ARIA\Aria192gcm;
use Encryption\Cipher\ARIA\Aria256ccm;
use Encryption\Cipher\ARIA\Aria256gcm;
use Encryption\Cipher\ID\Idaes128ccm;
use Encryption\Cipher\ID\Idaes128gcm;
use Encryption\Cipher\ID\Idaes192ccm;
use Encryption\Cipher\ID\Idaes192gcm;
use Encryption\Cipher\ID\Idaes256ccm;
use Encryption\Cipher\ID\Idaes256gcm;
use PHPUnit\Framework\TestCase;

class PaddingWithIvAeadTest extends TestCase
{
    private $key;
    private $plainText;

    public function setUp(): void
    {
        $this->key = 'secretkey';
        $this->plainText = 'The quick brown fox jumps over the lazy dog';
    }

    /**
     * @dataProvider dataProvider
     * @param $cipher
     * @param $iv
     * @param $encrypted
     */
    public function testCiphersWithPaddingAndIv($cipher, $iv, $encrypted): void
    {
        $encryptionObject = new $cipher();
        $iv = base64_decode($iv);
        $encryptedText = $encryptionObject->encrypt($this->plainText, $this->key, $iv, $tag);
        $decrytpedText = $encryptionObject->decrypt($encryptedText, $this->key, $iv, $tag);
        self::assertEquals($encrypted, $encryptedText);
        self::assertEquals($this->plainText, $decrytpedText);
    }

    public function dataProvider(): array
    {
        return [
            [
                'class' => Aes128ccm::class,
                'iv' => 'ljYh4aEhDR8gApg6',
                'encryptedText' => 'lzhThjiSfnsGhaWpqYHefzNMoKmpItWqyy8O9YYCrw4LqeMV3qXDYYnnFqb6A+Bk'
            ],
            [
                'class' => Aes128gcm::class,
                'iv' => 'uSAX2EUkbGKthx+H',
                'encryptedText' => 'igb9Jf2Tm6aDWcuDJgq292vtPxYxRsVWGIUhaJU6XpjXLqCv2cVR5ODvq8dx65vR'
            ],
            [
                'class' => Aes192ccm::class,
                'iv' => 'WIPSkeGyy97h39uh',
                'encryptedText' => 'AIzFC1LKxbK9/FlP8YRERXI3GyJKtFp8pJNQt2iboCXP4x4jbzjJdS60yeSqCZUl'
            ],
            [
                'class' => Aes192gcm::class,
                'iv' => '7VW/WQCtZIBHwt6p',
                'encryptedText' => 'XSDVSb7109Wic2dRnLtIgTZT9UDviKMoRFwGsTK+7XJRmIXWVpnHTYk/gms1mPhG'
            ],
            [
                'class' => Aes256ccm::class,
                'iv' => 'jNTNXxbKy2/COMyO',
                'encryptedText' => 'TK4cooqVagXr5YWcZOZauFY4d50ZhJ1deOMPJctg+Nf0nqkZ7C0pgna4KkXVorw3'
            ],
            [
                'class' => Aes256gcm::class,
                'iv' => 'A21FNKUvS1nkqGFI',
                'encryptedText' => 'dxYMKnJsKhmZ0bGjHOKCka3g63LzvwbMCdUsNoH8H0CPDAbSmjUB6LyFvMCCk5jT'
            ],
            [
                'class' => Aria128ccm::class,
                'iv' => 'oBsOj5WOnPh2cMnf',
                'encryptedText' => 'F0lFYgHScWLMvi0ou+kHZi6jqjQG7l1jtHKVBEHJRtqS22b3zklFx28idKhBitNv'
            ],
            [
                'class' => Aria128gcm::class,
                'iv' => 'GtMRWbxotmZ1SPsq',
                'encryptedText' => 'jJoMLli/0xdW9fDMnhgGhphkXgNmgPJP8BvYBvTsvTpJThIBMNhMpAEcoJ9yTi2e'
            ],
            [
                'class' => Aria192ccm::class,
                'iv' => 'mg5tclrVvJ7F8P4F',
                'encryptedText' => 'ReBk+neP99JYTvGFyHWPMwYbZveLC0yDF62YvjC3gECWEIFW3e8kv8HbizFv6sm4'
            ],
            [
                'class' => Aria192gcm::class,
                'iv' => 'yHxjxoseUbEctW80',
                'encryptedText' => 'RxO9skcl2yatnB3QHLwFrrISjrNlVdBlpnoErYS4gHWxlF9ItwHNniGmIuzytD3w'
            ],
            [
                'class' => Aria256ccm::class,
                'iv' => 'Y7ZRNS/RMu46bVGo',
                'encryptedText' => '9UUvLgXdkMVQPAxJdhAltcTvEp1v+nC6mGlPo8p61jz2y4QAeq7OW34qRPY01ZVj'
            ],
            [
                'class' => Aria256gcm::class,
                'iv' => 'JnRFY8EvCMb2Qw6b',
                'encryptedText' => 'oYFFnXn6bgyPV0EQXtQLnRc0uzB3tFFL0wgFkouVTJKlwo+sF3P4Za791q1bDwIO'
            ],
            [
                'class' => Idaes128ccm::class,
                'iv' => 'lkAoiRVbyl+Cpmt+',
                'encryptedText' => '56lJ2KF/38iImAE2fJV3dxsX0IvWqBwiPLgoEvyGHjUPpuqCipzer7fUhPqTpRZl'
            ],
            [
                'class' => Idaes128gcm::class,
                'iv' => 'EDsKT2sPEQg4sgjW',
                'encryptedText' => 'Y/SdxnXZJQoWc6FhLGJzHChVrHaHVb9grsuIqwUKMKe7c51uco8rRSNo2p+47pjr'
            ],
            [
                'class' => Idaes192ccm::class,
                'iv' => 'Q7AokS4z/gSS7p1Q',
                'encryptedText' => 'W1AAWSVpLyQNMt1OsCNd7PmDV6o1B/O/rj/SzIXRuxnYmuq+hYbdeAtBI2LySCG2'
            ],
            [
                'class' => Idaes192gcm::class,
                'iv' => 'P3o8ZGDkUJ0XQ/Ho',
                'encryptedText' => 'S+5K/FrFsJ5nkNqhp8YKCUMLHodIXcz5W9BN5RQXYzF8OZC6cigIBxULtAXTWtzy'
            ],
            [
                'class' => Idaes256ccm::class,
                'iv' => 'D4U3gnBIms+Ob1GW',
                'encryptedText' => 'TVik7zIqAsgr90l3lzCkVe6BcMKgZq+t6g7jVI9Vm1hEoEEJ06gOLlHR+QUMbb3d'
            ],
            [
                'class' => Idaes256gcm::class,
                'iv' => 'lRtt1LUIxvmvJoGA',
                'encryptedText' => '1BFoUnqdVTkt1Sjc/qtvhy/7DtaJImp42Etd3sZGRKxqQWfjV66NEYDP2d1YMQxb'
            ],
        ];
    }
}
