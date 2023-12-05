# OpenAPI\Client\Class3DSApi

All URIs are relative to *https://securepay.tinkoff.ru/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**submit3DSAuthorizationPost**](Class3DSApi.md#submit3DSAuthorizationPost) | **POST** /Submit3DSAuthorization | Подтверждение прохождения 3DS v1.0
[**submit3DSAuthorizationV2Post**](Class3DSApi.md#submit3DSAuthorizationV2Post) | **POST** /Submit3DSAuthorizationV2 | Подтверждение прохождения 3DS v2.1


# **submit3DSAuthorizationPost**
> \OpenAPI\Client\Model\InlineResponse2005 submit3DSAuthorizationPost($md, $pa_res, $payment_id, $terminal_key, $token)

Подтверждение прохождения 3DS v1.0

`Для Мерчантов с PCI DSS`  <br> Осуществляет проверку результатов прохождения 3-D Secure и при успешном результате  прохождения 3-D Secure подтверждает инициированный платеж.  При использовании одностадийной оплаты осуществляет списание денежных средств с карты  клиента <br>  При двухстадийной оплате осуществляет блокировку указанной суммы на карте клиента<br>    *Формат запроса*: `x-www-form-urlencoded` <br>   После получения на `TermUrl` мерчанта ответа ACS с результатами прохождения 3-D Secure необходимо  сформировать запрос к методу **Submit3DSAuthorization**

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new OpenAPI\Client\Api\Class3DSApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$md = 'md_example'; // string | Уникальный идентификатор транзакции в системе Тинькофф Кассы (возвращается в ответе от ACS)
$pa_res = 'pa_res_example'; // string | Шифрованная строка, содержащая результаты 3-D Secure аутентификации (возвращается в ответе от ACS)
$payment_id = 'payment_id_example'; // string | Уникальный идентификатор транзакции в системе Тинькофф Кассы
$terminal_key = 'terminal_key_example'; // string | Идентификатор терминала, выдается Мерчанту Тинькофф Кассой
$token = 'token_example'; // string | Подпись запроса

try {
    $result = $apiInstance->submit3DSAuthorizationPost($md, $pa_res, $payment_id, $terminal_key, $token);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling Class3DSApi->submit3DSAuthorizationPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **md** | **string**| Уникальный идентификатор транзакции в системе Тинькофф Кассы (возвращается в ответе от ACS) |
 **pa_res** | **string**| Шифрованная строка, содержащая результаты 3-D Secure аутентификации (возвращается в ответе от ACS) |
 **payment_id** | **string**| Уникальный идентификатор транзакции в системе Тинькофф Кассы | [optional]
 **terminal_key** | **string**| Идентификатор терминала, выдается Мерчанту Тинькофф Кассой | [optional]
 **token** | **string**| Подпись запроса | [optional]

### Return type

[**\OpenAPI\Client\Model\InlineResponse2005**](../Model/InlineResponse2005.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/x-www-form-urlencoded
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **submit3DSAuthorizationV2Post**
> \OpenAPI\Client\Model\InlineResponse2006 submit3DSAuthorizationV2Post($payment_id, $terminal_key, $token)

Подтверждение прохождения 3DS v2.1

`Для Мерчантов с PCI DSS`  <br> Осуществляет проверку результатов прохождения 3-D Secure v2 и при успешном результате  прохождения 3-D Secure v2 подтверждает инициированный платеж.  При использовании одностадийной оплаты осуществляет списание денежных средств с карты  клиента.  При двухстадийной оплате осуществляет блокировку указанной суммы на карте клиента.    *Формат запроса*: `x-www-form-urlencoded` <br>   После получения на `TermUrl` Мерчанта ответа ACS с результатами прохождения 3-D Secure необходимо  сформировать запрос к методу **Submit3DSAuthorization**

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new OpenAPI\Client\Api\Class3DSApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$payment_id = 'payment_id_example'; // string | Уникальный идентификатор транзакции в системе Тинькофф Кассы
$terminal_key = 'terminal_key_example'; // string | Идентификатор терминала, выдается Мерчанту Тинькофф Кассой
$token = 'token_example'; // string | Подпись запроса

try {
    $result = $apiInstance->submit3DSAuthorizationV2Post($payment_id, $terminal_key, $token);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling Class3DSApi->submit3DSAuthorizationV2Post: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payment_id** | **string**| Уникальный идентификатор транзакции в системе Тинькофф Кассы |
 **terminal_key** | **string**| Идентификатор терминала, выдается Мерчанту Тинькофф Кассой |
 **token** | **string**| Подпись запроса |

### Return type

[**\OpenAPI\Client\Model\InlineResponse2006**](../Model/InlineResponse2006.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/x-www-form-urlencoded
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

