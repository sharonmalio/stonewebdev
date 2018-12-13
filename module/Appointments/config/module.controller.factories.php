<?php
return [
  'Appointments\Controller\Appointments' => 'Appointments\Factory\Controller\AppointmentsControllerFactory',
  Appointments\Controller\AppointmentsController::class => Appointments\Factory\Controller\AppointmentsControllerFactory::class,
  'Appointments\Controller\Provider' => 'Appointments\Factory\Controller\ProviderControllerFactory',
  Appointments\Controller\ProviderController::class => Appointments\Factory\Controller\ProviderControllerFactory::class,
  'Appointments\Controller\Search' => 'Appointments\Factory\Controller\SearchControllerFactory',
  Appointments\Controller\SearchController::class => Appointments\Factory\Controller\SearchControllerFactory::class
];
