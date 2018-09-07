<?php
$dbHost = ($_SERVER['SERVER_PORT'] == 8085) ? '10.0.2.2' : 'localhost';
$dbParams = [
    'mysql_database' => 'stoneweb_developer',
    'mysql_username' => 'root',
    'mysql_password' => 'malio1234',
    'mysql_hostname' => $dbHost
];
$pgSqlDbParams = [
    'pgsql_database' => 'stonelink',
    'pgsql_username' => 'postgres',
    'pgsql_password' => 'malio1234',
    'pgsql_hostname' => $dbHost
];

return [
    'db' => [
        // for primary db adapter that called
        // by $sm->get('Zend\Db\Adapter\Adapter')
        'driver' => 'mysqli',
        'dsn' => 'mysql:dbname=' . $dbParams['mysql_database'] . ';host=' . $dbParams['mysql_hostname'],
        'database' => $dbParams['mysql_database'],
        'username' => $dbParams['mysql_username'],
        'password' => $dbParams['mysql_password'],
        'hostname' => $dbParams['mysql_hostname'],
        'options' => [
            'buffer_results' => true
        ],
        // to allow other adapter to be called by
        // $sm->get('db1') or $sm->get('db2') based on the adapters config.
        'adapters' => [
            'pgsql' => [
                'driver' => 'Pdo',
                'dsn' => 'pgsql:host=' . $pgSqlDbParams['pgsql_hostname'] . ';port=5432;dbname=' . $pgSqlDbParams['pgsql_database'],
                'user' => $pgSqlDbParams['pgsql_username'],
                'password' => $pgSqlDbParams['pgsql_password']
            
            ]
            
            // 'db2' => array(
            // 'username' => 'other_user',
            // 'password' => 'other_user_passwd'
            // )
        ]
    ]
];
