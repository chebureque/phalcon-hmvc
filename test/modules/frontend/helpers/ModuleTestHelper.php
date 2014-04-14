<?php
use Phalcon\DI,
    Phalcon\DI\FactoryDefault;

ini_set('display_errors',1);
error_reporting(E_ALL);

define('ROOT_PATH', __DIR__ . '/../../../../');
define('PATH_LIBRARY', __DIR__ . '/common/lib/application/');

set_include_path(
    ROOT_PATH . PATH_SEPARATOR . get_include_path()
);

/**
 * Use the application autoloader to autoload the required
 * bootstrap and test helper classes
 */
$loader = new \Phalcon\Loader();
$loader->registerNamespaces([
    'Phalcon\Test' => ROOT_PATH . 'test/phalcon/',
    'Skeleton\Application' => ROOT_PATH . 'common/lib/application/',
    'Skeleton\Application\Controllers' => ROOT_PATH . 'common/lib/application/controllers/',
    'Skeleton\Test\Helper' => ROOT_PATH . 'test/helpers/',
    'Skeleton\Frontend\Controllers\API' => ROOT_PATH . 'modules/frontend/controllers/api/',
    'Skeleton\Frontend\Controllers' => ROOT_PATH . 'modules/frontend/controllers/',
    'Skeleton\Frontend\Test\Helper' => ROOT_PATH . 'test/modules/frontend/helpers/',
    'Skeleton\Frontend' => ROOT_PATH . 'modules/frontend/'
])->register();

$di = new FactoryDefault();
DI::reset();

// add any needed services to the DI here

DI::setDefault($di);
