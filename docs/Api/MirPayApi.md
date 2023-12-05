# OpenAPI\Client\MirPayApi

All URIs are relative to *https://securepay.tinkoff.ru/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getDeepLinkPost**](MirPayApi.md#getDeepLinkPost) | **POST** /GetDeepLink | Получить DeepLink
[**getTerminalPayMethods**](MirPayApi.md#getTerminalPayMethods) | **GET** /GetTerminalPayMethods | Проверить доступность методов на SDK


# **getDeepLinkPost**
> \OpenAPI\Client\Model\GetDeepLinkResponse getDeepLinkPost($get_deep_link)

Получить DeepLink

Получение deeplink с включенным подписанным JWT-токеном. Предназначен для запроса по API

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new OpenAPI\Client\Api\MirPayApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$get_deep_link = new \OpenAPI\Client\Model\GetDeepLink(); // \OpenAPI\Client\Model\GetDeepLink | 

try {
    $result = $apiInstance->getDeepLinkPost($get_deep_link);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MirPayApi->getDeepLinkPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **get_deep_link** | [**\OpenAPI\Client\Model\GetDeepLink**](../Model/GetDeepLink.md)|  |

### Return type

[**\OpenAPI\Client\Model\GetDeepLinkResponse**](../Model/GetDeepLinkResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getTerminalPayMethods**
> \OpenAPI\Client\Model\GetTerminalPayMethodsResponse getTerminalPayMethods($get_terminal_pay_methods)

Проверить доступность методов на SDK

Метод определяет доступность методов оплаты на терминале для SDK и API. Запрос не шифруется токеном

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new OpenAPI\Client\Api\MirPayApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$get_terminal_pay_methods = new \OpenAPI\Client\Model\GetTerminalPayMethods(); // \OpenAPI\Client\Model\GetTerminalPayMethods | 

try {
    $result = $apiInstance->getTerminalPayMethods($get_terminal_pay_methods);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MirPayApi->getTerminalPayMethods: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **get_terminal_pay_methods** | [**\OpenAPI\Client\Model\GetTerminalPayMethods**](../Model/GetTerminalPayMethods.md)|  |

### Return type

[**\OpenAPI\Client\Model\GetTerminalPayMethodsResponse**](../Model/GetTerminalPayMethodsResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

