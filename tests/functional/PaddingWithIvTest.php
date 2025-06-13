<?php

namespace functional;

use Encryption\Cipher\AES\Aes128cbc;
use Encryption\Cipher\AES\Aes128cfb;
use Encryption\Cipher\AES\Aes128cfb1;
use Encryption\Cipher\AES\Aes128cfb8;
use Encryption\Cipher\AES\Aes128ctr;
use Encryption\Cipher\AES\Aes128ofb;
use Encryption\Cipher\AES\Aes128xts;
use Encryption\Cipher\AES\Aes192cbc;
use Encryption\Cipher\AES\Aes192cfb;
use Encryption\Cipher\AES\Aes192cfb1;
use Encryption\Cipher\AES\Aes192cfb8;
use Encryption\Cipher\AES\Aes192ctr;
use Encryption\Cipher\AES\Aes192ofb;
use Encryption\Cipher\AES\Aes256cbc;
use Encryption\Cipher\AES\Aes256cfb;
use Encryption\Cipher\AES\Aes256cfb1;
use Encryption\Cipher\AES\Aes256cfb8;
use Encryption\Cipher\AES\Aes256ctr;
use Encryption\Cipher\AES\Aes256ofb;
use Encryption\Cipher\AES\Aes256xts;
use Encryption\Cipher\ARIA\Aria128cbc;
use Encryption\Cipher\ARIA\Aria128cfb;
use Encryption\Cipher\ARIA\Aria128cfb1;
use Encryption\Cipher\ARIA\Aria128cfb8;
use Encryption\Cipher\ARIA\Aria128ctr;
use Encryption\Cipher\ARIA\Aria128ofb;
use Encryption\Cipher\ARIA\Aria192cbc;
use Encryption\Cipher\ARIA\Aria192cfb;
use Encryption\Cipher\ARIA\Aria192cfb1;
use Encryption\Cipher\ARIA\Aria192cfb8;
use Encryption\Cipher\ARIA\Aria192ctr;
use Encryption\Cipher\ARIA\Aria192ofb;
use Encryption\Cipher\ARIA\Aria256cbc;
use Encryption\Cipher\ARIA\Aria256cfb;
use Encryption\Cipher\ARIA\Aria256cfb1;
use Encryption\Cipher\ARIA\Aria256cfb8;
use Encryption\Cipher\ARIA\Aria256ctr;
use Encryption\Cipher\ARIA\Aria256ofb;
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
use Encryption\Cipher\CHACHA20\Chacha20;
use Encryption\Cipher\DES\Desede3cbc;
use Encryption\Cipher\DES\Desede3cfb;
use Encryption\Cipher\DES\Desede3cfb1;
use Encryption\Cipher\DES\Desede3cfb8;
use Encryption\Cipher\DES\Desede3ofb;
use Encryption\Cipher\DES\Desedecbc;
use Encryption\Cipher\DES\Desedecfb;
use Encryption\Cipher\DES\Desedeofb;
use Encryption\Cipher\SM4\Sm4cbc;
use Encryption\Cipher\SM4\Sm4cfb;
use Encryption\Cipher\SM4\Sm4ctr;
use Encryption\Cipher\SM4\Sm4ofb;
use PHPUnit\Framework\TestCase;

