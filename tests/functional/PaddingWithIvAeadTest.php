<?php

namespace functional;

use Encryption\Cipher\AES\Aes128cbc;
use Encryption\Cipher\AES\Aes128ccm;
use Encryption\Cipher\AES\Aes128cfb;
use Encryption\Cipher\AES\Aes128cfb1;
use Encryption\Cipher\AES\Aes128cfb8;
use Encryption\Cipher\AES\Aes128ctr;
use Encryption\Cipher\AES\Aes128gcm;
use Encryption\Cipher\AES\Aes128ofb;
use Encryption\Cipher\AES\Aes128xts;
use Encryption\Cipher\AES\Aes192cbc;
use Encryption\Cipher\AES\Aes192ccm;
use Encryption\Cipher\AES\Aes192cfb;
use Encryption\Cipher\AES\Aes192cfb1;
use Encryption\Cipher\AES\Aes192cfb8;
use Encryption\Cipher\AES\Aes192ctr;
use Encryption\Cipher\AES\Aes192gcm;
use Encryption\Cipher\AES\Aes192ofb;
use Encryption\Cipher\AES\Aes256cbc;
use Encryption\Cipher\AES\Aes256ccm;
use Encryption\Cipher\AES\Aes256cfb;
use Encryption\Cipher\AES\Aes256cfb1;
use Encryption\Cipher\AES\Aes256cfb8;
use Encryption\Cipher\AES\Aes256ctr;
use Encryption\Cipher\AES\Aes256gcm;
use Encryption\Cipher\AES\Aes256ofb;
use Encryption\Cipher\AES\Aes256xts;
use Encryption\Cipher\ARIA\Aria128cbc;
use Encryption\Cipher\ARIA\Aria128ccm;
use Encryption\Cipher\ARIA\Aria128cfb;
use Encryption\Cipher\ARIA\Aria128cfb1;
use Encryption\Cipher\ARIA\Aria128cfb8;
use Encryption\Cipher\ARIA\Aria128ctr;
use Encryption\Cipher\ARIA\Aria128gcm;
use Encryption\Cipher\ARIA\Aria128ofb;
use Encryption\Cipher\ARIA\Aria192cbc;
use Encryption\Cipher\ARIA\Aria192ccm;
use Encryption\Cipher\ARIA\Aria192cfb;
use Encryption\Cipher\ARIA\Aria192cfb1;
use Encryption\Cipher\ARIA\Aria192cfb8;
use Encryption\Cipher\ARIA\Aria192ctr;
use Encryption\Cipher\ARIA\Aria192gcm;
use Encryption\Cipher\ARIA\Aria192ofb;
use Encryption\Cipher\ARIA\Aria256cbc;
use Encryption\Cipher\ARIA\Aria256ccm;
use Encryption\Cipher\ARIA\Aria256cfb;
use Encryption\Cipher\ARIA\Aria256cfb1;
use Encryption\Cipher\ARIA\Aria256cfb8;
use Encryption\Cipher\ARIA\Aria256ctr;
use Encryption\Cipher\ARIA\Aria256gcm;
use Encryption\Cipher\ARIA\Aria256ofb;
use Encryption\Cipher\BF\Bfcbc;
use Encryption\Cipher\BF\Bfcfb;
use Encryption\Cipher\BF\Bfofb;
use Encryption\Cipher\CAMELLIA\Camellia128cbc;
use Encryption\Cipher\CAMELLIA\Camellia128cfb;
use Encryption\Cipher\CAMELLIA\Camellia128cfb1;
use Encryption\Cipher\CAMELLIA\Camellia128cfb8;
use Encryption\Cipher\CAMELLIA\Camellia128ctr;
use Encryption\Cipher\CAMELLIA\Camellia128ofb;
use Encryption\Cipher\CAMELLIA\Camellia192cbc;
use Encryption\Cipher\CAMELLIA\Camellia192cfb;
use Encryption\Cipher\CAMELLIA\Camellia192cfb1;
use Encryption\Cipher\CAMELLIA\Camellia192cfb8;
use Encryption\Cipher\CAMELLIA\Camellia192ctr;
use Encryption\Cipher\CAMELLIA\Camellia192ofb;
use Encryption\Cipher\CAMELLIA\Camellia256cbc;
use Encryption\Cipher\CAMELLIA\Camellia256cfb;
use Encryption\Cipher\CAMELLIA\Camellia256cfb1;
use Encryption\Cipher\CAMELLIA\Camellia256cfb8;
use Encryption\Cipher\CAMELLIA\Camellia256ctr;
use Encryption\Cipher\CAMELLIA\Camellia256ofb;
use Encryption\Cipher\CAST5\Cast5cbc;
use Encryption\Cipher\CAST5\Cast5cfb;
use Encryption\Cipher\CAST5\Cast5ofb;
use Encryption\Cipher\CHACHA20\Chacha20;
use Encryption\Cipher\CHACHA20\Chacha20poly1305;
use Encryption\Cipher\DES\Descbc;
use Encryption\Cipher\DES\Descfb;
use Encryption\Cipher\DES\Descfb1;
use Encryption\Cipher\DES\Descfb8;
use Encryption\Cipher\DES\Desede3cbc;
use Encryption\Cipher\DES\Desede3cfb;
use Encryption\Cipher\DES\Desede3cfb1;
use Encryption\Cipher\DES\Desede3cfb8;
use Encryption\Cipher\DES\Desede3ofb;
use Encryption\Cipher\DES\Desedecbc;
use Encryption\Cipher\DES\Desedecfb;
use Encryption\Cipher\DES\Desedeofb;
use Encryption\Cipher\DES\Desofb;
use Encryption\Cipher\DESX\Desxcbc;
use Encryption\Cipher\ID\Idaes128ccm;
use Encryption\Cipher\ID\Idaes128gcm;
use Encryption\Cipher\ID\Idaes192ccm;
use Encryption\Cipher\ID\Idaes192gcm;
use Encryption\Cipher\ID\Idaes256ccm;
use Encryption\Cipher\ID\Idaes256gcm;
use Encryption\Cipher\IDEA\Ideacbc;
use Encryption\Cipher\IDEA\Ideacfb;
use Encryption\Cipher\IDEA\Ideaofb;
use Encryption\Cipher\RC2\Rc240cbc;
use Encryption\Cipher\RC2\Rc264cbc;
use Encryption\Cipher\RC2\Rc2cbc;
use Encryption\Cipher\RC2\Rc2cfb;
use Encryption\Cipher\RC2\Rc2ofb;
use Encryption\Cipher\SEED\Seedcbc;
use Encryption\Cipher\SEED\Seedcfb;
use Encryption\Cipher\SEED\Seedofb;
use Encryption\Cipher\SM4\Sm4cbc;
use Encryption\Cipher\SM4\Sm4cfb;
use Encryption\Cipher\SM4\Sm4ctr;
use Encryption\Cipher\SM4\Sm4ofb;
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
                'encryptedText' => 'EBCWE30lHGtO5hiDv2Wch/bg0hCbV29ZIagybsgRhdqkDQG8NtUcRhUO4Tp1FX6o'
            ],
            [
                'class' => Aes128gcm::class,
                'iv' => 'uSAX2EUkbGKthx+H',
                'encryptedText' => 'igb9Jf2Tm6aDWcuDJgq292vtPxYxRsVWGIUhaJU6XpjXLqCv2cVR5ODvq8dx65vR'
            ],
            [
                'class' => Aes192ccm::class,
                'iv' => 'WIPSkeGyy97h39uh',
                'encryptedText' => 'RwoVwcQrCPoL+sUD8MDYLnO+YSKNHW/wAzaaNyb9iJuBIDzBVboyWBh4Bzckfl4O'
            ],
            [
                'class' => Aes192gcm::class,
                'iv' => '7VW/WQCtZIBHwt6p',
                'encryptedText' => 'XSDVSb7109Wic2dRnLtIgTZT9UDviKMoRFwGsTK+7XJRmIXWVpnHTYk/gms1mPhG'
            ],
            [
                'class' => Aes256ccm::class,
                'iv' => 'jNTNXxbKy2/COMyO',
                'encryptedText' => '3YG4Fng2HwO8pfDd2RYxDmSidSdQJCyOu2Pnov296ZRDBrgf/p/uncdVAp/RGu9Y'
            ],
            [
                'class' => Aes256gcm::class,
                'iv' => 'A21FNKUvS1nkqGFI',
                'encryptedText' => 'dxYMKnJsKhmZ0bGjHOKCka3g63LzvwbMCdUsNoH8H0CPDAbSmjUB6LyFvMCCk5jT'
            ],
            [
                'class' => Aria128ccm::class,
                'iv' => 'oBsOj5WOnPh2cMnf',
                'encryptedText' => 'r8Xc6DR05XMUm9LO0g+F4BWIHvSnVUPMro+Pn7r1ic24qz2Br7wSyN5y6oN3hTM/'
            ],
            [
                'class' => Aria128gcm::class,
                'iv' => 'GtMRWbxotmZ1SPsq',
                'encryptedText' => 'jJoMLli/0xdW9fDMnhgGhphkXgNmgPJP8BvYBvTsvTpJThIBMNhMpAEcoJ9yTi2e'
            ],
            [
                'class' => Aria192ccm::class,
                'iv' => 'mg5tclrVvJ7F8P4F',
                'encryptedText' => 'x7qh9x57Oky3D+K4SlK774jVXfbBdAjOlp/IQo9suGNX1Z1AlXoBSI8Us6e84m/G'
            ],
            [
                'class' => Aria192gcm::class,
                'iv' => 'yHxjxoseUbEctW80',
                'encryptedText' => 'RxO9skcl2yatnB3QHLwFrrISjrNlVdBlpnoErYS4gHWxlF9ItwHNniGmIuzytD3w'
            ],
            [
                'class' => Aria256ccm::class,
                'iv' => 'Y7ZRNS/RMu46bVGo',
                'encryptedText' => 'sMrfPgQTMaxQIvYG2n2k9nlXTr2llwRJx9Jbw6RbWwG4wjJNCccHSlY7Q5TReVks'
            ],
            [
                'class' => Aria256gcm::class,
                'iv' => 'JnRFY8EvCMb2Qw6b',
                'encryptedText' => 'oYFFnXn6bgyPV0EQXtQLnRc0uzB3tFFL0wgFkouVTJKlwo+sF3P4Za791q1bDwIO'
            ],
            [
                'class' => Idaes128ccm::class,
                'iv' => 'lkAoiRVbyl+Cpmt+',
                'encryptedText' => 'X7ykIHYxlL4NxKbx3ht1Lmdh6ojxpg+HhaFRO+Xu4nXWGRflTItiqnxaezMLz9BF'
            ],
            [
                'class' => Idaes128gcm::class,
                'iv' => 'EDsKT2sPEQg4sgjW',
                'encryptedText' => 'Y/SdxnXZJQoWc6FhLGJzHChVrHaHVb9grsuIqwUKMKe7c51uco8rRSNo2p+47pjr'
            ],
            [
                'class' => Idaes192ccm::class,
                'iv' => 'Q7AokS4z/gSS7p1Q',
                'encryptedText' => '4Yl5/HLYPhGOycl5YBUgxiZsq+GYF2yBr4ng4WTkJPchcG1+PZlALtUA2SWag7iW'
            ],
            [
                'class' => Idaes192gcm::class,
                'iv' => 'P3o8ZGDkUJ0XQ/Ho',
                'encryptedText' => 'S+5K/FrFsJ5nkNqhp8YKCUMLHodIXcz5W9BN5RQXYzF8OZC6cigIBxULtAXTWtzy'
            ],
            [
                'class' => Idaes256ccm::class,
                'iv' => 'D4U3gnBIms+Ob1GW',
                'encryptedText' => 'pjsiHwFWgWMOHlK+CK1ttxvIjN7DnU4taeFuDo7n9NvBmwafe+hVEjLhrZuIBy/A'
            ],
            [
                'class' => Idaes256gcm::class,
                'iv' => 'lRtt1LUIxvmvJoGA',
                'encryptedText' => '1BFoUnqdVTkt1Sjc/qtvhy/7DtaJImp42Etd3sZGRKxqQWfjV66NEYDP2d1YMQxb'
            ],
        ];
    }
}
