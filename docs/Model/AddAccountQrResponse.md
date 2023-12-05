# AddAccountQrResponse

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**terminal_key** | **string** | Идентификатор терминала, выдается Мерчанту Тинькофф Кассой | 
**data** | **string** | В зависимости от параметра DataType в запросе это:   * Payload - информация, которая должна быть закодирована в QR   * SVG изображение QR в котором уже закодирован Payload | 
**request_key** | **string** | Идентификатор запроса на привязку счета | 
**error_code** | **string** | Код ошибки. «0» в случае успеха | 
**success** | **bool** | Выполнение платежа | 
**message** | **string** | Краткое описание ошибки | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


