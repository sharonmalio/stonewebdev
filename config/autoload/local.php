<?php
$dbHost = ($_SERVER['SERVER_PORT'] == 8085) ? '10.0.2.2' : 'localhost';
$dbParams = [
    'database' => 'stone_developer','stoneweb',
    'username' => 'root',
    'password' => 'malio1234',
    'hostname' => $dbHost
];
$pgSqlDbParams = [
    'database' => 'stonelink',
    'username' => 'postgres',
    'password' => 'malio1234',
    'hostname' => $dbHost
];

return [
    'db' => [
        // for primary db adapter that called
        // by $sm->get('Zend\Db\Adapter\Adapter')
        'driver' => 'mysqli',
        'dsn' => 'mysql:dbname=' . $dbParams['database'] . ';host=' . $dbParams['hostname'],
        'database' => $dbParams['database'],
        'username' => $dbParams['username'],
        'password' => $dbParams['password'],
        'hostname' => $dbParams['hostname'],
        'options' => [
            'buffer_results' => true
        ],
        // to allow other adapter to be called by
        // $sm->get('db1') or $sm->get('db2') based on the adapters config.
        'adapters' => [
            'pgsql' => [
                'driver' => 'Pdo',
                'dsn' => 'pgsql:host=' . $pgSqlDbParams['hostname'] . ';port=5432;dbname=' . $pgSqlDbParams['database'],
                'user' => $pgSqlDbParams['username'],
                'password' => $pgSqlDbParams['password']
            
            ]
            
            // 'db2' => array(
            // 'username' => 'other_user',
            // 'password' => 'other_user_passwd'
            // )
        ]
    ]
];