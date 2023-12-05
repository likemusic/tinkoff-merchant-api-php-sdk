# With3DSv2APP

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**tds_server_trans_id** | **string** | Уникальный идентификатор транзакции,генерируемый 3DS-Server, обязательный параметр для 3DS второй версии | 
**acs_trans_id** | **string** | Идентификатор транзакции,присвоенный ACS, полученный в ответе на FinishAuthorize | 
**acs_interface** | **string** | &#x60;Обязательное поле, если Transaction Status &#x3D; C&#x60;&lt;br&gt; Тип пользовательского интерфейса ACS. &lt;br&gt; Возможные значения:   - 01 - Native UI   - 02 - HTML UI | [optional] 
**acs_ui_template** | **string** | &#x60;Обязательное поле, если Transaction Status &#x3D; C&#x60;&lt;br&gt; Формат шаблона пользовательского интерфейса ACS. &lt;br&gt; Возможные значения:    - 01 - Text   - 02 - Single Select   - 03 - Multi Select   - 04 - OOB   - 05 - HTML Other (valid only for HTML UI) | [optional] 
**acs_signed_content** | **string** | &#x60;Обязательное поле, если Transaction Status &#x3D; C&#x60;&lt;br&gt; JWS object (представленный как string), созданный ACS для ARes. &lt;br&gt; Содержит:   - ACS URL (3DS SDK должен отправить Challenge Request на этот URL)   - ACS Ephemeral Public Key (QT)   - SDK Ephemeral Public Key (QC) | [optional] 
**acs_reference_number** | **string** | Уникальный идентификатор, назначенный EMVCo | 
**sdk_trans_id** | **string** | Уникальный идентификатор транзакции,назначенный 3DS SDK для идентификации одной транзакции,полученный в ответе на FinishAuthorize | 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


