<?php
return [
    'client_id' => env('PAYPAL_CLIENT_ID',''),
    'secret' => env('PAYPAL_SECRET',''),
    'settings' => array(
        'mode' => env('PAYPAL_MODE','sandbox'),
        'http.ConnectionTimeOut' => 30,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal-' . date('Y-m-d') . '.log',
        'log.LogLevel' => 'DEBUG'
    ),
    'admin_emails' => [
        'yurkoi83',
        'steve001.life',
        'minjusticeman',
    ],
];