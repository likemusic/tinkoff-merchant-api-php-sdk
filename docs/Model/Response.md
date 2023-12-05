# Response

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**terminal_key** | **string** | Идентификатор терминала. Выдается Мерчанту Тинькофф Кассой при заведении терминала. | 
**amount** | **float** | Сумма в копейках | 
**order_id** | **string** | Идентификатор заказа в системе Мерчанта | 
**success** | **bool** | Успешность операции (true/false) | 
**status** | **string** | Статус транзакции | 
**payment_id** | **string** | Идентификатор платежа в системе Тинькофф Кассы | 
**error_code** | **string** | Код ошибки. «0» в случае успеха | 
**payment_url** | **string** | Ссылка на платежную форму (параметр возвращается только &#x60;для Мерчантов без PCI DSS&#x60;) | [optional] 
**message** | **string** | Краткое описание ошибки | [optional] 
**details** | **string** | Подробное описание ошибки | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


