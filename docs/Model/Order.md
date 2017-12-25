# Order

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] 
**display_id** | **string** | 注文番号 | [optional] 
**printing_fee** | **int** | 印刷費 | [optional] 
**sub_total** | **int** | 小計 | [optional] 
**consumption_tax** | **int** | 消費税 | [optional] 
**delivery_fee** | **int** | 梱包・配送費 | [optional] 
**total** | **int** | 合計 | [optional] 
**total_quantity** | **int** | 合計印刷数 | [optional] 
**total_number** | **int** | 合計注文数（total_quantityのシノニム） | [optional] 
**orders** | [**\Swagger\Client\Model\OrderDetail[]**](OrderDetail.md) | 注文明細一覧 | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


