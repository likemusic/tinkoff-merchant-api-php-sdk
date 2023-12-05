# NotificationFiscalization

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**terminal_key** | **string** | Идентификатор терминала. Выдается Мерчанту Тинькофф Кассой при заведении терминала. | [optional] 
**order_id** | **string** | Идентификатор заказа в системе Мерчанта | [optional] 
**success** | **bool** | Выполнение платежа | [optional] 
**status** | **string** | Для нотификации о фискализации значение всегда RECEIPT | [optional] [default to 'RECEIPT']
**payment_id** | **float** | Идентификатор платежа в системе Тинькофф Кассы | [optional] 
**error_code** | **string** | Код ошибки. «0» в случае успеха | [optional] 
**error_message** | **string** | Описание ошибки, если она произошла | [optional] 
**amount** | **float** | Сумма в копейках | [optional] 
**fiscal_number** | **int** | Номер чека в смене | [optional] 
**shift_number** | **int** | Номер смены | [optional] 
**receipt_datetime** | **string** | Дата и время документа из ФН | [optional] 
**fn_number** | **string** | Номер ФН | [optional] 
**ecr_reg_number** | **string** | Регистрационный номер ККТ | [optional] 
**fiscal_document_number** | **int** | Фискальный номер документа | [optional] 
**fiscal_document_attribute** | **int** | Фискальный признак документа | [optional] 
**receipt** | [**object**](.md) | Состав чека | [optional] 
**type** | **string** | Признак расчета | [optional] 
**token** | **string** | Подпись запроса. Формируется по такому же принципу, как и в случае запросов в Тинькофф Кассу | [optional] 
**ofd** | **string** | Наименование оператора фискальных данных | [optional] 
**url** | **string** | URL адрес с копией чека | [optional] 
**qr_code_url** | **string** | URL адрес с QR кодом для проверки чека в ФНС | [optional] 
**calculation_place** | **string** | Место осуществления расчетов | [optional] 
**cashier_name** | **string** | Имя кассира | [optional] 
**settle_place** | **string** | Место нахождения (установки) ККМ | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


