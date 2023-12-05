# Common

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**additional_properties** | **string** |  | [optional] 
**operation_initiator_type** | **string** | Признак инициатора операции * &#39;0&#39; - Оплата без сохранения реквизитов карты для последующего использования. Cценарий \&quot;0 - CIT. Credential-Not-Captured\&quot; * &#39;1&#39; - Используется, если Мерчант сохраняет карту. Cценарий - \&quot;1 - Consumer-Initiated, Credential-Captured\&quot; * &#39;2&#39; - Операция по ранее сохранённой карте, инициирована клиентом. Cценарий - \&quot;2 - Consumer-Initiated, Credential-on-File\&quot; * &#39;R&#39; - Повторяющаяся операция по сохранённой карте без графика. Является Merchant Initiated сценарием (\&quot;R &#x3D; Merchant-Initiated, Credential-on-File, Recurring\&quot;) * &#39;I&#39; - Повторяющаяся операция по сохраненной карте  в соответствии с графиком платежей для погашения кредита. Является Merchant Initiated сценарием (\&quot;I &#x3D; Merchant-Initiated, Credential-on-File, Installment\&quot;) | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


