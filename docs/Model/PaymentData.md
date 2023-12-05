# PaymentData

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**terminal_key** | **string** | Идентификатор терминала, выдается Мерчанту Тинькофф Кассой | 
**amount** | **float** | Сумма в копейках. Параметр \&quot;Amount\&quot; должен быть равен сумме всех параметров \&quot;Amount\&quot;, переданных в объекте Items | 
**order_id** | **string** | Уникальный номер заказа в системе Мерчанта | [optional] 
**description** | **string** | Краткое описание | [optional] 
**data** | [**object**](.md) | JSON объект, содержащии дополнительные параметры в виде \&quot;ключ\&quot; - «значение». Данные параметры будут переданы на страницу оплаты (в случае ее кастомизации). &lt;br&gt; Максимальная длина для каждого передаваемого параметра! &lt;br&gt; ключ - 20 знаков; &lt;br&gt; значение - 100 знаков. &lt;br&gt; Максимальное количество пар «ключ значение» не может превышать 20. | [optional] 
**receipt** | [**\OpenAPI\Client\Model\ReceiptFFD105**](ReceiptFFD105.md) |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


