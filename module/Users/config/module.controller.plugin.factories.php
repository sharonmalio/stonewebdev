<?php
return [
  'FormUsersForm' => 'Users\Factory\Controller\Plugin\FormUsersFormFactory',
  'Users\Controller\Plugin\FormUsersForm' => 'Users\Factory\Controller\Plugin\FormUsersFormFactory',
  Users\Controller\Plugin\FormUsersForm::class => Users\Factory\Controller\Plugin\FormUsersFormFactory::class,
  'RetrieveUser' => 'Users\Factory\Controller\Plugin\RetrieveUserFactory',
  'Users\Controller\Plugin\RetrieveUser' => 'Users\Factory\Controller\Plugin\RetrieveUserFactory',
  Users\Controller\Plugin\RetrieveUser::class => Users\Factory\Controller\Plugin\RetrieveUserFactory::class,
  'StoneUserAuthentication' => 'Users\Factory\Controller\Plugin\StoneUserAuthenticationFactory',
  'Users\Controller\Plugin\StoneUserAuthentication' => 'Users\Factory\Controller\Plugin\StoneUserAuthenticationFactory',
  Users\Controller\Plugin\StoneUserAuthentication::class => Users\Factory\Controller\Plugin\StoneUserAuthenticationFactory::class,
  'StoreUser' => 'Users\Factory\Controller\Plugin\StoreUserFactory',
  'Users\Controller\Plugin\StoreUser' => 'Users\Factory\Controller\Plugin\StoreUserFactory',
  Users\Controller\Plugin\StoreUser::class => Users\Factory\Controller\Plugin\StoreUserFactory::class
];
