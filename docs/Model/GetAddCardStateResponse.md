# GetAddCardStateResponse

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**terminal_key** | **string** | Идентификатор терминала. Выдается Мерчанту Тинькофф Кассой при заведении терминала. | 
**request_key** | **string** | Идентификатор запроса на привязку карты | 
**status** | **string** | Статус привязки карты: * NEW - новая сессия привязки карты; * FORM_SHOWED - показ формы привязки карты; * 3DS_CHECKING - отправка клиента на проверку 3DS; * 3DS_CHECKED - клиент успешно прошел проверку 3DS; * AUTHORIZING - отправка платежа на 0 руб; * AUTHORIZED - платеж на 0 руб прошел успешно; * COMPLETED - карта успешно привязана; * REJECTED - привязать карту не удалось. | 
**success** | **bool** | Выполнение платежа | 
**card_id** | **string** | Идентификатор карты в системе Тинькофф Кассы | [optional] 
**rebill_id** | **string** | Идентификатор рекуррентного платежа | [optional] 
**error_code** | **string** | Код ошибки. «0» в случае успеха | [optional] 
**message** | **string** | Краткое описание ошибки | [optional] 
**details** | **string** | Подробное описание ошибки | [optional] 
**customer_key** | **string** | Идентификатор клиента в системе Мерчанта | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


