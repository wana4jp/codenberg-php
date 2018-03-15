# codenberg-php

[![Build Status](https://travis-ci.org/kanekoelastic/codenberg-php.svg?branch=master)](https://travis-ci.org/kanekoelastic/codenberg-php)
[![License](https://img.shields.io/badge/License-Apache%202.0-blue.svg)](https://opensource.org/licenses/Apache-2.0)
[![Coverage Status](https://coveralls.io/repos/github/kanekoelastic/codenberg-php/badge.svg?branch=master)](https://coveralls.io/github/kanekoelastic/codenberg-php?branch=master)

A simple wrapper for Codenberg API, written with PHP5.

## Requirements

* PHP >= 5.6
* [Guzzle](https://github.com/guzzle/guzzle) library,
* (optional) PHPUnit to run tests.

## Install

Via Composer:

```bash
$ composer require kanekoelastic/codenberg-php dev-master
```

## Basic usage

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

$config = \Kanekoelastic\PhpCodenberg\Configuration::getInstance(
    'your-api-key',
    'your-secret-key'
);

try {
    // Get Access Token first
    $authApi = new \Kanekoelastic\PhpCodenberg\Api\AuthApi($config);
    $token = $authApi->getAccessToken();
    $config->setAccessToken($token->getAccessToken());

    // Then call API
    $templatesApi = new \Kanekoelastic\PhpCodenberg\Api\TemplatesApi($config);
    print_r($templatesApi->getTemplates());
} catch (Exception $e) {
    echo 'Exception when calling codenberg Api', $e->getMessage(), PHP_EOL;
}
?>
```

## License

`codenberg-php` is licensed under the Apache License 2.0 - see the  [LICENSE](LICENSE/)  file for details
