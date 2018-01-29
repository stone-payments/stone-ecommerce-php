# Stone PHP Library
[![Latest Stable Version](https://poser.pugx.org/stone-pagamentos/stone-ecommerce-php/version)](https://packagist.org/packages/stone-pagamentos/stone-ecommerce-php)
[![License](https://poser.pugx.org/stone-pagamentos/stone-ecommerce-php/license)](https://packagist.org/packages/stone-pagamentos/stone-ecommerce-php)
[![Build Status](https://travis-ci.org/stone-payments/stone-ecommerce-php.svg?branch=master)](https://travis-ci.org/stone-payments/stone-ecommerce-php)

## Getting Started
Simple PHP SDK to ease the integration with Stone payment solutions

### Installing
There are two ways to install this SDK, the next sections will guide you through manual installation and using composer.

#### Manual installation
```php
require __DIR__ . '/stone-ecommerce-php/init.php';
```

#### Composer
```bash
$ composer require stone-pagamentos/stone-ecommerce-php
```

### Running tests
To run tests you have to clone this repository

```
$ git clone git@github.com:stone-payments/stone-ecommerce-php.git
$ cd stone-ecommerce-php
$ composer install
$ vendor/bin/phpunit
```

### Usage example
```php
try
{
    // Carrega dependências
    require_once(dirname(__FILE__) . '/vendor/autoload.php');

    // Define a url utilizada
    \Gateway\ApiClient::setBaseUrl("https://transaction.stone.com.br");

    // Define a chave da loja
    \Gateway\ApiClient::setMerchantKey("merchant key");

    // Cria objeto requisição
    $createSaleRequest = new \Gateway\One\DataContract\Request\CreateSaleRequest();

    // Cria objeto do cartão de crédito
    $creditCard = \Gateway\One\Helper\CreditCardHelper::createCreditCard("5555 4444 3333 2222", "gateway", "12/2030", "999");

    // Define dados do pedido
    $createSaleRequest->addCreditCardTransaction()
        ->setPaymentMethodCode(\Gateway\One\DataContract\Enum\PaymentMethodEnum::SIMULATOR)
        ->setCreditCardOperation(\Gateway\One\DataContract\Enum\CreditCardOperationEnum::AUTH_AND_CAPTURE)
        ->setAmountInCents(150000)
        ->setCreditCard($creditCard);

    // Cria um objeto ApiClient
    $apiClient = new \Gateway\ApiClient();

    // Faz a chamada para criação
    $response = $apiClient->createSale($createSaleRequest);

    // Mapeia resposta
    $httpStatusCode = $response->isSuccess() ? 201 : 401;
    $response = array("message" => $response->getData()->CreditCardTransactionResultCollection[0]->AcquirerMessage);
}
catch (\Gateway\One\DataContract\Report\CreditCardError $error)
{
    $httpStatusCode = 400;
    $response = array("message" => $error->getMessage());
}
catch (\Gateway\One\DataContract\Report\ApiError $error)
{
    $httpStatusCode = $error->errorCollection->ErrorItemCollection[0]->ErrorCode;
    $response = array("message" => $error->errorCollection->ErrorItemCollection[0]->Description);
}
catch (\Exception $ex)
{
    $httpStatusCode = 500;
    $response = array("message" => "Ocorreu um erro inesperado.");
}
finally
{
    // Devolve resposta
    http_response_code($httpStatusCode);
    header('Content-Type: application/json');
    print json_encode($response);
}
```

## Simulation values
You can use these values to get specific responses from API

### Authorization

* `<= $ 1.050,00 -> Authorized`
* `>= $ 1.050,01 && < $ 1.051,71 -> Timeout`
* `>= $ 1.500,00 -> Not Authorized`
 
### Capture

* `<= $ 1.050,00 -> Captured`
* `>= $ 1.050,01 -> Not Captured`
 
### Cancellation

* `<= $ 1.050,00 -> Cancelled`
* `>= $ 1.050,01 -> Not Cancelled`
 
### Refund
* `<= $ 1.050,00 -> Refunded`
* `>= $ 1.050,01 -> Not Refunded`

## Releases
For a list with all releases, please refer to [releases page](https://github.com/stone-payments/stone-ecommerce-php/releases)

## More Information
For more information, please refer to our [wiki](https://github.com/stone-pagamentos/stone-ecommerce-php/wiki).

