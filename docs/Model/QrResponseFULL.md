# QrResponseFULL

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**terminal_key** | **string** | Идентификатор терминала. Выдается Мерчанту Тинькофф Кассой при заведении терминала. | 
**success** | **bool** | Успешность операции | 
**data** | **string** | В зависимости от параметра DataType в запросе это:   * Payload - информация, которая должна быть закодирована в QR   * SVG изображение QR в котором уже закодирован Payload | 
**error_code** | **string** | Код ошибки. «0» в случае успеха | 
**message** | **string** | Краткое описание ошибки | [optional] 
**details** | **string** | Подробное описание ошибки | [optional] 
**request_key** | **string** | Идентификатор запроса на привязку счета. Передается в случае привязки и одновременной оплаты по CБП. | 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


