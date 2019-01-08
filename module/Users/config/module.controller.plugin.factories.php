<?php
return [
  'FormUsersForm' => 'Users\Factory\Controller\Plugin\FormUsersFormFactory',
  'Users\Controller\Plugin\FormUsersForm' => 'Users\Factory\Controller\Plugin\FormUsersFormFactory',
  Users\Controller\Plugin\FormUsersForm::class => Users\Factory\Controller\Plugin\FormUsersFormFactory::class,
  'StoneUserAuthentication' => 'Users\Factory\Controller\Plugin\StoneUserAuthenticationFactory',
  'Users\Controller\Plugin\StoneUserAuthentication' => 'Users\Factory\Controller\Plugin\StoneUserAuthenticationFactory',
  Users\Controller\Plugin\StoneUserAuthentication::class => Users\Factory\Controller\Plugin\StoneUserAuthenticationFactory::class
];
