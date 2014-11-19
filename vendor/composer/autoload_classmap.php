<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'AdminController' => $baseDir . '/app/controllers/AdminController.php',
    'BaseController' => $baseDir . '/app/controllers/BaseController.php',
    'Categorie' => $baseDir . '/app/models/categorie.php',
    'CategoriesController' => $baseDir . '/app/controllers/CategoriesController.php',
    'ConfideSetupUsersTable' => $vendorDir . '/zizaco/confide/src/migrations/2013_01_13_172956_confide_setup_users_table.php',
    'CreateUsersTable' => $baseDir . '/app/database/migrations/2013_07_21_213036_create_users_table.php',
    'DatabaseSeeder' => $baseDir . '/app/database/seeds/DatabaseSeeder.php',
    'HomeController' => $baseDir . '/app/controllers/HomeController.php',
    'IlluminateQueueClosure' => $vendorDir . '/laravel/framework/src/Illuminate/Queue/IlluminateQueueClosure.php',
    'SessionHandlerInterface' => $vendorDir . '/symfony/http-foundation/Symfony/Component/HttpFoundation/Resources/stubs/SessionHandlerInterface.php',
    'TestCase' => $baseDir . '/app/tests/TestCase.php',
    'User' => $baseDir . '/app/models/User.php',
    'Whoops\\Module' => $vendorDir . '/filp/whoops/src/deprecated/Zend/Module.php',
    'Whoops\\Provider\\Zend\\ExceptionStrategy' => $vendorDir . '/filp/whoops/src/deprecated/Zend/ExceptionStrategy.php',
    'Whoops\\Provider\\Zend\\RouteNotFoundStrategy' => $vendorDir . '/filp/whoops/src/deprecated/Zend/RouteNotFoundStrategy.php',
    'Zizaco\\Confide\\ControllerCommand' => $vendorDir . '/zizaco/confide/src/commands/ControllerCommand.php',
    'Zizaco\\Confide\\MigrationCommand' => $vendorDir . '/zizaco/confide/src/commands/MigrationCommand.php',
    'Zizaco\\Confide\\RoutesCommand' => $vendorDir . '/zizaco/confide/src/commands/RoutesCommand.php',
    'Zizaco\\Entrust\\MigrationCommand' => $vendorDir . '/zizaco/entrust/src/commands/MigrationCommand.php',
);