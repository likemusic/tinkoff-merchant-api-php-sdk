# InlineResponse2002

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**terminal_key** | **string** | Идентификатор терминала. Выдается Мерчанту Тинькофф Кассой при заведении терминала. | 
**amount** | **float** | Сумма в копейках | 
**order_id** | **string** | Идентификатор заказа в системе Мерчанта | 
**success** | **bool** | Выполнение платежа | 
**status** | **string** | Статус платежа | 
**payment_id** | **float** | Идентификатор платежа в системе Тинькофф Кассы | 
**error_code** | **string** | Код ошибки. «0» в случае успеха | 
**message** | **string** | Краткое описание ошибки | [optional] 
**details** | **string** | Подробное описание ошибки | [optional] 
**params** | [**\OpenAPI\Client\Model\ItemsParams[]**](ItemsParams.md) | Детали для платежей в рассрочку | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


