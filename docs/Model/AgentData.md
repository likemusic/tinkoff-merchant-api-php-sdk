# AgentData

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**agent_sign** | **string** | Признак агента. Возможные значения: * bank_paying_agent – банковский платежный агент * bank_paying_subagent – банковский платежный субагент * paying_agent – платежный агент * paying_subagent – платежный субагент * attorney – поверенный * commission_agent – комиссионер * another – другой тип агента | [optional] 
**operation_name** | **string** | Наименование операции. Атрибут обязателен, если AgentSign передан в значениях: * bank_paying_agent * bank_paying_subagent | [optional] 
**phones** | **string[]** | Телефоны платежного агента, в формате +{Ц}. Атрибут обязателен, если в AgentSign передан в значениях: * bank_paying_agent * bank_paying_subagent * paying_agent * paying_subagent | [optional] 
**receiver_phones** | **string[]** | Телефоны оператора по приему платежей, в формате +{Ц}. Атрибут обязателен, если в AgentSign передан в значениях: * paying_agent * paying_subagent | [optional] 
**transfer_phones** | **string[]** | Телефоны оператора перевода, в формате +{Ц}. Атрибут обязателен, если в AgentSign передан в значениях: * bank_paying_agent * bank_paying_subagent | [optional] 
**operator_name** | **string** | Наименование оператора перевода. Атрибут обязателен, если в AgentSign передан в значениях: * bank_paying_agent * bank_paying_subagent | [optional] 
**operator_address** | **string** | Адрес оператора перевода. Атрибут обязателен, если в AgentSign передан в значениях: * bank_paying_agent * bank_paying_subagent | [optional] 
**operator_inn** | **string** | ИНН оператора перевода. Атрибут обязателен, если в AgentSign передан в значениях: * bank_paying_agent * bank_paying_subagent | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


