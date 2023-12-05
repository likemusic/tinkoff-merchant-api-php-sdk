# InlineResponse2005

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**terminal_key** | **string** | Идентификатор терминала, выдается Мерчанту Тинькофф Кассой | 
**order_id** | **string** | Номер заказа в системе Мерчанта | 
**success** | **bool** | Выполнение платежа | 
**status** | **string** | Статус транзакции - CONFIRMED при успешном сценарии и одностадийном проведении платежа - AUTHORIZED при успешном сценарии и двухстадийном проведении платежа  - REJECTED при неуспешном | 
**payment_id** | **string** | Уникальный идентификатор транзакции в системе Тинькофф Кассы | 
**error_code** | **string** | Код ошибки. «0» в случае успеха | 
**message** | **string** | Краткое описание ошибки | [optional] 
**details** | **string** | Подробное описание ошибки | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


