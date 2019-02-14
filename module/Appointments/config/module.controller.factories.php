<?php
return [
  'Appointments\Controller\Appntprovider' => 'Appointments\Factory\Controller\AppntproviderControllerFactory',
  Appointments\Controller\AppntproviderController::class => Appointments\Factory\Controller\AppntproviderControllerFactory::class,
  'Appointments\Controller\Appointments' => 'Appointments\Factory\Controller\AppointmentsControllerFactory',
  Appointments\Controller\AppointmentsController::class => Appointments\Factory\Controller\AppointmentsControllerFactory::class,
  'Appointments\Controller\Search' => 'Appointments\Factory\Controller\SearchControllerFactory',
  Appointments\Controller\SearchController::class => Appointments\Factory\Controller\SearchControllerFactory::class
];
