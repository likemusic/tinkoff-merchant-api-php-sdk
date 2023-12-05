# GetAddAccountQrStateResponse

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**terminal_key** | **string** | Платежный ключ, выдается Мерчанту при заведении терминала | 
**request_key** | **string** | Идентификатор запроса на привязку счета | 
**bank_member_id** | **string** | Идентификатор Банка клиента, который будет совершать оплату по привязаному счету - заполнен, если статус ACTIVE, INACTIVE | [optional] 
**bank_member_name** | **string** | Наименование Банка-эмитента, заполнен если BankMemberId передан | [optional] 
**account_token** | **string** | Идентификатор привязки счета, назначаемый Банком Плательщика | [optional] 
**success** | **bool** | Успешность операции | 
**status** | **string** | Статус привязки карты: * NEW - получен запрос на привязку счета; * PROCESSING - запрос в обработке; * ACTIVE - привязка счета успешна; * INACTIVE - привязка счета неуспешна/деактивирована | 
**error_code** | **string** | Код ошибки. «0» в случае успеха | 
**message** | **string** | Краткое описание ошибки | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


