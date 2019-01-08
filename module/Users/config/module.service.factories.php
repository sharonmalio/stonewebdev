<?php
return [
  'users_service_authadapter' => 'Users\Factory\Service\AuthAdapterFactory',
  'Users\Service\AuthAdapter' => 'Users\Factory\Service\AuthAdapterFactory',
  Users\Service\AuthAdapter::class => Users\Factory\Service\AuthAdapterFactory::class,
  'users_service_authmanager' => 'Users\Factory\Service\AuthManagerFactory',
  'Users\Service\AuthManager' => 'Users\Factory\Service\AuthManagerFactory',
  Users\Service\AuthManager::class => Users\Factory\Service\AuthManagerFactory::class,
  'users_service_authenticationservice' => 'Users\Factory\Service\AuthenticationServiceFactory',
  'Users\Service\AuthenticationService' => 'Users\Factory\Service\AuthenticationServiceFactory',
  'users_service_usermanager' => 'Users\Factory\Service\UserManagerFactory',
  'Users\Service\UserManager' => 'Users\Factory\Service\UserManagerFactory',
  Users\Service\UserManager::class => Users\Factory\Service\UserManagerFactory::class,
  'users_service_usersmenu' => 'Users\Factory\Service\UsersMenuFactory',
  'Users\Service\UsersMenu' => 'Users\Factory\Service\UsersMenuFactory',
  Users\Service\UsersMenu::class => Users\Factory\Service\UsersMenuFactory::class,
  'users_service_users' => 'Users\Factory\Service\UsersFactory',
  'Users\Service\Users' => 'Users\Factory\Service\UsersFactory',
  Users\Service\Users::class => Users\Factory\Service\UsersFactory::class,
  'Users\Model\UserTable' => 'Users\Factory\Model\UserTableFactory',
  Users\Model\UserTable::class => Users\Factory\Model\UserTableFactory::class,
  'Users\Model\User' => 'Users\Factory\Model\UserFactory',
  Users\Model\User::class => Users\Factory\Model\UserFactory::class
];
