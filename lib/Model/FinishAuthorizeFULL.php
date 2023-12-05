<?php
/**
 * FinishAuthorizeFULL
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
 * FinishAuthorizeFULL Class Doc Comment
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class FinishAuthorizeFULL implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'FinishAuthorize_FULL';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'terminal_key' => 'string',
        'payment_id' => 'float',
        'token' => 'string',
        'ip' => 'string',
        'send_email' => 'bool',
        'source' => 'string',
        'data' => 'object',
        'info_email' => 'string',
        'encrypted_payment_data' => 'string',
        'card_data' => 'string',
        'amount' => 'float',
        'device_channel' => 'string',
        'route' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'terminal_key' => null,
        'payment_id' => null,
        'token' => null,
        'ip' => null,
        'send_email' => null,
        'source' => null,
        'data' => null,
        'info_email' => 'email',
        'encrypted_payment_data' => null,
        'card_data' => null,
        'amount' => null,
        'device_channel' => null,
        'route' => null
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
        'payment_id' => 'PaymentId',
        'token' => 'Token',
        'ip' => 'IP',
        'send_email' => 'SendEmail',
        'source' => 'Source',
        'data' => 'DATA',
        'info_email' => 'InfoEmail',
        'encrypted_payment_data' => 'EncryptedPaymentData',
        'card_data' => 'CardData',
        'amount' => 'Amount',
        'device_channel' => 'deviceChannel',
        'route' => 'Route'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'terminal_key' => 'setTerminalKey',
        'payment_id' => 'setPaymentId',
        'token' => 'setToken',
        'ip' => 'setIp',
        'send_email' => 'setSendEmail',
        'source' => 'setSource',
        'data' => 'setData',
        'info_email' => 'setInfoEmail',
        'encrypted_payment_data' => 'setEncryptedPaymentData',
        'card_data' => 'setCardData',
        'amount' => 'setAmount',
        'device_channel' => 'setDeviceChannel',
        'route' => 'setRoute'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'terminal_key' => 'getTerminalKey',
        'payment_id' => 'getPaymentId',
        'token' => 'getToken',
        'ip' => 'getIp',
        'send_email' => 'getSendEmail',
        'source' => 'getSource',
        'data' => 'getData',
        'info_email' => 'getInfoEmail',
        'encrypted_payment_data' => 'getEncryptedPaymentData',
        'card_data' => 'getCardData',
        'amount' => 'getAmount',
        'device_channel' => 'getDeviceChannel',
        'route' => 'getRoute'
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

    const SOURCE_CARDS = 'cards';
    const SOURCE_BEELINE = 'beeline';
    const SOURCE_MTS = 'mts';
    const SOURCE_TELE2 = 'tele2';
    const SOURCE_MEGAFON = 'megafon';
    const SOURCE_EINVOICING = 'einvoicing';
    const SOURCE_WEBMONEY = 'webmoney';
    const SOURCE_YANDEX_PAY = 'YandexPay';
    const ROUTE_ACQ = 'ACQ';
    const ROUTE_MC = 'MC';
    const ROUTE_EINV = 'EINV';
    const ROUTE_WM = 'WM';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getSourceAllowableValues()
    {
        return [
            self::SOURCE_CARDS,
            self::SOURCE_BEELINE,
            self::SOURCE_MTS,
            self::SOURCE_TELE2,
            self::SOURCE_MEGAFON,
            self::SOURCE_EINVOICING,
            self::SOURCE_WEBMONEY,
            self::SOURCE_YANDEX_PAY,
        ];
    }
    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getRouteAllowableValues()
    {
        return [
            self::ROUTE_ACQ,
            self::ROUTE_MC,
            self::ROUTE_EINV,
            self::ROUTE_WM,
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
        $this->container['payment_id'] = isset($data['payment_id']) ? $data['payment_id'] : null;
        $this->container['token'] = isset($data['token']) ? $data['token'] : null;
        $this->container['ip'] = isset($data['ip']) ? $data['ip'] : null;
        $this->container['send_email'] = isset($data['send_email']) ? $data['send_email'] : null;
        $this->container['source'] = isset($data['source']) ? $data['source'] : null;
        $this->container['data'] = isset($data['data']) ? $data['data'] : null;
        $this->container['info_email'] = isset($data['info_email']) ? $data['info_email'] : null;
        $this->container['encrypted_payment_data'] = isset($data['encrypted_payment_data']) ? $data['encrypted_payment_data'] : null;
        $this->container['card_data'] = isset($data['card_data']) ? $data['card_data'] : null;
        $this->container['amount'] = isset($data['amount']) ? $data['amount'] : null;
        $this->container['device_channel'] = isset($data['device_channel']) ? $data['device_channel'] : null;
        $this->container['route'] = isset($data['route']) ? $data['route'] : null;
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
        if ($this->container['payment_id'] === null) {
            $invalidProperties[] = "'payment_id' can't be null";
        }
        if ($this->container['token'] === null) {
            $invalidProperties[] = "'token' can't be null";
        }
        $allowedValues = $this->getSourceAllowableValues();
        if (!is_null($this->container['source']) && !in_array($this->container['source'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'source', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['card_data'] === null) {
            $invalidProperties[] = "'card_data' can't be null";
        }
        $allowedValues = $this->getRouteAllowableValues();
        if (!is_null($this->container['route']) && !in_array($this->container['route'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'route', must be one of '%s'",
                implode("', '", $allowedValues)
            );
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
        $this->container['terminal_key'] = $terminal_key;

        return $this;
    }

    /**
     * Gets payment_id
     *
     * @return float
     */
    public function getPaymentId()
    {
        return $this->container['payment_id'];
    }

    /**
     * Sets payment_id
     *
     * @param float $payment_id Уникальный идентификатор транзакции в системе Тинькофф Кассы
     *
     * @return $this
     */
    public function setPaymentId($payment_id)
    {
        $this->container['payment_id'] = $payment_id;

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
     * @param string $token Подпись запроса
     *
     * @return $this
     */
    public function setToken($token)
    {
        $this->container['token'] = $token;

        return $this;
    }

    /**
     * Gets ip
     *
     * @return string|null
     */
    public function getIp()
    {
        return $this->container['ip'];
    }

    /**
     * Sets ip
     *
     * @param string|null $ip IP-адрес клиента.  Обязательный параметр для 3DS второй версии. DS платежной системы требует  передавать данный адрес в полном формате,  без какихлибо сокращений (8 групп по 4 символа).  Данный формат регламентируется на уровне спецификации EMVCo.<br>  Пример правильного адреса:    ``` 2011:0db8:85a3:0101:0101:8a2e:0370:7334 ```<br> Пример неправильного адреса: ``` 2a00:1fa1:c7da:9285:0:51:838b:1001 ```
     *
     * @return $this
     */
    public function setIp($ip)
    {
        $this->container['ip'] = $ip;

        return $this;
    }

    /**
     * Gets send_email
     *
     * @return bool|null
     */
    public function getSendEmail()
    {
        return $this->container['send_email'];
    }

    /**
     * Sets send_email
     *
     * @param bool|null $send_email * true – отправлять клиенту информацию на почту об оплате * false – не отправлять
     *
     * @return $this
     */
    public function setSendEmail($send_email)
    {
        $this->container['send_email'] = $send_email;

        return $this;
    }

    /**
     * Gets source
     *
     * @return string|null
     */
    public function getSource()
    {
        return $this->container['source'];
    }

    /**
     * Sets source
     *
     * @param string|null $source Источник платежа. Значение параметра зависит от параметра Route. - ACQ - cards (так же поддерживается написание Cards), YandexPay - MC - beeline / mts / tele2 / megafon - EINV - einvoicing - WM - webmoney
     *
     * @return $this
     */
    public function setSource($source)
    {
        $allowedValues = $this->getSourceAllowableValues();
        if (!is_null($source) && !in_array($source, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'source', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['source'] = $source;

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
     * @param object|null $data JSON объект, содержащий дополнительные параметры в виде `ключ`:`значение`.  Данные параметры будут переданы на страницу оплаты (в случае ее кастомизации). Максимальная длина для каждого передаваемого параметра: * Ключ - 20 знаков; * Значение - 100 знаков. Максимальное количество пар `ключ`:`значение` не может  превышать 20.
     *
     * @return $this
     */
    public function setData($data)
    {
        $this->container['data'] = $data;

        return $this;
    }

    /**
     * Gets info_email
     *
     * @return string|null
     */
    public function getInfoEmail()
    {
        return $this->container['info_email'];
    }

    /**
     * Sets info_email
     *
     * @param string|null $info_email Email для отправки информации об оплате. Обязателен при передаче `SendEmail`
     *
     * @return $this
     */
    public function setInfoEmail($info_email)
    {
        $this->container['info_email'] = $info_email;

        return $this;
    }

    /**
     * Gets encrypted_payment_data
     *
     * @return string|null
     */
    public function getEncryptedPaymentData()
    {
        return $this->container['encrypted_payment_data'];
    }

    /**
     * Sets encrypted_payment_data
     *
     * @param string|null $encrypted_payment_data Данные карты. Используется и является обязательным только  для ApplePay или GooglePay
     *
     * @return $this
     */
    public function setEncryptedPaymentData($encrypted_payment_data)
    {
        $this->container['encrypted_payment_data'] = $encrypted_payment_data;

        return $this;
    }

    /**
     * Gets card_data
     *
     * @return string
     */
    public function getCardData()
    {
        return $this->container['card_data'];
    }

    /**
     * Sets card_data
     *
     * @param string $card_data Объект CardData собирается в виде списка `ключ`=`значение` c разделителем `;`. Объект зашифровывается открытым ключом (X509 RSA 2048), получившееся бинарное значение кодируется в `Base64`. Открытый ключ генерируется Тинькофф Кассой и выдается при регистрации терминала. Все поля обязательны.  |Наименование|Тип данных|Обязательность|Описание| |---|---|---|---| |PAN|Number|ДА|Номер карты| |ExpDate| Number|Да| Месяц и год срока действия карты в формате MMYY| |CardHolder |String| Нет| Имя и фамилия держателя карты (как на карте)| |CVV |String| Нет |Код защиты (с обратной стороны карты). Для платежей по Apple Pay (с расшифровкой токена на своей стороне) не является обязательным.| |ECI |String |Нет |Electronic Commerce Indicator. Индикатор, показывающий степень защиты, применяемую при предоставлении клиентом своих данных ТСП.| |CAVV |String |Нет |Cardholder Authentication Verification Value или Accountholder Authentication Value|   Пример значения элемента формы CardData: ``` PAN=4300000000000777;ExpDate=0519;CardHolder=IVAN PETROV;CVV=111 ```  Для YandexPay (расшифровка токена происходит на стороне Мерчанта) надо: 1. Передавать `Route=ACQ` и `Source=YandexPay`; 2. Передавать в `DATA.transactionId` значение `PaymentToken.messageId`; 3. Передавать в `DATA.YandexPayWeb` значение true; 4. Передавать параметр **CardData**:     Размапить параметры из расшифрованного токена `event.token`     - `paymentMethodDetails.pan` в **pan**;     - `paymentMethodDetails,expirationMonth` + `paymentMethodDetails.expirationYear` в **ExpDate**;     - `paymentMethodDetails.cryptogram` в **CAVV** (если есть);     - `paymentMethodDetails.eci` в **ECI** (если есть)<br>  Для MirPay (если интеграция с НСПК для получения платежного токена) надо: 1. Передавать `Route=ACQ` и `Source= MirPay`; 1. Передавать в `DATA.transId` значение `transId`; 2. Передавать в `DATA.tavv` значение `cav`; 3. Передавать параметр **CardData**:     - **Pan** заполнять `tan`;     - **ExpDate** заполнять `tem + tey`<br> Для случая, когда Мерчант интегрируется только с Банком для проведения платежа по MirPay данный  метод не вызывается. Эквайер самостоятельно получает платежный токен и инициирует авторизацию,  вместо Мерчанта.<br>   В случае получения **CAVV** в **CardData** оплата будет проводиться как оплата токеном, иначе прохождение 3DS будет регулироваться стандартными настройками треминала/платежа.  Не используется и не является обязательным, если передается `EncryptedPaymentData`
     *
     * @return $this
     */
    public function setCardData($card_data)
    {
        $this->container['card_data'] = $card_data;

        return $this;
    }

    /**
     * Gets amount
     *
     * @return float|null
     */
    public function getAmount()
    {
        return $this->container['amount'];
    }

    /**
     * Sets amount
     *
     * @param float|null $amount Сумма в копейках
     *
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->container['amount'] = $amount;

        return $this;
    }

    /**
     * Gets device_channel
     *
     * @return string|null
     */
    public function getDeviceChannel()
    {
        return $this->container['device_channel'];
    }

    /**
     * Sets device_channel
     *
     * @param string|null $device_channel Канал устройства. Поддерживается следующий канал устройства: * 01 = Application (APP) * 02 = Browser (BRW)
     *
     * @return $this
     */
    public function setDeviceChannel($device_channel)
    {
        $this->container['device_channel'] = $device_channel;

        return $this;
    }

    /**
     * Gets route
     *
     * @return string|null
     */
    public function getRoute()
    {
        return $this->container['route'];
    }

    /**
     * Sets route
     *
     * @param string|null $route Способ платежа. Является обязательным для Apple Pay или Google Pay.
     *
     * @return $this
     */
    public function setRoute($route)
    {
        $allowedValues = $this->getRouteAllowableValues();
        if (!is_null($route) && !in_array($route, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'route', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['route'] = $route;

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


