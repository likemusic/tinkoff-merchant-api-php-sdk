# AddCardResponseFULL

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**payment_id** | **float** | Идентификатор платежа в системе Тинькофф Кассы | 
**terminal_key** | **string** | Идентификатор терминала. Выдается Мерчанту Тинькофф Кассой при заведении терминала. | 
**customer_key** | **string** | Идентификатор клиента в системе Мерчанта | 
**request_key** | **string** | Идентификатор запроса на привязку карты | 
**error_code** | **string** | Код ошибки. «0» в случае успеха | 
**success** | **bool** | Выполнение платежа | 
**message** | **string** | Краткое описание ошибки | [optional] 
**details** | **string** | Подробное описание ошибки | [optional] 
**payment_url** | **string** | UUID, используется для работы без PCI DSS | 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


