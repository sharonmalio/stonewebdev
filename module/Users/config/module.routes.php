<?php
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;

return [
    'users' => [
        'type' => Literal::class,
        'options' => [
            'route' => '/users',
            'defaults' => [
                '__NAMESPACE__' => 'Users\Controller',
                'controller' => 'Users',
                'action' => 'index'
            ]
        ],

        'may_terminate' => true,
        'child_routes' => [
            'default' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/users[:controller[/:action]]',
                    'constraints' => [
                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*'
                    ],
                    'defaults' => []
                ]
            ],

            // Auth
            'auth' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/auth[/:action][/:id][/pid/:pid][/id/:id][/eid/:eid][/encid/:encid][/tid/:tid][/obsid/:obsid][/page/:page][/order_by/:order_by][/:order]',
                    'constraints' => [
                        'action' => '(?!\bpage\b)(?!\border_by\b)[a-zA-Z][a-zA-Z0-9_-]*',
                        'pid' => '[0-9]+',
                        'eid' => '[0-9]+',
                        'id' => '[0-9]+',
                        'page' => '[0-9]+',
                        'order_by' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'order' => 'ASC|DESC'
                    ],
                    'defaults' => [
                        'controller' => 'Users\Controller\Auth',
                        'action' => 'index'
                    ]
                ]
            ],
            // Users
            'users' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/users[/:action][/:id][/pid/:pid][/id/:id][/eid/:eid][/encid/:encid][/tid/:tid][/obsid/:obsid][/page/:page][/order_by/:order_by][/:order]',
                    'constraints' => [
                        'action' => '(?!\bpage\b)(?!\border_by\b)[a-zA-Z][a-zA-Z0-9_-]*',
                        'pid' => '[0-9]+',
                        'eid' => '[0-9]+',
                        'id' => '[0-9]+',
                        'page' => '[0-9]+',
                        'order_by' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'order' => 'ASC|DESC'
                    ],
                    'defaults' => [
                        'controller' => 'Users\Controller\Users',
                        'action' => 'index'
                    ]
                ]
            ],
            // User
            'user' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/user[/:action][/:id][/pid/:pid][/id/:id][/eid/:eid][/encid/:encid][/tid/:tid][/obsid/:obsid][/page/:page][/order_by/:order_by][/:order]',
                    'constraints' => [
                        'action' => '(?!\bpage\b)(?!\border_by\b)[a-zA-Z][a-zA-Z0-9_-]*',
                        'pid' => '[0-9]+',
                        'eid' => '[0-9]+',
                        'id' => '[0-9]+',
                        'page' => '[0-9]+',
                        'order_by' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'order' => 'ASC|DESC'
                    ],
                    'defaults' => [
                        'controller' => 'Users\Controller\User',
                        'action' => 'index'
                    ]
                ]
            ],

            // search
            'search' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/search[/:action][/id/:id][/col/:col][/term/:term][/value/:value][/attribute/:attribute][/page/:page][/order_by/:order_by][/:order]',
                    'constraints' => [
                        'action' => '(?!\bpage\b)(?!\border_by\b)[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                        'page' => '[0-9]+',
                        'order_by' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'order' => 'ASC|DESC'
                    ],
                    'defaults' => [
                        'controller' => 'Users\Controller\Search',
                        'action' => 'index'
                    ]
                ]
            ]
        ]
    ],
    'changepassword' => [
        'type' => Literal::class,
        'options' => [
            'route' => '/changepassword',
            'defaults' => [
                'controller' => 'Users\Controller\User',
                'action' => 'changepassword'
            ]
        ]
    ],
    'setpassword' => [
        'type' => Literal::class,
        'options' => [
            'route' => '/setpassword',
            'defaults' => [
                'controller' => 'Users\Controller\User',
                'action' => 'setpassword'
            ]
        ]
    ],
    'resetpassword' => [
        'type' => Literal::class,
        'options' => [
            'route' => '/resetpassword',
            'defaults' => [
                'controller' => 'Users\Controller\User',
                'action' => 'resetpassword'
            ]
        ],
        'may_terminate' => true,
        'child_routes' => [
            'message' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/message',
                    'defaults' => [
                        'action' => 'message'
                    ]
                ],
                'may_terminate' => true
            ]
        ]
    ],
    'login' => [
        'type' => Literal::class,
        'options' => [
            'route' => '/login',
            'defaults' => [
                'controller' => 'Users\Controller\Auth',
                'action' => 'login'
            ]
        ]
    ],
    'logout' => [
        'type' => Literal::class,
        'options' => [
            'route' => '/logout',
            'defaults' => [
                'controller' => 'Users\Controller\Auth',
                'action' => 'logout'
            ]
        ]
    ],
    // paginator
    'paginator' => [
        'type' => Segment::class,
        'options' => [
            'route' => '/users/index/[page/:page]',
            'defaults' => [
                'page' => 1
            ]
        ]
    ]
];
