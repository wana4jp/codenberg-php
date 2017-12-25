# Swagger\Client\PrefecturesApi

All URIs are relative to *https://api.codenberg.io/v1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getPrefectures**](PrefecturesApi.md#getPrefectures) | **GET** /prefectures | Get prefectures list


# **getPrefectures**
> \Swagger\Client\Model\Prefecture getPrefectures()

Get prefectures list

コーデンベルクで扱うことができる都道府県の県名とコードの一覧を返します。

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: codenberg_auth
Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Swagger\Client\Api\PrefecturesApi();

try {
    $result = $api_instance->getPrefectures();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PrefecturesApi->getPrefectures: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Swagger\Client\Model\Prefecture**](../Model/Prefecture.md)

### Authorization

[codenberg_auth](../../README.md#codenberg_auth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

