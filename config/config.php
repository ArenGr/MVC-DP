<?php

return array(
    'database' => array(
        'databases' => array(
            'mysql' => array(
                'host' => $_ENV['MYSQL_HOST'],
                'port' => $_ENV['MYSQL_PORT'],
                'name' => $_ENV['MYSQL_NAME'],
                'user' => $_ENV['MYSQL_USER'],
                'pass' => $_ENV['MYSQL_PASS'],
            ),
            'postgresql' => array(
                'host' => $_ENV['POSTGRESQL_HOST'],
                'port' => $_ENV['POSTGRESQL_PORT'],
                'name' => $_ENV['POSTGRESQL_NAME'],
                'user' => $_ENV['POSTGRESQL_USER'],
                'pass' => $_ENV['POSTGRESQL_PASS'],
            )
        ),
        'default' => 'mysql'
    ),
    'urls' => array(
        'baseUrl' => 'http://localhost',
    ),
    'paths' => array(
        'resources' => APP_ROOT . '/resources/',
        'views' => APP_ROOT . '/resources/views/',
        'routes' => APP_ROOT . '/routes/',
        'images' => array(
            'content' => APP_ROOT . '/images/content/',
            'layout' => APP_ROOT . '/images/layout/'
        )
    )
);