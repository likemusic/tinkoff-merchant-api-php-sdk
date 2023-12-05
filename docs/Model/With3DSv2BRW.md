# With3DSv2BRW

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**tds_server_trans_id** | **string** | Уникальный идентификатор транзакции,генерируемый 3DS-Server, обязательный параметр для 3DS второй версии | 
**acs_trans_id** | **string** | Идентификатор транзакции,присвоенный ACS, полученный в ответе на FinishAuthorize | 
**acs_url** | **string** | Если в ответе метода **FinishAuthorize** возвращается статус **3DS_CHECKING**,  Мерчанту необходимо сформировать запрос на URL ACS банка,  выпустившего карту (в ответе параметр &#x60;ACSUrl&#x60;) и вместе с этим перенаправить клиента на эту же страницу ACSUrl для прохождения 3DS | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


