
<?php
$dbHost = ($_SERVER['SERVER_PORT']==8085) ? '10.0.2.2' : 'localhost';
$dbParams = array(
    'database' => 'stonelink',
    'username' => 'postgres',
    'password' => 'malio1234',
    'hostname' => $dbHost
);

return[
    'service_manager' => array(
        'factories' => array(
            'Zend\Db\Adapter\Adapter' => function ($sm) use($dbParams) {
            return new Zend\Db\Adapter\Adapter(array(
                'driver' => 'mysqli',
                'dsn' => 'mysql:dbname=' . $dbParams['database'] . ';host=' . $dbParams['hostname'],
                'database' => $dbParams['database'],
                'username' => $dbParams['username'],
                'password' => $dbParams['password'],
                'hostname' => $dbParams['hostname'],
                'options' => array(
                    'buffer_results' => true
                )
            ));
            }
            )
        ),
        
        'mendParameters' => array(
            'database' => $dbParams['database'],
            'username' => $dbParams['username'],
            'password' => $dbParams['password'],
            'hostname' => $dbParams['hostname'],
        ),
        
        'machinehost' => array(
            'name' => 'ruma'
        ),
        
        'ftpParameters' => array(
            'username' => 'ara',
            'password' => 'p4tuL6iHXObH',
            'servername' => 'afyaresearch.org'
        )
        ];

