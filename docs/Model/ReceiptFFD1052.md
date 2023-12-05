# ReceiptFFD1052

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**items** | [**\OpenAPI\Client\Model\ItemsFFD105[]**](ItemsFFD105.md) | Массив позиций чека с информацией о товарах | [optional] 
**ffd_version** | **string** | Версия ФФД. Возможные значения: * \&quot;FfdVersion\&quot;: \&quot;1.2\&quot; * \&quot;FfdVersion\&quot;: \&quot;1.05\&quot; По умолчанию версия ФФД - 1.05 | [optional] [default to '1.05']
**email** | **string** | Электронная почта клиента. Атрибут должен быть заполнен, если не передано значение  в атрибуте “Phone” | [optional] 
**phone** | **string** | Телефон клиента в формате +{Ц} | [optional] 
**taxation** | **string** | Система налогообложения. Перечисление с возможными значениями: * \&quot;osn\&quot; - общая СН; * \&quot;usn_income\&quot; - упрощенная СН (доходы); * \&quot;usn_income_outcome\&quot; - упрощенная СН (доходы минус расходы); * \&quot;envd\&quot; - единый налог на вмененный доход; * \&quot;esn\&quot; - единый сельскохозяйственный налог; * \&quot;patent\&quot; - патентная СН. | [optional] 
**payments** | [**\OpenAPI\Client\Model\Payments[]**](Payments.md) | Объект c информацией о видах суммы платежа. * Если объект не передан, будет автоматически указана итоговая сумма чека с видом оплаты \&quot;Безналичный\&quot;. * Если передан объект **receipt.Payments**, то значение в **Electronic** должно быть равно итоговому значению Amount в методе **Init**. При этом сумма введенных значений по всем видам оплат, включая Electronic, должна быть равна сумме (Amount) всех товаров, переданных в объекте **receipt.Items**. | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


