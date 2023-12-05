# AttachCard

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**terminal_key** | **string** | Идентификатор терминала. Выдается Мерчанту Тинькофф Кассой при заведении терминала. | 
**request_key** | **string** | Идентификатор запроса на привязку карты | 
**card_data** | **string** | Зашифрованные данные карты в формате: PAN&#x3D;4300000000000777;ExpDate&#x3D;0519;CardHolder&#x3D;IVAN PETROV;CVV&#x3D;111 | 
**data** | **object** | В объекте передаются дополнительные параметры в формате &#x60;Ключ&#x60;:&#x60;Значение&#x60;  с разделителем &#x60;|&#x60;, например,  &#x60;&#x60;&#x60; {\&quot;javaEnabled\&quot;&#x3D;\&quot;false\&quot;|\&quot;screen_height\&quot;&#x3D;\&quot;854\&quot;} &#x60;&#x60;&#x60;  Если ключи или значения содержат в себе специальные символы, то получившееся значение должно быть закодировано функцией urlencode. Максимальная длина для каждого передаваемого параметра: * Ключ – 20 знаков, * Значение – 100 знаков.   Максимальное количество пар «ключ-значение» не может превышать 20.  &gt;**ВАЖНО!** Для 3DS второй версии в DATA необходимо передавать параметры, описанные в объекте 3DSv2. В HttpHeaders запроса обязательны заголовки: &#x60;User-Agent&#x60; и &#x60;Accept&#x60;. | [optional] 
**token** | **string** | Подпись запроса | 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


