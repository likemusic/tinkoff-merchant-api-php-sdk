# InlineResponse200

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**version** | **string** | Версия протокола 3DS.  Пример: * \&quot;1.0.0” – первая версия * “2.1.0” – вторая версия | 
**tds_server_trans_id** | **string** | Уникальный идентификатор транзакции, генерируемый 3DS-Server, обязательный параметр для 3DS второй версии. | [optional] 
**three_ds_method_url** | **string** | Дополнительный параметр для 3DS второй версии, который позволяет пройти этап по сбору данных браузера ACS-ом | [optional] 
**payment_system** | **string** | Платежная система карты | 
**success** | **bool** | Выполнение платежа | 
**error_code** | **string** | Код ошибки. «0» в случае успеха | 
**message** | **string** | Краткое описание ошибки | [optional] 
**details** | **string** | Подробное описание ошибки | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


