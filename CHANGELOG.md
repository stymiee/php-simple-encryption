# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.0.7] - 2021-08-30

### Changed
- Changed RuntimeException to GenerateIvException when unable to generate an IV

## [1.0.6] - 2021-04-18

### Added
- Added AES-128-CBC-HMAC-SHA1, AES-128-CBC-HMAC-SHA256, AES-256-CBC-HMAC-SHA1, AES-256-CBC-HMAC-SHA256
- Added AES-128-OCB, AES-192-OCB, AES-256-OCB algorithms (now supports 139 ciphers)

## [1.0.5] - 2021-03-08

### Changed
- Throw Exception if unable to encrypt or decrypt

## [1.0.4] - 2020-11-25

### Changed
- Throw Exception with a clear error message when trying to generate an IV for a cipher that does not require one
- Updated HELP file with errors when calling ACipher::generateIv()

## [1.0.3] - 2020-09-24

### Added
- Added DES-EDE, DES-EDE3, RC4, RC4-40, RC4-HMAC-MD5 algorithms (now supports 132 ciphers)
- Added phpDocumentor support

### Changed
- Trimmed nulls from null padded strings (missed two traits)
- Prepped OCB mode ciphers for when Openssl finishes support for them

## [1.0.2] - 2020-07-15

### Added
- Added VERSION to assist with determining which default cipher was/is being used

### Changed
- Made cipher classes final as they should never be extended
- Made exception classes final as they should never be extended

## [1.0.1] - 2020-06-14

### Added
- Added GitHub actions support in composer.json file (i.e. composer scripts)

### Changed
- Made code PSR-12 compliant
- Updated HELP and support documentation
- Improved var_dump() on the encryption object to provide the cipher name, block_size, and IV length (could be zero)
- Enhanced fallback IV generator to use a stronger crypto friendly random number function

## [1.0.0] - 2020-05-29

### Added
- Initial release with support for 127 ciphers
