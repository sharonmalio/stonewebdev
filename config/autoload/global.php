<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

// config/autoload/global.php


return [
    // ...
    'db' =>[
        'driver'         => 'Pdo',
        'dsn'            => 'pgsql:host=localhost;port=5432;dbname=stonelink',
        'user' => 'postgres',
        'password' => 'malio1234',

    ],
    'service_manager' =>[
        'factories' => [
            'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory',
        ],
    ],
];
