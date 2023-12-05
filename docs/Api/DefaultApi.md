# OpenAPI\Client\DefaultApi

All URIs are relative to *https://securepay.tinkoff.ru/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**addAccountQrPost**](DefaultApi.md#addAccountQrPost) | **POST** /AddAccountQr | Привязка счёта к магазину
[**addCardPost**](DefaultApi.md#addCardPost) | **POST** /AddCard | Инициализация привязки карты к клиенту
[**addCustomerPost**](DefaultApi.md#addCustomerPost) | **POST** /AddCustomer | Регистрация клиента
[**attachCardPost**](DefaultApi.md#attachCardPost) | **POST** /AttachCard | Привязка карты
[**cancelPost**](DefaultApi.md#cancelPost) | **POST** /Cancel | Отмена платежа
[**chargePost**](DefaultApi.md#chargePost) | **POST** /Charge | Автоплатёж
[**chargeQrPost**](DefaultApi.md#chargeQrPost) | **POST** /ChargeQr | Автоплатеж по QR
[**check3dsVersionPost**](DefaultApi.md#check3dsVersionPost) | **POST** /Check3dsVersion | Проверка версии 3DS
[**checkOrderPost**](DefaultApi.md#checkOrderPost) | **POST** /CheckOrder | Получение статуса заказа
[**confirmPost**](DefaultApi.md#confirmPost) | **POST** /Confirm | Подтверждение платежа
[**finishAuthorizePost**](DefaultApi.md#finishAuthorizePost) | **POST** /FinishAuthorize | Подтверждение платежа
[**getAccountQrListPost**](DefaultApi.md#getAccountQrListPost) | **POST** /GetAccountQrList | Получение списка счетов, привязанных к магазину
[**getAddAccountQrStatePost**](DefaultApi.md#getAddAccountQrStatePost) | **POST** /GetAddAccountQrState | Получение статуса привязки счёта к магазину
[**getAddCardStatePost**](DefaultApi.md#getAddCardStatePost) | **POST** /GetAddCardState | Статус привязки карты
[**getCardListPost**](DefaultApi.md#getCardListPost) | **POST** /GetCardList | Список карт клиента
[**getConfirmOperationPost**](DefaultApi.md#getConfirmOperationPost) | **POST** /getConfirmOperation | Получение справки по операции
[**getCustomerPost**](DefaultApi.md#getCustomerPost) | **POST** /GetCustomer | Получение данных клиента
[**getQRStatePost**](DefaultApi.md#getQRStatePost) | **POST** /GetQRState | Получение статуса возврата
[**getQrPost**](DefaultApi.md#getQrPost) | **POST** /GetQr | Формирование QR
[**getStatePost**](DefaultApi.md#getStatePost) | **POST** /GetState | Получение статуса платежа
[**initPayments**](DefaultApi.md#initPayments) | **POST** /InitPayments | Инициировать платеж в виджете
[**initPost**](DefaultApi.md#initPost) | **POST** /Init | Инициилизация платежа
[**notificationPost**](DefaultApi.md#notificationPost) | **POST** /Notification | Нотификации
[**removeCardPost**](DefaultApi.md#removeCardPost) | **POST** /RemoveCard | Удаление привязанной карты клиента
[**removeCustomerPost**](DefaultApi.md#removeCustomerPost) | **POST** /RemoveCustomer | Удаление данных клиента
[**sbpPayTest**](DefaultApi.md#sbpPayTest) | **POST** /SbpPayTest | Создание тестовой платежной сессии
[**sendClosingReceiptPost**](DefaultApi.md#sendClosingReceiptPost) | **POST** /SendClosingReceipt | Закрывающий чек в кассу
[**submitRandomAmountPost**](DefaultApi.md#submitRandomAmountPost) | **POST** /SubmitRandomAmount | SubmitRandomAmount


# **addAccountQrPost**
> \OpenAPI\Client\Model\AddAccountQrResponse addAccountQrPost($add_account_qr)

Привязка счёта к магазину

Метод инициирует привязку счета клиента к магазину и возвращает информацию о нём

### Example
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

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **add_account_qr** | [**\OpenAPI\Client\Model\AddAccountQr**](../Model/AddAccountQr.md)|  |

### Return type

[**\OpenAPI\Client\Model\AddAccountQrResponse**](../Model/AddAccountQrResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **addCardPost**
> object addCardPost($unknown_base_type)

Инициализация привязки карты к клиенту

`Для Мерчантов с PCI DSS`  <br> Метод инициирует привязку карты к клиенту.   В случае успешной привязки переадресует клиента на `Success Add Card URL`,   в противном случае на `Fail Add Card URL`.   Можно использовать форму Тинькофф Кассы, возможно заменить на кастомную форму

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new OpenAPI\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$unknown_base_type = new \OpenAPI\Client\Model\UNKNOWN_BASE_TYPE(); // \OpenAPI\Client\Model\UNKNOWN_BASE_TYPE | 

try {
    $result = $apiInstance->addCardPost($unknown_base_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->addCardPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **unknown_base_type** | [**\OpenAPI\Client\Model\UNKNOWN_BASE_TYPE**](../Model/UNKNOWN_BASE_TYPE.md)|  |

### Return type

**object**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **addCustomerPost**
> \OpenAPI\Client\Model\AddCustomerResponse addCustomerPost($add_customer)

Регистрация клиента

Регистрирует клиента в связке с терминалом. Возможна автоматическая привязка клиента и карты, по которой был совершен платеж, при передаче параметра `CustomerKey` в методе **Init**. Это можно использовать для сохранения и последующего отображения клиенту замаскированного номера карты, по которой будет совершен рекуррентный платеж

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new OpenAPI\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$add_customer = new \OpenAPI\Client\Model\AddCustomer(); // \OpenAPI\Client\Model\AddCustomer | 

try {
    $result = $apiInstance->addCustomerPost($add_customer);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->addCustomerPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **add_customer** | [**\OpenAPI\Client\Model\AddCustomer**](../Model/AddCustomer.md)|  |

### Return type

[**\OpenAPI\Client\Model\AddCustomerResponse**](../Model/AddCustomerResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **attachCardPost**
> \OpenAPI\Client\Model\AttachCardResponse attachCardPost($attach_card)

Привязка карты

`Для Мерчантов с PCI DSS`  <br> Завершает привязку карты к клиенту.    В случае успешной привязки переадресует клиента на **Success Add Card URL**  в противном случае на **Fail Add Card URL**.    Для прохождения 3DS второй версии перед вызовом метода должен быть вызван **_/v2/check3dsVersion**  и выполнен **3DS Method**, который является обязательным при прохождении **3DS** по протоколу версии  2.0.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new OpenAPI\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$attach_card = new \OpenAPI\Client\Model\AttachCard(); // \OpenAPI\Client\Model\AttachCard | 

try {
    $result = $apiInstance->attachCardPost($attach_card);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->attachCardPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **attach_card** | [**\OpenAPI\Client\Model\AttachCard**](../Model/AttachCard.md)|  |

### Return type

[**\OpenAPI\Client\Model\AttachCardResponse**](../Model/AttachCardResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **cancelPost**
> \OpenAPI\Client\Model\Cancel2 cancelPost($cancel)

Отмена платежа

Отменяет платежную сессию. В зависимости от статуса платежа переводит его в следующие состояния:  * NEW - CANCELED * AUTHORIZED - PARTIAL_REVERSED – если отмена не на полную сумму * AUTHORIZED - REVERSED - если отмена на полную сумму * CONFIRMED -  PARTIAL_REFUNDED – если отмена не на полную сумму * CONFIRMED -  REFUNDED – если отмена на полную сумму  Для платежей «в Рассрочку» отмена доступна только из статуса AUTHORIZED <br> Для платежей «Долями» если операция в статусе CONFIRMED или PARTIAL_REFUNDED будет осуществлен частичный либо полный возврат <br> Если платеж находился в статусе **AUTHORIZED** производится отмена холдирования средств на карте клиента. При переходе из статуса **CONFIRMED** – возврат денежных средств на карту клиента

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new OpenAPI\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$cancel = new \OpenAPI\Client\Model\Cancel(); // \OpenAPI\Client\Model\Cancel | 

try {
    $result = $apiInstance->cancelPost($cancel);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->cancelPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **cancel** | [**\OpenAPI\Client\Model\Cancel**](../Model/Cancel.md)|  |

### Return type

[**\OpenAPI\Client\Model\Cancel2**](../Model/Cancel2.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **chargePost**
> \OpenAPI\Client\Model\InlineResponse2001 chargePost($unknown_base_type)

Автоплатёж

# Схема проведения рекуррентного платежа  ## Описание  Осуществляет рекуррентный (повторный) платеж — безакцептное списание денежных средств со счета банковской карты клиента. Для возможности его использования клиент должен совершить хотя бы один платеж в пользу Мерчанта, который должен быть указан как рекуррентный (см. параметр Recurrent методе **Init**), фактически являющийся первичным. По завершении оплаты в нотификации на AUTHORIZED или CONFIRMED будет передан параметр `RebillId`. В дальнейшем для совершения рекуррентного платежа Мерчант должен вызвать метод **Init**, а затем без переадресации на PaymentURL вызвать метод **Charge** для оплаты по тем же самым реквизитам и передать параметр `RebillId`, полученный при совершении первичного платежа. Метод **Charge** работает по одностадийной и двухстадийной схеме оплаты. Чтобы перейти на двухстадийную схему нужно переключить терминал в [личном кабинете](https://business.tinkoff.ru/oplata/main), а также написать обращение на `acq_help@tinkoff.ru` с просьбой переключить схему рекуррентов.   ## Одностадийная оплата  1. Совершить родительский платеж путем вызова **Init** с указанием дополнительных параметров `Recurrent=Y` и `CustomerKey`. 2. Переадресовать клиента на `PaymentUrl` (только <span style=\"color:#900C3F\">для Мерчантов без PCI DSS</span>). 3. После оплаты заказа клиентом в нотификации на статус **AUTHORIZED** или **CONFIRMED** будет передан параметр `RebillId`, который необходимо сохранить. 4. Спустя некоторое время для совершения рекуррентного платежа необходимо вызвать метод **Init** со стандартным набором параметров (параметры `Recurrent` и `CustomerKey` здесь не нужны). 5. Получить в ответ на **Init** параметр `PaymentId`. 6. Вызвать метод **Charge** с параметром `RebillId`, полученным в п.3, и параметром `PaymentId`, полученным в п.5. При успешном сценарии операция перейдет в статус CONFIRMED.   ## Двухстадийная оплата  1. Совершить родительский платеж путем вызова **Init** с указанием дополнительных параметров `Recurrent=Y` и `CustomerKey`. 2. Переадресовать клиента на `PaymentUrl` (только <span style=\"color:#900C3F\">для Мерчантов без PCI DSS</span>). 3. После оплаты заказа клиентом в нотификации на статус **AUTHORIZED** или **CONFIRMED** будет передан параметр RebillId, который необходимо сохранить. 4. Спустя некоторое время для совершения рекуррентного платежа необходимо вызвать метод **Init** со стандартным набором параметров (параметр `Recurrent` и `CustomerKey` здесь не нужны). 5. Получить в ответ на **Init** параметр `PaymentId`. 6. Вызвать метод **Charge** с параметром `RebillId`, полученным в п.3, и параметром `PaymentId`, полученным в п.5. При успешном сценарии операция перейдет в статус **AUTHORIZED**. Денежные средства будут заблокированы на карте клиента. 7. Вызвать метод **Confirm** для подтверждения платежа

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new OpenAPI\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$unknown_base_type = new \OpenAPI\Client\Model\UNKNOWN_BASE_TYPE(); // \OpenAPI\Client\Model\UNKNOWN_BASE_TYPE | 

try {
    $result = $apiInstance->chargePost($unknown_base_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->chargePost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **unknown_base_type** | [**\OpenAPI\Client\Model\UNKNOWN_BASE_TYPE**](../Model/UNKNOWN_BASE_TYPE.md)|  |

### Return type

[**\OpenAPI\Client\Model\InlineResponse2001**](../Model/InlineResponse2001.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **chargeQrPost**
> \OpenAPI\Client\Model\ChargeQrResponse chargeQrPost($charge_qr)

Автоплатеж по QR

Проведение платежа по привязанному счету по QR через СБП. Для возможности его использования клиент должен совершить успешную привязку счета с  помощью метода **AddAccountQr**. После вызова метода будет отправлена нотификация на Notification URL о привязке счета , в которой будет указан AccountToken. Для совершения платежа по привязанному счета Мерчант должен вызвать метод **Init**, в котором поля  **Recurrent= Y** и **DATA= {“QR”:“true”}**, а затем вызвать метод **ChargeQr** для оплаты по тем же самым  реквизитам и передать параметр **AccountToken**, полученный после привязки счета по QR в  нотификации

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new OpenAPI\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$charge_qr = new \OpenAPI\Client\Model\ChargeQr(); // \OpenAPI\Client\Model\ChargeQr | 

try {
    $result = $apiInstance->chargeQrPost($charge_qr);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->chargeQrPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **charge_qr** | [**\OpenAPI\Client\Model\ChargeQr**](../Model/ChargeQr.md)|  |

### Return type

[**\OpenAPI\Client\Model\ChargeQrResponse**](../Model/ChargeQrResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **check3dsVersionPost**
> \OpenAPI\Client\Model\InlineResponse200 check3dsVersionPost($inline_object)

Проверка версии 3DS

`Для Мерчантов с PCI DSS`  <br> Проверяет поддерживаемую версию 3DS протокола по карточным данным из входящих  параметров.    При определении второй версии, возможно в ответе получение данных для прохождения  дополнительного метода `3DS Method`, который позволяет эмитенту собрать данные браузера  клиента – это может быть полезно при принятии решения в пользу **Frictionless Flow**  (аутентификация клиента без редиректа на страницу ACS) <br>

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new OpenAPI\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$inline_object = new \OpenAPI\Client\Model\InlineObject(); // \OpenAPI\Client\Model\InlineObject | 

try {
    $result = $apiInstance->check3dsVersionPost($inline_object);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->check3dsVersionPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **inline_object** | [**\OpenAPI\Client\Model\InlineObject**](../Model/InlineObject.md)|  | [optional]

### Return type

[**\OpenAPI\Client\Model\InlineResponse200**](../Model/InlineResponse200.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **checkOrderPost**
> \OpenAPI\Client\Model\CheckOrder2 checkOrderPost($check_order)

Получение статуса заказа

Метод возвращает статус заказа

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new OpenAPI\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$check_order = new \OpenAPI\Client\Model\CheckOrder(); // \OpenAPI\Client\Model\CheckOrder | 

try {
    $result = $apiInstance->checkOrderPost($check_order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->checkOrderPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **check_order** | [**\OpenAPI\Client\Model\CheckOrder**](../Model/CheckOrder.md)|  |

### Return type

[**\OpenAPI\Client\Model\CheckOrder2**](../Model/CheckOrder2.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **confirmPost**
> \OpenAPI\Client\Model\Confirm2 confirmPost($confirm)

Подтверждение платежа

Метод для списания заблокированных денежных средств. Используется при двухстадийном проведении платежа. Применим только к платежам в статусе **AUTHORIZED**. Статус транзакции перед разблокировкой выставляется в **CONFIRMING**. Сумма списания может быть меньше или равна сумме авторизации

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new OpenAPI\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$confirm = new \OpenAPI\Client\Model\Confirm(); // \OpenAPI\Client\Model\Confirm | 

try {
    $result = $apiInstance->confirmPost($confirm);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->confirmPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **confirm** | [**\OpenAPI\Client\Model\Confirm**](../Model/Confirm.md)|  |

### Return type

[**\OpenAPI\Client\Model\Confirm2**](../Model/Confirm2.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **finishAuthorizePost**
> object finishAuthorizePost($unknown_base_type)

Подтверждение платежа

`Для Мерчантов с PCI DSS`  <br> Метод подтверждает платеж передачей реквизитов, а также списывает средства   с карты клиента при одностадийной оплате и блокирует указанную сумму при   двухстадийной. Используется, если у площадки есть сертификация PCI DSS и   собственная платежная форма

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new OpenAPI\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$unknown_base_type = new \OpenAPI\Client\Model\UNKNOWN_BASE_TYPE(); // \OpenAPI\Client\Model\UNKNOWN_BASE_TYPE | 

try {
    $result = $apiInstance->finishAuthorizePost($unknown_base_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->finishAuthorizePost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **unknown_base_type** | [**\OpenAPI\Client\Model\UNKNOWN_BASE_TYPE**](../Model/UNKNOWN_BASE_TYPE.md)|  |

### Return type

**object**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getAccountQrListPost**
> \OpenAPI\Client\Model\GetAccountQrListResponse getAccountQrListPost($get_account_qr_list)

Получение списка счетов, привязанных к магазину

Метод возвращает список привязанных счетов клиента по магазину

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new OpenAPI\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$get_account_qr_list = new \OpenAPI\Client\Model\GetAccountQrList(); // \OpenAPI\Client\Model\GetAccountQrList | 

try {
    $result = $apiInstance->getAccountQrListPost($get_account_qr_list);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getAccountQrListPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **get_account_qr_list** | [**\OpenAPI\Client\Model\GetAccountQrList**](../Model/GetAccountQrList.md)|  | [optional]

### Return type

[**\OpenAPI\Client\Model\GetAccountQrListResponse**](../Model/GetAccountQrListResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getAddAccountQrStatePost**
> \OpenAPI\Client\Model\GetAddAccountQrStateResponse getAddAccountQrStatePost($get_add_account_qr_state)

Получение статуса привязки счёта к магазину

Метод возвращает статус привязки счета клиента по магазину

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new OpenAPI\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$get_add_account_qr_state = new \OpenAPI\Client\Model\GetAddAccountQrState(); // \OpenAPI\Client\Model\GetAddAccountQrState | 

try {
    $result = $apiInstance->getAddAccountQrStatePost($get_add_account_qr_state);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getAddAccountQrStatePost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **get_add_account_qr_state** | [**\OpenAPI\Client\Model\GetAddAccountQrState**](../Model/GetAddAccountQrState.md)|  | [optional]

### Return type

[**\OpenAPI\Client\Model\GetAddAccountQrStateResponse**](../Model/GetAddAccountQrStateResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getAddCardStatePost**
> \OpenAPI\Client\Model\GetAddCardStateResponse getAddCardStatePost($get_add_card_state)

Статус привязки карты

`Для мерчантов с PCI DSS`  <br> Метод возвращает статус привязки карты

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new OpenAPI\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$get_add_card_state = new \OpenAPI\Client\Model\GetAddCardState(); // \OpenAPI\Client\Model\GetAddCardState | 

try {
    $result = $apiInstance->getAddCardStatePost($get_add_card_state);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getAddCardStatePost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **get_add_card_state** | [**\OpenAPI\Client\Model\GetAddCardState**](../Model/GetAddCardState.md)|  |

### Return type

[**\OpenAPI\Client\Model\GetAddCardStateResponse**](../Model/GetAddCardStateResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getCardListPost**
> \OpenAPI\Client\Model\InlineResponse2003[] getCardListPost($unknown_base_type)

Список карт клиента

Возвращает список всех привязанных карт клиента, включая удаленные

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new OpenAPI\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$unknown_base_type = new \OpenAPI\Client\Model\UNKNOWN_BASE_TYPE(); // \OpenAPI\Client\Model\UNKNOWN_BASE_TYPE | 

try {
    $result = $apiInstance->getCardListPost($unknown_base_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getCardListPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **unknown_base_type** | [**\OpenAPI\Client\Model\UNKNOWN_BASE_TYPE**](../Model/UNKNOWN_BASE_TYPE.md)|  |

### Return type

[**\OpenAPI\Client\Model\InlineResponse2003[]**](../Model/InlineResponse2003.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getConfirmOperationPost**
> object getConfirmOperationPost($unknown_base_type)

Получение справки по операции

Справку по конкретной операции можно получить на: <br> 1. URL-сервиса, развернутого на своей стороне <br> 2. Электронную почту

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new OpenAPI\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$unknown_base_type = new \OpenAPI\Client\Model\UNKNOWN_BASE_TYPE(); // \OpenAPI\Client\Model\UNKNOWN_BASE_TYPE | 

try {
    $result = $apiInstance->getConfirmOperationPost($unknown_base_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getConfirmOperationPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **unknown_base_type** | [**\OpenAPI\Client\Model\UNKNOWN_BASE_TYPE**](../Model/UNKNOWN_BASE_TYPE.md)|  | [optional]

### Return type

**object**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getCustomerPost**
> \OpenAPI\Client\Model\GetCustomerResponse getCustomerPost($get_or_remove_customer)

Получение данных клиента

Возвращает данные клиента, сохраненные в связке с терминалом

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new OpenAPI\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$get_or_remove_customer = new \OpenAPI\Client\Model\GetOrRemoveCustomer(); // \OpenAPI\Client\Model\GetOrRemoveCustomer | 

try {
    $result = $apiInstance->getCustomerPost($get_or_remove_customer);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getCustomerPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **get_or_remove_customer** | [**\OpenAPI\Client\Model\GetOrRemoveCustomer**](../Model/GetOrRemoveCustomer.md)|  |

### Return type

[**\OpenAPI\Client\Model\GetCustomerResponse**](../Model/GetCustomerResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getQRStatePost**
> object getQRStatePost($inline_object4)

Получение статуса возврата

Возвращает статус возврата платежа по СБП

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new OpenAPI\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$inline_object4 = new \OpenAPI\Client\Model\InlineObject4(); // \OpenAPI\Client\Model\InlineObject4 | 

try {
    $result = $apiInstance->getQRStatePost($inline_object4);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getQRStatePost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **inline_object4** | [**\OpenAPI\Client\Model\InlineObject4**](../Model/InlineObject4.md)|  | [optional]

### Return type

**object**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getQrPost**
> object getQrPost($get_qr)

Формирование QR

Метод регистрирует QR и возвращает информацию о нем.  Должен быть вызван после вызова метода **Init**.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new OpenAPI\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$get_qr = new \OpenAPI\Client\Model\GetQr(); // \OpenAPI\Client\Model\GetQr | 

try {
    $result = $apiInstance->getQrPost($get_qr);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getQrPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **get_qr** | [**\OpenAPI\Client\Model\GetQr**](../Model/GetQr.md)|  |

### Return type

**object**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getStatePost**
> \OpenAPI\Client\Model\InlineResponse2002 getStatePost($unknown_base_type)

Получение статуса платежа

Метод возвращает статус платежа

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new OpenAPI\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$unknown_base_type = new \OpenAPI\Client\Model\UNKNOWN_BASE_TYPE(); // \OpenAPI\Client\Model\UNKNOWN_BASE_TYPE | 

try {
    $result = $apiInstance->getStatePost($unknown_base_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getStatePost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **unknown_base_type** | [**\OpenAPI\Client\Model\UNKNOWN_BASE_TYPE**](../Model/UNKNOWN_BASE_TYPE.md)|  |

### Return type

[**\OpenAPI\Client\Model\InlineResponse2002**](../Model/InlineResponse2002.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **initPayments**
> \OpenAPI\Client\Model\InitPaymentsResponse initPayments($init_payments)

Инициировать платеж в виджете

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new OpenAPI\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$init_payments = new \OpenAPI\Client\Model\InitPayments(); // \OpenAPI\Client\Model\InitPayments | 

try {
    $result = $apiInstance->initPayments($init_payments);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->initPayments: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **init_payments** | [**\OpenAPI\Client\Model\InitPayments**](../Model/InitPayments.md)|  |

### Return type

[**\OpenAPI\Client\Model\InitPaymentsResponse**](../Model/InitPaymentsResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **initPost**
> \OpenAPI\Client\Model\Response initPost($unknown_base_type)

Инициилизация платежа

Метод инициирует платежную сессию

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new OpenAPI\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$unknown_base_type = {"TerminalKey":"TinkoffBankTest","Amount":140000,"OrderId":"21090","Description":"Подарочная карта на 1000 рублей","Token":"68711168852240a2f34b6a8b19d2cfbd296c7d2a6dff8b23eda6278985959346","DATA":{"Phone":"+71234567890","Email":"a@test.com"},"Receipt":{"Email":"a@test.ru","Phone":"+79031234567","Taxation":"osn","Items":[{"Name":"Наименование товара 1","Price":10000,"Quantity":1,"Amount":10000,"Tax":"vat10","Ean13":"303130323930303030630333435"},{"Name":"Наименование товара 2","Price":20000,"Quantity":2,"Amount":40000,"Tax":"vat20"},{"Name":"Наименование товара 3","Price":30000,"Quantity":3,"Amount":90000,"Tax":"vat10"}]}}; // \OpenAPI\Client\Model\UNKNOWN_BASE_TYPE | 

try {
    $result = $apiInstance->initPost($unknown_base_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->initPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **unknown_base_type** | [**\OpenAPI\Client\Model\UNKNOWN_BASE_TYPE**](../Model/UNKNOWN_BASE_TYPE.md)|  |

### Return type

[**\OpenAPI\Client\Model\Response**](../Model/Response.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **notificationPost**
> notificationPost($unknown_base_type)

Нотификации

Метод реализуется на стороне Мерчанта для получения уведомлений об изменении статуса платежа.  > **Нотификации о привязке (NotificationAddCard)**  `Для Мерчантов с PCI DSS` <br> Уведомления магазину о статусе выполнения метода привязки карты `AttachCard`. После успешного выполнения метода `AttachCard` Тинькофф Касса отправляет POST-запрос с информацией о привязке карты. Нотификация отправляется на ресурс Мерчанта на адрес `Notification URL` синхронно и ожидает ответа в течение 10 секунд.  После получения ответа или неполучения его за заданное время сервис переадресует клиента на `Success AddCard URL` или `Fail AddCard URL` в зависимости от результата привязки карты. В случае успешной обработки нотификации Мерчант должен вернуть ответ с телом сообщения: OK (без тегов и заглавными английскими буквами). <br> Если тело сообщения отлично от **OK**, любая нотификация считается неуспешной, и сервис будет повторно отправлять нотификацию раз в час в течение 24 часов. Если нотификация за это время так и не доставлена, она складывается в дамп.  > **Нотификация о фискализации (NotificationFiscalization)** <br> Если используется подключенная онлайн касса, по результату фискализации будет отправлена нотификация с фискальными данными.  > **Нотификация о статусе привязки счета по QR (NotificationQr)** <br> После привязки счета по QR, магазину отправляется статус привязки и токен. Нотификация будет приходить по статусам **ACTIVE** и **INACTIVE**.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new OpenAPI\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$unknown_base_type = new \OpenAPI\Client\Model\UNKNOWN_BASE_TYPE(); // \OpenAPI\Client\Model\UNKNOWN_BASE_TYPE | 

try {
    $apiInstance->notificationPost($unknown_base_type);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->notificationPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **unknown_base_type** | [**\OpenAPI\Client\Model\UNKNOWN_BASE_TYPE**](../Model/UNKNOWN_BASE_TYPE.md)|  | [optional]

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **removeCardPost**
> \OpenAPI\Client\Model\RemoveCardResponse removeCardPost($remove_card)

Удаление привязанной карты клиента

Метод удаляет привязанную карту клиента

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new OpenAPI\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$remove_card = new \OpenAPI\Client\Model\RemoveCard(); // \OpenAPI\Client\Model\RemoveCard | 

try {
    $result = $apiInstance->removeCardPost($remove_card);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->removeCardPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **remove_card** | [**\OpenAPI\Client\Model\RemoveCard**](../Model/RemoveCard.md)|  |

### Return type

[**\OpenAPI\Client\Model\RemoveCardResponse**](../Model/RemoveCardResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **removeCustomerPost**
> \OpenAPI\Client\Model\RemoveCustomerResponse removeCustomerPost($get_or_remove_customer)

Удаление данных клиента

Удаляет сохраненные данные клиента

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new OpenAPI\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$get_or_remove_customer = new \OpenAPI\Client\Model\GetOrRemoveCustomer(); // \OpenAPI\Client\Model\GetOrRemoveCustomer | 

try {
    $result = $apiInstance->removeCustomerPost($get_or_remove_customer);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->removeCustomerPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **get_or_remove_customer** | [**\OpenAPI\Client\Model\GetOrRemoveCustomer**](../Model/GetOrRemoveCustomer.md)|  |

### Return type

[**\OpenAPI\Client\Model\RemoveCustomerResponse**](../Model/RemoveCustomerResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **sbpPayTest**
> \OpenAPI\Client\Model\SbpPayTestResponse sbpPayTest($sbp_pay_test)

Создание тестовой платежной сессии

Тестовая платежная сессия с предопределенным статусом по СБП.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new OpenAPI\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$sbp_pay_test = new \OpenAPI\Client\Model\SbpPayTest(); // \OpenAPI\Client\Model\SbpPayTest | 

try {
    $result = $apiInstance->sbpPayTest($sbp_pay_test);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->sbpPayTest: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **sbp_pay_test** | [**\OpenAPI\Client\Model\SbpPayTest**](../Model/SbpPayTest.md)|  |

### Return type

[**\OpenAPI\Client\Model\SbpPayTestResponse**](../Model/SbpPayTestResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **sendClosingReceiptPost**
> \OpenAPI\Client\Model\SendClosingReceipt2 sendClosingReceiptPost($send_closing_receipt)

Закрывающий чек в кассу

Метод позволяет отправить закрывающий чек в кассу. Условия работы метода: 1. Закрывающий чек может быть отправлен если платежная сессия по первому чеку находится в   статусе **CONFIRMED**. 2. В платежной сессии был передан объект `Receipt`. 3. В объекте `Receipt` был передан хотя бы один объект `Receipt.Items.PaymentMethod` =   `full_prepayment` или `prepayment` или `advance`

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new OpenAPI\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$send_closing_receipt = new \OpenAPI\Client\Model\SendClosingReceipt(); // \OpenAPI\Client\Model\SendClosingReceipt | 

try {
    $result = $apiInstance->sendClosingReceiptPost($send_closing_receipt);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->sendClosingReceiptPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **send_closing_receipt** | [**\OpenAPI\Client\Model\SendClosingReceipt**](../Model/SendClosingReceipt.md)|  |

### Return type

[**\OpenAPI\Client\Model\SendClosingReceipt2**](../Model/SendClosingReceipt2.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **submitRandomAmountPost**
> \OpenAPI\Client\Model\InlineResponse2004 submitRandomAmountPost($inline_object1)

SubmitRandomAmount

Метод предназначен для подтверждения карты путем блокировки случайной суммы

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new OpenAPI\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$inline_object1 = new \OpenAPI\Client\Model\InlineObject1(); // \OpenAPI\Client\Model\InlineObject1 | 

try {
    $result = $apiInstance->submitRandomAmountPost($inline_object1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->submitRandomAmountPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **inline_object1** | [**\OpenAPI\Client\Model\InlineObject1**](../Model/InlineObject1.md)|  | [optional]

### Return type

[**\OpenAPI\Client\Model\InlineResponse2004**](../Model/InlineResponse2004.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

