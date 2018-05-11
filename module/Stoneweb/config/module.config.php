<?php

namespace Stoneweb;

use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'controllers' => [
        'factories' => [
            Controller\StonewebController::class => InvokableFactory::class,
        ],
    ],   

    // The following section is new and should be added to your file:
    'router' => [
        'routes' => [
            'stoneweb' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/stoneweb[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\StonewebController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    //the following section speaks about ...
    'view_manager' => [
        'template_path_stack' => [
            'stoneweb' => __DIR__ . '/../view',
        ],
    ],
];