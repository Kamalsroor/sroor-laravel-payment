<?php

declare(strict_types=1);


return [
   
    'paymob' => [
        'base_url' => 'https://accept.paymob.com/api',

        // paymob configuration settings
        'api_key' => env('PAYMENT_PAYMOB_API_KEY', ''),
        'card_integration_id' => env('PAYMENT_PAYMOB_CARD_INTEGRATION_ID', ''),
        'card_iframe_id' => env('PAYMENT_PAYMOB_CARD_IFRAME_ID', ''),
        'hmac_secret' => env('PAYMENT_PAYMOB_HMAC_SECRET', ''),
    ]
];