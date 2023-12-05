# SupplierInfo

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**phones** | **string[]** | Телефон поставщика, в формате +{Ц}. Атрибут обязателен, если передается значение &#x60;AgentSign&#x60; в объекте &#x60;AgentData&#x60; | [optional] 
**name** | **string** | Наименование поставщика. Атрибут обязателен, если передается значение &#x60;AgentSign&#x60;  в объекте &#x60;AgentData&#x60;. Внимание: в данные 239 символов включаются телефоны поставщика  + 4 символа на каждый телефон. Например, если передано два телефона поставщика длиной 12 и 14 символов,  то максимальная длина наименования поставщика будет  239 – (12 + 4) – (14 + 4) &#x3D; 205 символов | [optional] 
**inn** | **string** | ИНН поставщика, в формате ЦЦЦЦЦЦЦЦЦЦ. Атрибут обязателен, если передается значение &#x60;AgentSign&#x60;  в объекте &#x60;AgentData&#x60;. | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


