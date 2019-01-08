<?php
namespace Users;

use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
return [
    // Dependency Injection
    'di' => [
        'Users\Model\AdapterManagerAbstract' => [
            'parameters' => [
                'adapter' => 'Zend\Db\Adapter\Adapter'
            ]
        ]
    ],
    // controllers
    'controllers' => [
        'invokables' => [
            'Users\Controller\Users' => 'Users\Controller\UsersController'
        ]
    ],

    // controller plugins
    'controller_plugins' => [
        'invokables' => [ // configuration here
        ]
    ],
    'service_manager' => [
        'factories' => [
            \Zend\Authentication\AuthenticationService::class => \Users\Factory\Service\AuthenticationServiceFactory::class
        ]
    ],
    // form elements
    'form_elements' => [
        'factories' => include 'module.form.factories.php'
    ],
    // routers
    'router' => [
        'routes' => include 'module.routes.php'
    ],

    // View
    'view_manager' => [
        'template_path_stack' => [
            'users' => __DIR__ . '/../view'
        ],
        'template_map' => [
            'layout/UsersTopbar' => __DIR__ . '/../view/layout/topbarnavigator.phtml'
        ],
        'strategies' => [
            'ViewJsonStrategy'
        ],
        'display_not_found_reason' => true,
        'display_exceptions' => true
    ],
    'doctrine' => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [
                    __DIR__ . '/../src/Entity'
                ]
            ],
            'orm_default' => [
                'drivers' => [
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                ]
            ]
        ]
    ]
];
