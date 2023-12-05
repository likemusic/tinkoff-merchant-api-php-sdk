# InitFULL

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**terminal_key** | **string** | Идентификатор терминала.  Выдается Мерчанту Тинькофф Кассой при заведении терминала | 
**amount** | **float** | * Сумма в копейках. Например, сумма 3руб. 12коп. - это число 312 * Параметр должен быть равен сумме всех параметров &#x60;Amount&#x60;, переданных в объекте &#x60;Items&#x60; * Минимальная сумма операции с помощью СБП составляет 10 руб. | 
**order_id** | **string** | Идентификатор заказа в системе Мерчанта | 
**token** | **string** | Подпись запроса. | 
**description** | **string** | Описание заказа.  * Поле необходимо обязательно заполнять для осуществления привязки и одновременной оплаты по CБП. При оплате через СБП данная информация будет отображена в приложении мобильного банка клиента. Максимально допустимое количество знаков для передачи назначения платежа в СБП - 140 символов. | [optional] 
**customer_key** | **string** | Идентификатор клиента в системе Мерчанта. * Обязателен, если передан атрибут &#x60;Recurrent&#x60;.  * Если был передан в запросе, в нотификации будет указан &#x60;CustomerKey&#x60; и его &#x60;CardId&#x60;. См. метод [GetCardList](#tag/Metody-raboty-s-kartami/paths/~1GetCardList/post). * Необходим для сохранения карт на платежной форме (платежи в один клик). * Не является обязательным при реккурентных платежах через СБП. | [optional] 
**recurrent** | **string** | Признак родительского рекуррентного платежа.  * Для регистрации автоплатежа - обязателен. Если передается и установлен в Y, то регистрирует платеж как рекуррентный. В этом случае после оплаты в нотификации на AUTHORIZED будет передан параметр RebillId для использования в методе [Charge](#tag/Rekurrentnyj-platyozh/paths/~1Charge/post). Для осуществления привязки и одновременной оплаты по CБП необходимо передавать &#39;Y&#39; | [optional] 
**pay_type** | **string** | Определяет тип проведения платежа – двухстадийная или одностадийная оплата. * \&quot;O\&quot; - одностадийная оплата, * \&quot;T\&quot; - двухстадийная оплата Если параметр передан - используется его значение. Если нет - значение в настройках терминала. | [optional] 
**language** | **string** | Язык платежной формы. * ru — русский * en — английский.  Если не передан, форма откроется на русском языке | [optional] 
**notification_url** | **string** | URL на веб-сайте Мерчанта, куда будет отправлен POST запрос о статусе выполнения вызываемых методов  (настраивается в Личном кабинете): * Если параметр передан – используется его значение. * Если нет – значение в настройках терминала. | [optional] 
**success_url** | **string** | URL на веб-сайте Мерчанта, куда будет переведен клиент в случае успешной оплаты (настраивается в Личном кабинете): * Если параметр передан – используется его значение. * Если нет – значение в настройках терминала. | [optional] 
**fail_url** | **string** | URL на веб-сайте Мерчанта, куда будет переведен клиент в случае неуспешной оплаты (настраивается в Личном кабинете): * Если параметр передан – используется его значение. * Если нет – значение в настройках терминала. | [optional] 
**redirect_due_date** | **object** | Cрок жизни ссылки или динамического QR-кода СБП (если выбран данный способ оплаты). Если текущая дата превышает дату, переданную в данном параметре, ссылка для оплаты или возможность платежа по QR-коду становятся недоступными и платёж выполнить нельзя. * Максимальное значение: 90 дней от текущей даты. * Минимальное значение: 1 минута от текущей даты. * Формат даты: YYYY-MM-DDTHH24:MI:SS+GMT * Пример даты: 2016-08-31T12:28:00+03:00 &lt;br&gt; Если не передан, принимает значение 24 часа для платежа  и 30 дней для счета  В случае, если параметр RedirectDueDate не был передан, проверяется настроечный параметр платежного терминала REDIRECT_TIMEOUT, который может содержать значение срока жизни ссылки в часах. Если его значение больше нуля, то оно будет установлено в качестве срока жизни ссылки или динамического QR-кода. Иначе, устанавливается значение «по умолчанию» - 1440 мин.(1 сутки) | [optional] 
**data** | **object** | JSON-объект, который позволяет передавать дополнительные параметры по операции и задавать определенные настройки в формате \&quot;ключ\&quot;:\&quot;значение\&quot;.  Максимальная длина для каждого передаваемого параметра:   * Ключ - 20 знаков   * Значение - 100 знаков.  Максимальное количество пар \&quot;ключ\&quot;:\&quot;значение\&quot; - 20.  1. Если у терминала включена опция привязки клиента после  успешной оплаты и передается параметр &#x60;CustomerKey&#x60;, то в передаваемых  параметрах &#x60;DATA&#x60; могут присутствовать параметры метода **AddCustomer**.  Если они присутствуют, то автоматически привязываются к клиенту. Например, если указать:  &#x60;&#x60;&#x60; \&quot;DATA\&quot;:{\&quot;Phone\&quot;:\&quot;+71234567890\&quot;, \&quot;Email\&quot;:\&quot;a@test.com\&quot;} &#x60;&#x60;&#x60;  к клиенту автоматически будут привязаны данные Email и телефон,  и они будут возвращаться при вызове метода **GetCustomer**.      Для МСС 4814 обязательно передать значение в параметре &#x60;Phone&#x60;.     Требования по заполнению:        * минимум 7 символов       * максимум 20 символов       * разрешены только цифры, исключение - первый символ может быть «+»      Для МСС 6051 и 6050 обязательно передать параметр &#x60;account&#x60; (номер электронного кошелька, не должен превышать 30 символов). Пример:     &#x60;&#x60;&#x60;     \&quot;DATA\&quot;: {\&quot;account\&quot;:\&quot;123456789\&quot;}     &#x60;&#x60;&#x60; 2. Если используется функционал сохранения карт на платежной форме,  то при помощи опционального параметра &#x60;DefaultCard&#x60; можно задать  какая карта будет выбираться по умолчанию.  Возможные варианты: * Оставить платежную форму пустой. Пример:   &#x60;&#x60;&#x60;   \&quot;DATA\&quot;:{\&quot;DefaultCard\&quot;:\&quot;none\&quot;}   &#x60;&#x60;&#x60; * Заполнить данными передаваемой карты. В этом случае передается &#x60;CardId&#x60;. Пример:   &#x60;&#x60;&#x60;    \&quot;DATA\&quot;:{\&quot;DefaultCard\&quot;:\&quot;894952\&quot;}   &#x60;&#x60;&#x60; * Заполнить данными последней сохраненной карты. Применяется, если параметр &#x60;DefaultCard&#x60; не передан, передан с некорректным значением или в значении null. По умолчанию возможность сохранение карт на платежной форме может быть отключена. Для активации обратитесь в службу технической поддержки.  3. При реализации подключения оплаты через Yandex Pay Web или Tinkoff Pay Web, необходимо обязательно передавать следующие параметры в объекте Data. Пример:   &#x60;&#x60;&#x60;   \&quot;DATA\&quot;: {     \&quot;TinkoffPayWeb\&quot;: \&quot;true\&quot;,     \&quot;Device\&quot;: \&quot;Desktop\&quot;,     \&quot;DeviceOs\&quot;: \&quot;iOS\&quot;,     \&quot;DeviceWebView\&quot;: \&quot;true\&quot;,     \&quot;DeviceBrowser\&quot;: \&quot;Safari\&quot;    }   &#x60;&#x60;&#x60; где следует передать параметры устройства, с которого будет осуществлен переход.  4. Параметр &#x60;notificationEnableSource&#x60; позволяет отправлять нотификации только если Source (также присутствует в параметрах сессии) платежа входит в перечень указанных в параметре. Возможные варианты: TinkoffPay, sbpqr, YandexPay. Пример:  &#x60;&#x60;&#x60;  notificationEnableSource&#x3D;TinkoffPay  &#x60;&#x60;&#x60;   5. Для осуществления привязки и одновременной оплаты по CБП необходимо передавать параметр \&quot;QR\&quot; &#x3D; \&quot;true\&quot; | [optional] 
**receipt** | **object** | JSON-объект с данными чека. Обязателен, если подключена онлайн-касса. | [optional] 
**shops** | [**\OpenAPI\Client\Model\Shops[]**](Shops.md) | JSON-объект с данными Маркетплейса. Обязательный для маркетплейсов. | [optional] 
**descriptor** | **string** | Динамический дескриптор точки | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)

