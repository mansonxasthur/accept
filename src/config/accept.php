<?php


return [
    'api_key'        => env('ACCEPT_API_KEY', null),
    'iframe_id'      => env('ACCEPT_IFRAME_ID', null),
    'merchant_id'    => env('ACCEPT_MERCHANT_ID', null),
    'hmac_secret'    => env('ACCEPT_HMAC_SECRET', null),
    'integration_id' => env('ACCEPT_INTEGRATION_ID', null),
    'base_uri'       => 'https://accept.paymobsolutions.com/api/',
];
