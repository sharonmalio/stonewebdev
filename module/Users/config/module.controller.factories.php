<?php
return [
  'Users\Controller\Auth' => 'Users\Factory\Controller\AuthControllerFactory',
  Users\Controller\AuthController::class => Users\Factory\Controller\AuthControllerFactory::class,
  'Users\Controller\Index' => 'Users\Factory\Controller\IndexControllerFactory',
  Users\Controller\IndexController::class => Users\Factory\Controller\IndexControllerFactory::class,
  'Users\Controller\User' => 'Users\Factory\Controller\UserControllerFactory',
  Users\Controller\UserController::class => Users\Factory\Controller\UserControllerFactory::class,
  'Users\Controller\Users' => 'Users\Factory\Controller\UsersControllerFactory',
  Users\Controller\UsersController::class => Users\Factory\Controller\UsersControllerFactory::class
];
