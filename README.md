# codenberg-php

[![Build Status](https://travis-ci.org/kanekoelastic/codenberg-php.svg?branch=master)](https://travis-ci.org/kanekoelastic/codenberg-php)

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
