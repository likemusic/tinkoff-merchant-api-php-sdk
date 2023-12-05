# ChargeQrResponse

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**terminal_key** | **string** | Идентификатор терминала. Выдается Мерчанту Тинькофф Кассой при заведении терминала | 
**amount** | **float** | Сумма в копейках | 
**order_id** | **string** | Идентификатор заказа в системе Мерчанта | 
**success** | **bool** | Выполнение платежа | 
**status** | **string** | Статус платежа   Получает в ответе 1 из 2 статусов: * CONFIRMED - Если платеж выполнен * REJECTED - Если платеж не выполнен | [optional] 
**payment_id** | **float** | Идентификатор платежа в системе Тинькофф Кассы | 
**error_code** | **string** | Код ошибки. * \&quot;0\&quot; - успешная операция; * \&quot;3013\&quot; - рекуррентные платежи недоступны; * \&quot;3015\&quot; - неверный статус AccountToken. | 
**message** | **string** | Краткое описание ошибки | [optional] 
**details** | **string** | Подробное описание ошибки | [optional] 
**currency** | **float** | Код валюты по ISO 4217 | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


