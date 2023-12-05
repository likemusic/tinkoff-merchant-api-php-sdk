<?php
/**
 * InitFULL
 *
 * PHP version 5
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Приём платежей
 *
 * # История изменений | **Описание изменений** | **Дата** | | ------ | -------- | | Создан документ | 26.05.2023 |  # Введение ## Подключение эквайринга Для начала работы с интернет-эквайрингом, оставьте [заявку на подключение](https://www.tinkoff.ru/kassa/solution/classic/). После подписания документов, вы получите доступ в личный кабинет Мерчанта, в котором можно найти публичный ключ терминала `TerminalKey`.   ## Способы интеграции ### Merchant API Merchant API - один из инструментов интернет-эквайринга Тинькофф Кассы для приема платежей на мобильных устройствах и в вебе. С помощью Merchant API (далее MAPI) Мерчанты могут настроить прием платежей на своих сайтах.  >Инструкция по использованию MAPI написана для разработчиков и тех, кто хочет самостоятельно настроить вызов платежной формы Тинькофф на своих ресурсах. Если вам нужен более простой инструмент, попробуйте другие способы интеграции. ### Платежный виджет Позволяет оперативно добавить форму оплаты на сайт. Для этого необходимо просто вставить готовый код на сайт в то место, где должна быть кнопка оплаты. Виджет является частью платежной формы. Подробнее по [ссылке](https://www.tinkoff.ru/kassa/develop/widget/install/).   ### Платежный модуль Модуль интернет-эквайринга Тинькофф, который можно добавить на сайт через CMS. Подробнее по [ссылке](https://www.tinkoff.ru/kassa/develop/cms/).  ### Мобильный SDK Вы можете настроить прием платежей в своём мобильном приложении с помощью эквайрингового SDK. * [SDK Android](https://github.com/tinkoff-mobile-tech/AcquiringSdkAndroid) * [SDK IOS](https://github.com/tinkoff-mobile-tech/AcquiringSdk_IOS)  ## Платежная форма Платежная форма - это готовый интерфейс с встроенными способами оплаты, который позволяет принимать платежи онлайн.  Для использования платежной формы необходимо подключить интернет-эквайринг, настроить терминал и интегрировать платежную форму на ваш сайт одним из способов выше(кроме SDK) ### Платежная форма в webview Некоторые webview не умеют обрабатывать DeepLink ссылки. Из-за этого способы оплаты, которые осуществляют переход в мобильное приложение во время платежа (СБП, Mir pay, Tinkoff pay), могут работать некорректно.  В случае использования платежной формы в webview необходимо учесть особенности вашей интеграции и сделать необходимые доработки для поддержки DeepLink.   По результатам доработок необходимо дополнительно протестировать корректную работу всех способов оплат. В случае обнаружения проблем, требуется связаться с разработчиками webview модуля для их устранения, либо рекомендуется отключить неработающие способы оплаты. **Ссылки с примерами решений**: 1. [Первое решение(java,kotlin)](https://razorpay.com/docs/payments/payment-gateway/web-integration/standard/webview/upi-intent-android/#13-handle-deep-links-in-shouldoverrideurlloading-) 2. [Второе решение(java)](https://stackoverflow.com/questions/25672330/how-to-enable-deep-linking-in-webview-on-android-app)  ### Платежная форма в iframe Не рекомендуется использовать платежную форму в iframe для мобильных версий сайтов, т.к. у кнопочных способов оплаты могут возникать проблемы с открытием DeepLink и переходов в мобильное приложение для оплаты (СБП, Mir pay, Tinkoff pay). Это связано с тем, что Iframe является изолированным контейнером, из-за этого переходы на сторонние ссылки не могут быть обработаны внутри iframe.   Если в мобильной версии сайта использование iframe обязательно, вам необходимо сделать доработки согласно инструкции ниже, чтобы вы могли использовать кнопочные способы оплаты. Она позволит произвести переход в стороннее приложение. Доработки представляют собой скрипт \"снаружи\" iframe, который получит сообщение о переходе от iframe и вызовет его на основной странице.  После реализации доработок необходимо протестировать корректную работу всех способов оплат. В случае проблем и вопросов вы можете обратиться в нашу поддержку acq_help@tinkoff.ru  В десктопной версии iframe кнопочные способы оплаты будут работать без специальных доработок.   <details><summary><b>Инструкция по доработкам для mobile iframe</b></summary> <br> Iframe является изолированным контейнером, из-за этого переходы на сторонние ссылки не могут быть обработаны внутри iframe (переход будет внутри iframe). Чтобы произвести переход в стороннее приложение требуется скрипт \"снаружи\" iframe, который получит сообщение о переходе от iframe и вызовет его на основной странице.  В случае если у вас подключены способы оплаты, использующие deeplink, а именно: Tinkoff pay, СБП или Mir pay, то в процессе оплаты может возникать ошибка.   ##### Информация Скрипт общается с фреймом по средствам *window.postMessage()*.  Добавление скрипта решает проблему передачи ссылки на ресурс платежного сервиса, для способов оплаты использующих DeepLink. Данная проблема может возникнуть при попытке передачи ссылки в браузер Клиента, из контейнера Платежной формы расположенного в теге ``<iframe>``. ##### Установка **Не рекомендуется** копировать скрипт полностью в свою сборку. Интерфейс общения с Платежной Формой может изменится, поэтому просьба всегда загружать скрипт из [предоставленного URL](https://kassa.cdn-tinkoff.ru/integration/integration.js)  Простая интеграция (Если используется уже созданный iframe на странице):    Добавьте ссылку на код скрипта iframe.js в HTML-код страницы сайта, на которой располагаться iframe c Платежной формой. Рекомендуем разместить его в конце body после объявления тега iframe. ``` <iframe id=\"payment-form\"></iframe>   <script src=\"https://kassa.cdn-tinkoff.ru/integration/integration.js\"></script> <script>   const paymentForm = new PaymentForm.Integration({iframe: {element: document.getElementById('payment-form')}}); </script> ``` Динамическая интеграция (Если iframe генерируется динамически): ``` <div id=\"payment-form-container\"></div>   <script>   // // Получаем и присваиваем переменной uuid значение уникального идентификатора платежа ( передается в path параметра PaymentURL )   const uuid = \"\";    // Получаем элемент контейнера в который будет встроен iframe   const contentContainer = document.getElementById('payment-form-container')     // Загрузите скрипт   const script = document.createElement(\"script\");   script.type = \"text/javascript\";   script.async = false;   script.src = \"https://kassa.cdn-tinkoff.ru/integration/integration.js\";   script.onload = (): void => {      // Инициализируйте скрипт      const paymentForm = new PaymentForm.Integration({iframe: {element: document.getElementById('payment-form')}});        // Создайте iframe      const element = document.createElement(\"iframe\");      element.src = \"https://securepayments.tinkoff.ru/\" + uuid;      if (contentContainer) {         contentContainer.appendChild(element);      }   };                       document.getElementsByTagName(\"body\")[0].appendChild(script); </script> ``` ##### Настройка Класс Integration принимает 2 аргумента: 1. HTMLIFrameElement - iframe DOM элемент 2. config - необязательный аргумент с конфигурацией PaymentFormIntegrationConfig  PaymentFormIntegrationConfig:    ``` interface PaymentFormIntegrationConfig {   iframe: {     element: HTMLIFrameElement;     /_**      * Используется если скрипт встраивается в промежуточный iframe      *_/     proxy?: true;     /_**      * Вызывается в момент получения deepLink из ПФ      * Стандартное значение: (url) => {window.location.href = url}      * @param url      *_/     deepLinkRedirectCallback?: (url: string) => void;     /_**      * Вызывается в момент получения exit из ПФ      * Например при нажатии кнопки \"Вернуться в магазин\"      * Стандартное значение: (url) => {window.location.href = url}      * @param url      *_/     exitRedirectCallback?: (url: string) => void;   }; } ``` Если Вам не требуется перенаправлять родительскую страницу на возврат в магазин, а требуется просто закрыть модальное окно с платежной формой - замените этот параметр конфигурации  Пример инициализации скрипта с конфигурацией:    ``` const paymentForm = new PaymentForm.Integration({   iframe: {     element: document.getElementById('payment-form'),     exitRedirectCallback: (url) => {       // Вызов закрытия модального окна     }   } }); ``` ##### Iframe внутри iframe Бываю случаи когда приложение используется внутри iframe, который находится внутри другого iframe. В таком случае необходимо встроить скрипт с ключом proxy: true во все промежуточные iframe. Пример инициализации скрипта для основной страницы:    ``` <iframe id=\"payment-form\"></iframe>   <script src=\"https://kassa.cdn-tinkoff.ru/integration/integration.js\"></script> <script>   const paymentForm = new PaymentForm.Integration({iframe: {element: document.getElementById('payment-form')}}); </script> ``` Пример инициализации скрипта для вложенного iframe:  ``` <iframe id=\"payment-form\"></iframe>   <script src=\"https://kassa.cdn-tinkoff.ru/integration/integration.js\"></script> <script>   const paymentForm = new PaymentForm.Integration({iframe: {element: document.getElementById('payment-form'), proxy: true}}); </script> ``` \"Промежуточный\" скрипт, будет перенаправлять сообщения в каждый следующий iframe.  Коллбеки событий будут отрабатывать вызываться в \"промежуточных\" iframe только в случае их переопределения в config. ##### Как работает скрипт Общение между формой и родителем, происходит через *window.postMessage()*.  1. После успешной загрузки, платежная форма внутри iframe отправляет сообщение loaded родителю. 2. После получения loaded из ПФ, скрипт отправляет сообщение ready на Платежную форму, таким образом происходит рукопожатие и платежная форма определяет что может отобразить кнопочные методы оплаты 3. Действиями Клиента на Платежной форме вызывается способ оплаты возвращающий DeepLink на ресурс платежного сервиса. 4. Платежная форма, передает DeepLink в целевое окно клиента, с помощью события deepLink 5. Целевое окно выполняет редирект Клиента, по ссылке полученной в DeepLink, с помощью вызова *deepLinkRedirectCallback* 6. Аналогично передаются и другие сообщения  </details>  ### Кастомизация на платежной форме На платежной форме доступна функция кастомизации, которая позволяет настроить форму под себя и своих клиентов. Для установки кастомизации обратитесь к вашему персональному менеджеру и передайте пожелания по настройкам   #### Список доступных настроек кастомизации:  |**Возможности кастомизации** | **Доп. описание**| |--- | ---| |Управление способами оплаты | <li>менять порядок способов оплаты (кроме Tinkoff pay)</li><li> сворачивать/разворачивать блоки оплаты (оплата картой и рассрочка) </li><li>менять количество отображаемых способов с помощью кнопки \"еще\" (минимум - один способ, максимум - все доступные на ПФ)</li>| |Брендирование UI платежной формы | <li>добавлять лого своей компании на ПФ (логотип отобразится рядом с суммой заказа) </li><li>управлять цветами кнопок (кнопка \"Оплатить\" и другие кнопки со страниц статусов и модальных окон)</li>| |Управление блоком детализации (информация о заказе и магазине) | <li>делать блок свернутым и развернутым по-умолчанию</li><li> скрывать  блок с детализацией на ПФ</li><li>менять порядок строк в детализации</li>| |Управление светлой и темной темой | <li>показывать темную или светлую тему по-умолчанию</li><li>отключать темной/светлой темы</li>|   <!--#### Установить последнюю версию Acquiring SDK  <style> .block { text-decoration: none; padding: 2rem; margin: 2rem; border: 0.2rem solid #dddbd9; border-radius: 1rem; box-shadow: 0 1.5rem 0.5rem -0.5rem rgba(70,70,94,.1);  position: auto;  overflow: auto;  }  .ios_upd { text-decoration: none; padding: 10px; margin: 10px; border: 1px solid #949996; border-radius: 1rem; box-shadow: 0 1.5rem 0.5rem -0.5rem rgba(70,70,94,.1);  position: auto;  overflow: auto; display: none; } .android_upd { text-decoration: none; padding: 10px; margin: 10px; border: 1px solid #949996; border-radius: 1rem; box-shadow: 0 1.5rem 0.5rem -0.5rem rgba(70,70,94,.1);  position: auto;  overflow: auto; display: none; } p:hover + .ios_upd { display: block; } p:hover + .android_upd { display: block; } .updtext {  text-decoration: underline;  text-decoration-style: dotted; } </style> <div class=\"block\">  IOS  <br>  Релиз 3.1.1 от 12.09.2023  <br>  <a href=\"https://github.com/tinkoff-mobile-tech/AcquiringSdk_IOS\">Ссылка на скачивание</a>  <p class=\"updtext\">Что изменилось (?)</p>   <div class=\"ios_upd\">    <ul>     <li>Новая фича </li>     <li>ещё одна новая фича</li>     <li>ещё одна</li>    </ul>   </div> </div> <div class=\"block\">  Android  <br>  Релиз 3.1.2 от 12.09.2023  <br>  <a href=\"https://github.com/tinkoff-mobile-tech/AcquiringSdkAndroid\">Ссылка на скачивание</a>  <p class=\"updtext\">Что изменилось (?)</p>   <div class=\"android_upd\">    <ul>     <li>Новая фича </li>     <li>ещё одна новая фича</li>     <li>ещё одна</li>    </ul>   </div> </div> -->  ## Рекомендации при интеграции Ниже мы расписали несколько рекомендаций, которые необходимо соблюдать при интеграции с MAPI через фронтенд сайта мерчанта, а именно:   1. Наиболее безопасный способ передачи данных от Мерчанта в MAPI — прямая интеграция бэкенда Мерчанта с бэкендом Тинькофф Кассы. В этом случае злоумышленник сможет перехватить запрос только, если окажется в локальной сети Мерчанта;  2. При интеграции с MAPI через фронтенд (в том числе и с помощью нашего платежного виджета), необходимо сверять параметры созданных через платежный виджет заказов. Для того есть два способа:  <br> 2.1. Получение нотификаций:    - **По e-mail**: на указанную почту придет письмо при переходе платежа в статус «CONFIRMED»;    - **По http**: MAPI будет отправлять POST-запрос при каждом изменении статуса платежа на URL, указанный в настройках терминала.    <br> 2.2. Вызов метода GetState, который возвращает основные параметры и текущий статус платежа. Рекомендуется сверять/валидировать дополнительные данные заказа - `PaymentId` и `Amount`.   ## Обработка карточных данных Платежные системы разработали требования к безопасности карточных данных клиентов - **Payment Card Industry Data Security Standard** (PCI DSS). Компания должна пройти сертификацию, чтобы подтвердить надежность управления карточной информацией.  Если у вас нет сертификации PCI DSS, вы можете использовать платежную форму Тинькофф Кассы. В этом случае, все операции, связанные с обработкой критичных данных производятся на стороне Тинькофф Кассы. Мерчанту достаточно настроить интеграцию с MerchantAPI и инициализировать платеж. Клиент будет перенаправлен на платежную форму, в которую он сможет ввести данные карты. Когда платеж завершится, клиент снова увидит сайт Мерчанта. Подробную информацию о подключении  эквайринга смотрите в разделе Non PCI DSS.   Если ваш ресурс соответствует требованиям PCI DSS, то вы можете собирать и хранить карточные данные клиентов. В таком случае, MerchantAPI получает зашифрованные карточные данные от Мерчанта. Подробную информацию о подключении  такого способа смотрите в разделе PCI DSS.   # Какими терминами пользуемся в документации? | **Термин** | Определение | | ------ | -------- | | **Клиент** | Физлицо, производящее перевод с использованием банковской карты на сайте Мерчанта | | **Мерчант** | Бизнес, принимающий и осуществляющий переводы по банковским картам на своем сайте | | **Тинькофф Касса** | Сервис, помогающий проводить выплату клиенту-физлицу | | **Эмитент** | Банк, выпустивший карту клиента-физлица | | **PCI DSS**| Международный стандарт безопасности, созданный для защиты данных банковских карт | | **3-DSecure** | Протокол, который используется как дополнительный уровень безопасности для онлайн-кредитных и дебетовых карт. 3-D Secure добавляет ещё один шаг аутентификации для онлайн-платежей | | **Терминал** | Точка приема платежей Мерчанта (в общем случае привязывается к сайту, на котором осуществляется прием платежей) Далее в этой документации описан протокол для терминала мерчанта | | **ККМ** | Контрольно-кассовая машина| |**Личный кабинет Мерчанта**|[Веб-приложение](https://business.tinkoff.ru/oplata/main), в котором Мерчант управляет интернет-эквайрингом - настраивает параметры терминалов, подтверждает или отменяет платежи, анализирует статистику|   # Параметры терминала Каждый терминал обладает свойствами, которые влияют на те или иные аспекты приёма платежей. Эти свойства настраиваются при подключении интернет-эквайринга и могут быть изменены в Личном кабинете Мерчанта.  В таблице ниже перечислены основые параметры приёма платежей для терминала  |Название параметра|Формат|Описание| |---|---|---| |TerminalKey|20 символов (чувствительно к регистру)|Уникальный символьный ключ терминала. Устанавливается Тинькофф Кассой| |Success URL|250 символов(чувствительно к регистру)| URL на веб-сайте Мерчанта, куда будет переведен клиент в случае успешной оплаты <br> —   true - платеж завершился успешно <br> — false - платеж не завершился * |Fail URL| 250 символов(чувствительно к регистру)|URL на веб-сайте Мерчанта, куда будет переведен клиент в случае неуспешной оплаты * |Success Add Card URL| 250 символов (чувствительно к регистру)|URL на веб-сайте Мерчанта, куда будет переведен клиент после успешной привязки карты *| |Fail Add Card URL| 250 символов(чувствительно к регистру)|URL на веб-сайте Мерчанта, куда будет переведен клиент после неуспешной привязки карты *| |Notification URL| 250 символов(чувствительно к регистру)|URL на веб-сайте Мерчанта, куда будет отправлен POST запрос о статусе выполнения вызываемых методов. Только для методов **Authorize**, **FinishAuthorize**, **Confirm**, **Cancel**| |Валюта терминала|3 символа| Валюта, в которой будут происходить списания по данному терминалу, если иное не передано в запросе| |Активность терминала|Рабочий /Неактивный /Тестовый|Определяет режим работы данного терминала| |Password |20 символов(чувствительно к регистру)|Используется для подписи запросов/ответов. Является секретной информацией, известной только Мерчанту и Тинькофф Кассе. Пароль находится в [личном кабинете](https://business.tinkoff.ru/oplata/main) мерчанта |Отправлять нотификацию на FinishAuthorize|Да/Нет| Определяет, будет ли отправлена нотификация на выполнение метода **FinishAuthorize** (по умолчанию да)| |Отправлять нотификацию на Completed|Да/Нет| Определяет, будет ли отправлена нотификация на выполнение метода **AttachCard** (по умолчанию Да)| |Отправлять нотификацию на Reversed|Да/Нет| Определяет, будет ли отправлена нотификация на выполнение метода **Cancel** (по умолчанию Да)|  \\* *в URL можно указать необходимые параметры в виде ${<параметр>}, которые будут переданы на URL методом GET*  # Подпись запроса Перед выполнением запроса MAPI проверяет, можно ли доверять его инициатору. Для этого сервер проверяет подпись запроса. В MAPI используется механизм подписи с помощью токена. Мерчант должен добавлять токен с каждому запросу, где это требуется.   > В описании входных параметров для каждого метода мы указали, нужно подписывать запрос или нет. Токен формируется на основании тех полей, которые присутствуют в запросе, поэтому токены для каждого запроса уникальные, и не совпадают никогда.  **Токен** в MAPI - это строка, в которой Мерчант зашифровал данные своего запроса с помощью пароля. Для создания токена Мерчант использует пароль из Личного кабинета мерчанта.  Рассмотрим на примере  процесс шифрования тела запроса для метода Init: ```json {   \"TerminalKey\": \"MerchantTerminalKey\",   \"Amount\": 19200,   \"OrderId\": \"21090\",   \"Description\": \"Подарочная карта на 1000 рублей\",   \"Token\": \"68711168852240a2f34b6a8b19d2cfbd296c7d2a6dff8b23eda6278985959346\",   \"DATA\": {     \"Phone\": \"+71234567890\",     \"Email\": \"a@test.com\"   },   \"Receipt\": {     \"Email\": \"a@test.ru\",     \"Phone\": \"+79031234567\",     \"Taxation\": \"osn\",     \"Items\": [       {         \"Name\": \"Наименование товара 1\",         \"Price\": 10000,         \"Quantity\": 1,         \"Amount\": 10000,         \"Tax\": \"vat10\",         \"Ean13\": \"303130323930303030630333435\"       },       {         \"Name\": \"Наименование товара 2\",         \"Price\": 3500,         \"Quantity\": 2,         \"Amount\": 7000,         \"Tax\": \"vat20\"       },       {         \"Name\": \"Наименование товара 3\",         \"Price\": 550,         \"Quantity\": 4,         \"Amount\": 4200,         \"Tax\": \"vat10\"       }     ]   } } ```  Чтобы зашифровать данные запроса Мерчант должен выполнить следующие шаги: 1. Собрать массив передаваемых данных в виде пар Ключ-Значения. В массив нужно добавить только параметры корневого объекта. Вложенные объекты и массивы не участвуют в расчете токена. В примере ниже в массив включены параметры `TerminalKey`, `Amount`, `OrderId`, `Description`  и исключен объект `Receipt` и `DATA`. ``` JSON [{\"TerminalKey\": \"MerchantTerminalKey\"},{\"Amount\": \"19200\"},{\"OrderId\": \"21090\"},{\"Description\": \"Подарочная карта на 1000 рублей\"}] ```  2. Добавить в массив пару {`Password`, Значение пароля}. Пароль можно найти в личном кабинете Мерчанта ``` JSON [{\"TerminalKey\": \"MerchantTerminalKey\"},{\"Amount\": \"19200\"},{\"OrderId\": \"21090\"},{\"Description\": \"Подарочная карта на 1000 рублей\"},{\"Password\": \"usaf8fw8fsw21g\"}] ```  3. Отсортировать массив по алфавиту по ключу. ```JSON [{\"Amount\": \"19200\"},{\"Description\": \"Подарочная карта на 1000 рублей\"},{\"OrderId\": \"21090\"},{\"Password\": \"usaf8fw8fsw21g\"},{\"TerminalKey\": \"MerchantTerminalKey\"}] ```  4. Конкатенировать только **значения** пар в одну строку ```JSON \"19200Подарочная карта на 1000 рублей21090usaf8fw8fsw21gMerchantTerminalKey\" ```  5. Применить к  строке хеш-функцию SHA-256 ```JSON \"0024a00af7c350a3a67ca168ce06502aa72772456662e38696d48b56ee9c97d9\" ```  6. Добавить получившийся результат в значение параметра `Token` в тело запроса и отправить запрос ```JSON {   \"TerminalKey\": \"MerchantTerminalKey\",   \"Amount\": 19200,   \"OrderId\": \"21090\",   \"Description\": \"Подарочная карта на 1000 рублей\",   \"DATA\": {     \"Phone\": \"+71234567890\",     \"Email\": \"a@test.com\"   },   \"Receipt\": {     \"Email\": \"a@test.ru\",     \"Phone\": \"+79031234567\",     \"Taxation\": \"osn\",     \"Items\": [       {         \"Name\": \"Наименование товара 1\",         \"Price\": 10000,         \"Quantity\": 1,         \"Amount\": 10000,         \"Tax\": \"vat10\",         \"Ean13\": \"303130323930303030630333435\"       },       {         \"Name\": \"Наименование товара 2\",         \"Price\": 20000,         \"Quantity\": 2,         \"Amount\": 40000,         \"Tax\": \"vat20\"       },       {         \"Name\": \"Наименование товара 3\",         \"Price\": 30000,         \"Quantity\": 3,         \"Amount\": 90000,         \"Tax\": \"vat10\"       }     ]   },   \"Token\": \"0024a00af7c350a3a67ca168ce06502aa72772456662e38696d48b56ee9c97d9\" } ```
 *
 * OpenAPI spec version: 1.0
 * 
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 3.3.4
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace OpenAPI\Client\Model;

use \ArrayAccess;
use \OpenAPI\Client\ObjectSerializer;

/**
 * InitFULL Class Doc Comment
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class InitFULL implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Init_FULL';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'terminal_key' => 'string',
        'amount' => 'float',
        'order_id' => 'string',
        'token' => 'string',
        'description' => 'string',
        'customer_key' => 'string',
        'recurrent' => 'string',
        'pay_type' => 'string',
        'language' => 'string',
        'notification_url' => 'string',
        'success_url' => 'string',
        'fail_url' => 'string',
        'redirect_due_date' => 'object',
        'data' => 'object',
        'receipt' => 'object',
        'shops' => '\OpenAPI\Client\Model\Shops[]',
        'descriptor' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'terminal_key' => null,
        'amount' => null,
        'order_id' => null,
        'token' => null,
        'description' => null,
        'customer_key' => null,
        'recurrent' => null,
        'pay_type' => null,
        'language' => null,
        'notification_url' => 'uri',
        'success_url' => 'uri',
        'fail_url' => 'uri',
        'redirect_due_date' => 'date-time',
        'data' => null,
        'receipt' => null,
        'shops' => null,
        'descriptor' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'terminal_key' => 'TerminalKey',
        'amount' => 'Amount',
        'order_id' => 'OrderId',
        'token' => 'Token',
        'description' => 'Description',
        'customer_key' => 'CustomerKey',
        'recurrent' => 'Recurrent',
        'pay_type' => 'PayType',
        'language' => 'Language',
        'notification_url' => 'NotificationURL',
        'success_url' => 'SuccessURL',
        'fail_url' => 'FailURL',
        'redirect_due_date' => 'RedirectDueDate',
        'data' => 'DATA',
        'receipt' => 'Receipt',
        'shops' => 'Shops',
        'descriptor' => 'Descriptor'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'terminal_key' => 'setTerminalKey',
        'amount' => 'setAmount',
        'order_id' => 'setOrderId',
        'token' => 'setToken',
        'description' => 'setDescription',
        'customer_key' => 'setCustomerKey',
        'recurrent' => 'setRecurrent',
        'pay_type' => 'setPayType',
        'language' => 'setLanguage',
        'notification_url' => 'setNotificationUrl',
        'success_url' => 'setSuccessUrl',
        'fail_url' => 'setFailUrl',
        'redirect_due_date' => 'setRedirectDueDate',
        'data' => 'setData',
        'receipt' => 'setReceipt',
        'shops' => 'setShops',
        'descriptor' => 'setDescriptor'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'terminal_key' => 'getTerminalKey',
        'amount' => 'getAmount',
        'order_id' => 'getOrderId',
        'token' => 'getToken',
        'description' => 'getDescription',
        'customer_key' => 'getCustomerKey',
        'recurrent' => 'getRecurrent',
        'pay_type' => 'getPayType',
        'language' => 'getLanguage',
        'notification_url' => 'getNotificationUrl',
        'success_url' => 'getSuccessUrl',
        'fail_url' => 'getFailUrl',
        'redirect_due_date' => 'getRedirectDueDate',
        'data' => 'getData',
        'receipt' => 'getReceipt',
        'shops' => 'getShops',
        'descriptor' => 'getDescriptor'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }

    const PAY_TYPE_O = 'O';
    const PAY_TYPE_T = 'T';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getPayTypeAllowableValues()
    {
        return [
            self::PAY_TYPE_O,
            self::PAY_TYPE_T,
        ];
    }
    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['terminal_key'] = isset($data['terminal_key']) ? $data['terminal_key'] : null;
        $this->container['amount'] = isset($data['amount']) ? $data['amount'] : null;
        $this->container['order_id'] = isset($data['order_id']) ? $data['order_id'] : null;
        $this->container['token'] = isset($data['token']) ? $data['token'] : null;
        $this->container['description'] = isset($data['description']) ? $data['description'] : null;
        $this->container['customer_key'] = isset($data['customer_key']) ? $data['customer_key'] : null;
        $this->container['recurrent'] = isset($data['recurrent']) ? $data['recurrent'] : null;
        $this->container['pay_type'] = isset($data['pay_type']) ? $data['pay_type'] : null;
        $this->container['language'] = isset($data['language']) ? $data['language'] : null;
        $this->container['notification_url'] = isset($data['notification_url']) ? $data['notification_url'] : null;
        $this->container['success_url'] = isset($data['success_url']) ? $data['success_url'] : null;
        $this->container['fail_url'] = isset($data['fail_url']) ? $data['fail_url'] : null;
        $this->container['redirect_due_date'] = isset($data['redirect_due_date']) ? $data['redirect_due_date'] : null;
        $this->container['data'] = isset($data['data']) ? $data['data'] : null;
        $this->container['receipt'] = isset($data['receipt']) ? $data['receipt'] : null;
        $this->container['shops'] = isset($data['shops']) ? $data['shops'] : null;
        $this->container['descriptor'] = isset($data['descriptor']) ? $data['descriptor'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['terminal_key'] === null) {
            $invalidProperties[] = "'terminal_key' can't be null";
        }
        if ((mb_strlen($this->container['terminal_key']) > 20)) {
            $invalidProperties[] = "invalid value for 'terminal_key', the character length must be smaller than or equal to 20.";
        }

        if ($this->container['amount'] === null) {
            $invalidProperties[] = "'amount' can't be null";
        }
        if ($this->container['order_id'] === null) {
            $invalidProperties[] = "'order_id' can't be null";
        }
        if ((mb_strlen($this->container['order_id']) > 36)) {
            $invalidProperties[] = "invalid value for 'order_id', the character length must be smaller than or equal to 36.";
        }

        if ($this->container['token'] === null) {
            $invalidProperties[] = "'token' can't be null";
        }
        if (!is_null($this->container['description']) && (mb_strlen($this->container['description']) > 250)) {
            $invalidProperties[] = "invalid value for 'description', the character length must be smaller than or equal to 250.";
        }

        if (!is_null($this->container['customer_key']) && (mb_strlen($this->container['customer_key']) > 36)) {
            $invalidProperties[] = "invalid value for 'customer_key', the character length must be smaller than or equal to 36.";
        }

        if (!is_null($this->container['recurrent']) && (mb_strlen($this->container['recurrent']) > 1)) {
            $invalidProperties[] = "invalid value for 'recurrent', the character length must be smaller than or equal to 1.";
        }

        $allowedValues = $this->getPayTypeAllowableValues();
        if (!is_null($this->container['pay_type']) && !in_array($this->container['pay_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'pay_type', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        if (!is_null($this->container['language']) && (mb_strlen($this->container['language']) > 2)) {
            $invalidProperties[] = "invalid value for 'language', the character length must be smaller than or equal to 2.";
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets terminal_key
     *
     * @return string
     */
    public function getTerminalKey()
    {
        return $this->container['terminal_key'];
    }

    /**
     * Sets terminal_key
     *
     * @param string $terminal_key Идентификатор терминала.  Выдается Мерчанту Тинькофф Кассой при заведении терминала
     *
     * @return $this
     */
    public function setTerminalKey($terminal_key)
    {
        if ((mb_strlen($terminal_key) > 20)) {
            throw new \InvalidArgumentException('invalid length for $terminal_key when calling InitFULL., must be smaller than or equal to 20.');
        }

        $this->container['terminal_key'] = $terminal_key;

        return $this;
    }

    /**
     * Gets amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->container['amount'];
    }

    /**
     * Sets amount
     *
     * @param float $amount * Сумма в копейках. Например, сумма 3руб. 12коп. - это число 312 * Параметр должен быть равен сумме всех параметров `Amount`, переданных в объекте `Items` * Минимальная сумма операции с помощью СБП составляет 10 руб.
     *
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->container['amount'] = $amount;

        return $this;
    }

    /**
     * Gets order_id
     *
     * @return string
     */
    public function getOrderId()
    {
        return $this->container['order_id'];
    }

    /**
     * Sets order_id
     *
     * @param string $order_id Идентификатор заказа в системе Мерчанта
     *
     * @return $this
     */
    public function setOrderId($order_id)
    {
        if ((mb_strlen($order_id) > 36)) {
            throw new \InvalidArgumentException('invalid length for $order_id when calling InitFULL., must be smaller than or equal to 36.');
        }

        $this->container['order_id'] = $order_id;

        return $this;
    }

    /**
     * Gets token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->container['token'];
    }

    /**
     * Sets token
     *
     * @param string $token Подпись запроса.
     *
     * @return $this
     */
    public function setToken($token)
    {
        $this->container['token'] = $token;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string|null $description Описание заказа.  * Поле необходимо обязательно заполнять для осуществления привязки и одновременной оплаты по CБП. При оплате через СБП данная информация будет отображена в приложении мобильного банка клиента. Максимально допустимое количество знаков для передачи назначения платежа в СБП - 140 символов.
     *
     * @return $this
     */
    public function setDescription($description)
    {
        if (!is_null($description) && (mb_strlen($description) > 250)) {
            throw new \InvalidArgumentException('invalid length for $description when calling InitFULL., must be smaller than or equal to 250.');
        }

        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets customer_key
     *
     * @return string|null
     */
    public function getCustomerKey()
    {
        return $this->container['customer_key'];
    }

    /**
     * Sets customer_key
     *
     * @param string|null $customer_key Идентификатор клиента в системе Мерчанта. * Обязателен, если передан атрибут `Recurrent`.  * Если был передан в запросе, в нотификации будет указан `CustomerKey` и его `CardId`. См. метод [GetCardList](#tag/Metody-raboty-s-kartami/paths/~1GetCardList/post). * Необходим для сохранения карт на платежной форме (платежи в один клик). * Не является обязательным при реккурентных платежах через СБП.
     *
     * @return $this
     */
    public function setCustomerKey($customer_key)
    {
        if (!is_null($customer_key) && (mb_strlen($customer_key) > 36)) {
            throw new \InvalidArgumentException('invalid length for $customer_key when calling InitFULL., must be smaller than or equal to 36.');
        }

        $this->container['customer_key'] = $customer_key;

        return $this;
    }

    /**
     * Gets recurrent
     *
     * @return string|null
     */
    public function getRecurrent()
    {
        return $this->container['recurrent'];
    }

    /**
     * Sets recurrent
     *
     * @param string|null $recurrent Признак родительского рекуррентного платежа.  * Для регистрации автоплатежа - обязателен. Если передается и установлен в Y, то регистрирует платеж как рекуррентный. В этом случае после оплаты в нотификации на AUTHORIZED будет передан параметр RebillId для использования в методе [Charge](#tag/Rekurrentnyj-platyozh/paths/~1Charge/post). Для осуществления привязки и одновременной оплаты по CБП необходимо передавать 'Y'
     *
     * @return $this
     */
    public function setRecurrent($recurrent)
    {
        if (!is_null($recurrent) && (mb_strlen($recurrent) > 1)) {
            throw new \InvalidArgumentException('invalid length for $recurrent when calling InitFULL., must be smaller than or equal to 1.');
        }

        $this->container['recurrent'] = $recurrent;

        return $this;
    }

    /**
     * Gets pay_type
     *
     * @return string|null
     */
    public function getPayType()
    {
        return $this->container['pay_type'];
    }

    /**
     * Sets pay_type
     *
     * @param string|null $pay_type Определяет тип проведения платежа – двухстадийная или одностадийная оплата. * \"O\" - одностадийная оплата, * \"T\" - двухстадийная оплата Если параметр передан - используется его значение. Если нет - значение в настройках терминала.
     *
     * @return $this
     */
    public function setPayType($pay_type)
    {
        $allowedValues = $this->getPayTypeAllowableValues();
        if (!is_null($pay_type) && !in_array($pay_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'pay_type', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['pay_type'] = $pay_type;

        return $this;
    }

    /**
     * Gets language
     *
     * @return string|null
     */
    public function getLanguage()
    {
        return $this->container['language'];
    }

    /**
     * Sets language
     *
     * @param string|null $language Язык платежной формы. * ru — русский * en — английский.  Если не передан, форма откроется на русском языке
     *
     * @return $this
     */
    public function setLanguage($language)
    {
        if (!is_null($language) && (mb_strlen($language) > 2)) {
            throw new \InvalidArgumentException('invalid length for $language when calling InitFULL., must be smaller than or equal to 2.');
        }

        $this->container['language'] = $language;

        return $this;
    }

    /**
     * Gets notification_url
     *
     * @return string|null
     */
    public function getNotificationUrl()
    {
        return $this->container['notification_url'];
    }

    /**
     * Sets notification_url
     *
     * @param string|null $notification_url URL на веб-сайте Мерчанта, куда будет отправлен POST запрос о статусе выполнения вызываемых методов  (настраивается в Личном кабинете): * Если параметр передан – используется его значение. * Если нет – значение в настройках терминала.
     *
     * @return $this
     */
    public function setNotificationUrl($notification_url)
    {
        $this->container['notification_url'] = $notification_url;

        return $this;
    }

    /**
     * Gets success_url
     *
     * @return string|null
     */
    public function getSuccessUrl()
    {
        return $this->container['success_url'];
    }

    /**
     * Sets success_url
     *
     * @param string|null $success_url URL на веб-сайте Мерчанта, куда будет переведен клиент в случае успешной оплаты (настраивается в Личном кабинете): * Если параметр передан – используется его значение. * Если нет – значение в настройках терминала.
     *
     * @return $this
     */
    public function setSuccessUrl($success_url)
    {
        $this->container['success_url'] = $success_url;

        return $this;
    }

    /**
     * Gets fail_url
     *
     * @return string|null
     */
    public function getFailUrl()
    {
        return $this->container['fail_url'];
    }

    /**
     * Sets fail_url
     *
     * @param string|null $fail_url URL на веб-сайте Мерчанта, куда будет переведен клиент в случае неуспешной оплаты (настраивается в Личном кабинете): * Если параметр передан – используется его значение. * Если нет – значение в настройках терминала.
     *
     * @return $this
     */
    public function setFailUrl($fail_url)
    {
        $this->container['fail_url'] = $fail_url;

        return $this;
    }

    /**
     * Gets redirect_due_date
     *
     * @return object|null
     */
    public function getRedirectDueDate()
    {
        return $this->container['redirect_due_date'];
    }

    /**
     * Sets redirect_due_date
     *
     * @param object|null $redirect_due_date Cрок жизни ссылки или динамического QR-кода СБП (если выбран данный способ оплаты). Если текущая дата превышает дату, переданную в данном параметре, ссылка для оплаты или возможность платежа по QR-коду становятся недоступными и платёж выполнить нельзя. * Максимальное значение: 90 дней от текущей даты. * Минимальное значение: 1 минута от текущей даты. * Формат даты: YYYY-MM-DDTHH24:MI:SS+GMT * Пример даты: 2016-08-31T12:28:00+03:00 <br> Если не передан, принимает значение 24 часа для платежа  и 30 дней для счета  В случае, если параметр RedirectDueDate не был передан, проверяется настроечный параметр платежного терминала REDIRECT_TIMEOUT, который может содержать значение срока жизни ссылки в часах. Если его значение больше нуля, то оно будет установлено в качестве срока жизни ссылки или динамического QR-кода. Иначе, устанавливается значение «по умолчанию» - 1440 мин.(1 сутки)
     *
     * @return $this
     */
    public function setRedirectDueDate($redirect_due_date)
    {
        $this->container['redirect_due_date'] = $redirect_due_date;

        return $this;
    }

    /**
     * Gets data
     *
     * @return object|null
     */
    public function getData()
    {
        return $this->container['data'];
    }

    /**
     * Sets data
     *
     * @param object|null $data JSON-объект, который позволяет передавать дополнительные параметры по операции и задавать определенные настройки в формате \"ключ\":\"значение\".  Максимальная длина для каждого передаваемого параметра:   * Ключ - 20 знаков   * Значение - 100 знаков.  Максимальное количество пар \"ключ\":\"значение\" - 20.  1. Если у терминала включена опция привязки клиента после  успешной оплаты и передается параметр `CustomerKey`, то в передаваемых  параметрах `DATA` могут присутствовать параметры метода **AddCustomer**.  Если они присутствуют, то автоматически привязываются к клиенту. Например, если указать:  ``` \"DATA\":{\"Phone\":\"+71234567890\", \"Email\":\"a@test.com\"} ```  к клиенту автоматически будут привязаны данные Email и телефон,  и они будут возвращаться при вызове метода **GetCustomer**.      Для МСС 4814 обязательно передать значение в параметре `Phone`.     Требования по заполнению:        * минимум 7 символов       * максимум 20 символов       * разрешены только цифры, исключение - первый символ может быть «+»      Для МСС 6051 и 6050 обязательно передать параметр `account` (номер электронного кошелька, не должен превышать 30 символов). Пример:     ```     \"DATA\": {\"account\":\"123456789\"}     ``` 2. Если используется функционал сохранения карт на платежной форме,  то при помощи опционального параметра `DefaultCard` можно задать  какая карта будет выбираться по умолчанию.  Возможные варианты: * Оставить платежную форму пустой. Пример:   ```   \"DATA\":{\"DefaultCard\":\"none\"}   ``` * Заполнить данными передаваемой карты. В этом случае передается `CardId`. Пример:   ```    \"DATA\":{\"DefaultCard\":\"894952\"}   ``` * Заполнить данными последней сохраненной карты. Применяется, если параметр `DefaultCard` не передан, передан с некорректным значением или в значении null. По умолчанию возможность сохранение карт на платежной форме может быть отключена. Для активации обратитесь в службу технической поддержки.  3. При реализации подключения оплаты через Yandex Pay Web или Tinkoff Pay Web, необходимо обязательно передавать следующие параметры в объекте Data. Пример:   ```   \"DATA\": {     \"TinkoffPayWeb\": \"true\",     \"Device\": \"Desktop\",     \"DeviceOs\": \"iOS\",     \"DeviceWebView\": \"true\",     \"DeviceBrowser\": \"Safari\"    }   ``` где следует передать параметры устройства, с которого будет осуществлен переход.  4. Параметр `notificationEnableSource` позволяет отправлять нотификации только если Source (также присутствует в параметрах сессии) платежа входит в перечень указанных в параметре. Возможные варианты: TinkoffPay, sbpqr, YandexPay. Пример:  ```  notificationEnableSource=TinkoffPay  ```   5. Для осуществления привязки и одновременной оплаты по CБП необходимо передавать параметр \"QR\" = \"true\"
     *
     * @return $this
     */
    public function setData($data)
    {
        $this->container['data'] = $data;

        return $this;
    }

    /**
     * Gets receipt
     *
     * @return object|null
     */
    public function getReceipt()
    {
        return $this->container['receipt'];
    }

    /**
     * Sets receipt
     *
     * @param object|null $receipt JSON-объект с данными чека. Обязателен, если подключена онлайн-касса.
     *
     * @return $this
     */
    public function setReceipt($receipt)
    {
        $this->container['receipt'] = $receipt;

        return $this;
    }

    /**
     * Gets shops
     *
     * @return \OpenAPI\Client\Model\Shops[]|null
     */
    public function getShops()
    {
        return $this->container['shops'];
    }

    /**
     * Sets shops
     *
     * @param \OpenAPI\Client\Model\Shops[]|null $shops JSON-объект с данными Маркетплейса. Обязательный для маркетплейсов.
     *
     * @return $this
     */
    public function setShops($shops)
    {
        $this->container['shops'] = $shops;

        return $this;
    }

    /**
     * Gets descriptor
     *
     * @return string|null
     */
    public function getDescriptor()
    {
        return $this->container['descriptor'];
    }

    /**
     * Sets descriptor
     *
     * @param string|null $descriptor Динамический дескриптор точки
     *
     * @return $this
     */
    public function setDescriptor($descriptor)
    {
        $this->container['descriptor'] = $descriptor;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }
}


