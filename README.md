# codenberg-php

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

$client = new \GuzzleHttp\Client();
$config = new \Kanekoelastic\PhpCodenberg\Configuration(
    'your-api-key',
    'your-secret-key'
);

try {
    $authApi = new \Kanekoelastic\PhpCodenberg\Api\AuthApi($client, $config);
    $accessToken = $authApi->getAccessToken();

    $config->setAccessToken($access_token);
    $templatesApi = new Kanekoelastic\PhpCodenberg\Api\TemplatesApi($client, $config);

    print_r($templatesApi->getTemplates());
} catch (Exception $e) {
    echo 'Exception when calling codenberg Api', $e->getMessage(), PHP_EOL;
}
?>
```

## License

`codenberg-php` is licensed under the Apache License 2.0 - see the  [LICENSE](LICENSE/)  file for details
