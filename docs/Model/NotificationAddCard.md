# NotificationAddCard

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**terminal_key** | **string** | Идентификатор терминала. Выдается Мерчанту Тинькофф Кассой  при заведении терминала. | [optional] 
**customer_key** | **string** | Идентификатор клиента в системе Мерчанта | [optional] 
**request_key** | **string** | Идентификатор запроса на привязку карты | [optional] 
**success** | **bool** | Выполнение платежа | [optional] 
**status** | **string** | Статус привязки карты. Получает в ответе 1 из 2 статусов привязки:   * COMPLETED - при одностадийной оплате   * REJECTED - при двухстадийной оплате | [optional] 
**payment_id** | **float** | Идентификатор платежа в системе Тинькофф Кассы | [optional] 
**error_code** | **string** | Код ошибки. «0» в случае успеха | [optional] 
**rebill_id** | **string** | Идентификатор автоплатежа | [optional] 
**card_id** | **float** | Идентификатор карты в системе Тинькофф Кассы | [optional] 
**pan** | **string** | Замаскированный номер карты | [optional] 
**exp_date** | **string** | Срок действия карты В формате MMYY, где YY — две последние цифры года | [optional] 
**token** | **string** | Подпись запроса. Формируется по такому же принципу, как и в случае запросов в Тинькофф Кассу | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


