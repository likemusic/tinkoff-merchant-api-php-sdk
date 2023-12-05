# OpenAPIClient-php
# История изменений | **Описание изменений** | **Дата** | | ------ | -------- | | Создан документ | 26.05.2023 |  # Введение ## Подключение эквайринга Для начала работы с интернет-эквайрингом, оставьте [заявку на подключение](https://www.tinkoff.ru/kassa/solution/classic/). После подписания документов, вы получите доступ в личный кабинет Мерчанта, в котором можно найти публичный ключ терминала `TerminalKey`.   ## Способы интеграции ### Merchant API Merchant API - один из инструментов интернет-эквайринга Тинькофф Кассы для приема платежей на мобильных устройствах и в вебе. С помощью Merchant API (далее MAPI) Мерчанты могут настроить прием платежей на своих сайтах.  >Инструкция по использованию MAPI написана для разработчиков и тех, кто хочет самостоятельно настроить вызов платежной формы Тинькофф на своих ресурсах. Если вам нужен более простой инструмент, попробуйте другие способы интеграции. ### Платежный виджет Позволяет оперативно добавить форму оплаты на сайт. Для этого необходимо просто вставить готовый код на сайт в то место, где должна быть кнопка оплаты. Виджет является частью платежной формы. Подробнее по [ссылке](https://www.tinkoff.ru/kassa/develop/widget/install/).   ### Платежный модуль Модуль интернет-эквайринга Тинькофф, который можно добавить на сайт через CMS. Подробнее по [ссылке](https://www.tinkoff.ru/kassa/develop/cms/).  ### Мобильный SDK Вы можете настроить прием платежей в своём мобильном приложении с помощью эквайрингового SDK. * [SDK Android](https://github.com/tinkoff-mobile-tech/AcquiringSdkAndroid) * [SDK IOS](https://github.com/tinkoff-mobile-tech/AcquiringSdk_IOS)  ## Платежная форма Платежная форма - это готовый интерфейс с встроенными способами оплаты, который позволяет принимать платежи онлайн.  Для использования платежной формы необходимо подключить интернет-эквайринг, настроить терминал и интегрировать платежную форму на ваш сайт одним из способов выше(кроме SDK) ### Платежная форма в webview Некоторые webview не умеют обрабатывать DeepLink ссылки. Из-за этого способы оплаты, которые осуществляют переход в мобильное приложение во время платежа (СБП, Mir pay, Tinkoff pay), могут работать некорректно.  В случае использования платежной формы в webview необходимо учесть особенности вашей интеграции и сделать необходимые доработки для поддержки DeepLink.   По результатам доработок необходимо дополнительно протестировать корректную работу всех способов оплат. В случае обнаружения проблем, требуется связаться с разработчиками webview модуля для их устранения, либо рекомендуется отключить неработающие способы оплаты. **Ссылки с примерами решений**: 1. [Первое решение(java,kotlin)](https://razorpay.com/docs/payments/payment-gateway/web-integration/standard/webview/upi-intent-android/#13-handle-deep-links-in-shouldoverrideurlloading-) 2. [Второе решение(java)](https://stackoverflow.com/questions/25672330/how-to-enable-deep-linking-in-webview-on-android-app)  ### Платежная форма в iframe Не рекомендуется использовать платежную форму в iframe для мобильных версий сайтов, т.к. у кнопочных способов оплаты могут возникать проблемы с открытием DeepLink и переходов в мобильное приложение для оплаты (СБП, Mir pay, Tinkoff pay). Это связано с тем, что Iframe является изолированным контейнером, из-за этого переходы на сторонние ссылки не могут быть обработаны внутри iframe.   Если в мобильной версии сайта использование iframe обязательно, вам необходимо сделать доработки согласно инструкции ниже, чтобы вы могли использовать кнопочные способы оплаты. Она позволит произвести переход в стороннее приложение. Доработки представляют собой скрипт \"снаружи\" iframe, который получит сообщение о переходе от iframe и вызовет его на основной странице.  После реализации доработок необходимо протестировать корректную работу всех способов оплат. В случае проблем и вопросов вы можете обратиться в нашу поддержку acq_help@tinkoff.ru  В десктопной версии iframe кнопочные способы оплаты будут работать без специальных доработок.   <details><summary><b>Инструкция по доработкам для mobile iframe</b></summary> <br> Iframe является изолированным контейнером, из-за этого переходы на сторонние ссылки не могут быть обработаны внутри iframe (переход будет внутри iframe). Чтобы произвести переход в стороннее приложение требуется скрипт \"снаружи\" iframe, который получит сообщение о переходе от iframe и вызовет его на основной странице.  В случае если у вас подключены способы оплаты, использующие deeplink, а именно: Tinkoff pay, СБП или Mir pay, то в процессе оплаты может возникать ошибка.   ##### Информация Скрипт общается с фреймом по средствам *window.postMessage()*.  Добавление скрипта решает проблему передачи ссылки на ресурс платежного сервиса, для способов оплаты использующих DeepLink. Данная проблема может возникнуть при попытке передачи ссылки в браузер Клиента, из контейнера Платежной формы расположенного в теге ``<iframe>``. ##### Установка **Не рекомендуется** копировать скрипт полностью в свою сборку. Интерфейс общения с Платежной Формой может изменится, поэтому просьба всегда загружать скрипт из [предоставленного URL](https://kassa.cdn-tinkoff.ru/integration/integration.js)  Простая интеграция (Если используется уже созданный iframe на странице):    Добавьте ссылку на код скрипта iframe.js в HTML-код страницы сайта, на которой располагаться iframe c Платежной формой. Рекомендуем разместить его в конце body после объявления тега iframe. ``` <iframe id=\"payment-form\"></iframe>   <script src=\"https://kassa.cdn-tinkoff.ru/integration/integration.js\"></script> <script>   const paymentForm = new PaymentForm.Integration({iframe: {element: document.getElementById('payment-form')}}); </script> ``` Динамическая интеграция (Если iframe генерируется динамически): ``` <div id=\"payment-form-container\"></div>   <script>   // // Получаем и присваиваем переменной uuid значение уникального идентификатора платежа ( передается в path параметра PaymentURL )   const uuid = \"\";    // Получаем элемент контейнера в который будет встроен iframe   const contentContainer = document.getElementById('payment-form-container')     // Загрузите скрипт   const script = document.createElement(\"script\");   script.type = \"text/javascript\";   script.async = false;   script.src = \"https://kassa.cdn-tinkoff.ru/integration/integration.js\";   script.onload = (): void => {      // Инициализируйте скрипт      const paymentForm = new PaymentForm.Integration({iframe: {element: document.getElementById('payment-form')}});        // Создайте iframe      const element = document.createElement(\"iframe\");      element.src = \"https://securepayments.tinkoff.ru/\" + uuid;      if (contentContainer) {         contentContainer.appendChild(element);      }   };                       document.getElementsByTagName(\"body\")[0].appendChild(script); </script> ``` ##### Настройка Класс Integration принимает 2 аргумента: 1. HTMLIFrameElement - iframe DOM элемент 2. config - необязательный аргумент с конфигурацией PaymentFormIntegrationConfig  PaymentFormIntegrationConfig:    ``` interface PaymentFormIntegrationConfig {   iframe: {     element: HTMLIFrameElement;     /_**      * Используется если скрипт встраивается в промежуточный iframe      *_/     proxy?: true;     /_**      * Вызывается в момент получения deepLink из ПФ      * Стандартное значение: (url) => {window.location.href = url}      * @param url      *_/     deepLinkRedirectCallback?: (url: string) => void;     /_**      * Вызывается в момент получения exit из ПФ      * Например при нажатии кнопки \"Вернуться в магазин\"      * Стандартное значение: (url) => {window.location.href = url}      * @param url      *_/     exitRedirectCallback?: (url: string) => void;   }; } ``` Если Вам не требуется перенаправлять родительскую страницу на возврат в магазин, а требуется просто закрыть модальное окно с платежной формой - замените этот параметр конфигурации  Пример инициализации скрипта с конфигурацией:    ``` const paymentForm = new PaymentForm.Integration({   iframe: {     element: document.getElementById('payment-form'),     exitRedirectCallback: (url) => {       // Вызов закрытия модального окна     }   } }); ``` ##### Iframe внутри iframe Бываю случаи когда приложение используется внутри iframe, который находится внутри другого iframe. В таком случае необходимо встроить скрипт с ключом proxy: true во все промежуточные iframe. Пример инициализации скрипта для основной страницы:    ``` <iframe id=\"payment-form\"></iframe>   <script src=\"https://kassa.cdn-tinkoff.ru/integration/integration.js\"></script> <script>   const paymentForm = new PaymentForm.Integration({iframe: {element: document.getElementById('payment-form')}}); </script> ``` Пример инициализации скрипта для вложенного iframe:  ``` <iframe id=\"payment-form\"></iframe>   <script src=\"https://kassa.cdn-tinkoff.ru/integration/integration.js\"></script> <script>   const paymentForm = new PaymentForm.Integration({iframe: {element: document.getElementById('payment-form'), proxy: true}}); </script> ``` \"Промежуточный\" скрипт, будет перенаправлять сообщения в каждый следующий iframe.  Коллбеки событий будут отрабатывать вызываться в \"промежуточных\" iframe только в случае их переопределения в config. ##### Как работает скрипт Общение между формой и родителем, происходит через *window.postMessage()*.  1. После успешной загрузки, платежная форма внутри iframe отправляет сообщение loaded родителю. 2. После получения loaded из ПФ, скрипт отправляет сообщение ready на Платежную форму, таким образом происходит рукопожатие и платежная форма определяет что может отобразить кнопочные методы оплаты 3. Действиями Клиента на Платежной форме вызывается способ оплаты возвращающий DeepLink на ресурс платежного сервиса. 4. Платежная форма, передает DeepLink в целевое окно клиента, с помощью события deepLink 5. Целевое окно выполняет редирект Клиента, по ссылке полученной в DeepLink, с помощью вызова *deepLinkRedirectCallback* 6. Аналогично передаются и другие сообщения  </details>  ### Кастомизация на платежной форме На платежной форме доступна функция кастомизации, которая позволяет настроить форму под себя и своих клиентов. Для установки кастомизации обратитесь к вашему персональному менеджеру и передайте пожелания по настройкам   #### Список доступных настроек кастомизации:  |**Возможности кастомизации** | **Доп. описание**| |--- | ---| |Управление способами оплаты | <li>менять порядок способов оплаты (кроме Tinkoff pay)</li><li> сворачивать/разворачивать блоки оплаты (оплата картой и рассрочка) </li><li>менять количество отображаемых способов с помощью кнопки \"еще\" (минимум - один способ, максимум - все доступные на ПФ)</li>| |Брендирование UI платежной формы | <li>добавлять лого своей компании на ПФ (логотип отобразится рядом с суммой заказа) </li><li>управлять цветами кнопок (кнопка \"Оплатить\" и другие кнопки со страниц статусов и модальных окон)</li>| |Управление блоком детализации (информация о заказе и магазине) | <li>делать блок свернутым и развернутым по-умолчанию</li><li> скрывать  блок с детализацией на ПФ</li><li>менять порядок строк в детализации</li>| |Управление светлой и темной темой | <li>показывать темную или светлую тему по-умолчанию</li><li>отключать темной/светлой темы</li>|   <!--#### Установить последнюю версию Acquiring SDK  <style> .block { text-decoration: none; padding: 2rem; margin: 2rem; border: 0.2rem solid #dddbd9; border-radius: 1rem; box-shadow: 0 1.5rem 0.5rem -0.5rem rgba(70,70,94,.1);  position: auto;  overflow: auto;  }  .ios_upd { text-decoration: none; padding: 10px; margin: 10px; border: 1px solid #949996; border-radius: 1rem; box-shadow: 0 1.5rem 0.5rem -0.5rem rgba(70,70,94,.1);  position: auto;  overflow: auto; display: none; } .android_upd { text-decoration: none; padding: 10px; margin: 10px; border: 1px solid #949996; border-radius: 1rem; box-shadow: 0 1.5rem 0.5rem -0.5rem rgba(70,70,94,.1);  position: auto;  overflow: auto; display: none; } p:hover + .ios_upd { display: block; } p:hover + .android_upd { display: block; } .updtext {  text-decoration: underline;  text-decoration-style: dotted; } </style> <div class=\"block\">  IOS  <br>  Релиз 3.1.1 от 12.09.2023  <br>  <a href=\"https://github.com/tinkoff-mobile-tech/AcquiringSdk_IOS\">Ссылка на скачивание</a>  <p class=\"updtext\">Что изменилось (?)</p>   <div class=\"ios_upd\">    <ul>     <li>Новая фича </li>     <li>ещё одна новая фича</li>     <li>ещё одна</li>    </ul>   </div> </div> <div class=\"block\">  Android  <br>  Релиз 3.1.2 от 12.09.2023  <br>  <a href=\"https://github.com/tinkoff-mobile-tech/AcquiringSdkAndroid\">Ссылка на скачивание</a>  <p class=\"updtext\">Что изменилось (?)</p>   <div class=\"android_upd\">    <ul>     <li>Новая фича </li>     <li>ещё одна новая фича</li>     <li>ещё одна</li>    </ul>   </div> </div> -->  ## Рекомендации при интеграции Ниже мы расписали несколько рекомендаций, которые необходимо соблюдать при интеграции с MAPI через фронтенд сайта мерчанта, а именно:   1. Наиболее безопасный способ передачи данных от Мерчанта в MAPI — прямая интеграция бэкенда Мерчанта с бэкендом Тинькофф Кассы. В этом случае злоумышленник сможет перехватить запрос только, если окажется в локальной сети Мерчанта;  2. При интеграции с MAPI через фронтенд (в том числе и с помощью нашего платежного виджета), необходимо сверять параметры созданных через платежный виджет заказов. Для того есть два способа:  <br> 2.1. Получение нотификаций:    - **По e-mail**: на указанную почту придет письмо при переходе платежа в статус «CONFIRMED»;    - **По http**: MAPI будет отправлять POST-запрос при каждом изменении статуса платежа на URL, указанный в настройках терминала.    <br> 2.2. Вызов метода GetState, который возвращает основные параметры и текущий статус платежа. Рекомендуется сверять/валидировать дополнительные данные заказа - `PaymentId` и `Amount`.   ## Обработка карточных данных Платежные системы разработали требования к безопасности карточных данных клиентов - **Payment Card Industry Data Security Standard** (PCI DSS). Компания должна пройти сертификацию, чтобы подтвердить надежность управления карточной информацией.  Если у вас нет сертификации PCI DSS, вы можете использовать платежную форму Тинькофф Кассы. В этом случае, все операции, связанные с обработкой критичных данных производятся на стороне Тинькофф Кассы. Мерчанту достаточно настроить интеграцию с MerchantAPI и инициализировать платеж. Клиент будет перенаправлен на платежную форму, в которую он сможет ввести данные карты. Когда платеж завершится, клиент снова увидит сайт Мерчанта. Подробную информацию о подключении  эквайринга смотрите в разделе Non PCI DSS.   Если ваш ресурс соответствует требованиям PCI DSS, то вы можете собирать и хранить карточные данные клиентов. В таком случае, MerchantAPI получает зашифрованные карточные данные от Мерчанта. Подробную информацию о подключении  такого способа смотрите в разделе PCI DSS.   # Какими терминами пользуемся в документации? | **Термин** | Определение | | ------ | -------- | | **Клиент** | Физлицо, производящее перевод с использованием банковской карты на сайте Мерчанта | | **Мерчант** | Бизнес, принимающий и осуществляющий переводы по банковским картам на своем сайте | | **Тинькофф Касса** | Сервис, помогающий проводить выплату клиенту-физлицу | | **Эмитент** | Банк, выпустивший карту клиента-физлица | | **PCI DSS**| Международный стандарт безопасности, созданный для защиты данных банковских карт | | **3-DSecure** | Протокол, который используется как дополнительный уровень безопасности для онлайн-кредитных и дебетовых карт. 3-D Secure добавляет ещё один шаг аутентификации для онлайн-платежей | | **Терминал** | Точка приема платежей Мерчанта (в общем случае привязывается к сайту, на котором осуществляется прием платежей) Далее в этой документации описан протокол для терминала мерчанта | | **ККМ** | Контрольно-кассовая машина| |**Личный кабинет Мерчанта**|[Веб-приложение](https://business.tinkoff.ru/oplata/main), в котором Мерчант управляет интернет-эквайрингом - настраивает параметры терминалов, подтверждает или отменяет платежи, анализирует статистику|   # Параметры терминала Каждый терминал обладает свойствами, которые влияют на те или иные аспекты приёма платежей. Эти свойства настраиваются при подключении интернет-эквайринга и могут быть изменены в Личном кабинете Мерчанта.  В таблице ниже перечислены основые параметры приёма платежей для терминала  |Название параметра|Формат|Описание| |---|---|---| |TerminalKey|20 символов (чувствительно к регистру)|Уникальный символьный ключ терминала. Устанавливается Тинькофф Кассой| |Success URL|250 символов(чувствительно к регистру)| URL на веб-сайте Мерчанта, куда будет переведен клиент в случае успешной оплаты <br> —   true - платеж завершился успешно <br> — false - платеж не завершился * |Fail URL| 250 символов(чувствительно к регистру)|URL на веб-сайте Мерчанта, куда будет переведен клиент в случае неуспешной оплаты * |Success Add Card URL| 250 символов (чувствительно к регистру)|URL на веб-сайте Мерчанта, куда будет переведен клиент после успешной привязки карты *| |Fail Add Card URL| 250 символов(чувствительно к регистру)|URL на веб-сайте Мерчанта, куда будет переведен клиент после неуспешной привязки карты *| |Notification URL| 250 символов(чувствительно к регистру)|URL на веб-сайте Мерчанта, куда будет отправлен POST запрос о статусе выполнения вызываемых методов. Только для методов **Authorize**, **FinishAuthorize**, **Confirm**, **Cancel**| |Валюта терминала|3 символа| Валюта, в которой будут происходить списания по данному терминалу, если иное не передано в запросе| |Активность терминала|Рабочий /Неактивный /Тестовый|Определяет режим работы данного терминала| |Password |20 символов(чувствительно к регистру)|Используется для подписи запросов/ответов. Является секретной информацией, известной только Мерчанту и Тинькофф Кассе. Пароль находится в [личном кабинете](https://business.tinkoff.ru/oplata/main) мерчанта |Отправлять нотификацию на FinishAuthorize|Да/Нет| Определяет, будет ли отправлена нотификация на выполнение метода **FinishAuthorize** (по умолчанию да)| |Отправлять нотификацию на Completed|Да/Нет| Определяет, будет ли отправлена нотификация на выполнение метода **AttachCard** (по умолчанию Да)| |Отправлять нотификацию на Reversed|Да/Нет| Определяет, будет ли отправлена нотификация на выполнение метода **Cancel** (по умолчанию Да)|  \\* *в URL можно указать необходимые параметры в виде ${<параметр>}, которые будут переданы на URL методом GET*  # Подпись запроса Перед выполнением запроса MAPI проверяет, можно ли доверять его инициатору. Для этого сервер проверяет подпись запроса. В MAPI используется механизм подписи с помощью токена. Мерчант должен добавлять токен с каждому запросу, где это требуется.   > В описании входных параметров для каждого метода мы указали, нужно подписывать запрос или нет. Токен формируется на основании тех полей, которые присутствуют в запросе, поэтому токены для каждого запроса уникальные, и не совпадают никогда.  **Токен** в MAPI - это строка, в которой Мерчант зашифровал данные своего запроса с помощью пароля. Для создания токена Мерчант использует пароль из Личного кабинета мерчанта.  Рассмотрим на примере  процесс шифрования тела запроса для метода Init: ```json {   \"TerminalKey\": \"MerchantTerminalKey\",   \"Amount\": 19200,   \"OrderId\": \"21090\",   \"Description\": \"Подарочная карта на 1000 рублей\",   \"Token\": \"68711168852240a2f34b6a8b19d2cfbd296c7d2a6dff8b23eda6278985959346\",   \"DATA\": {     \"Phone\": \"+71234567890\",     \"Email\": \"a@test.com\"   },   \"Receipt\": {     \"Email\": \"a@test.ru\",     \"Phone\": \"+79031234567\",     \"Taxation\": \"osn\",     \"Items\": [       {         \"Name\": \"Наименование товара 1\",         \"Price\": 10000,         \"Quantity\": 1,         \"Amount\": 10000,         \"Tax\": \"vat10\",         \"Ean13\": \"303130323930303030630333435\"       },       {         \"Name\": \"Наименование товара 2\",         \"Price\": 3500,         \"Quantity\": 2,         \"Amount\": 7000,         \"Tax\": \"vat20\"       },       {         \"Name\": \"Наименование товара 3\",         \"Price\": 550,         \"Quantity\": 4,         \"Amount\": 4200,         \"Tax\": \"vat10\"       }     ]   } } ```  Чтобы зашифровать данные запроса Мерчант должен выполнить следующие шаги: 1. Собрать массив передаваемых данных в виде пар Ключ-Значения. В массив нужно добавить только параметры корневого объекта. Вложенные объекты и массивы не участвуют в расчете токена. В примере ниже в массив включены параметры `TerminalKey`, `Amount`, `OrderId`, `Description`  и исключен объект `Receipt` и `DATA`. ``` JSON [{\"TerminalKey\": \"MerchantTerminalKey\"},{\"Amount\": \"19200\"},{\"OrderId\": \"21090\"},{\"Description\": \"Подарочная карта на 1000 рублей\"}] ```  2. Добавить в массив пару {`Password`, Значение пароля}. Пароль можно найти в личном кабинете Мерчанта ``` JSON [{\"TerminalKey\": \"MerchantTerminalKey\"},{\"Amount\": \"19200\"},{\"OrderId\": \"21090\"},{\"Description\": \"Подарочная карта на 1000 рублей\"},{\"Password\": \"usaf8fw8fsw21g\"}] ```  3. Отсортировать массив по алфавиту по ключу. ```JSON [{\"Amount\": \"19200\"},{\"Description\": \"Подарочная карта на 1000 рублей\"},{\"OrderId\": \"21090\"},{\"Password\": \"usaf8fw8fsw21g\"},{\"TerminalKey\": \"MerchantTerminalKey\"}] ```  4. Конкатенировать только **значения** пар в одну строку ```JSON \"19200Подарочная карта на 1000 рублей21090usaf8fw8fsw21gMerchantTerminalKey\" ```  5. Применить к  строке хеш-функцию SHA-256 ```JSON \"0024a00af7c350a3a67ca168ce06502aa72772456662e38696d48b56ee9c97d9\" ```  6. Добавить получившийся результат в значение параметра `Token` в тело запроса и отправить запрос ```JSON {   \"TerminalKey\": \"MerchantTerminalKey\",   \"Amount\": 19200,   \"OrderId\": \"21090\",   \"Description\": \"Подарочная карта на 1000 рублей\",   \"DATA\": {     \"Phone\": \"+71234567890\",     \"Email\": \"a@test.com\"   },   \"Receipt\": {     \"Email\": \"a@test.ru\",     \"Phone\": \"+79031234567\",     \"Taxation\": \"osn\",     \"Items\": [       {         \"Name\": \"Наименование товара 1\",         \"Price\": 10000,         \"Quantity\": 1,         \"Amount\": 10000,         \"Tax\": \"vat10\",         \"Ean13\": \"303130323930303030630333435\"       },       {         \"Name\": \"Наименование товара 2\",         \"Price\": 20000,         \"Quantity\": 2,         \"Amount\": 40000,         \"Tax\": \"vat20\"       },       {         \"Name\": \"Наименование товара 3\",         \"Price\": 30000,         \"Quantity\": 3,         \"Amount\": 90000,         \"Tax\": \"vat10\"       }     ]   },   \"Token\": \"0024a00af7c350a3a67ca168ce06502aa72772456662e38696d48b56ee9c97d9\" } ```

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: 1.0
- Build package: org.openapitools.codegen.languages.PhpClientCodegen
For more information, please visit [https://www.tinkoff.ru/kassa/](https://www.tinkoff.ru/kassa/)

## Requirements

PHP 5.5 and later

## Installation & Usage
### Composer

To install the bindings via [Composer](http://getcomposer.org/), add the following to `composer.json`:

```
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/GIT_USER_ID/GIT_REPO_ID.git"
    }
  ],
  "require": {
    "GIT_USER_ID/GIT_REPO_ID": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
    require_once('/path/to/OpenAPIClient-php/vendor/autoload.php');
```

## Tests

To run the unit tests:

```
composer install
./vendor/bin/phpunit
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new OpenAPI\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$add_account_qr = new \OpenAPI\Client\Model\AddAccountQr(); // \OpenAPI\Client\Model\AddAccountQr | 

try {
    $result = $apiInstance->addAccountQrPost($add_account_qr);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->addAccountQrPost: ', $e->getMessage(), PHP_EOL;
}

?>
```

## Documentation for API Endpoints

All URIs are relative to *https://securepay.tinkoff.ru/v2*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*DefaultApi* | [**addAccountQrPost**](docs/Api/DefaultApi.md#addaccountqrpost) | **POST** /AddAccountQr | Привязка счёта к магазину
*DefaultApi* | [**addCardPost**](docs/Api/DefaultApi.md#addcardpost) | **POST** /AddCard | Инициализация привязки карты к клиенту
*DefaultApi* | [**addCustomerPost**](docs/Api/DefaultApi.md#addcustomerpost) | **POST** /AddCustomer | Регистрация клиента
*DefaultApi* | [**attachCardPost**](docs/Api/DefaultApi.md#attachcardpost) | **POST** /AttachCard | Привязка карты
*DefaultApi* | [**cancelPost**](docs/Api/DefaultApi.md#cancelpost) | **POST** /Cancel | Отмена платежа
*DefaultApi* | [**chargePost**](docs/Api/DefaultApi.md#chargepost) | **POST** /Charge | Автоплатёж
*DefaultApi* | [**chargeQrPost**](docs/Api/DefaultApi.md#chargeqrpost) | **POST** /ChargeQr | Автоплатеж по QR
*DefaultApi* | [**check3dsVersionPost**](docs/Api/DefaultApi.md#check3dsversionpost) | **POST** /Check3dsVersion | Проверка версии 3DS
*DefaultApi* | [**checkOrderPost**](docs/Api/DefaultApi.md#checkorderpost) | **POST** /CheckOrder | Получение статуса заказа
*DefaultApi* | [**confirmPost**](docs/Api/DefaultApi.md#confirmpost) | **POST** /Confirm | Подтверждение платежа
*DefaultApi* | [**finishAuthorizePost**](docs/Api/DefaultApi.md#finishauthorizepost) | **POST** /FinishAuthorize | Подтверждение платежа
*DefaultApi* | [**getAccountQrListPost**](docs/Api/DefaultApi.md#getaccountqrlistpost) | **POST** /GetAccountQrList | Получение списка счетов, привязанных к магазину
*DefaultApi* | [**getAddAccountQrStatePost**](docs/Api/DefaultApi.md#getaddaccountqrstatepost) | **POST** /GetAddAccountQrState | Получение статуса привязки счёта к магазину
*DefaultApi* | [**getAddCardStatePost**](docs/Api/DefaultApi.md#getaddcardstatepost) | **POST** /GetAddCardState | Статус привязки карты
*DefaultApi* | [**getCardListPost**](docs/Api/DefaultApi.md#getcardlistpost) | **POST** /GetCardList | Список карт клиента
*DefaultApi* | [**getConfirmOperationPost**](docs/Api/DefaultApi.md#getconfirmoperationpost) | **POST** /getConfirmOperation | Получение справки по операции
*DefaultApi* | [**getCustomerPost**](docs/Api/DefaultApi.md#getcustomerpost) | **POST** /GetCustomer | Получение данных клиента
*DefaultApi* | [**getQRStatePost**](docs/Api/DefaultApi.md#getqrstatepost) | **POST** /GetQRState | Получение статуса возврата
*DefaultApi* | [**getQrPost**](docs/Api/DefaultApi.md#getqrpost) | **POST** /GetQr | Формирование QR
*DefaultApi* | [**getStatePost**](docs/Api/DefaultApi.md#getstatepost) | **POST** /GetState | Получение статуса платежа
*DefaultApi* | [**initPayments**](docs/Api/DefaultApi.md#initpayments) | **POST** /InitPayments | Инициировать платеж в виджете
*DefaultApi* | [**initPost**](docs/Api/DefaultApi.md#initpost) | **POST** /Init | Инициилизация платежа
*DefaultApi* | [**notificationPost**](docs/Api/DefaultApi.md#notificationpost) | **POST** /Notification | Нотификации
*DefaultApi* | [**removeCardPost**](docs/Api/DefaultApi.md#removecardpost) | **POST** /RemoveCard | Удаление привязанной карты клиента
*DefaultApi* | [**removeCustomerPost**](docs/Api/DefaultApi.md#removecustomerpost) | **POST** /RemoveCustomer | Удаление данных клиента
*DefaultApi* | [**sbpPayTest**](docs/Api/DefaultApi.md#sbppaytest) | **POST** /SbpPayTest | Создание тестовой платежной сессии
*DefaultApi* | [**sendClosingReceiptPost**](docs/Api/DefaultApi.md#sendclosingreceiptpost) | **POST** /SendClosingReceipt | Закрывающий чек в кассу
*DefaultApi* | [**submitRandomAmountPost**](docs/Api/DefaultApi.md#submitrandomamountpost) | **POST** /SubmitRandomAmount | SubmitRandomAmount
*Class3DSApi* | [**submit3DSAuthorizationPost**](docs/Api/Class3DSApi.md#submit3dsauthorizationpost) | **POST** /Submit3DSAuthorization | Подтверждение прохождения 3DS v1.0
*Class3DSApi* | [**submit3DSAuthorizationV2Post**](docs/Api/Class3DSApi.md#submit3dsauthorizationv2post) | **POST** /Submit3DSAuthorizationV2 | Подтверждение прохождения 3DS v2.1
*MirPayApi* | [**getDeepLinkPost**](docs/Api/MirPayApi.md#getdeeplinkpost) | **POST** /GetDeepLink | Получить DeepLink
*MirPayApi* | [**getTerminalPayMethods**](docs/Api/MirPayApi.md#getterminalpaymethods) | **GET** /GetTerminalPayMethods | Проверить доступность методов на SDK
*TinkoffPayApi* | [**initPayments**](docs/Api/TinkoffPayApi.md#initpayments) | **POST** /InitPayments | Инициировать платеж в виджете
*TinkoffPayApi* | [**tinkoffPayEventPost**](docs/Api/TinkoffPayApi.md#tinkoffpayeventpost) | **POST** /TinkoffPayEvent | Передача уведомления о событии
*TinkoffPayApi* | [**tinkoffPayPaymentIdQRGet**](docs/Api/TinkoffPayApi.md#tinkoffpaypaymentidqrget) | **GET** /TinkoffPay/{paymentId}/QR | Получение QR
*TinkoffPayApi* | [**tinkoffPayTerminalsTerminalKeyStatusGet**](docs/Api/TinkoffPayApi.md#tinkoffpayterminalsterminalkeystatusget) | **GET** /TinkoffPay/terminals/{TerminalKey}/status | Статус
*TinkoffPayApi* | [**tinkoffPayTransactionsPaymentIdVersionsVersionLinkGet**](docs/Api/TinkoffPayApi.md#tinkoffpaytransactionspaymentidversionsversionlinkget) | **GET** /TinkoffPay/transactions/{paymentId}/versions/{version}/link | Получение ссылки
*YandexPayApi* | [**initPost**](docs/Api/YandexPayApi.md#initpost) | **POST** /Init | Инициилизация платежа


## Documentation For Models

 - [AddAccountQr](docs/Model/AddAccountQr.md)
 - [AddAccountQrResponse](docs/Model/AddAccountQrResponse.md)
 - [AddCardFULL](docs/Model/AddCardFULL.md)
 - [AddCardResponseFULL](docs/Model/AddCardResponseFULL.md)
 - [AddCardResponseSDK](docs/Model/AddCardResponseSDK.md)
 - [AddCardSDK](docs/Model/AddCardSDK.md)
 - [AddCustomer](docs/Model/AddCustomer.md)
 - [AddCustomerResponse](docs/Model/AddCustomerResponse.md)
 - [AgentData](docs/Model/AgentData.md)
 - [AttachCard](docs/Model/AttachCard.md)
 - [AttachCardResponse](docs/Model/AttachCardResponse.md)
 - [ByEmail](docs/Model/ByEmail.md)
 - [ByUrl](docs/Model/ByUrl.md)
 - [Cancel](docs/Model/Cancel.md)
 - [Cancel2](docs/Model/Cancel2.md)
 - [ChargeFULL](docs/Model/ChargeFULL.md)
 - [ChargeQr](docs/Model/ChargeQr.md)
 - [ChargeQrResponse](docs/Model/ChargeQrResponse.md)
 - [ChargeSDK](docs/Model/ChargeSDK.md)
 - [CheckOrder](docs/Model/CheckOrder.md)
 - [CheckOrder2](docs/Model/CheckOrder2.md)
 - [ClientInfo](docs/Model/ClientInfo.md)
 - [Common](docs/Model/Common.md)
 - [Confirm](docs/Model/Confirm.md)
 - [Confirm2](docs/Model/Confirm2.md)
 - [DataNotification](docs/Model/DataNotification.md)
 - [EventData](docs/Model/EventData.md)
 - [FinishAuthorize](docs/Model/FinishAuthorize.md)
 - [FinishAuthorizeFULL](docs/Model/FinishAuthorizeFULL.md)
 - [FinishAuthorizeSDK](docs/Model/FinishAuthorizeSDK.md)
 - [GetAccountQrList](docs/Model/GetAccountQrList.md)
 - [GetAccountQrListResponse](docs/Model/GetAccountQrListResponse.md)
 - [GetAccountQrListResponseAccountTokens](docs/Model/GetAccountQrListResponseAccountTokens.md)
 - [GetAddAccountQrState](docs/Model/GetAddAccountQrState.md)
 - [GetAddAccountQrStateResponse](docs/Model/GetAddAccountQrStateResponse.md)
 - [GetAddCardState](docs/Model/GetAddCardState.md)
 - [GetAddCardStateResponse](docs/Model/GetAddCardStateResponse.md)
 - [GetCardListFULL](docs/Model/GetCardListFULL.md)
 - [GetCardListSDK](docs/Model/GetCardListSDK.md)
 - [GetCustomerResponse](docs/Model/GetCustomerResponse.md)
 - [GetDeepLink](docs/Model/GetDeepLink.md)
 - [GetDeepLinkResponse](docs/Model/GetDeepLinkResponse.md)
 - [GetOrRemoveCustomer](docs/Model/GetOrRemoveCustomer.md)
 - [GetQRStateResponseFULL](docs/Model/GetQRStateResponseFULL.md)
 - [GetQRStateResponseSDK](docs/Model/GetQRStateResponseSDK.md)
 - [GetQr](docs/Model/GetQr.md)
 - [GetStateFULL](docs/Model/GetStateFULL.md)
 - [GetStateSDK](docs/Model/GetStateSDK.md)
 - [GetTerminalPayMethods](docs/Model/GetTerminalPayMethods.md)
 - [GetTerminalPayMethodsResponse](docs/Model/GetTerminalPayMethodsResponse.md)
 - [InitFULL](docs/Model/InitFULL.md)
 - [InitPayments](docs/Model/InitPayments.md)
 - [InitPaymentsResponse](docs/Model/InitPaymentsResponse.md)
 - [InitSDK](docs/Model/InitSDK.md)
 - [InlineObject](docs/Model/InlineObject.md)
 - [InlineObject1](docs/Model/InlineObject1.md)
 - [InlineObject2](docs/Model/InlineObject2.md)
 - [InlineObject3](docs/Model/InlineObject3.md)
 - [InlineObject4](docs/Model/InlineObject4.md)
 - [InlineResponse200](docs/Model/InlineResponse200.md)
 - [InlineResponse2001](docs/Model/InlineResponse2001.md)
 - [InlineResponse2002](docs/Model/InlineResponse2002.md)
 - [InlineResponse2003](docs/Model/InlineResponse2003.md)
 - [InlineResponse2004](docs/Model/InlineResponse2004.md)
 - [InlineResponse2005](docs/Model/InlineResponse2005.md)
 - [InlineResponse2006](docs/Model/InlineResponse2006.md)
 - [InlineResponse2007](docs/Model/InlineResponse2007.md)
 - [InlineResponse2007Params](docs/Model/InlineResponse2007Params.md)
 - [InlineResponse2008](docs/Model/InlineResponse2008.md)
 - [InlineResponse2008Params](docs/Model/InlineResponse2008Params.md)
 - [InlineResponse2009](docs/Model/InlineResponse2009.md)
 - [ItemsFFD105](docs/Model/ItemsFFD105.md)
 - [ItemsFFD12](docs/Model/ItemsFFD12.md)
 - [ItemsParams](docs/Model/ItemsParams.md)
 - [LongPay](docs/Model/LongPay.md)
 - [LongPay1](docs/Model/LongPay1.md)
 - [LongPay2](docs/Model/LongPay2.md)
 - [LongPay3](docs/Model/LongPay3.md)
 - [MarkCode](docs/Model/MarkCode.md)
 - [MarkQuantity](docs/Model/MarkQuantity.md)
 - [Member](docs/Model/Member.md)
 - [Model3DSv2](docs/Model/Model3DSv2.md)
 - [Model3DSv2SDK](docs/Model/Model3DSv2SDK.md)
 - [NotificationAddCard](docs/Model/NotificationAddCard.md)
 - [NotificationFiscalization](docs/Model/NotificationFiscalization.md)
 - [NotificationPayment](docs/Model/NotificationPayment.md)
 - [NotificationQr](docs/Model/NotificationQr.md)
 - [PaymentData](docs/Model/PaymentData.md)
 - [PaymentIdListForGCO](docs/Model/PaymentIdListForGCO.md)
 - [PaymentInfos](docs/Model/PaymentInfos.md)
 - [Payments](docs/Model/Payments.md)
 - [PaymentsCheckOrder](docs/Model/PaymentsCheckOrder.md)
 - [Paymethod](docs/Model/Paymethod.md)
 - [QrResponseFULL](docs/Model/QrResponseFULL.md)
 - [QrResponseSDK](docs/Model/QrResponseSDK.md)
 - [ReceiptFFD105](docs/Model/ReceiptFFD105.md)
 - [ReceiptFFD1052](docs/Model/ReceiptFFD1052.md)
 - [ReceiptFFD12](docs/Model/ReceiptFFD12.md)
 - [ReceiptFFD122](docs/Model/ReceiptFFD122.md)
 - [RemoveCard](docs/Model/RemoveCard.md)
 - [RemoveCardResponse](docs/Model/RemoveCardResponse.md)
 - [RemoveCustomerResponse](docs/Model/RemoveCustomerResponse.md)
 - [Response](docs/Model/Response.md)
 - [ResponseByEmail](docs/Model/ResponseByEmail.md)
 - [ResponseByUrl](docs/Model/ResponseByUrl.md)
 - [SbpPayTest](docs/Model/SbpPayTest.md)
 - [SbpPayTestResponse](docs/Model/SbpPayTestResponse.md)
 - [SectoralItemProps](docs/Model/SectoralItemProps.md)
 - [SendClosingReceipt](docs/Model/SendClosingReceipt.md)
 - [SendClosingReceipt2](docs/Model/SendClosingReceipt2.md)
 - [Shops](docs/Model/Shops.md)
 - [SupplierInfo](docs/Model/SupplierInfo.md)
 - [TinkoffFps](docs/Model/TinkoffFps.md)
 - [TinkoffPay](docs/Model/TinkoffPay.md)
 - [TinkoffPayEvent](docs/Model/TinkoffPayEvent.md)
 - [TinkoffPayweb](docs/Model/TinkoffPayweb.md)
 - [With3DS](docs/Model/With3DS.md)
 - [With3DSv2APP](docs/Model/With3DSv2APP.md)
 - [With3DSv2BRW](docs/Model/With3DSv2BRW.md)
 - [Without3DS](docs/Model/Without3DS.md)
 - [YandexPay](docs/Model/YandexPay.md)


## Documentation For Authorization

 All endpoints do not require authorization.


## Author




