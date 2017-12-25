# Swagger\Client\MediaApi

All URIs are relative to *https://api.codenberg.io/v1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getMedia**](MediaApi.md#getMedia) | **GET** /media | Get media list
[**getMediaById**](MediaApi.md#getMediaById) | **GET** /media/{media_id} | Get media information by ID


# **getMedia**
> \Swagger\Client\Model\MediaList getMedia($q, $sort, $direction, $per_page, $page)

Get media list

登録されているメディアの一覧を返します。

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: codenberg_auth
Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Swagger\Client\Api\MediaApi();
$q = "q_example"; // string | 指定して文字でファイル名を対象に検索します。
$sort = "id"; // string | 並び順の基準とする項目を指定します。
$direction = "desc"; // string | 項目の並び順を指定します。
$per_page = 10; // int | 1ページあたりの取得項目数。最大50件
$page = 1; // int | ページ番号を指定します。

try {
    $result = $api_instance->getMedia($q, $sort, $direction, $per_page, $page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MediaApi->getMedia: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **q** | **string**| 指定して文字でファイル名を対象に検索します。 | [optional]
 **sort** | **string**| 並び順の基準とする項目を指定します。 | [optional] [default to id]
 **direction** | **string**| 項目の並び順を指定します。 | [optional] [default to desc]
 **per_page** | **int**| 1ページあたりの取得項目数。最大50件 | [optional] [default to 10]
 **page** | **int**| ページ番号を指定します。 | [optional] [default to 1]

### Return type

[**\Swagger\Client\Model\MediaList**](../Model/MediaList.md)

### Authorization

[codenberg_auth](../../README.md#codenberg_auth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getMediaById**
> \Swagger\Client\Model\Medium getMediaById($media_id)

Get media information by ID

登録されているメディアの詳細を返します。

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: codenberg_auth
Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Swagger\Client\Api\MediaApi();
$media_id = 789; // int | 取得するメディアIDを指定します

try {
    $result = $api_instance->getMediaById($media_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MediaApi->getMediaById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **media_id** | **int**| 取得するメディアIDを指定します |

### Return type

[**\Swagger\Client\Model\Medium**](../Model/Medium.md)

### Authorization

[codenberg_auth](../../README.md#codenberg_auth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

