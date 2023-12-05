# OpenAPI\Client\TinkoffPayApi

All URIs are relative to *https://securepay.tinkoff.ru/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**initPayments**](TinkoffPayApi.md#initPayments) | **POST** /InitPayments | Инициировать платеж в виджете
[**tinkoffPayEventPost**](TinkoffPayApi.md#tinkoffPayEventPost) | **POST** /TinkoffPayEvent | Передача уведомления о событии
[**tinkoffPayPaymentIdQRGet**](TinkoffPayApi.md#tinkoffPayPaymentIdQRGet) | **GET** /TinkoffPay/{paymentId}/QR | Получение QR
[**tinkoffPayTerminalsTerminalKeyStatusGet**](TinkoffPayApi.md#tinkoffPayTerminalsTerminalKeyStatusGet) | **GET** /TinkoffPay/terminals/{TerminalKey}/status | Статус
[**tinkoffPayTransactionsPaymentIdVersionsVersionLinkGet**](TinkoffPayApi.md#tinkoffPayTransactionsPaymentIdVersionsVersionLinkGet) | **GET** /TinkoffPay/transactions/{paymentId}/versions/{version}/link | Получение ссылки


# **initPayments**
> \OpenAPI\Client\Model\InitPaymentsResponse initPayments($init_payments)

Инициировать платеж в виджете

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new OpenAPI\Client\Api\TinkoffPayApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$init_payments = new \OpenAPI\Client\Model\InitPayments(); // \OpenAPI\Client\Model\InitPayments | 

try {
    $result = $apiInstance->initPayments($init_payments);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TinkoffPayApi->initPayments: ', $e->getMessage(), PHP_EOL;
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

# **tinkoffPayEventPost**
> \OpenAPI\Client\Model\InlineResponse2009 tinkoffPayEventPost($tinkoff_pay_event)

Передача уведомления о событии

Передача уведомления о событии платежного виджета Tinkoff Pay+Tinkoff ID

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new OpenAPI\Client\Api\TinkoffPayApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$tinkoff_pay_event = new \OpenAPI\Client\Model\TinkoffPayEvent(); // \OpenAPI\Client\Model\TinkoffPayEvent | 

try {
    $result = $apiInstance->tinkoffPayEventPost($tinkoff_pay_event);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TinkoffPayApi->tinkoffPayEventPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **tinkoff_pay_event** | [**\OpenAPI\Client\Model\TinkoffPayEvent**](../Model/TinkoffPayEvent.md)|  |

### Return type

[**\OpenAPI\Client\Model\InlineResponse2009**](../Model/InlineResponse2009.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **tinkoffPayPaymentIdQRGet**
> \SplFileObject tinkoffPayPaymentIdQRGet($payment_id)

Получение QR

Метод получения QR для десктопов.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new OpenAPI\Client\Api\TinkoffPayApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$payment_id = 700001702044; // float | Уникальный идентификатор транзакции в системе Тинькофф Кассы

try {
    $result = $apiInstance->tinkoffPayPaymentIdQRGet($payment_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TinkoffPayApi->tinkoffPayPaymentIdQRGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payment_id** | **float**| Уникальный идентификатор транзакции в системе Тинькофф Кассы |

### Return type

[**\SplFileObject**](../Model/\SplFileObject.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: image/svg

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **tinkoffPayTerminalsTerminalKeyStatusGet**
> \OpenAPI\Client\Model\InlineResponse2007 tinkoffPayTerminalsTerminalKeyStatusGet($terminal_key)

Статус

Метод определения возможности проведения платежа Tinkoff Pay на терминале и устройстве

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new OpenAPI\Client\Api\TinkoffPayApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$terminal_key = testRegress; // string | Платежный ключ, выдается Мерчанту при заведении терминала

try {
    $result = $apiInstance->tinkoffPayTerminalsTerminalKeyStatusGet($terminal_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TinkoffPayApi->tinkoffPayTerminalsTerminalKeyStatusGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **terminal_key** | **string**| Платежный ключ, выдается Мерчанту при заведении терминала |

### Return type

[**\OpenAPI\Client\Model\InlineResponse2007**](../Model/InlineResponse2007.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **tinkoffPayTransactionsPaymentIdVersionsVersionLinkGet**
> \OpenAPI\Client\Model\InlineResponse2008 tinkoffPayTransactionsPaymentIdVersionsVersionLinkGet($payment_id, $version)

Получение ссылки

Метод получения Link для безусловного редиректа на мобильных устройствах

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new OpenAPI\Client\Api\TinkoffPayApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$payment_id = 13660; // float | Идентификатор платежа в системе Тинькофф Кассы
$version = 1.0; // string | Версия Tinkoff Pay, доступная на терминале: * 1.0 (e-invoice) * 2.0 (Tinkoff Pay)

try {
    $result = $apiInstance->tinkoffPayTransactionsPaymentIdVersionsVersionLinkGet($payment_id, $version);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TinkoffPayApi->tinkoffPayTransactionsPaymentIdVersionsVersionLinkGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payment_id** | **float**| Идентификатор платежа в системе Тинькофф Кассы |
 **version** | **string**| Версия Tinkoff Pay, доступная на терминале: * 1.0 (e-invoice) * 2.0 (Tinkoff Pay) |

### Return type

[**\OpenAPI\Client\Model\InlineResponse2008**](../Model/InlineResponse2008.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

