[![Latest Stable Version](https://poser.pugx.org/stymiee/php-simple-encryption/v/stable.svg)](https://packagist.org/packages/stymiee/php-simple-encryption)
[![Total Downloads](https://poser.pugx.org/stymiee/php-simple-encryption/downloads)](https://packagist.org/packages/stymiee/php-simple-encryption)
![Build](https://github.com/stymiee/php-simple-encryption/workflows/Build/badge.svg?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/stymiee/php-simple-encryption/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/stymiee/php-simple-encryption/?branch=master)
[![Maintainability](https://api.codeclimate.com/v1/badges/acfb3fdd72012a3f7cd6/maintainability)](https://codeclimate.com/github/stymiee/php-simple-encryption/maintainability)
[![License](https://poser.pugx.org/stymiee/php-simple-encryption/license)](https://packagist.org/packages/stymiee/php-simple-encryption)
# PHP Simple Encryption (php-simple-encryption)

A PHP library that makes encryption and decryption of text easy.

## Requirements

- PHP 7.2+
- Openssl PHP extension

## Installation

Simply add a dependency on `stymiee/php-simple-encryption` to your project's `composer.json` file if you 
use [Composer](http://getcomposer.org/) to manage the dependencies of your project.

Here is a minimal example of a `composer.json` file that just defines a dependency on PHP Simple Encryption:

    {
        "require": {
            "stymiee/php-simple-encryption": "^1"
        }
    }

## Basic Usage

To get a more detailed introduction to this library, visit the 
[PHP Simple Encryption tutorial](https://www.johnconde.net/blog/php-simple-encryption/?utm_source=github&utm_medium=link&utm_campaign=php-encryption)
on my blog.

```php
require('./vendor/autoload.php');

use Encryption\Encryption;
use Encryption\Exception\EncryptionException;

$text = 'The quick brown fox jumps over the lazy dog';
$key  = 'secretkey';
try {
    $encryption = Encryption::getEncryptionObject();
    $iv = $encryption->generateIv();
    $encryptedText = $encryption->encrypt($text, $key, $iv);
    $decryptedText = $encryption->decrypt($encryptedText, $key, $iv);

    printf('Cipher   : %s%s', $encryption->getName(), PHP_EOL);
    printf('Encrypted: %s%s', $encryptedText, PHP_EOL);
    printf('Decrypted: %s%s', $decryptedText, PHP_EOL);
    printf('Version  : %s%s', Encryption::VERSION, PHP_EOL);
}
catch (EncryptionException $e) {
    echo $e;
}
```
    
Outputs

    Cipher   : AES-256-CBC
    Encrypted: lierDqV4Qo3Cm87YU01K+YnQsDGrFsYypjHJVZaagqfLFg7xb2T7b9qfqb4NcoIGcTzqvQbOx72AVgbuRFxqgg==
    Decrypted: The quick brown fox jumps over the lazy dog
    Version  : 1

An exception may be thrown if:
- An invalid/unsupported cipher is attempted to be used (`Encryption\Exception\InvalidCipherException`)
- A cipher available in openssl but yet implemented is attempted to be used (`Encryption\Exception\CipherNotImplementedException`)
- `generateIv()` is unable to generate a initialization vector (`Encryption\Exception\GenerateIvException`).
- `Encryption::encrypt()` is unable to encrypt the data (`Encryption\Exception\EncryptException`).
- `Encryption::decrypt()` is unable to decrypt the data (`Encryption\Exception\DecryptException`).

## Supported Ciphers

The PHP Simple Encryption library currently defaults to `AES-256-CBC`. This may change in future versions and will 
result in a major version bump when this occurs. You can check the version of your library by calling
`Encryption::VERSION`. This library is currently on version "1".
 
To determine what cipher you are using you can call the `getName()` method on your encryption object.

```php
$encryption = Encryption::getEncryptionObject();
$cipherName = $encryption->getName(); // AES-256-CBC
```
    
To get a list of ciphers supported by your system *and* this library you can call `Encryption::listAvailableCiphers()`
to receive an array of available ciphers. This list is an intersection of available ciphers from your system's
installed version of Openssl and ciphers supported by this library.    

**Total ciphers supported:** 139    
**Default cipher:** AES-256-CBC (version 1)

| AES                     | Aria/Blowfish | Camellia/Cast5/SM4 | DES/Idea/RC2/RC4/Seed |
|-------------------------|---------------|--------------------|-----------------------|
| aes-128-cbc             | aria-128-cbc  | camellia-128-cbc   | des-cbc               |
| aes-128-cbc-hmac-sha1   | aria-128-ccm  | camellia-128-cfb   | des-cfb               |
| aes-128-cbc-hmac-sha256 | aria-128-cfb  | camellia-128-cfb   | des-cfb1              |
| aes-128-ccm             | aria-128-cfb1 | camellia-128-cfb   | des-cfb8              |
| aes-128-cfb             | aria-128-cfb8 | camellia-128-ctr   | des-ecb               |
| aes-128-cfb1            | aria-128-ctr  | camellia-128-ecb   | des-ede               |
| aes-128-cfb8            | aria-128-ecb  | camellia-128-ofb   | des-ede3              |
| aes-128-ctr             | aria-128-gcm  | camellia-192-cbc   | des-ede-cbc           |
| aes-128-ecb             | aria-128-ofb  | camellia-192-cfb   | des-ede-cfb           |
| aes-128-gcm             | aria-192-cbc  | camellia-192-cfb   | des-ede-ofb           |
| aes-128-ofb             | aria-192-ccm  | camellia-192-cfb   | des-ede3-cbc          |
| aes-128-xts             | aria-192-cfb  | camellia-192-ctr   | des-ede3-cfb          |
| aes-192-cbc             | aria-192-cfb1 | camellia-192-ecb   | des-ede3-cfb1         |
| aes-192-ccm             | aria-192-cfb8 | camellia-192-ofb   | des-ede3-cfb8         |
| aes-192-cfb             | aria-192-ctr  | camellia-256-cbc   | des-ede3-ofb          |
| aes-192-cfb1            | aria-192-ecb  | camellia-256-cfb   | des-ofb               |
| aes-192-cfb8            | aria-192-gcm  | camellia-256-cfb   | desx-cbc              |
| aes-192-ctr             | aria-192-ofb  | camellia-256-cfb   | id-aes128-ccm         |
| aes-192-ecb             | aria-256-cbc  | camellia-256-ctr   | id-aes128-gcm         |
| aes-192-gcm             | aria-256-ccm  | camellia-256-ecb   | id-aes192-ccm         |
| aes-192-ofb             | aria-256-cfb  | camellia-256-ofb   | id-aes192-gcm         |
| aes-256-cbc             | aria-256-cfb1 | cast5-cbc          | id-aes256-ccm         |
| aes-256-cbc-hmac-sha1   | aria-256-cfb8 | cast5-cfb          | id-aes256-gcm         |
| aes-256-cbc-hmac-sha256 | aria-256-ctr  | cast5-ecb          | idea-cbc              |
| aes-256-ccm             | aria-256-ecb  | cast5-ofb          | idea-cfb              |
| aes-256-cfb             | aria-256-gcm  | chacha20           | idea-ecb              |
| aes-256-cfb1            | aria-256-ofb  | chacha20-poly1305  | idea-ofb              |
| aes-256-cfb8            | bf-cbc        | seed-cbc           | rc2-40-cbc            |
| aes-256-ctr             | bf-cfb        | seed-cfb           | rc2-64-cbc            |
| aes-256-ecb             | bf-ecb        | seed-ecb           | rc2-cbc               |
| aes-256-gcm             | bf-ofb        | seed-ofb           | rc2-cfb               |
| aes-256-ofb             | sm4-cbc       |                    | rc2-ecb               |
| aes-256-xts             | sm4-cfb       |                    | rc2-ofb               |
|                         | sm4-ctr       |                    | rc4                   |
|                         | sm4-ecb       |                    | rc4-40                |
|                         |               |                    | rc4-hmac-md5          |

## Notes

If the text to be encrypted contains trailing null characters they will be removed when decrypting those values.

Some ciphers may not work on your version of PHP. The newer your version of PHP (and its openssl extension), the more
ciphers that will be available to you.

## Support

If you require assistance using this library start by viewing the [HELP.md](HELP.md) file included in this package. It 
includes common problems and their solutions.

If you need additional assistance, I can be found at Stack Overflow. Be sure when you
[ask a question](http://stackoverflow.com/questions/ask?tags=php,encryption,openssl) pertaining to the usage of
this library be sure to tag your question with the **PHP** and **encryption** tags. Make sure you follow their
[guide for asking a good question](http://stackoverflow.com/help/how-to-ask) as poorly asked questions will be closed, 
and I will not be able to assist you.

A good question will include all the following:
- A description of the problem (what are you trying to do? what results are you expecting? what results are you actually getting?)
- The code you are using (only post the relevant code)
- Your unencrypted text
- The key you are using
- The IV you are using
- The output of your method call(s)
- Any error message(s) you are getting

**Do not use Stack Overflow to report bugs.** Bugs may be reported [here](https://github.com/stymiee/php-simple-encryption/issues/new).
