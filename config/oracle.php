<?php

return [
    'oracle_production' => [
        'driver'         => 'oracle',
        'tns'            => env('DB_TNS', ''),
        'host'           => env('DB_HOST', '192.168.101.243'),
        'port'           => env('DB_PORT', '1521'),
        'database'       => env('DB_DATABASE', 'atos'),
        'username'       => env('DB_USERNAME', 'BOBAR'),
        'password'       => env('DB_PASSWORD', 'BOBAR'),
        'charset'        => env('DB_CHARSET', 'AL32UTF8'),
        'prefix'         => env('DB_PREFIX', ''),
        'prefix_schema'  => env('DB_SCHEMA_PREFIX', ''),
        'server_version' => env('DB_SERVER_VERSION', '11g'),
    ],
    'oracle_backup_bn' => [
        'driver'         => 'oracle',
        'tns'            => env('DB_TNS', ''),
        'host'           => env('DB_HOST', '192.168.101.245'),
        'port'           => env('DB_PORT', '1521'),
        'database'       => env('DB_DATABASE', 'atosb'),
        'username'       => env('DB_USERNAME', 'BOBAR'),
        'password'       => env('DB_PASSWORD', 'BOBAR'),
        'charset'        => env('DB_CHARSET', 'AL32UTF8'),
        'prefix'         => env('DB_PREFIX', ''),
        'prefix_schema'  => env('DB_SCHEMA_PREFIX', ''),
        'server_version' => env('DB_SERVER_VERSION', '11g'),
    ],
    //nije podesena konekcija za bl, posto se na tu db konektuje preko service name, a ne preko sida
    'oracle_backup_bl' => [
        'driver'         => 'oracle',
        'tns'            => env('DB_TNS', ''),
        'host'           => env('DB_HOST', '192.168.1.251'),
        'port'           => env('DB_PORT', '1521'),
        'database'       => env('DB_DATABASE', 'bobar'),
        'username'       => env('DB_USERNAME', 'BOBAR'),
        'password'       => env('DB_PASSWORD', 'BOBAR'),
        'charset'        => env('DB_CHARSET', 'AL32UTF8'),
        'prefix'         => env('DB_PREFIX', ''),
        'prefix_schema'  => env('DB_SCHEMA_PREFIX', ''),
        'server_version' => env('DB_SERVER_VERSION', '10g'),
    ],
];
