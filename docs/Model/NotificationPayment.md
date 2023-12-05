# NotificationPayment

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**terminal_key** | **string** | Идентификатор терминала. Выдается Мерчанту Тинькофф Кассой при заведении терминала. | [optional] 
**amount** | **float** | Сумма в копейках | [optional] 
**order_id** | **string** | Идентификатор заказа в системе Мерчанта | [optional] 
**success** | **bool** | Выполнение платежа | [optional] 
**status** | **string** | Статус платежа | [optional] 
**payment_id** | **float** | Уникальный идентификатор транзакции в системе Тинькофф Кассы | [optional] 
**error_code** | **string** | Код ошибки. «0» в случае успеха | [optional] 
**message** | **string** | Краткое описание ошибки | [optional] 
**details** | **string** | Подробное описание ошибки | [optional] 
**rebill_id** | **float** | Идентификатор автоплатежа | [optional] 
**card_id** | **float** | Идентификатор карты в системе Тинькофф Кассы | [optional] 
**pan** | **string** | Замаскированный номер карты/Замаскированный номер телефона | [optional] 
**exp_date** | **string** | Срок действия карты В формате MMYY, где YY — две последние цифры года | [optional] 
**token** | **string** | Подпись запроса. Формируется по такому же принципу, как и в случае запросов в Тинькофф Кассу | [optional] 
**data** | [**\OpenAPI\Client\Model\DataNotification**](.md) |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


