# Swagger\Client\FormatsApi

All URIs are relative to *https://api.codenberg.io/v1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getFormatById**](FormatsApi.md#getFormatById) | **GET** /formats/{format_id} | Get format informatino by ID
[**getFormats**](FormatsApi.md#getFormats) | **GET** /formats | Get format list by query


# **getFormatById**
> \Swagger\Client\Model\Format getFormatById($format_id)

Get format informatino by ID

指定したフォーマットの詳細情報を返します。

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: codenberg_auth
Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Swagger\Client\Api\FormatsApi();
$format_id = 789; // int | フォーマットのIDを指定

try {
    $result = $api_instance->getFormatById($format_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FormatsApi->getFormatById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format_id** | **int**| フォーマットのIDを指定 |

### Return type

[**\Swagger\Client\Model\Format**](../Model/Format.md)

### Authorization

[codenberg_auth](../../README.md#codenberg_auth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getFormats**
> \Swagger\Client\Model\FormatList getFormats($q, $sort, $direction, $per_page, $page)

Get format list by query

利用可能なプロダクトの一覧を返します。

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: codenberg_auth
Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Swagger\Client\Api\FormatsApi();
$q = "q_example"; // string | 検索文字列。format名、用途から検索できます。
$sort = "id"; // string | 並び順の基準とする項目を指定します。
$direction = "desc"; // string | 項目の並び順を指定します。
$per_page = 10; // int | 1ページあたりの取得項目数。最大50件
$page = 1; // int | ページ番号を指定します。

try {
    $result = $api_instance->getFormats($q, $sort, $direction, $per_page, $page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FormatsApi->getFormats: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **q** | **string**| 検索文字列。format名、用途から検索できます。 | [optional]
 **sort** | **string**| 並び順の基準とする項目を指定します。 | [optional] [default to id]
 **direction** | **string**| 項目の並び順を指定します。 | [optional] [default to desc]
 **per_page** | **int**| 1ページあたりの取得項目数。最大50件 | [optional] [default to 10]
 **page** | **int**| ページ番号を指定します。 | [optional] [default to 1]

### Return type

[**\Swagger\Client\Model\FormatList**](../Model/FormatList.md)

### Authorization

[codenberg_auth](../../README.md#codenberg_auth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

