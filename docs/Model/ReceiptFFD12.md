# ReceiptFFD12

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**ffd_version** | **string** | Версия ФФД. Возможные значения: * \&quot;FfdVersion\&quot;: \&quot;1.2\&quot; * \&quot;FfdVersion\&quot;: \&quot;1.05\&quot; | 
**client_info** | [**\OpenAPI\Client\Model\ClientInfo**](.md) |  | [optional] 
**taxation** | **string** | Система налогообложения. Перечисление с возможными значениями: * \&quot;osn\&quot; - общая СН; * \&quot;usn_income\&quot; - упрощенная СН (доходы); * \&quot;usn_income_outcome\&quot; - упрощенная СН (доходы минус расходы); * \&quot;envd\&quot; - единый налог на вмененный доход; * \&quot;esn\&quot; - единый сельскохозяйственный налог; * \&quot;patent\&quot; - патентная СН. | 
**email** | **string** | Электронная почта клиента. Атрибут должен быть заполнен, если не передано значение  в атрибуте &#x60;Phone&#x60; | [optional] 
**phone** | **string** | Телефон клиента в формате +{Ц} Атрибут должен быть заполнен, если не передано значение  в атрибуте &#x60;Email&#x60; | [optional] 
**customer** | **string** | Идентификатор/Имя клиента | [optional] 
**customer_inn** | **string** | ИНН клиента | [optional] 
**items** | [**\OpenAPI\Client\Model\ItemsFFD12**](ItemsFFD12.md) |  | 
**payments** | [**\OpenAPI\Client\Model\Payments**](Payments.md) |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


