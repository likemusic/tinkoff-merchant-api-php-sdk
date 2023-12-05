# Confirm2

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**terminal_key** | **string** | Идентификатор терминала выдается Мерчанту Тинькофф Кассой | 
**order_id** | **string** | Идентификатор заказа в системе Мерчанта | 
**success** | **bool** | Успешность операции (true/false) | 
**status** | **string** | Статус транзакции | 
**payment_id** | **string** | Уникальный идентификатор транзакции в системе Тинькофф Кассы | 
**error_code** | **string** | Код ошибки. «0» в случае успеха | 
**message** | **string** | Краткое описание ошибки | [optional] 
**details** | **string** | Подробное описание ошибки | [optional] 
**params** | [**\OpenAPI\Client\Model\ItemsParams[]**](ItemsParams.md) | Детали для платежей в рассрочку | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