class PaddingWithIvTest extends TestCase
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
        // AEAD ciphers (e.g., GCM, CCM, CHACHA20-POLY1305) require an additional tag argument.
        if ((new \ReflectionMethod($encryptionObject, 'encrypt'))->getNumberOfRequiredParameters() === 4) {
            $tag = '';
            $encryptedText = $encryptionObject->encrypt($this->plainText, $this->key, $iv, $tag);
            $decrytpedText = $encryptionObject->decrypt($encryptedText, $this->key, $iv, $tag);
        } else {
            $encryptedText = $encryptionObject->encrypt($this->plainText, $this->key, $iv);
            $decrytpedText = $encryptionObject->decrypt($encryptedText, $this->key, $iv);
        }
        self::assertEquals($encrypted, $encryptedText);
        self::assertEquals($this->plainText, $decrytpedText);
    }

    public static function dataProvider(): array
    {
        return [
            [
                'cipher' => Aes128cbc::class,
                'iv' => 'Ko5nqZo8gvbbgNdNpmta+Q==',
                'encrypted' => '0mnq7zllazlqOgpn4AS0Nr8jzjRP07aMjhM7culTQBNAdLGArDQ41VW9/1sy9KWu5E9qLrHVri8Eue39zlZmrQ=='
            ],
            [
                'cipher' => Aes128cfb::class,
                'iv' => 'rGDg6eyiS0U6hAyC141dDQ==',
                'encrypted' => '2S6L6QPgCH/IhZLhK2RoX31Vzmal2pLtV9YmEElTpAdNe8pShDeUY2Z1qnbw6xfg'
            ],
            [
                'cipher' => Aes128cfb1::class,
                'iv' => 'eJmCIxpvG+tp8yn7h8dXPg==',
                'encrypted' => 'FY4hzdOexT1zqciDKpV8qq3wyU8YAXiR3S3smg/KAtaCWTftY8PoB/SAZyc5aGj+'
            ],
            [
                'cipher' => Aes128cfb8::class,
                'iv' => '17bNdR8U1bf7toiPbIgh+A==',
                'encrypted' => 'XAJR43YX5aMrwviHFSWSVZZV0pUs3Dcv5k00CltaYJLkEJULi0/5m8tgXLVn43XD'
            ],
            [
                'cipher' => Aes128ctr::class,
                'iv' => 'xnmxSZLAmWDvQvjzGM94ng==',
                'encrypted' => 'PiP0j7qDRDkbUikgZNVRiQOLmDoFqrQf4VM6u2jpM34g9Kf4Kb9QdSVT84ZnIjm+'
            ],
            [
                'cipher' => Aes128ofb::class,
                'iv' => '+DZibqa1UV52kyKulFfHRQ==',
                'encrypted' => 'BAosVkvGHCtGPbtfqgT24EeGKE9jgGGWLm2xb0UXgYPOSOIc8FoJzJSSpSku51XM'
            ],
            [
                'cipher' => Aes128xts::class,
                'iv' => '9MXRiMCxg2/DC7HBX+Qhkw==',
                'encrypted' => '6ejYPGqOoTVFVDGLwGvVMNx/XUtkBkNtcCP5P/R8DXXKjhYiqc6wNGFq4TOUFfmb'
            ],
            [
                'cipher' => Aes192cbc::class,
                'iv' => 'JdhSNM+97hdRtTCXndNYEA==',
                'encrypted' => 'D3wiQn0mQvT9x9HlrxCC7sfPdvY3FBFDISLwECzvFsGf4ongJXPcIwcBSSrSgvCc3vbDtis8V87aCeECSFL15A=='
            ],
            [
                'cipher' => Aes192cfb::class,
                'iv' => 'Pn/w2aevuSFL8T7UQ9/eLA==',
                'encrypted' => 'pDub2gOXL5J1aw3ljhQUCTTkcfemJasWalIwIbCs0OLallE+GYu2k1Zo0t8tXHq8'
            ],
            [
                'cipher' => Aes192cfb1::class,
                'iv' => 'SMpsBYS8X3vq9L3WKNO/ZA==',
                'encrypted' => 'ovHUrXRg1izT2Gh1Pe+UMUPS2IJv+opixUWXUVk0H97z5lMynxHZQ/Z9Or3QxSot'
            ],
            [
                'cipher' => Aes192cfb8::class,
                'iv' => 'gpv8FBmrDCZTpqlDycXr2w==',
                'encrypted' => 'iDKxjvIxgGHsXKRoKrdud2CWHx8EgT2UWRBWVlPNVgLSBsFkiyWBMymD5nQ9+e0z'
            ],
            [
                'cipher' => Aes192ctr::class,
                'iv' => 'B0OyQ7HJwC80v6lsS30CNg==',
                'encrypted' => 'CGZb+GqJNozVW23mB7AtHck7ak2CinF960Yjyxm1uCfHG3FEU7WM3SJgg34HHPmc'
            ],
            [
                'cipher' => Aes192ofb::class,
                'iv' => '+9SVXwpXbH7YKxH/1GWEjw==',
                'encrypted' => 'gh335KdjyDDdllvAEKxLtBULl5L7GW/khxVnvdvInG/TLzgl/p9o/T7Z0T+fNJYa'
            ],
            [
                'cipher' => Aes256cbc::class,
                'iv' => 'E6x/xZzyU1ipuTUBHDbVoQ==',
                'encrypted' => 'ynqrmRUG4FbnkLIF4rnC4jmufvEBEn8YBycxagjsk38NTgyomXiiNURrYqSUYDgKxTSVoXMZ613ReAWIpQHp+w=='
            ],
            [
                'cipher' => Aes256cfb::class,
                'iv' => 'xIhguz7PDWC2AiSteSfT/Q==',
                'encrypted' => 'FwQvHMyJvhRF86IqWoYJmT0T5g1bpO/QHREqAaW24YPxdNKb+QqP51N5CPPuZfkx'
            ],
            [
                'cipher' => Aes256cfb1::class,
                'iv' => '+W8f2UJjwew5f7lOug9E2g==',
                'encrypted' => 'w+Wmamp7LMhX599gwpDDVfjCJI748emFT10y3/9Y9Mvk+S2ItBr0s7sAASgESFqx'
            ],
            [
                'cipher' => Aes256cfb8::class,
                'iv' => 'Z/XHVDPH2CYhDyhDirI+zg==',
                'encrypted' => 'tf+uqsOHEh4dD1+Sv/J566gEwCOd2WD23d5OHbGsR45DkS3t4/M9uRERnUEd5PXl'
            ],
            [
                'cipher' => Aes256ctr::class,
                'iv' => 'mabiJBfbCJYh9KTRFCNIfg==',
                'encrypted' => '9eTnD+rcnl4/xMyHG16nOAtj+Cm0jZDkAghhbMCkcoXs6vN+zeVYgvc0zUt6CBJ7'
            ],
            [
                'cipher' => Aes256ofb::class,
                'iv' => 'LNs7SVu2RlMNw8v0cH4KGQ==',
                'encrypted' => 'V5nWoX77TqSel6Ns0k9YZ/Nw7Euhh6hAvuwrTmEGFQ49vyxk6EovlVmptT7d51YD'
            ],
            [
                'cipher' => Aes256xts::class,
                'iv' => 'zfxvYnEz9z693Cq5BZbgVQ==',
                'encrypted' => 'O9cdq5cZYfFzxhsNekBHVYYMaDMu7Exo7OTAiZdqbzbnfVRbZfCxJ+39mx/lW1OJ'
            ],
            [
                'cipher' => Aria128cbc::class,
                'iv' => 's9LxElFYHqlYwpDFHFq2rw==',
                'encrypted' => 'nya/cycQjuS6iESDcx+T7LNiXatcuUmhcypR7Rnhly/QoZLdK2MCmVU2/Yb1B3TzGYxLBdnXafjWWf0mZE+TPQ=='
            ],
            [
                'cipher' => Aria128cfb::class,
                'iv' => 'Ejz4wlvuwjyzOr0iQLZHig==',
                'encrypted' => 'T9QFFJYqZ64qjn+d5zXFKL2v1Ym57vFvFrJnHoS2NZDOiSZNnEQ+8SOIYAqDhMEE'
            ],
            [
                'cipher' => Aria128cfb1::class,
                'iv' => 'IuJ3Af1hKbhLm5lTLo21+w==',
                'encrypted' => 'VU6EJS4HGMnRGXIzW63uDK2cIGD83+Hj42xumUqrrduLCzE7b/TQcaNuOxMh5fol'
            ],
            [
                'cipher' => Aria128cfb8::class,
                'iv' => 'yGivnwZynWLxeZIDfr1FRg==',
                'encrypted' => 'niEU5Un7WBHRCfvDmZ+XKsIPyUKe3Rg8Zc9an0vJXy+1wfJfH6+5s+Nj/lCyrdv7'
            ],
            [
                'cipher' => Aria128ctr::class,
                'iv' => 'epuGNX+p8E/1pS8axTLPRA==',
                'encrypted' => 'nnwln9jr3YXmo/pXUxu5C7wC+A5qYL5s5QQFUo64gPP2rfycx+nWaiP3dV5n3tDo'
            ],
            [
                'cipher' => Aria128ofb::class,
                'iv' => 'sxTGsjO2UBDUvmgR4xRTqA==',
                'encrypted' => 'pkJsqzUGn/03B7Sza33ri3HnECC5RtyuCDrl0poIaLsnYF2iPZ6nn+5D9GS/17Y1'
            ],
            [
                'cipher' => Aria192cbc::class,
                'iv' => 'tqzT2GomXm9UskfBRI59Fg==',
                'encrypted' => '+tGIKkAze4uuXq4EoQW/q9x6Mm8J1sv5plsQtnDtr1u/g3u/UL3+rRP3zX6Ajra1cbKFOS2cpL/tHXojwaAZqQ=='
            ],
            [
                'cipher' => Aria192cfb::class,
                'iv' => 'B5hl5acvCN2i8dRsBDpNzw==',
                'encrypted' => 'OVD1UynoRrcy2I9inrW2hfML+XEwaUzyLUO5545BprgENQNLvE6BG31mztnbQeET'
            ],
            [
                'cipher' => Aria192cfb1::class,
                'iv' => 'nYE3uQ+JQoJj2VXGebRYlQ==',
                'encrypted' => 'G81SZoTltxKgwzuizpWevMqKowfAGW2ohwQXtD2sQno1wUGiWXKJBgdeUdg+C61J'
            ],
            [
                'cipher' => Aria192cfb8::class,
                'iv' => 'FU4QyXjw9oF8Swq/xmn7Ng==',
                'encrypted' => 'p5W9FhAZUI8HDIqphMyqkfj6s8/MbJIocubxivRm9eVNDDAGZwSQ9qmicy+qubtn'
            ],
            [
                'cipher' => Aria192ctr::class,
                'iv' => '+EXCaZTm2MdT/IC9zGL3vw==',
                'encrypted' => 'rCiDAlby7Frd8FHqUf+Z2hXgLwNNlO8CI/BO/sGIGO4oHaqVjLFXwOkZbkYchenF'
            ],
            [
                'cipher' => Aria192ofb::class,
                'iv' => '6YehsdnYJ43c/UAydLzsiA==',
                'encrypted' => 'TVL+AXJsUGQwxMlC7z8yS4jRjWtYmnKahfjkJ/QHKjxbebVKQbq80moWPErqoPbv'
            ],
            [
                'cipher' => Aria256cbc::class,
                'iv' => 'm0dn74sKTGz/KmP7E4o+Eg==',
                'encrypted' => 'kC117CZjK0MFTWuPrwiO44LM4qPTCijbXRhv7gx5iguXyn9ATaJXFZ8Hh7Kg7Y7UuMrI2fcrvOaroYHwEGWm0A=='
            ],
            [
                'cipher' => Aria256cfb::class,
                'iv' => 'kpeTtJcPq/w5HePYsOg5Dw==',
                'encrypted' => 'ntIZc7WtvcO53AG3rki/SXAb9JlhLWJxgpxxYWaJxI3hhUUJkRneVD+3liZ57U0e'
            ],
            [
                'cipher' => Aria256cfb1::class,
                'iv' => 'D2yj6QjRKqu+5J8URRU3hA==',
                'encrypted' => 'fjgXZPoh6jPePfTAuQXOLm9ADtI78gl5od6TJYQDMFyJhn5n3UUgq3NZ8VI0qBOw'
            ],
            [
                'cipher' => Aria256cfb8::class,
                'iv' => 'sNKOwTYdOveZPr0Ti85jSQ==',
                'encrypted' => 'k0GT4su8nAtP6PN3y31SZNktyeJIHIjEBWArs48Ex7UO0qC3Oo8HDl9WYXT0WwuP'
            ],
            [
                'cipher' => Aria256ctr::class,
                'iv' => 'kPwKtRzc/zZm1vCyu85dsg==',
                'encrypted' => '1GOJX34tS/5v1vzGg8YeDDRIHNEEuRnIFCh0CR7A/1ILfJd5NihTECuYhZ8MQArw'
            ],
            [
                'cipher' => Aria256ofb::class,
                'iv' => 'fQedAvZABBAuE03uxJRFGA==',
                'encrypted' => 'VrOmnNffRH2IFkJTRP86v0ZQA2XNx7e/RHLYmJhKOR7GlZJz6xpl6AfmYEZHIp4F'
            ],
            [
                'cipher' => Camellia128cbc::class,
                'iv' => 'VeuzLApI5LeQFO/JkY6MiA==',
                'encrypted' => 'cmHpfq5UZYapaikFirlYcIIj6mJ6g1SJVw46C9s+JUM1QsBTve4LqVFZFrt/cT9KveEwYI79Xlxaue7+qClHsA=='
            ],
            [
                'cipher' => Camellia128cfb::class,
                'iv' => 'FJIbFyJDcE39QFVxDEvhOg==',
                'encrypted' => 'uUtEiAt/St9AkBRgmkQD0Z9dhI/EBzhGSB+OqWYlCrMpnq5wU25hPjTdQ2MYNtjA'
            ],
            [
                'cipher' => Camellia128cfb1::class,
                'iv' => 'osGyGH8rnwOqrVQNJYHc8A==',
                'encrypted' => 'NCh7XYoXrwwNxLICQMJ/8/uGKaqsvUvgwMLV1yTjExVIFIVWN3a2Ds++a1kFDRKZ'
            ],
            [
                'cipher' => Camellia128cfb8::class,
                'iv' => 'nf6Ff0aOJGGuUXL3p+lChg==',
                'encrypted' => 'BTf2lga95EIMDbYP5RvQJH+LqJSrmWPVhWoAD2bn07UEsb7uG182OYApbLVbeASS'
            ],
            [
                'cipher' => Camellia128ctr::class,
                'iv' => 'MxtiFbUgWOgF1/m8Fcmm3Q==',
                'encrypted' => 'xN13AoTNZkmyhL/rc6ELDXDKBfVHxYMWPlslLEvsUPdnONm79LfsDCP3r1+nxN5N'
            ],
            [
                'cipher' => Camellia128ofb::class,
                'iv' => 'R43h2+sODwSA5BY2+BesdA==',
                'encrypted' => 'zQ1rTcAYJT9piBRQNh5LO5Kf72nUKY927EgcNI/jYTUysHyp7knupGCMq3F9xdvO'
            ],
            [
                'cipher' => Camellia192cbc::class,
                'iv' => 'I9BT4RjFZfOA11ID2qsoHw==',
                'encrypted' => 'H7ZZ5avFrJ1F1VtDo+54WOTeVELZqCPGshUN+irqkVmL9WK7AYH9OaJN1VkWm9Msg/SXbDHjFRwdSH+nozaTgw=='
            ],
            [
                'cipher' => Camellia192cfb::class,
                'iv' => 'fIiMS1AFxLhCGQ4v3itCkA==',
                'encrypted' => '158F8uajWUdCg8y1XMpjUOe8gFM1iAr92Qx75l0sfTLHwbDA57Yjmhd66BGQZ/z5'
            ],
            [
                'cipher' => Camellia192cfb1::class,
                'iv' => 'UbCv3wDpSAXNGPhAjT2vow==',
                'encrypted' => 'DorMMIb28p8rm88sizwOBLYGWd0Q6keeptThahczSd+0s8gNErkYA4a3kx5HZtsc'
            ],
            [
                'cipher' => Camellia192cfb8::class,
                'iv' => '6+HWdJ13yXeKbQC4ML1Gtw==',
                'encrypted' => '/iJn5frNhbrzJQucPlg0JRMV2R4iyUMwUrigshuLl9LYTOg+uV5WxbTv37DtJ4rl'
            ],
            [
                'cipher' => Camellia192ctr::class,
                'iv' => '4D1IAI8iNgwNOJkS2WnaBg==',
                'encrypted' => 'yhxGnGjKzBa0iKswMw1ratsDRgDaOwHStGAYbsqia0sQBYbhOCRAG3hUUKHkHxB9'
            ],
            [
                'cipher' => Camellia192ofb::class,
                'iv' => 'cl7mRuLiUCF/MODTd9aYtA==',
                'encrypted' => 'Abp0YxRGrYKvgDTZgV4SA1vO8ezzn+LcJEjNosEYGEk4QlMIQJ8Nv2jWf/bERxwo'
            ],
            [
                'cipher' => Camellia256cbc::class,
                'iv' => 'eCk5b+VX6hGg2+11DshsYg==',
                'encrypted' => 'qSon/aj4JsjhpnniLadOONXmGo53SsYVlLHc8JjpxYDrO/e1ZekIYDyrcRuf0ryFd3Us+PnHbo5zHMTIo2tLbQ=='
            ],
            [
                'cipher' => Camellia256cfb::class,
                'iv' => 'ChtT07qVOwbN0s537jSF/w==',
                'encrypted' => 'R6ZXipR++4m/hUlxMm5OcFI9yad1T4fJwzeZ1tzPRvBrUforUK++D6uSMnHVQJ9p'
            ],
            [
                'cipher' => Camellia256cfb1::class,
                'iv' => 'Vqmk/Gy+2UbDAYOp35IYCw==',
                'encrypted' => 'sK9IsQOnkca2o/ZpoCGbUQg+RHrtxRqyWTmfRwXa8u5zsd5wkXaHzzH/Z65QyLjl'
            ],
            [
                'cipher' => Camellia256cfb8::class,
                'iv' => 'j7toi9A/PWYIqfh527hdUw==',
                'encrypted' => '+IwtWLBW4qQmileH2n23dB5YWxNMIw3ijZvub5M6ZTpn/zqJZVTyKUiYoO8N5seL'
            ],
            [
                'cipher' => Camellia256ctr::class,
                'iv' => 'noE5L4D39ffIMXamSQZy1g==',
                'encrypted' => 'Dv2VuOFwstJRNa97J/w+K/s+P42vE3CuyJaDCacwRhwaHiZ6TI1iJ9jZPNZfaW9a'
            ],
            [
                'cipher' => Camellia256ofb::class,
                'iv' => 'S2BMfqw/BUVTJ5oEhhVfUw==',
                'encrypted' => 'YZMwz6vaL2muW52WpiW/EoyTXsNgbuLjTc5mDv4wBPDyrVqgoh7oaCURAnf9xurQ'
            ],
            [
                'cipher' => Chacha20::class,
                'iv' => 'kJYkRqe76Ph7Tn/X3Lmbcw==',
                'encrypted' => 'GeGJev62P4GN5odLyWxfx0NU0WklMBoqt0AV9GSGpX5REL4VCGzpi7zYvVp5/NDP'
            ],
            /*
            [
                'cipher' => Chacha20poly1305::class,
                'iv' => 'Q9acp05xGsndYrIg',
                'encrypted' => 'DtEGTjk7wtCgiVvPwt1gxb422IMul+j2VNp46c3JYbkEN+TeExIhpPUxJpFQ+vpM'
            ],
            */
            [
                'cipher' => Desedecbc::class,
                'iv' => 'xty4sXywOXI=',
                'encrypted' => 'FmGFM4ssll1xewiSw+Pj+Uvsqgmv3gfa7MsRIIXDN7OKs9ZoXjOi5EazXqAQU/N5/hlaIOMD+ck='
            ],
            [
                'cipher' => Desedecfb::class,
                'iv' => 'XdYRiu84IRY=',
                'encrypted' => '1K0IjdHDBTH7ak16v7w1bLvFKltEp/OalaefFF/olA0jCrJkh0cJuNT2J10wyACe'
            ],
            [
                'cipher' => Desedeofb::class,
                'iv' => 'Y9rTeqyBh7U=',
                'encrypted' => 'DMouOYADcUFqvM+V59Q8dNcycCeW9xGfhS3klvX73WKDZHzKDNGMGh3fqvLQgG4L'
            ],
            [
                'cipher' => Desede3cbc::class,
                'iv' => 'Oj1FnfQFF5E=',
                'encrypted' => 'XwGUw7YHlLFgSqK+zS8g79A8t0++8zrr9Qa16yfAILIEtXo9ijzZv0tPbOVFJVFtRbBC17tKXlI='
            ],
            [
                'cipher' => Desede3cfb::class,
                'iv' => 'RKu49LHTv4I=',
                'encrypted' => 'ccHD2fAMlOjX4nIEqa/MfnnqX8lV0R6EDsrH5WPpyhJuymIGqYUfxHmKi/FV/X+3'
            ],
            [
                'cipher' => Desede3cfb1::class,
                'iv' => 'AY1Tp760yek=',
                'encrypted' => '0lGJZdAEixZ7W7vypsg2Cbl1GANBqBfRa+O0+42Uci36SHbOlg9FsfMbKzNnUHAW'
            ],
            [
                'cipher' => Desede3cfb8::class,
                'iv' => 'mnlAncvncn0=',
                'encrypted' => 'ercOqYW5iAcyvs8aCgP8xe3Q2IC9yHNeaLsYeG1sZzANPGu0WJnU4O+ZaXANFKni'
            ],
            [
                'cipher' => Desede3ofb::class,
                'iv' => 'PKhlTYtL/Aw=',
                'encrypted' => '4NABOBbHUh9NriiqwDujXv/hU7IlfVhwO5CQWZW6AcW3gNcp3U75BsmPoRpmS8Wd'
            ],
            [
                'cipher' => Sm4cbc::class,
                'iv' => '4ZL2TWTMwnT020T3DBmtoA==',
                'encrypted' => 'zNVg8whOc7x9cLZz1ksxK4rf3lhWfZsWvX49mPxkzJdmzJPA8XQr/tt7DZ4EQ5Awky8GxiiH6YOz3+jhKAec1A=='
            ],
            [
                'cipher' => Sm4cfb::class,
                'iv' => 'GIgVI9m3G0Or5IV3h29Jmg==',
                'encrypted' => 'zPO2kOpf8YgAGhxUeB8VDd50DPkRNQJfwyTozMJJ0nQ5BSM6B2jCLfBGfZPKPq26'
            ],
            [
                'cipher' => Sm4ctr::class,
                'iv' => 'Q5VPQBk1R6/eReFKzc8mSA==',
                'encrypted' => 'cIpLximgGbWt+4O0tq12BxZrKUS10IVm7BeaT+y/jo5a29ugnFsGdTJcR99Y2WAV'
            ],
            [
                'cipher' => Sm4ofb::class,
                'iv' => '1+03H70byIfRy6gOPtoOlA==',
                'encrypted' => 'lMkEEmqumBAcs06NPj+6C3MBioWYueCCVyVrgAVqCC8SVBM16niB7aPAvAvzVxW9'
            ],
        ];
    }
}
