# Odnoklassniki OAuth2 client provider

[![Build Status](https://img.shields.io/travis/max107/oauth2-odnoklassniki.svg)](https://travis-ci.org/max107/oauth2-odnoklassniki)
[![Latest Version](https://img.shields.io/packagist/v/max107/oauth2-odnoklassniki.svg)](https://packagist.org/packages/max107/oauth2-odnoklassniki)
[![License](https://img.shields.io/packagist/l/max107/oauth2-odnoklassniki.svg)](https://packagist.org/packages/max107/oauth2-odnoklassniki)

This package provides [Odnoklassniki](http://ok.ru) integration for [OAuth2 Client](https://github.com/thephpleague/oauth2-client) by the League.

## Installation

```sh
composer require aego/oauth2-odnoklassniki
```

## Usage

```php
$provider = new Max107\OAuth2\Client\Provider\Odnoklassniki([
    'clientId' => '1234567890',
    'clientPublic' => 'BA57A2DACCE55C0DE',
    'clientSecret' => '5ADC0DE2ADD1C7ED70C0FFEE',
    'redirectUri' => 'https://example.org/oauth-endpoint',
]);
```

Please pay attention to additional _clientPublic_ parameter — provider requires both numeric and symbolic application IDs.
