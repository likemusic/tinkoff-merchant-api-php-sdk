# GetQRStateResponseSDK

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**success** | **bool** | Успешность операции | 
**error_code** | **string** | Код ошибки. «0» в случае успеха | 
**status** | **string** | Статус платежа * Обязателен, если не произошло ошибки при получении статуса | [optional] 
**qr_cancel_code** | **string** | Код ошибки возврата, полученный от СБП | [optional] 
**qr_cancel_message** | **string** | Дополнительное описание ошибки, прозошедшей при возврате по QR | [optional] 
**order_id** | **string** | Номер заказа в системе Мерчанта | [optional] 
**amount** | **float** | Сумма отмены в копейках | [optional] 
**message** | **string** | Краткое описание ошибки, произошедшей при запросе статуса | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


