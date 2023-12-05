# Confirm

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**terminal_key** | **string** | Идентификатор терминала выдается Мерчанту Тинькофф Кассой | 
**payment_id** | **float** | Идентификатор платежа в системе Тинькофф Кассы | 
**token** | **string** | Подпись запроса (хэш SHA-256) | 
**ip** | **string** | IP-адрес клиента | [optional] 
**amount** | **float** | Сумма в копейках (если не передан, используется &#x60;Amount&#x60;, переданный в методе **Init**) | [optional] 
**receipt** | [**object**](.md) | JSON-объект с данными чека. Обязателен, если подключена онлайн-касса. | [optional] 
**shops** | [**\OpenAPI\Client\Model\Shops[]**](Shops.md) | Обязательный для маркетплейсов. JSON-объект с данными Маркетплейса. | [optional] 
**route** | **string** | Способ платежа.  * При проведении платежа в «Рассрочку» необходимо передавать значение TCB * При проведении платежа «Долями» необходимо передавать значение BNPL | [optional] 
**source** | **string** | Источник платежа.  * При проведении платежа в «Рассрочку» необходимо передавать значение installment * При проведении платежа «Долями» необходимо передавать значение BNPL | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


