<?php

return [
    'mode' => 'test',
    'host' => env('SIBS_HOST', 'https://test.oppwa.com/'),
    'version' => 'v1',
    'authentication' => [
        'userId' => env('SIBS_AUTH_USERID', '8a8294185332bbe60153375476c31527'),
        'password' => env('SIBS_AUTH_PASSWORD', 'G5wP5TzF5k'),
        'entityId' => env('SIBS_AUTH_ENTITYID', '8ac7a4ca7448435801744903cc9b09ae'),
        'token' => env('SIBS_AUTH_TOKEN', 'Bearer OGE4Mjk0MTg1YjY3NDU1NTAxNWI3YzE5MjhlODE3MzZ8UnI0N2VRZXNkVw=='),
    ],
    'entity' => env('SIBS_ENTITY', '25002'),

    /*
     * After completing your SIBS registration you will receive a key to decrypt its notifications via webhook.
     */
    'webHook' => env('SIBS_WEBHOOK_KEY', '')
];
