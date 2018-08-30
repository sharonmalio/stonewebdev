<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Application;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;
use ZfcUser\Controller\UserController;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'index'
                    ]
                ],
                
                'may_terminate' => true,
                'child_routes' =>
                [
                    'user' => [
                        'type' => Literal::class,
                        'options' => [
                            'route' => '/user/[:action]',
                            'constraints' => [
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*'
                            ],
                            'defaults' => [
                                '__NAMESPACE__' => 'ZfcUser\Controller',
                                'controller' => UserController::class,
                                'action' => 'index'
                            ]
                        ],
                        'may_terminate' => true,
                        'child_routes' => [
                            'login' => [
                                'type' => Literal::class,
                                'options' => [
                                    'route' => '/login',
                                    'defaults' => [
                                        'action' => 'login'
                                    ]
                                ],
                                'may_terminate' => true
                            ]
                        ]
                        
                    ]
                ]
                
            ],
            'application' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/application[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'index'
                    ]
                ]
            ]
        ]
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class
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
