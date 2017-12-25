# Template

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** |  | [optional] 
**name** | **string** | 名称 | [optional] 
**keywords** | **string** | キーワード | [optional] 
**comment** | **string** | コメント | [optional] 
**thumb** | [**\Swagger\Client\Model\TemplateThumb**](TemplateThumb.md) |  | [optional] 
**pdf** | **string** | PDFファイルのURL | [optional] 
**page_count** | **int** | ページ数 | [optional] 
**selected_paper** | [**\Swagger\Client\Model\Paper**](Paper.md) |  | [optional] 
**moq** | **int** | 最小注文数 | [optional] 
**spq** | **int** | 注文単位 | [optional] 
**lot_price** | [**\Swagger\Client\Model\LotPrice[]**](LotPrice.md) | 注文数別の注文価格 | [optional] 
**format_id** | **int** | プロダクトのID | [optional] 
**format** | [**\Swagger\Client\Model\Format**](Format.md) |  | [optional] 
**custom_fields** | [**\Swagger\Client\Model\CustomField[]**](CustomField.md) | 設定されている可変領域の情報 | [optional] 
**status** | **string** | ステータス | [optional] 
**created_at** | [**\DateTime**](\DateTime.md) | 作成日時 | [optional] 
**updated_at** | [**\DateTime**](\DateTime.md) | 更新日時 | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


