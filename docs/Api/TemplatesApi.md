# Swagger\Client\TemplatesApi

All URIs are relative to *https://api.codenberg.io/v1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getTemplateById**](TemplatesApi.md#getTemplateById) | **GET** /templates/{template_id} | Find template by ID
[**getTemplates**](TemplatesApi.md#getTemplates) | **GET** /templates | Get template list by query.


# **getTemplateById**
> \Swagger\Client\Model\Template getTemplateById($template_id, $including_custom_fields, $including_formats)

Find template by ID

指定したテンプレートの詳細情報を返します。

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: codenberg_auth
Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Swagger\Client\Api\TemplatesApi();
$template_id = 789; // int | テンプレートのIDを指定します。
$including_custom_fields = true; // bool | 可変領域の情報を含めるかを設定します。
$including_formats = false; // bool | フォーマットの情報を含めるかを設定します。

try {
    $result = $api_instance->getTemplateById($template_id, $including_custom_fields, $including_formats);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TemplatesApi->getTemplateById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **template_id** | **int**| テンプレートのIDを指定します。 |
 **including_custom_fields** | **bool**| 可変領域の情報を含めるかを設定します。 | [optional] [default to true]
 **including_formats** | **bool**| フォーマットの情報を含めるかを設定します。 | [optional] [default to false]

### Return type

[**\Swagger\Client\Model\Template**](../Model/Template.md)

### Authorization

[codenberg_auth](../../README.md#codenberg_auth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getTemplates**
> \Swagger\Client\Model\TemplateList getTemplates($q, $sort, $direction, $per_page, $page, $including_private, $including_custom_fields, $including_formats)

Get template list by query.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: codenberg_auth
Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Swagger\Client\Api\TemplatesApi();
$q = "q_example"; // string | 検索文字列を指定します。template名、キーワードが対象となります。
$sort = "id"; // string | id/format_id/name/keywords/created_atを指定できます。
$direction = "desc"; // string | 項目の並び順を指定します。asc(昇順)/desc(降順)
$per_page = 10; // int | 1ページあたりの取得項目数。最大:50件
$page = 1; // int | ページ番号を指定。
$including_private = false; // bool | 非公開のテンプレートを含めるかどうかを指定します。
$including_custom_fields = false; // bool | 可変領域の情報を含めるかを設定します。
$including_formats = false; // bool | フォーマットの情報を含めるかを設定します。

try {
    $result = $api_instance->getTemplates($q, $sort, $direction, $per_page, $page, $including_private, $including_custom_fields, $including_formats);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TemplatesApi->getTemplates: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **q** | **string**| 検索文字列を指定します。template名、キーワードが対象となります。 | [optional]
 **sort** | **string**| id/format_id/name/keywords/created_atを指定できます。 | [optional] [default to id]
 **direction** | **string**| 項目の並び順を指定します。asc(昇順)/desc(降順) | [optional] [default to desc]
 **per_page** | **int**| 1ページあたりの取得項目数。最大:50件 | [optional] [default to 10]
 **page** | **int**| ページ番号を指定。 | [optional] [default to 1]
 **including_private** | **bool**| 非公開のテンプレートを含めるかどうかを指定します。 | [optional] [default to false]
 **including_custom_fields** | **bool**| 可変領域の情報を含めるかを設定します。 | [optional] [default to false]
 **including_formats** | **bool**| フォーマットの情報を含めるかを設定します。 | [optional] [default to false]

### Return type

[**\Swagger\Client\Model\TemplateList**](../Model/TemplateList.md)

### Authorization

[codenberg_auth](../../README.md#codenberg_auth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

