# Swagger\Client\Template_previewsApi

All URIs are relative to *https://api.codenberg.io/v1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createTemplatePreview**](Template_previewsApi.md#createTemplatePreview) | **POST** /template_previews | Request creating template preview
[**getTemplatePreview**](Template_previewsApi.md#getTemplatePreview) | **GET** /template_previews/{template_preview_id} | Get preview


# **createTemplatePreview**
> \Swagger\Client\Model\TemplatePreview createTemplatePreview($body)

Request creating template preview

指定したテンプレートのプレビューの生成をリクエストします。

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: codenberg_auth
Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Swagger\Client\Api\Template_previewsApi();
$body = new \Swagger\Client\Model\PreviewRequest(); // \Swagger\Client\Model\PreviewRequest | プレビューの生成条件を指定します。

try {
    $result = $api_instance->createTemplatePreview($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling Template_previewsApi->createTemplatePreview: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\PreviewRequest**](../Model/PreviewRequest.md)| プレビューの生成条件を指定します。 |

### Return type

[**\Swagger\Client\Model\TemplatePreview**](../Model/TemplatePreview.md)

### Authorization

[codenberg_auth](../../README.md#codenberg_auth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getTemplatePreview**
> \Swagger\Client\Model\TemplatePreview getTemplatePreview($template_preview_id)

Get preview

指定したプレビューを取得します。

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: codenberg_auth
Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Swagger\Client\Api\Template_previewsApi();
$template_preview_id = 789; // int | プレビューのIDを指定

try {
    $result = $api_instance->getTemplatePreview($template_preview_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling Template_previewsApi->getTemplatePreview: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **template_preview_id** | **int**| プレビューのIDを指定 |

### Return type

[**\Swagger\Client\Model\TemplatePreview**](../Model/TemplatePreview.md)

### Authorization

[codenberg_auth](../../README.md#codenberg_auth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

