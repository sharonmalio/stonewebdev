<?php
return [
 'Appointments\Controller\Appointments' => 'Appointments\Factory\Controller\AppointmentsControllerFactory',
 Appointments\Controller\AppointmentsController::class => Appointments\Factory\Controller\AppointmentsControllerFactory::class,
    'Appointments\Controller\Provider' => 'Appointments\Factory\Controller\ProviderControllerFactory',
    Appointments\Controller\ProviderController::class => Appointments\Factory\Controller\ProviderControllerFactory::class
    
];
