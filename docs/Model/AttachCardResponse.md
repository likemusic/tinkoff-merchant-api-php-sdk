# AttachCardResponse

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**terminal_key** | **string** | Платежный ключ, выдается Мерчанту при заведении терминала | 
**customer_key** | **string** | Идентификатор клиента в системе Мерчанта | 
**request_key** | **string** | Идентификатор запроса на привязку карты | 
**card_id** | **string** | Идентификатор карты в системе Тинькофф Кассы | 
**success** | **bool** | Успешность операции | 
**error_code** | **string** | Код ошибки. «0» в случае успеха | 
**status** | **string** | Статус привязки карты: * NEW - новая сессия привязки карты; * FORM_SHOWED - показ формы привязки карты; * 3DS_CHECKING - отправка клиента на проверку 3DS; * 3DS_CHECKED - клиент успешно прошел проверку 3DS; * AUTHORIZING - отправка платежа на 0 руб; * AUTHORIZED - платеж на 0 руб прошел успешно; * COMPLETED - карта успешно привязана; * REJECTED - привязать карту не удалось. | [optional] 
**rebill_id** | **string** | Идентификатор рекуррентного платежа | [optional] 
**message** | **string** | Краткое описание ошибки | [optional] 
**details** | **string** | Подробное описание ошибки | [optional] 
**acs_url** | **string** | Адрес сервера управления доступом, для проверки 3DS (возвращается в ответе на статус 3DS_CHECKING) | [optional] 
**md** | **string** | Уникальный идентификатор транзакции в системе Тинькофф Кассы (возвращается в ответе на статус 3DS_CHECKING) | [optional] 
**pa_req** | **string** | Результат аутентификации 3-D Secure (возвращается в ответе на статус 3DS_CHECKING) | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


