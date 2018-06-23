<?php
namespace Stonechat;
use Stonechat\Controller\StonechatController;

use Zend\Router\Http\Segment;

return [
    // 'controllers' => [
    // 'factories' => [
    // Controller\StonelinkController::class => InvokableFactory::class
    // ]
    // ],
    // The following section is new and should be added to your file:
    'router' => [
        'routes' => [
            'stonechat' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/stonechat',
                    'defaults' => [
                        'controller' => StonechatController::class,
                        'action' => 'index'
                    ]
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'stonechat' => [
                        'type' => 'segment',
                        'options' => [
                            'route' => '/stonechat/[:action]',
                            'constraints' => [
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ],
                            'defaults' => [
                                'controller' => StonechatController::class,
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
            'layout' => __DIR__ . '/../view/layout/stonechatlayout.phtml',
            'stonechat/stonechat/index' => __DIR__ . '/../view/stonechat/stonechat/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml'
        ],
        'template_path_stack' => [
            __DIR__ . '/../view'
        ]
    ]
];
    