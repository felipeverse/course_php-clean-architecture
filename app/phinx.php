<?php

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

return [
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/database/migrations',
        'seeds' => '%%PHINX_CONFIG_DIR%%/database/seeds'
    ],
    'environments' => [
        'default_migration_table' => 'migrations',
        'default_environment' => $_ENV['APP_ENV'] ?? 'local',
        'local' => [
            'adapter' => 'mysql',
            'host' => $_ENV['DB_HOST'],
            'pass' => $_ENV['DB_PASSWORD'],
            'port' => $_ENV['DB_PORT'],
            'name' => $_ENV['DB_NAME'],
            'user' => $_ENV['DB_USER'],
            'charset' => 'utf8',
        ],
        // 'production' => [
        //     'adapter' => 'mysql',
        //     'host' => 'localhost',
        //     'name' => 'production_db',
        //     'user' => 'root',
        //     'pass' => '',
        //     'port' => '3306',
        //     'charset' => 'utf8',
        // ],
        // 'development' => [
        //     'adapter' => 'mysql',
        //     'host' => 'localhost',
        //     'name' => 'development_db',
        //     'user' => 'root',
        //     'pass' => '',
        //     'port' => '3306',
        //     'charset' => 'utf8',
        // ],
        // 'testing' => [
        //     'adapter' => 'mysql',
        //     'host' => 'localhost',
        //     'name' => 'testing_db',
        //     'user' => 'root',
        //     'pass' => '',
        //     'port' => '3306',
        //     'charset' => 'utf8',
        // ]
    ],
    'version_order' => 'creation'
];
