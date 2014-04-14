<?php
/**
 * Change error reporting level for production use
 */
error_reporting(E_ALL);

use Phalcon\DI\FactoryDefault;

require __DIR__ . '/../private/common/lib/application/Application.php';

/**
 * Instantiate the Application class to do the bootstrapping
 */
try {
	$application = new Skeleton\Application\Application(new FactoryDefault());
	$application->main();
} catch (\Phalcon\Exception $e) {
	echo 'A Phalcon\Exception occurred: ', $e->getMessage(), $e->getTraceAsString();
} catch (\PDOException $e) {
	echo 'A PDOException occurred: ', $e->getMessage(), $e->getTraceAsString();
} catch (\Exception $e) {
	echo 'An Exception occurred: ', $e->getMessage(), $e->getTraceAsString();
}
