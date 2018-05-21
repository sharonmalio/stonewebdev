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
                        'controller' => Controller\StonelinkController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],

    'view_manager' => [
        'template_path_stack' => [
            'stonelink' => __DIR__ . '/../view',
        ],
    ],
];