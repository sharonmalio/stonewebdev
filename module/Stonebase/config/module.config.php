<?php
return [
    // Dependency Injection
    'di'=> [
        'Stonebase\Model\AdapterManagerAbstract' => [
            'parameters' => [
                'adapter'  => 'Zend\Db\Adapter\Adapter',
            ],
        ],
    ],

    // controllers
    'controllers' => [
        'invokables' => [
            'Stonebase\Controller\Stonebase' => 'Stonebase\Controller\StonebaseController',
        ],
    ],

        // controller plugins
        'controller_plugins' => [
                'invokables' => [
                        // configuration here
                ]
        ],

    // routers
        'router' => [
                'routes' => [
                'stonebase' => [
                                'type'    => 'segment',
                                'options' => [
                                        'route'    => '/stonebase',
                                        'defaults' => [
                                                '__NAMESPACE__' => 'Stonebase\Controller',
                                                'controller'    => 'Stonebase',
                                                'action'        => 'index',
                                        ],
                                ],

                                'may_terminate' => true,
                                'child_routes' => [
                                        'default' => [
                                                'type'    => 'Segment',
                                                'options' => [
                                                        'route'    => '/stonebase[:controller[/:action]]',
                                                        'constraints' => [
                                                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                                        ],
                                                        'defaults' => [
                                                        ],
                                                ],
                                        ],

                                        // Stonebase
                                        'stonebase' => [
                                                'type'    => 'segment',
                                                'options' => [
                                                        'route'    => '/stonebase[/:action][/:id][/pid/:pid][/id/:id][/eid/:eid][/encid/:encid][/tid/:tid][/obsid/:obsid][/page/:page][/order_by/:order_by][/:order]',
                                                        'constraints' => [
                                                                'action' => '(?!\bpage\b](?!\border_by\b][a-zA-Z][a-zA-Z0-9_-]*',
                                                                'pid'     => '[0-9]+',
                                                                'eid'     => '[0-9]+',
                                                                'id'     => '[0-9]+',
                                                                'page' => '[0-9]+',
                                                                'order_by' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                                                'order' => 'ASC|DESC',
                                                        ],
                                                        'defaults' => [
                                                                'controller' => 'Stonebase\Controller\Stonebase',
                                                                'action'     => 'index',
                                                        ],
                                                ],
                                        ],
                                        // search
                                        'search' => [
                                                'type'    => 'segment',
                                                'options' => [
                                                        'route'    => '/search[/:action][/id/:id][/col/:col][/term/:term][/value/:value][/attribute/:attribute][/page/:page][/order_by/:order_by][/:order]',
                                                        'constraints' => [
                                                                'action' => '(?!\bpage\b](?!\border_by\b][a-zA-Z][a-zA-Z0-9_-]*',
                                                                'id'     => '[0-9]+',
                                                                'page' => '[0-9]+',
                                                                'order_by' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                                                'order' => 'ASC|DESC',
                                                        ],
                                                        'defaults' => [
                                                                'controller' => 'Stonebase\Controller\Search',
                                                                'action'     => 'index',
                                                        ],
                                                ],
                                        ],
                                ],
                        ],

                                //paginator
                                'paginator' => [
                                        'type' => 'segment',
                                        'options' => [
                                                'route' => '/stonebase/index/[page/:page]',
                                                'defaults' => [
                                                'page' => 1,
                                        ],
                                ],
                        ],
                ],
        ],

        // View
        'view_manager' => [
                'template_path_stack' => [
                        'stonebase' => __DIR__ . '/../view',
                ],
                'template_map' => [
                        'layout/StonebaseTopbar'=> __DIR__ . '/../view/layout/topbarnavigator.phtml',
                        'error/index'=> __DIR__ . '/../view/error/index.phtml',
                ],
                'strategies' => [
                        'ViewJsonStrategy',
                ],
                'display_not_found_reason' => true,
                'display_exceptions'       => true,
                ],
];
