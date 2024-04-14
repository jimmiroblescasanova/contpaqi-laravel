<?php

// config for jimmirobles/ContpaqiLaravel
return [
    'default' => 'contpaqi',

    'connections' => [
        'contpaqi' => [
            'driver' => 'sqlsrv',
            'url' => env('DATABASE_URL'),
            'host' => env('CONTPAQI_HOST'),
            'port' => 1433,
            'database' => env('CONTPAQI_DATABASE'), // Cambiar por el nombre de la empresa
            'username' => env('CONTPAQI_USER', 'sa'),
            'password' => env('CONTPAQI_PSW'), // Change password to sa 
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            // 'encrypt' => env('DB_ENCRYPT', 'yes'),
            // 'trust_server_certificate' => env('DB_TRUST_SERVER_CERTIFICATE', 'false'),
        ]
    ]
];
