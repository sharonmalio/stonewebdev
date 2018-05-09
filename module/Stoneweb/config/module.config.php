<?php
namespace Stoneweb;

use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'controllers' => [
        'factories' => [
            Controller\StonewebController::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'stoneweb' => __DIR__ . '/../view',
        ],
    ],
];