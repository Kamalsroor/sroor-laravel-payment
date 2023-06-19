# Paymob Laravel Package

This is a laravel package to facilate integartion with paymob apis [Paymob docs](https://docs.paymob.com/docs/accept-standard-redirect).

## Installation

1- You can install the package via composer:

```php
composer require sroor/laravel-payment
```

2- Publish config file for editing if needed:

```php
php artisan vendor:publish --tag=config --provider="Sroor\Payment\PaymentServiceProvider"
```

## Usage
- Register new merchant account or login if you already have one ([Register](https://accept.paymob.com/portal2/en/register?flash=true)).
- Get Paymob credentials from Paymob Dashboard ([How](https://docs.paymob.com/docs/profile)) and update `.env` file.
```
PAYMENT_PAYMOB_API_KEY             =
PAYMENT_PAYMOB_CARD_INTEGRATION_ID =
PAYMENT_PAYMOB_CARD_IFRAME_ID      =
PAYMENT_PAYMOB_HMAC_SECRET         =
```

- Make payment and get iframe url from paymob

```php

<?php

use Illuminate\Support\Facades\Route;
use Sroor\Payment\Facades\Paymob;


Route::get('/test', function () {

    $orderData = [
        "amount_cents"=> "100", // required, integer value in cents
        "currency"=> "EGP", // required
        "merchant_order_id"=> 1243, //	optional, A unique alpha-numeric value for each transaction
        "expiration" => 3600, // required
        // optional fields in billing data, if it isn't available, please send it to be "NA",
        "billing_data" => [
            "first_name" => "Kamal", // required
            "last_name" => "Sroor", // required
            "email" => "Kamal@mail.com", // required
            "phone_number" => "01234567890", // required 
            "apartment" => "NA", // optional
            "floor" => "NA", // optional
            "street" => "NA", //optional
            "building" => "NA",  // optional
            "shipping_method" => "NA", // optional
            "postal_code" => "NA",  //optional
            "city" => "NA",  // optional
            "country" => "NA", // optional
            "state" => "NA" // optional
        ],
    ];

    // Get payment iframe URL
    $iframeUrl = Paymob::pay($orderData);
    return $iframeUrl;
    //redirect to ifram url
    // return redirect()->to($iframeUrl);
});


```


- Webhook transaction url:

    POST Request: (https://yourdomain.com/paymob/webhook)

    Replace your yourdomain.com with actual domain name

    For testing callback, you can use tool like [Ngrok](https://ngrok.com) 


- Add Paymob trasaction callback to integration card [How](https://docs.paymob.com/docs/payment-integrations) 

