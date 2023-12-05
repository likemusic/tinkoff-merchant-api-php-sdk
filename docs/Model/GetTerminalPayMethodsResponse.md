# GetTerminalPayMethodsResponse

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**success** | **bool** | Успешность операции (true/false) | 
**error_code** | **string** | Код ошибки, «0» - если успешно | 
**message** | **string** | Краткое описание ошибки | [optional] 
**details** | **string** | Подробное описание ошибки | [optional] 
**terminal_info** | [**object**](.md) | Характеристики терминала | 
**terminal_info_paymethods** | [**\OpenAPI\Client\Model\Paymethod[]**](Paymethod.md) | Перечень доступных методов оплаты | [optional] 
**terminal_info_add_card_scheme** | **bool** | Признак возможности сохранения карт | 
**terminal_info_token_required** | **bool** | Признак необходимости подписания токеном | 
**terminal_info_init_token_required** | **bool** | Признак необходимости подписания токеном запроса /init | 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


