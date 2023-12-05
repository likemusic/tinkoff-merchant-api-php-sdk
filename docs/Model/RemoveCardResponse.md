# RemoveCardResponse

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**terminal_key** | **string** | Идентификатор терминала. Выдается Мерчанту Тинькофф Кассой при заведении терминала. | 
**status** | **string** | Статус карты: D – удалена | 
**customer_key** | **string** | Идентификатор клиента в системе Мерчанта | 
**card_id** | **string** | Идентификатор карты в системе Тинькофф Кассы | 
**card_type** | **float** | Тип карты: * карта списания (0); * карта пополнения(1); * карта пополнения и списания (2). | 
**success** | **bool** | Успешность операции | 
**error_code** | **string** | Код ошибки. «0» в случае успеха | 
**message** | **string** | Краткое описание ошибки | [optional] 
**details** | **string** | Подробное описание ошибки | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


