# Model3DSv2

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**three_ds_comp_ind** | **string** | &#x60;deviceChannel 02 - BRW&#x60;&lt;br&gt; Идентификатор выполнения 3DS Method: * &#39;Y&#39; - выполнение метода успешно завершено * &#39;N&#39; - выполнение метода завершено неуспешно или метод не выполнялся | 
**language** | **string** | &#x60;deviceChannel 02 - BRW&#x60;&lt;br&gt;  Язык браузера по формату IETF BCP47. Рекомендация по получению значения в браузере (из глобального объекта navigator):&#x60;navigator.language&#x60; | 
**timezone** | **string** | &#x60;deviceChannel 02 - BRW&#x60;&lt;br&gt; Time-zone пользователя в минутах. Рекомендация по получению значения в браузере: вызов метода &#x60;getTimezoneOffset()&#x60; | 
**screen_height** | **string** | &#x60;deviceChannel 02 - BRW&#x60;&lt;br&gt; Высота экрана в пикселях. Рекомендация по получению значения в браузере (из глобального объекта screen): &#x60;screen.height&#x60; | 
**screen_width** | **string** | &#x60;deviceChannel 02 - BRW&#x60;&lt;br&gt; Ширина экрана в пикселях. Рекомендация по получению значения в браузере (из глобального объекта screen): &#x60;screen.width&#x60; | 
**cres_callback_url** | **string** | &#x60;deviceChannel 02 - BRW&#x60;&lt;br&gt; URL который будет использоваться для получения результата (CRES) после завершения Challenge Flow (аутентификаци с дополнительным переходом на страницу ACS) | 
**color_depth** | **string** | &#x60;deviceChannel 02 - BRW&#x60;&lt;br&gt; Глубина цвета в битах. &lt;br&gt; Допустимые значения: 1/4/8/15/16/24/32/48 &lt;br&gt; Рекомендация по получению значения в браузере (из глобального объекта screen): &#x60;screen.colorDepth&#x60; | [optional] [default to '48']
**java_enabled** | **string** | &#x60;deviceChannel 02 - BRW&#x60;&lt;br&gt; Поддерживает ли браузер пользователя Java:  * true * false | [optional] [default to 'false']

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


