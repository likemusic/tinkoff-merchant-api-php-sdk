# ChargeQr

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**terminal_key** | **string** | Идентификатор терминала.  Выдается Мерчанту Тинькофф Кассой при заведении терминала | 
**payment_id** | **float** | Уникальный идентификатор транзакции в системе Тинькофф Кассы | 
**account_token** | **string** | Идентификатор привязки счета, назначаемый банком-эмитентом | 
**token** | **string** | Подпись запроса | 
**ip** | **string** | IP-адрес клиента | [optional] 
**send_email** | **bool** | * true – если клиент хочет получать уведомления на почту | [optional] 
**info_email** | **string** | Адрес почты клиента. Обязательно, если передан параметр SendEmail &#x3D; true | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


