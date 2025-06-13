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
    private string $key;
    private string $plainText;

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
        $tag = 'fixed_tag';
        $encryptedText = $encryptionObject->encrypt($this->plainText, $this->key, $iv, $tag);
        $decrytpedText = $encryptionObject->decrypt($encryptedText, $this->key, $iv, $tag);
        self::assertEquals($encrypted, $encryptedText);
        self::assertEquals($this->plainText, $decrytpedText);
    }

    public static function dataProvider(): array
    {
        return [
            [
                'cipher' => Aes128ccm::class,
                'iv' => 'ljYh4aEhDR8gApg6',
                'encrypted' => 'lzhThjiSfnsGhaWpqYHefzNMoKmpItWqyy8O9YYCrw4LqeMV3qXDYYnnFqb6A+Bk'
            ],
            [
                'cipher' => Aes128gcm::class,
                'iv' => 'uSAX2EUkbGKthx+H',
                'encrypted' => 'igb9Jf2Tm6aDWcuDJgq292vtPxYxRsVWGIUhaJU6XpjXLqCv2cVR5ODvq8dx65vR'
            ],
            [
                'cipher' => Aes192ccm::class,
                'iv' => 'WIPSkeGyy97h39uh',
                'encrypted' => 'AIzFC1LKxbK9/FlP8YRERXI3GyJKtFp8pJNQt2iboCXP4x4jbzjJdS60yeSqCZUl'
            ],
            [
                'cipher' => Aes192gcm::class,
                'iv' => '7VW/WQCtZIBHwt6p',
                'encrypted' => 'XSDVSb7109Wic2dRnLtIgTZT9UDviKMoRFwGsTK+7XJRmIXWVpnHTYk/gms1mPhG'
            ],
            [
                'cipher' => Aes256ccm::class,
                'iv' => 'jNTNXxbKy2/COMyO',
                'encrypted' => 'TK4cooqVagXr5YWcZOZauFY4d50ZhJ1deOMPJctg+Nf0nqkZ7C0pgna4Kg=='
            ],
            [
                'cipher' => Aes256gcm::class,
                'iv' => 'A21FNKUvS1nkqGFI',
                'encrypted' => 'dxYMKnJsKhmZ0bGjHOKCka3g63LzvwbMCdUsNoH8H0CPDAbSmjUB6LyFvA=='
            ],
            [
                'cipher' => Aria128ccm::class,
                'iv' => 'oBsOj5WOnPh2cMnf',
                'encrypted' => 'F0lFYgHScWLMvi0ou+kHZi6jqjQG7l1jtHKVBEHJRtqS22b3zklFx28idA=='
            ],
            [
                'cipher' => Aria128gcm::class,
                'iv' => 'GtMRWbxotmZ1SPsq',
                'encrypted' => 'jJoMLli/0xdW9fDMnhgGhphkXgNmgPJP8BvYBvTsvTpJThIBMNhMpAEcoA=='
            ],
            [
                'cipher' => Aria192ccm::class,
                'iv' => 'mg5tclrVvJ7F8P4F',
                'encrypted' => 'ReBk+neP99JYTvGFyHWPMwYbZveLC0yDF62YvjC3gECWEIFW3e8kv8Hbiw=='
            ],
            [
                'cipher' => Aria192gcm::class,
                'iv' => 'yHxjxoseUbEctW80',
                'encrypted' => 'RxO9skcl2yatnB3QHLwFrrISjrNlVdBlpnoErYS4gHWxlF9ItwHNniGmIg=='
            ],
            [
                'cipher' => Aria256ccm::class,
                'iv' => 'Y7ZRNS/RMu46bVGo',
                'encrypted' => '9UUvLgXdkMVQPAxJdhAltcTvEp1v+nC6mGlPo8p61jz2y4QAeq7OW34qRA=='
            ],
            [
                'cipher' => Aria256gcm::class,
                'iv' => 'JnRFY8EvCMb2Qw6b',
                'encrypted' => 'oYFFnXn6bgyPV0EQXtQLnRc0uzB3tFFL0wgFkouVTJKlwo+sF3P4Za791g=='
            ],
            [
                'cipher' => Idaes128ccm::class,
                'iv' => 'lkAoiRVbyl+Cpmt+',
                'encrypted' => '56lJ2KF/38iImAE2fJV3dxsX0IvWqBwiPLgoEvyGHjUPpuqCipzer7fUhPqTpRZl'
            ],
            [
                'cipher' => Idaes128gcm::class,
                'iv' => 'EDsKT2sPEQg4sgjW',
                'encrypted' => 'Y/SdxnXZJQoWc6FhLGJzHChVrHaHVb9grsuIqwUKMKe7c51uco8rRSNo2p+47pjr'
            ],
            [
                'cipher' => Idaes192ccm::class,
                'iv' => 'Q7AokS4z/gSS7p1Q',
                'encrypted' => 'W1AAWSVpLyQNMt1OsCNd7PmDV6o1B/O/rj/SzIXRuxnYmuq+hYbdeAtBI2LySCG2'
            ],
            [
                'cipher' => Idaes192gcm::class,
                'iv' => 'P3o8ZGDkUJ0XQ/Ho',
                'encrypted' => 'S+5K/FrFsJ5nkNqhp8YKCUMLHodIXcz5W9BN5RQXYzF8OZC6cigIBxULtAXTWtzy'
            ],
            [
                'cipher' => Idaes256ccm::class,
                'iv' => 'D4U3gnBIms+Ob1GW',
                'encrypted' => 'TVik7zIqAsgr90l3lzCkVe6BcMKgZq+t6g7jVI9Vm1hEoEEJ06gOLlHR+QUMbb3d'
            ],
            [
                'cipher' => Idaes256gcm::class,
                'iv' => 'lRtt1LUIxvmvJoGA',
                'encrypted' => '1BFoUnqdVTkt1Sjc/qtvhy/7DtaJImp42Etd3sZGRKxqQWfjV66NEYDP2d1YMQxb'
            ],
        ];
    }
}
