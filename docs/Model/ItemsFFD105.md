# ItemsFFD105

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Наименование товара. | 
**price** | **float** | Цена в копейках | 
**quantity** | **float** | Количество или вес товара - Максимальное количество символов - 8, где целая часть не более 5 знаков, а дробная часть не более 3 знаков для АТОЛ, не более 2 знаков для CloudPayments | 
**amount** | **float** | Стоимость товара в копейках. Произведение Quantity и Price | 
**payment_method** | **string** | Признак способа расчёта.  Возможные значения: * «lfull_prepayment» – предоплата 100% * «lprepayment» – предоплата * «ladvance» – аванс * «lfull_payment» – полный расчет * «lpartial_payment» – частичный расчет и кредит * «lcredit» – передача в кредит * «lcredit_payment» – оплата кредита &lt;br&gt;Если значение не передано, по умолчанию в онлайн-кассу передается признак способа расчёта \&quot;full_payment\&quot;. | [optional] [default to 'full_payment']
**payment_object** | **string** | Признак предмета расчёта. Возможные значения: * commodity – товар * excise – подакцизный товар * job – работа * service – услуга * gambling_bet – ставка азартной игры * gambling_prize – выигрыш азартной игры * lottery – лотерейный билет * lottery_prize – выигрыш лотереи * intellectual_activity – предоставление результатов интеллектуальной деятельности * payment – платеж * agent_commission – агентское вознаграждение * composite – составной предмет расчета * another – иной предмет расчета &lt;br&gt;Если значение не передано, по умолчанию в онлайн-кассу отправляется признак предмета расчёта \&quot;commodity\&quot;. | [optional] [default to 'commodity']
**tax** | **string** | Ставка НДС. Перечисление со значениями: * none - без НДС; * vat0 - НДС по ставке 0% * vat10 - НДС по ставке 10% * vat20 - НДС по ставке 20% * vat110 - НДС чека по расчетной ставке 10/110 * vat120 - НДС чека по расчетной ставке 20/120 | 
**ean13** | **string** | Штрих-код в требуемом формате. В зависимости от типа кассы требования могут отличаться: * АТОЛ Онлайн - шестнадцатеричное представление с пробелами. Максимальная длина – 32 байта (^[a-fA-F0-9]{2}$)|(^([afA-F0-9]{2}\\\\s){1,31}[a-fA-F0-9]{2}$) Пример: 00 00 00 01 00 21 FA 41 00 23 05 41 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 12 00 AB 00 * CloudKassir - длина строки: четная, от 8 до 150 байт, т.е. от 16 до 300 ASCII символов [&#39;0&#39; - &#39;9&#39; , &#39;A&#39; - &#39;F&#39; ] шестнадцатеричного представления кода маркировки товара. Пример: 303130323930303030630333435 * OrangeData - строка, содержащая base64 кодированный массив от 8 до 32 байт Пример: igQVAAADMTIzNDU2Nzg5MDEyMwAAAAAAAQ&#x3D;&#x3D; &lt;br&gt;В случае передачи в запросе параметра Ean13 не прошедшего валидацию, возвращается неуспешный ответ с текстом ошибки в параметре message &#x3D; \&quot;Неверный параметр Ean13\&quot;. | [optional] 
**shop_code** | **string** | Код магазина. Для параметра ShopСode необходимо использовать значение параметра Submerchant_ID, полученного в ответ при регистрации магазинов через xml. Если xml не используется, передавать поле не нужно | [optional] 
**agent_data** | [**\OpenAPI\Client\Model\AgentData**](AgentData.md) |  | [optional] 
**supplier_info** | [**\OpenAPI\Client\Model\SupplierInfo**](SupplierInfo.md) |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


