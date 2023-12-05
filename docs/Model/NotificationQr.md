# NotificationQr

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**terminal_key** | **string** | Идентификатор терминала, выдается Мерчанту Тинькофф Кассой | 
**request_key** | **string** | Идентификатор запроса на привязку счета | 
**account_token** | **string** | Идентификатор привязки счета, назначаемый банком-эмитентом | [optional] 
**bank_member_id** | **string** | Идентификатор банка-эмитента клиента, который будет совершать оплату по привязаному счету - заполнен, если статус ACTIVE | [optional] 
**bank_member_name** | **string** | Наименование банка-эмитента, заполнен если BankMemberId передан | [optional] 
**notification_type** | **string** | Тип нотификации, всегда константа «LINKACCOUNT» | [default to 'LINKACCOUNT']
**success** | **bool** | Успешность операции | 
**error_code** | **string** | Код ошибки. «0» в случае успеха | 
**message** | **string** | Краткое описание ошибки | [optional] 
**token** | **string** | Подпись запроса. Формируется по такому же принципу, как и в случае запросов в Тинькофф Кассу | 
**status** | **string** | Cтатус привязки | 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


