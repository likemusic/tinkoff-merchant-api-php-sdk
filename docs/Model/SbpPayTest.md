# SbpPayTest

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**terminal_key** | **string** | Идентификатор терминала, выдается Мерчанту Тинькофф Кассой | 
**payment_id** | **float** | Идентификатор платежа в системе Тинькофф Кассы | 
**token** | **string** | Подпись запроса | 
**is_deadline_expired** | **bool** | Признак эмуляции отказа проведения платежа Банком по таймауту. По умолчанию не используется (эмуляция не требуется). * false – эмуляция не требуется * true – требуется эмуляция (не может быть использован вместе с IsRejected &#x3D; true) | [optional] 
**is_rejected** | **bool** | Признак эмуляции отказа Банка в проведении платежа По умолчанию не используется (эмуляция не требуется) * false – эмуляция не требуется * true – требуется эмуляция (не может быть использован вместе с IsDeadlineExpired &#x3D; true) | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


