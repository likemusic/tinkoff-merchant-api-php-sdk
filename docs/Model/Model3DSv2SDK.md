# Model3DSv2SDK

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**sdk_app_id** | **string** | &#x60;deviceChannel 01 - APP&#x60;&lt;br&gt; Уникальный идентификатор приложения 3DS Requestor, который формируется 3DS SDK при каждой установке или обновлении приложения | 
**sdk_enc_data** | **string** | &#x60;deviceChannel 01 - APP&#x60;&lt;br&gt; Данные, собранные SDK. &lt;br&gt; JWE объект, полученный от 3DS SDK. &lt;br&gt; Должен быть дополнительно закодирован в &#x60;base64&#x60; строку | 
**sdk_ephem_pub_key** | **string** | &#x60;deviceChannel 01 - APP&#x60;&lt;br&gt; Компонент public key пары ephemeral key, сгенерированный 3DS SDK.  &lt;br&gt; JWE объект, полученный от 3DS SDK, должен быть дополнительно закодирован в &#x60;base64&#x60; строку | 
**sdk_max_timeout** | **string** | &#x60;deviceChannel 01 - APP&#x60;&lt;br&gt; Максимальное количество времени (в минутах) | 
**sdk_reference_number** | **string** | &#x60;deviceChannel 01 - APP&#x60;&lt;br&gt; Поставщик и версия 3DS SDK | 
**sdk_trans_id** | **string** | &#x60;deviceChannel 01 - APP&#x60;&lt;br&gt; Уникальный идентификатор транзакции, назначенный 3DS SDK для идентификации одной транзакции | 
**sdk_interface** | **string** | &#x60;deviceChannel 01 - APP&#x60;&lt;br&gt; Список поддерживаемых интерфейсов SDK. &lt;br&gt; Поддерживаемые значения: * 01 &#x3D; Native * 02 &#x3D; HTML * 03 &#x3D; Both | 
**sdk_ui_type** | **string** | &#x60;deviceChannel 01 - APP&#x60;&lt;br&gt; Список поддерживаемых типов UI. &lt;br&gt; Значения для каждого интерфейса: * Native UI &#x3D; 01–04 * HTML UI &#x3D; 01–05 &lt;br&gt; Поддерживаемые значения: * 01 &#x3D; Text * 02 &#x3D; Single Select * 03 &#x3D; Multi Select * 04 &#x3D; OOB * 05 &#x3D; HTML Other (valid only for HTML UI) | 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


