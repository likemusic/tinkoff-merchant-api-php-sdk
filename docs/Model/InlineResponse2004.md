# InlineResponse2004

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**terminal_key** | **string** | Идентификатор терминала. Выдается Мерчанту Тинькофф Кассой  при заведении терминала | 
**customer_key** | **string** | Идентификатор клиента в системе Мерчанта | 
**request_key** | **string** | Идентификатор запроса на привязку карты | 
**rebill_id** | **string** | Идентификатор рекуррентного платежа | [optional] 
**card_id** | **string** | Идентификатор карты в системе Тинькофф Кассы | 
**success** | **bool** | Выполнение платежа | 
**error_code** | **string** | Код ошибки. «0» в случае успеха | 
**message** | **string** | Краткое описание ошибки | [optional] 
**details** | **string** | Подробное описание ошибки | [optional] 
**status** | **string** | Статус платежа | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


