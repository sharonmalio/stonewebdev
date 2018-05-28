<?php 
namespace Stonelink;

use Zend\Router\Http\Segment;



return [
    
//     'controllers' => [
//         'factories' => [
//             Controller\StonelinkController::class => InvokableFactory::class,
//         ],
//     ],
    
    // The following section is new and should be added to your file:
    'router' => [
        'routes' => [
            'stonelink' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/stonelink[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' =>Controller\StonelinkController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],

    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/stonelink-layout.phtml',
            'stonelink/index/index' => __DIR__ . '/../view/stonelink/stonelink/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];