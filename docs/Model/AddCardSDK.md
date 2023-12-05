# AddCardSDK

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**terminal_key** | **string** | Идентификатор терминала, выдается Мерчанту Тинькофф Кассой | 
**customer_key** | **string** | Идентификатор клиента в системе Мерчанта | 
**token** | **string** | Подпись запроса | 
**check_type** | **string** | Возможные значения: * NO – сохранить карту без проверок. Rebill ID для рекуррентных платежей не возвращается; * HOLD – при сохранении сделать списание на 0 руб. RebillID возвращается для терминалов без поддержки 3DS. * 3DS – при сохранении карты выполнить проверку 3DS и выполнить списание на 0 р. В этом случае RebillID будет только для 3DS карт. Карты, не поддерживающие 3DS, привязаны не будут. * 3DSHOLD – при привязке карты выполнить проверку, поддерживает карта 3DS или нет. Если карта не поддерживает 3DS, то выполняется списание на 0р | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)

