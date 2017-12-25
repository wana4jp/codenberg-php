# CreateOrderRequest

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**template_id** | **string** | テンプレートIDを指定します。 | [optional] 
**confirmation** | **bool** | trueを設定すると実際の登録は行われません。 | [optional] 
**name** | **string** | 配送先:名称 | [optional] 
**pref** | **string** | 配送先:都道府県名または都道府県id | [optional] 
**postal_code** | **string** | 配送先:郵便番号 | [optional] 
**city** | **string** | 配送先:市区町村 | [optional] 
**address_line1** | **string** | 配送先:番地 | [optional] 
**address_line2** | **string** | 配送先:建物名 | [optional] 
**organization** | **string** | 配送先:組織名 | [optional] 
**tel** | **string** | 配送先:電話番号\&quot; | [optional] 
**quantity** | **int** | 注文数 | [optional] [default to 1]
**custom_fields** | [**\Swagger\Client\Model\CustomFieldValue[]**](CustomFieldValue.md) | 可変領域。*ordersが指定されていると無視されます。 | [optional] 
**orders** | [**\Swagger\Client\Model\CustomFieldValueGroup[]**](CustomFieldValueGroup.md) | 異なる可変領域指定の注文を一括で作成する場合に利用します。 | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


