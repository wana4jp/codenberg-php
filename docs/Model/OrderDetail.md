# OrderDetail

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] 
**display_id** | **string** | 注文明細番号 | [optional] 
**name** | **string** | 配送先:名称 | [optional] 
**pref** | [**\Swagger\Client\Model\Prefecture**](Prefecture.md) |  | [optional] 
**postal_code** | **string** | 配送先:郵便番号 | [optional] 
**city** | **string** | 配送先:市区町村 | [optional] 
**address_line1** | **string** | 配送先:住所1 | [optional] 
**address_line2** | **string** | 配送先:住所2 | [optional] 
**organization** | **string** | 配送先:組織、会社名 | [optional] 
**tel** | **string** | 配送先:電話番号 | [optional] 
**quantity** | **int** | 注文数（total_quantityのシノニム） | [optional] 
**order_number** | **int** | 注文数（total_quantityのシノニム） | [optional] 
**template_id** | **int** | 注文対象のテンプレートID | [optional] 
**custom_fields** | [**\Swagger\Client\Model\CustomFieldValue[]**](CustomFieldValue.md) | 設定した可変領域の値 | [optional] 
**status** | **string** | ステータス | [optional] 
**payment_status** | **string** | 支払決済ステータス | [optional] 
**created_at** | [**\DateTime**](\DateTime.md) | 注文日時 | [optional] 
**updated_at** | [**\DateTime**](\DateTime.md) | 情報更新日時 | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


