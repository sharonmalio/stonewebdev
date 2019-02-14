<?php
return [
  'Stonebase\Controller\Index' => 'Stonebase\Factory\Controller\IndexControllerFactory',
  Stonebase\Controller\IndexController::class => Stonebase\Factory\Controller\IndexControllerFactory::class,
  'Stonebase\Controller\Stonebase' => 'Stonebase\Factory\Controller\StonebaseControllerFactory',
  Stonebase\Controller\StonebaseController::class => Stonebase\Factory\Controller\StonebaseControllerFactory::class
];
