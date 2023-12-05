# ItemsFFD12

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**agent_data** | [**\OpenAPI\Client\Model\AgentData**](.md) |  | [optional] 
**supplier_info** | [**\OpenAPI\Client\Model\SupplierInfo**](.md) |  | [optional] 
**name** | **string** | Наименование товара. | 
**price** | **float** | Цена в копейках | 
**quantity** | **float** | Количество или вес товара * Максимальное количество символов - 8, где целая часть не более 5 знаков, а дробная часть не более 3 знаков для Атол, не более 2 знаков для CloudPayments * Значение «1», если передан объект MarkCode | 
**amount** | **float** | Стоимость товара в копейках. Произведение Quantity и Price | 
**tax** | **string** | Ставка НДС. Перечисление со значениями: * none - без НДС; * vat0 - НДС по ставке 0% * vat10 - НДС по ставке 10% * vat20 - НДС по ставке 20% * vat110 - НДС чека по расчетной ставке 10/110 * vat120 - НДС чека по расчетной ставке 20/120 | 
**payment_method** | **string** | Признак способа расчёта.  Возможные значения:  * «full_prepayment» – предоплата 100%  * «prepayment» – предоплата  * «advance» – аванс  * «full_payment» – полный расчет  * «partial_payment» – частичный расчет и кредит  * «credit» – передача в кредит  * «credit_payment» – оплата кредита &lt;br&gt; Если значение не передано, по умолчанию в онлайн-кассу передается признак способа расчёта \&quot;full_payment\&quot;. | 
**payment_object** | **string** | Значения реквизита \&quot;признак предмета расчета\&quot; (тег 1212) таблица 101 Возможные значения: * «commodity» – товар * «excise» – подакцизный товар * «job» – работа * «service» – услуга * «gambling_bet» – ставка азартной игры * «gambling_prize» – выигрыш азартной игры * «lottery» – лотерейный билет * «lottery_prize» – выигрыш лотереи * «intellectual_activity» – предоставление   результатов интеллектуальной деятельности * «payment» – платеж * «agent_commission» – агентское   вознаграждение * «contribution» - Выплата * «property_rights» - Имущественное право * «unrealization» - Внереализационный доход * «tax_reduction» - Иные платежи и взносы * «trade_fee» - Торговый сбор * «resort_tax» - Курортный сбор * «pledge» - Залог * «income_decrease» - Расход * «ie_pension_insurance_without_payments» - Взносы на ОПС ИП * «ie_pension_insurance_with_payments» - Взносы на ОПС * «ie_medical_insurance_without_payments» - Взносы на ОМС ИП * «ie_medical_insurance_with_payments» - Взносы на ОМС * «social_insurance» - Взносы на ОСС * «casino_chips» - Платеж казино * «agent_payment» - Выдача ДС * «excisable_goods_without_marking_code» - АТНМ * «excisable_goods_with_marking_code» - АТМ * «goods_without_marking_code» - ТНМ * «goods_with_marking_code» - ТМ * «another» – иной предмет расчета | 
**user_data** | **string** | Дополнительный реквизит предмета расчета. | [optional] 
**excise** | **string** | Сумма акциза в рублях с учетом копеек, включенная в стоимость предмета расчета. * Целая часть не более 8 знаков; * дробная часть не более 2 знаков; * значение не может быть отрицательным. | [optional] 
**country_code** | **string** | Цифровой код страны происхождения товара в соответствии с Общероссийским классификатором стран мира (3 цифры) | [optional] 
**declaration_number** | **string** | Номер таможенной декларации | [optional] 
**measurement_unit** | **string** | Единицы измерения. Передовать в соответствии с ОК 015-94 (МК 002-97)). &lt;br&gt; Возможные варианты указаны в &lt;a href&#x3D;\&quot;https://www.consultant.ru/document/cons_doc_LAW_362322/0060b1f1924347c03afbc57a8d4af63888f81c6c/\&quot;&gt;статье&lt;/a&gt; (также возможна передача произвольных значений).&lt;br&gt; MeasurementUnit обязателен, в случае если ФФД онлайн-кассы 1.2. | 
**mark_processing_mode** | **string** | Режим обработки кода маркировки. Должен принимать значение равное «0». Включается в чек в случае, если предметом расчета  является товар, подлежащий обязательной маркировке средством идентификации  (соответствующий код в поле paymentObject). | [optional] 
**mark_code** | [**\OpenAPI\Client\Model\MarkCode**](MarkCode.md) |  | [optional] 
**mark_quantity** | [**\OpenAPI\Client\Model\MarkQuantity**](.md) |  | [optional] 
**sectoral_item_props** | [**\OpenAPI\Client\Model\SectoralItemProps**](.md) |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


