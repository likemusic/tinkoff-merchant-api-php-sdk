# GetAccountQrListResponseAccountTokens

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**request_key** | **string** | Идентификатор запроса на привязку карты | [optional] 
**status** | **string** | Статус привязки карты: * NEW - получен запрос на привязку счета; * PROCESSING - запрос в обработке; * ACTIVE - привязка счета успешна; * INACTIVE - привязка счета неуспешна/деактивирована | [optional] 
**account_token** | **string** | Идентификатор привязки счета, назначаемый Банком Плательщика | [optional] 
**bank_member_id** | **string** | Идентификатор банка клиента (эмитент), который будет совершать оплату по привязаному счету - заполнен, если статус ACTIVE, INACTIVE | [optional] 
**bank_member_name** | **string** | Наименование банка-эмитента, заполнен если BankMemberId передан | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


