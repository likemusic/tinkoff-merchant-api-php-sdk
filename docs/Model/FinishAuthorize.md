# FinishAuthorize

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**terminal_key** | **string** | Идентификатор терминала. Выдается Мерчанту Тинькофф Кассой при заведении терминала. | 
**amount** | **float** | Сумма в копейках | 
**order_id** | **string** | Идентификатор заказа в системе Мерчанта | 
**success** | **bool** | Успешность операции (true/false) | 
**status** | **string** | Статус транзакции. Получает в ответе 1 из 4 статусов платежа:   * CONFIRMED - при одностадийной оплате   * AUTHORIZED - при двухстадийной оплате   * 3DS_CHECKING - при необходимости прохождения проверки 3-DSecure   * REJECTED - при неуспешном прохождении платежа | 
**payment_id** | **string** | Идентификатор платежа в системе Тинькофф Кассы | [optional] 
**error_code** | **string** | Код ошибки. «0» в случае успеха | 
**message** | **string** | Краткое описание ошибки | [optional] 
**details** | **string** | Подробное описание ошибки | [optional] 
**rebill_id** | **string** | Идентификатор рекуррентного платежа | [optional] 
**card_id** | **string** | Идентификатор карты в системе Тинькофф Кассы. Передается только для сохраненной карты | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


