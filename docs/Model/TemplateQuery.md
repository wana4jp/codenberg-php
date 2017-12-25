# TemplateQuery

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**q** | **string** | 検索文字列を指定します。template名、キーワードが対象となります。 | [optional] 
**sort** | **string** | id/format_id/name/keywords/created_atを指定できます。 | [optional] [default to 'id']
**direction** | **string** | 項目の並び順を指定します。asc(昇順)/desc(降順) | [optional] [default to 'desc']
**per_page** | **int** | 1ページあたりの取得項目数。最大:50件 | [optional] [default to 10]
**page** | **int** | ページ番号を指定。 | [optional] [default to 1]
**including_private** | **bool** | 非公開のテンプレートを含めるかどうかを指定します。 | [optional] [default to false]
**including_custom_fields** | **bool** | 可変領域の情報を含めるかを設定します。 | [optional] [default to false]
**including_formats** | **bool** | フォーマットの情報を含めるかを設定します。 | [optional] [default to false]

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


