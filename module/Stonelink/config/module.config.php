<?php
namespace Stonelink;

use Zend\Router\Http\Segment;
use Stonelink\Controller\StonelinkController;
use Stonelink\Controller\ProvidersController;
return [
    'router' => [
        'routes' => [
            'stonelink' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/stonelink',
                    'defaults' => [
                        'controller' => StonelinkController::class,
                        'action' => 'index'
                    ]
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'stonelink' => [
                        'type' => 'segment',
                        'options' => [
                            'route' => '/stonelink/[:action]',
                            'constraints' => [
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ],
                            'defaults' => [
                                'controller' => StonelinkController::class,
                                'action' => 'index'
                            ]
                        ]
                    ],
                    'providers' => [
                        'type' => 'segment',
                        'options' => [
                            'route' => '/providers/[:action]',
                            'constraints' => [
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ],
                            'defaults' => [
                                'controller' => ProvidersController::class,
                                'action' => 'index'
                            ]
                        ]
                    ]
                ]
                
            ]
        ]
    ],
  
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => [
            'layout/layout' => __DIR__ . '/../view/layout/stonelink-layout.phtml',
            'stonelink/stonelink/index' => __DIR__ . '/../view/stonelink/stonelink/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml'
        ],
        'template_path_stack' => [
            __DIR__ . '/../view'
        ]
    ],
    'view_helpers' => [
        'invokables' => [
            'translate' => \Zend\I18n\View\Helper\Translate::class
        ]
    ]
];
    