<?php
/**
 * ItemsFFD105
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
 * ItemsFFD105 Class Doc Comment
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class ItemsFFD105 implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Items_FFD_105';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'name' => 'string',
        'price' => 'float',
        'quantity' => 'float',
        'amount' => 'float',
        'payment_method' => 'string',
        'payment_object' => 'string',
        'tax' => 'string',
        'ean13' => 'string',
        'shop_code' => 'string',
        'agent_data' => '\OpenAPI\Client\Model\AgentData',
        'supplier_info' => '\OpenAPI\Client\Model\SupplierInfo'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'name' => null,
        'price' => null,
        'quantity' => null,
        'amount' => null,
        'payment_method' => null,
        'payment_object' => null,
        'tax' => null,
        'ean13' => null,
        'shop_code' => null,
        'agent_data' => null,
        'supplier_info' => null
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
        'name' => 'Name',
        'price' => 'Price',
        'quantity' => 'Quantity',
        'amount' => 'Amount',
        'payment_method' => 'PaymentMethod',
        'payment_object' => 'PaymentObject',
        'tax' => 'Tax',
        'ean13' => 'Ean13',
        'shop_code' => 'ShopCode',
        'agent_data' => 'AgentData',
        'supplier_info' => 'SupplierInfo'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'name' => 'setName',
        'price' => 'setPrice',
        'quantity' => 'setQuantity',
        'amount' => 'setAmount',
        'payment_method' => 'setPaymentMethod',
        'payment_object' => 'setPaymentObject',
        'tax' => 'setTax',
        'ean13' => 'setEan13',
        'shop_code' => 'setShopCode',
        'agent_data' => 'setAgentData',
        'supplier_info' => 'setSupplierInfo'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'name' => 'getName',
        'price' => 'getPrice',
        'quantity' => 'getQuantity',
        'amount' => 'getAmount',
        'payment_method' => 'getPaymentMethod',
        'payment_object' => 'getPaymentObject',
        'tax' => 'getTax',
        'ean13' => 'getEan13',
        'shop_code' => 'getShopCode',
        'agent_data' => 'getAgentData',
        'supplier_info' => 'getSupplierInfo'
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

    const PAYMENT_METHOD_FULL_PREPAYMENT = 'full_prepayment';
    const PAYMENT_METHOD_PREPAYMENT = 'prepayment';
    const PAYMENT_METHOD_ADVANCE = 'advance';
    const PAYMENT_METHOD_FULL_PAYMENT = 'full_payment';
    const PAYMENT_METHOD_PARTIAL_PAYMENT = 'partial_payment';
    const PAYMENT_METHOD_CREDIT = 'credit';
    const PAYMENT_METHOD_CREDIT_PAYMENT = 'credit_payment';
    const PAYMENT_OBJECT_COMMODITY = 'commodity';
    const PAYMENT_OBJECT_EXCISE = 'excise';
    const PAYMENT_OBJECT_JOB = 'job';
    const PAYMENT_OBJECT_SERVICE = 'service';
    const PAYMENT_OBJECT_GAMBLING_BET = 'gambling_bet';
    const PAYMENT_OBJECT_GAMBLING_PRIZE = 'gambling_prize';
    const PAYMENT_OBJECT_LOTTERY = 'lottery';
    const PAYMENT_OBJECT_LOTTERY_PRIZE = 'lottery_prize';
    const PAYMENT_OBJECT_INTELLECTUAL_ACTIVITY = 'intellectual_activity';
    const PAYMENT_OBJECT_PAYMENT = 'payment';
    const PAYMENT_OBJECT_AGENT_COMMISSION = 'agent_commission';
    const PAYMENT_OBJECT_COMPOSITE = 'composite';
    const PAYMENT_OBJECT_ANOTHER = 'another';
    const TAX_NONE = 'none';
    const TAX_VAT0 = 'vat0';
    const TAX_VAT10 = 'vat10';
    const TAX_VAT20 = 'vat20';
    const TAX_VAT110 = 'vat110';
    const TAX_VAT120 = 'vat120';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getPaymentMethodAllowableValues()
    {
        return [
            self::PAYMENT_METHOD_FULL_PREPAYMENT,
            self::PAYMENT_METHOD_PREPAYMENT,
            self::PAYMENT_METHOD_ADVANCE,
            self::PAYMENT_METHOD_FULL_PAYMENT,
            self::PAYMENT_METHOD_PARTIAL_PAYMENT,
            self::PAYMENT_METHOD_CREDIT,
            self::PAYMENT_METHOD_CREDIT_PAYMENT,
        ];
    }
    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getPaymentObjectAllowableValues()
    {
        return [
            self::PAYMENT_OBJECT_COMMODITY,
            self::PAYMENT_OBJECT_EXCISE,
            self::PAYMENT_OBJECT_JOB,
            self::PAYMENT_OBJECT_SERVICE,
            self::PAYMENT_OBJECT_GAMBLING_BET,
            self::PAYMENT_OBJECT_GAMBLING_PRIZE,
            self::PAYMENT_OBJECT_LOTTERY,
            self::PAYMENT_OBJECT_LOTTERY_PRIZE,
            self::PAYMENT_OBJECT_INTELLECTUAL_ACTIVITY,
            self::PAYMENT_OBJECT_PAYMENT,
            self::PAYMENT_OBJECT_AGENT_COMMISSION,
            self::PAYMENT_OBJECT_COMPOSITE,
            self::PAYMENT_OBJECT_ANOTHER,
        ];
    }
    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTaxAllowableValues()
    {
        return [
            self::TAX_NONE,
            self::TAX_VAT0,
            self::TAX_VAT10,
            self::TAX_VAT20,
            self::TAX_VAT110,
            self::TAX_VAT120,
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
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['price'] = isset($data['price']) ? $data['price'] : null;
        $this->container['quantity'] = isset($data['quantity']) ? $data['quantity'] : null;
        $this->container['amount'] = isset($data['amount']) ? $data['amount'] : null;
        $this->container['payment_method'] = isset($data['payment_method']) ? $data['payment_method'] : 'full_payment';
        $this->container['payment_object'] = isset($data['payment_object']) ? $data['payment_object'] : 'commodity';
        $this->container['tax'] = isset($data['tax']) ? $data['tax'] : null;
        $this->container['ean13'] = isset($data['ean13']) ? $data['ean13'] : null;
        $this->container['shop_code'] = isset($data['shop_code']) ? $data['shop_code'] : null;
        $this->container['agent_data'] = isset($data['agent_data']) ? $data['agent_data'] : null;
        $this->container['supplier_info'] = isset($data['supplier_info']) ? $data['supplier_info'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['name'] === null) {
            $invalidProperties[] = "'name' can't be null";
        }
        if ((mb_strlen($this->container['name']) > 128)) {
            $invalidProperties[] = "invalid value for 'name', the character length must be smaller than or equal to 128.";
        }

        if ($this->container['price'] === null) {
            $invalidProperties[] = "'price' can't be null";
        }
        if ($this->container['quantity'] === null) {
            $invalidProperties[] = "'quantity' can't be null";
        }
        if ($this->container['amount'] === null) {
            $invalidProperties[] = "'amount' can't be null";
        }
        $allowedValues = $this->getPaymentMethodAllowableValues();
        if (!is_null($this->container['payment_method']) && !in_array($this->container['payment_method'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'payment_method', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getPaymentObjectAllowableValues();
        if (!is_null($this->container['payment_object']) && !in_array($this->container['payment_object'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'payment_object', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['tax'] === null) {
            $invalidProperties[] = "'tax' can't be null";
        }
        $allowedValues = $this->getTaxAllowableValues();
        if (!is_null($this->container['tax']) && !in_array($this->container['tax'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'tax', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        if (!is_null($this->container['ean13']) && (mb_strlen($this->container['ean13']) > 300)) {
            $invalidProperties[] = "invalid value for 'ean13', the character length must be smaller than or equal to 300.";
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
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name Наименование товара.
     *
     * @return $this
     */
    public function setName($name)
    {
        if ((mb_strlen($name) > 128)) {
            throw new \InvalidArgumentException('invalid length for $name when calling ItemsFFD105., must be smaller than or equal to 128.');
        }

        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->container['price'];
    }

    /**
     * Sets price
     *
     * @param float $price Цена в копейках
     *
     * @return $this
     */
    public function setPrice($price)
    {
        $this->container['price'] = $price;

        return $this;
    }

    /**
     * Gets quantity
     *
     * @return float
     */
    public function getQuantity()
    {
        return $this->container['quantity'];
    }

    /**
     * Sets quantity
     *
     * @param float $quantity Количество или вес товара - Максимальное количество символов - 8, где целая часть не более 5 знаков, а дробная часть не более 3 знаков для АТОЛ, не более 2 знаков для CloudPayments
     *
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->container['quantity'] = $quantity;

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
     * @param float $amount Стоимость товара в копейках. Произведение Quantity и Price
     *
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->container['amount'] = $amount;

        return $this;
    }

    /**
     * Gets payment_method
     *
     * @return string|null
     */
    public function getPaymentMethod()
    {
        return $this->container['payment_method'];
    }

    /**
     * Sets payment_method
     *
     * @param string|null $payment_method Признак способа расчёта.  Возможные значения: * «lfull_prepayment» – предоплата 100% * «lprepayment» – предоплата * «ladvance» – аванс * «lfull_payment» – полный расчет * «lpartial_payment» – частичный расчет и кредит * «lcredit» – передача в кредит * «lcredit_payment» – оплата кредита <br>Если значение не передано, по умолчанию в онлайн-кассу передается признак способа расчёта \"full_payment\".
     *
     * @return $this
     */
    public function setPaymentMethod($payment_method)
    {
        $allowedValues = $this->getPaymentMethodAllowableValues();
        if (!is_null($payment_method) && !in_array($payment_method, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'payment_method', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['payment_method'] = $payment_method;

        return $this;
    }

    /**
     * Gets payment_object
     *
     * @return string|null
     */
    public function getPaymentObject()
    {
        return $this->container['payment_object'];
    }

    /**
     * Sets payment_object
     *
     * @param string|null $payment_object Признак предмета расчёта. Возможные значения: * commodity – товар * excise – подакцизный товар * job – работа * service – услуга * gambling_bet – ставка азартной игры * gambling_prize – выигрыш азартной игры * lottery – лотерейный билет * lottery_prize – выигрыш лотереи * intellectual_activity – предоставление результатов интеллектуальной деятельности * payment – платеж * agent_commission – агентское вознаграждение * composite – составной предмет расчета * another – иной предмет расчета <br>Если значение не передано, по умолчанию в онлайн-кассу отправляется признак предмета расчёта \"commodity\".
     *
     * @return $this
     */
    public function setPaymentObject($payment_object)
    {
        $allowedValues = $this->getPaymentObjectAllowableValues();
        if (!is_null($payment_object) && !in_array($payment_object, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'payment_object', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['payment_object'] = $payment_object;

        return $this;
    }

    /**
     * Gets tax
     *
     * @return string
     */
    public function getTax()
    {
        return $this->container['tax'];
    }

    /**
     * Sets tax
     *
     * @param string $tax Ставка НДС. Перечисление со значениями: * none - без НДС; * vat0 - НДС по ставке 0% * vat10 - НДС по ставке 10% * vat20 - НДС по ставке 20% * vat110 - НДС чека по расчетной ставке 10/110 * vat120 - НДС чека по расчетной ставке 20/120
     *
     * @return $this
     */
    public function setTax($tax)
    {
        $allowedValues = $this->getTaxAllowableValues();
        if (!in_array($tax, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'tax', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['tax'] = $tax;

        return $this;
    }

    /**
     * Gets ean13
     *
     * @return string|null
     */
    public function getEan13()
    {
        return $this->container['ean13'];
    }

    /**
     * Sets ean13
     *
     * @param string|null $ean13 Штрих-код в требуемом формате. В зависимости от типа кассы требования могут отличаться: * АТОЛ Онлайн - шестнадцатеричное представление с пробелами. Максимальная длина – 32 байта (^[a-fA-F0-9]{2}$)|(^([afA-F0-9]{2}\\\\s){1,31}[a-fA-F0-9]{2}$) Пример: 00 00 00 01 00 21 FA 41 00 23 05 41 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 12 00 AB 00 * CloudKassir - длина строки: четная, от 8 до 150 байт, т.е. от 16 до 300 ASCII символов ['0' - '9' , 'A' - 'F' ] шестнадцатеричного представления кода маркировки товара. Пример: 303130323930303030630333435 * OrangeData - строка, содержащая base64 кодированный массив от 8 до 32 байт Пример: igQVAAADMTIzNDU2Nzg5MDEyMwAAAAAAAQ== <br>В случае передачи в запросе параметра Ean13 не прошедшего валидацию, возвращается неуспешный ответ с текстом ошибки в параметре message = \"Неверный параметр Ean13\".
     *
     * @return $this
     */
    public function setEan13($ean13)
    {
        if (!is_null($ean13) && (mb_strlen($ean13) > 300)) {
            throw new \InvalidArgumentException('invalid length for $ean13 when calling ItemsFFD105., must be smaller than or equal to 300.');
        }

        $this->container['ean13'] = $ean13;

        return $this;
    }

    /**
     * Gets shop_code
     *
     * @return string|null
     */
    public function getShopCode()
    {
        return $this->container['shop_code'];
    }

    /**
     * Sets shop_code
     *
     * @param string|null $shop_code Код магазина. Для параметра ShopСode необходимо использовать значение параметра Submerchant_ID, полученного в ответ при регистрации магазинов через xml. Если xml не используется, передавать поле не нужно
     *
     * @return $this
     */
    public function setShopCode($shop_code)
    {
        $this->container['shop_code'] = $shop_code;

        return $this;
    }

    /**
     * Gets agent_data
     *
     * @return \OpenAPI\Client\Model\AgentData|null
     */
    public function getAgentData()
    {
        return $this->container['agent_data'];
    }

    /**
     * Sets agent_data
     *
     * @param \OpenAPI\Client\Model\AgentData|null $agent_data agent_data
     *
     * @return $this
     */
    public function setAgentData($agent_data)
    {
        $this->container['agent_data'] = $agent_data;

        return $this;
    }

    /**
     * Gets supplier_info
     *
     * @return \OpenAPI\Client\Model\SupplierInfo|null
     */
    public function getSupplierInfo()
    {
        return $this->container['supplier_info'];
    }

    /**
     * Sets supplier_info
     *
     * @param \OpenAPI\Client\Model\SupplierInfo|null $supplier_info supplier_info
     *
     * @return $this
     */
    public function setSupplierInfo($supplier_info)
    {
        $this->container['supplier_info'] = $supplier_info;

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


