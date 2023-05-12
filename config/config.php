<?php

return array(
    'databases' => array(
        'default' => 'postgre',
        'mysql' => array(
            'host' => $_ENV['MYSQL_HOST'],
            'port' => $_ENV['MYSQL_PORT'],
            'name' => $_ENV['MYSQL_NAME'],
            'user' => $_ENV['MYSQL_USER'],
            'pass' => $_ENV['MYSQL_PORT'],
        ),
        'postgre' => array(
            'host' => $_ENV['POSTGRESQL_HOST'],
            'port' => $_ENV['POSTGRESQL_PORT'],
            'name' => $_ENV['POSTGRESQL_NAME'],
            'user' => $_ENV['POSTGRESQL_USER'],
            'pass' => $_ENV['POSTGRESQL_PORT'],
        )
    ),
    'urls' => array(
        'baseUrl' => 'http://localhost',
    ),
    'paths' => array(
        'resources' => '/path/to/resources',
        'images' => array(
            'content' => $_SERVER['DOCUMENT_ROOT'] . '/images/content',
            'layout' => $_SERVER['DOCUMENT_ROOT'] . '/images/layout'
        )
    )
);
