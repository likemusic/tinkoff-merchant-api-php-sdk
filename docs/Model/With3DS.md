# With3DS

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**md** | **string** | Уникальный идентификатор транзакции в системе Тинькофф Кассы | [optional] 
**pa_req** | **string** | Шифрованная строка, содержащая результаты 3-D Secure аутентификации (возвращается в ответе от ACS) | [optional] 
**acs_url** | **string** | Если в ответе метода **FinishAuthorize** возвращается статус **3DS_CHECKING**,  Мерчанту необходимо сформировать запрос на URL ACS банка,  выпустившего карту (в ответе параметр &#x60;ACSUrl&#x60;) и вместе с этим перенаправить клиента на эту же страницу ACSUrl для прохождения 3DS | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


