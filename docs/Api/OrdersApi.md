# Swagger\Client\OrdersApi

All URIs are relative to *https://api.codenberg.io/v1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**cancelOrder**](OrdersApi.md#cancelOrder) | **PUT** /orders/{id}/cancel | Cancel order
[**createOrder**](OrdersApi.md#createOrder) | **POST** /orders | Create new order from template
[**getCancelStatus**](OrdersApi.md#getCancelStatus) | **GET** /orders/{id}/cancel_status | Get cancel order status
[**getDeliveryStatus**](OrdersApi.md#getDeliveryStatus) | **GET** /orders/{order_group_id}/order/{order_id}/status | Get delivery address status for change
[**getOrderById**](OrdersApi.md#getOrderById) | **GET** /orders/{id} | Get order by Id
[**getOrders**](OrdersApi.md#getOrders) | **GET** /orders | Get order list
[**updateDeliveryStatus**](OrdersApi.md#updateDeliveryStatus) | **POST** /orders/{order_group_id}/order/{order_id} | Change delivery address


# **cancelOrder**
> \Swagger\Client\Model\StatusAndMessage cancelOrder($id)

Cancel order

注文をキャンセルします。 注文のキャンセルは印刷ステータスが「印刷待ち」まで受け付けています。 印刷ステータスについては「[印刷ステータスについて](https://github.com/friday-night/codenberg-api-reference/wiki/%E5%8D%B0%E5%88%B7%E3%82%B9%E3%83%86%E3%83%BC%E3%82%BF%E3%82%B9%E3%81%AB%E3%81%A4%E3%81%84%E3%81%A6)」を参照してください。

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: codenberg_auth
Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Swagger\Client\Api\OrdersApi();
$id = 789; // int | 注文のIDを指定します。

try {
    $result = $api_instance->cancelOrder($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrdersApi->cancelOrder: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| 注文のIDを指定します。 |

### Return type

[**\Swagger\Client\Model\StatusAndMessage**](../Model/StatusAndMessage.md)

### Authorization

[codenberg_auth](../../README.md#codenberg_auth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **createOrder**
> \Swagger\Client\Model\Order createOrder($body)

Create new order from template

テンプレートから注文を作成します。

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: codenberg_auth
Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Swagger\Client\Api\OrdersApi();
$body = new \Swagger\Client\Model\CreateOrderRequest(); // \Swagger\Client\Model\CreateOrderRequest | 作成する注文内容を指定します

try {
    $result = $api_instance->createOrder($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrdersApi->createOrder: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\CreateOrderRequest**](../Model/CreateOrderRequest.md)| 作成する注文内容を指定します |

### Return type

[**\Swagger\Client\Model\Order**](../Model/Order.md)

### Authorization

[codenberg_auth](../../README.md#codenberg_auth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getCancelStatus**
> \Swagger\Client\Model\StatusAndMessage getCancelStatus($id)

Get cancel order status

注文キャンセルの可否情報を返します。 注文のキャンセルは印刷ステータスが「印刷待ち」まで受け付けています。 印刷ステータスについては「[印刷ステータスについて](https://github.com/friday-night/codenberg-api-reference/wiki/%E5%8D%B0%E5%88%B7%E3%82%B9%E3%83%86%E3%83%BC%E3%82%BF%E3%82%B9%E3%81%AB%E3%81%A4%E3%81%84%E3%81%A6)」を参照してください。

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: codenberg_auth
Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Swagger\Client\Api\OrdersApi();
$id = 789; // int | 注文のIDを指定します。

try {
    $result = $api_instance->getCancelStatus($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrdersApi->getCancelStatus: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| 注文のIDを指定します。 |

### Return type

[**\Swagger\Client\Model\StatusAndMessage**](../Model/StatusAndMessage.md)

### Authorization

[codenberg_auth](../../README.md#codenberg_auth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getDeliveryStatus**
> \Swagger\Client\Model\StatusAndMessage getDeliveryStatus($order_group_id, $order_id)

Get delivery address status for change

配送先変更の可否情報を返します。 注文の配送先変更は印刷ステータスが「印刷待ち」「印刷中」まで受け付けています。 印刷ステータスについては「[印刷ステータスについて](https://github.com/friday-night/codenberg-api-reference/wiki/%E5%8D%B0%E5%88%B7%E3%82%B9%E3%83%86%E3%83%BC%E3%82%BF%E3%82%B9%E3%81%AB%E3%81%A4%E3%81%84%E3%81%A6)」を参照してください。

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: codenberg_auth
Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Swagger\Client\Api\OrdersApi();
$order_group_id = 789; // int | 注文のグループIDを指定します
$order_id = 789; // int | 注文Idを指定します

try {
    $result = $api_instance->getDeliveryStatus($order_group_id, $order_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrdersApi->getDeliveryStatus: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **order_group_id** | **int**| 注文のグループIDを指定します |
 **order_id** | **int**| 注文Idを指定します |

### Return type

[**\Swagger\Client\Model\StatusAndMessage**](../Model/StatusAndMessage.md)

### Authorization

[codenberg_auth](../../README.md#codenberg_auth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getOrderById**
> \Swagger\Client\Model\Order getOrderById($id)

Get order by Id

注文の詳細情報を返します。

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: codenberg_auth
Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Swagger\Client\Api\OrdersApi();
$id = 789; // int | 注文のIDを指定します。

try {
    $result = $api_instance->getOrderById($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrdersApi->getOrderById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| 注文のIDを指定します。 |

### Return type

[**\Swagger\Client\Model\Order**](../Model/Order.md)

### Authorization

[codenberg_auth](../../README.md#codenberg_auth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getOrders**
> \Swagger\Client\Model\OrderList getOrders($sort, $direction, $per_page, $page, $range_key, $from, $to, $including_test)

Get order list

注文一覧を取得します。

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: codenberg_auth
Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Swagger\Client\Api\OrdersApi();
$sort = "id"; // string | 並び順の基準とする項目を指定します。
$direction = "desc"; // string | 項目の並び順を指定します。
$per_page = 10; // int | 1ページあたりの取得項目数。最大50件
$page = 1; // int | ページ番号を指定します。
$range_key = "created_at"; // string | 絞り込みを行う日付を指定します。
$from = "from_example"; // string | 指定すると指定した日付以降の項目を抽出します。
$to = "to_example"; // string | 指定すると指定した日付以前の項目を抽出します。
$including_test = false; // bool | テストモードで登録した注文を含めるかどうかを指定します。

try {
    $result = $api_instance->getOrders($sort, $direction, $per_page, $page, $range_key, $from, $to, $including_test);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrdersApi->getOrders: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **sort** | **string**| 並び順の基準とする項目を指定します。 | [optional] [default to id]
 **direction** | **string**| 項目の並び順を指定します。 | [optional] [default to desc]
 **per_page** | **int**| 1ページあたりの取得項目数。最大50件 | [optional] [default to 10]
 **page** | **int**| ページ番号を指定します。 | [optional] [default to 1]
 **range_key** | **string**| 絞り込みを行う日付を指定します。 | [optional] [default to created_at]
 **from** | **string**| 指定すると指定した日付以降の項目を抽出します。 | [optional]
 **to** | **string**| 指定すると指定した日付以前の項目を抽出します。 | [optional]
 **including_test** | **bool**| テストモードで登録した注文を含めるかどうかを指定します。 | [optional] [default to false]

### Return type

[**\Swagger\Client\Model\OrderList**](../Model/OrderList.md)

### Authorization

[codenberg_auth](../../README.md#codenberg_auth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateDeliveryStatus**
> \Swagger\Client\Model\OrderDetail updateDeliveryStatus($order_group_id, $order_id, $body)

Change delivery address

配送先変更を行います。 配送先の変更は指定したパラメータのみ、行うことが可能です。指定できるパラメータは下記を参照して下さい。 パラメータ内の値の形式・制約などについては「注文作成-シングル」のパラメータと同様です。  注文の配送先変更は印刷ステータスが「印刷待ち」「印刷中」まで受け付けています。 印刷ステータスについては「[印刷ステータスについて](https://github.com/friday-night/codenberg-api-reference/wiki/%E5%8D%B0%E5%88%B7%E3%82%B9%E3%83%86%E3%83%BC%E3%82%BF%E3%82%B9%E3%81%AB%E3%81%A4%E3%81%84%E3%81%A6)」を参照してください。

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: codenberg_auth
Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Swagger\Client\Api\OrdersApi();
$order_group_id = 789; // int | 注文のグループIDを指定します
$order_id = 789; // int | 注文Idを指定します
$body = new \Swagger\Client\Model\ChangeDeliveryAddressRequest(); // \Swagger\Client\Model\ChangeDeliveryAddressRequest | 配送先の変更内容を指定します。

try {
    $result = $api_instance->updateDeliveryStatus($order_group_id, $order_id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrdersApi->updateDeliveryStatus: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **order_group_id** | **int**| 注文のグループIDを指定します |
 **order_id** | **int**| 注文Idを指定します |
 **body** | [**\Swagger\Client\Model\ChangeDeliveryAddressRequest**](../Model/ChangeDeliveryAddressRequest.md)| 配送先の変更内容を指定します。 |

### Return type

[**\Swagger\Client\Model\OrderDetail**](../Model/OrderDetail.md)

### Authorization

[codenberg_auth](../../README.md#codenberg_auth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

