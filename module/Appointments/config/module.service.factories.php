<?php
return [
  'appointments_service_appointments' => 'Appointments\Factory\Service\AppointmentsFactory',
  'Appointments\Service\Appointments' => 'Appointments\Factory\Service\AppointmentsFactory',
  Appointments\Service\Appointments::class => Appointments\Factory\Service\AppointmentsFactory::class,
  'Appointments\Model\AppointmentsUsersTable' => 'Appointments\Factory\Model\AppointmentsUsersTableFactory',
  Appointments\Model\AppointmentsUsersTable::class => Appointments\Factory\Model\AppointmentsUsersTableFactory::class,
  'Appointments\Model\ProviderServices' => 'Appointments\Factory\Model\ProviderServicesFactory',
  Appointments\Model\ProviderServices::class => Appointments\Factory\Model\ProviderServicesFactory::class,
  'Appointments\Model\Provider' => 'Appointments\Factory\Model\ProviderFactory',
  Appointments\Model\Provider::class => Appointments\Factory\Model\ProviderFactory::class,
  'Appointments\Model\ProviderServicesTable' => 'Appointments\Factory\Model\ProviderServicesTableFactory',
  Appointments\Model\ProviderServicesTable::class => Appointments\Factory\Model\ProviderServicesTableFactory::class,
  'Appointments\Model\ProviderTable' => 'Appointments\Factory\Model\ProviderTableFactory',
  Appointments\Model\ProviderTable::class => Appointments\Factory\Model\ProviderTableFactory::class,
  'Appointments\Model\Users' => 'Appointments\Factory\Model\UsersFactory',
  Appointments\Model\Users::class => Appointments\Factory\Model\UsersFactory::class
];
