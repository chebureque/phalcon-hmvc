<?php

namespace Skeleton\Backend;

use \Phalcon\Mvc\Router\Group;

/**
 * This class defines routes for the Skeleton\Backend module
 * which will be prefixed with '/backend'
 */
class ModuleRoutes extends Group
{
	/**
	 * Initialize the router group for the Backend module
	 */
	public function initialize()
	{
		/**
		 * In the URI this module is prefixed by '/backend'
		 */
		$this->setPrefix('/backend');

		/**
		 * Configure the instance
		 */
		$this->setPaths([
			'module' => 'backend',
			'namespace' => 'Skeleton\Backend\Controllers\API\\',
			'controller' => 'index',
			'action' => 'index'
		]);

		/**
		 * Default route: 'backend-root'
		 */
		$this->addGet('', [])
			->setName('backend-root');

		/**
		 * Controller route: 'backend-controller'
		 */
		$this->addGet('/:controller', ['controller' => 1])
			->setName('backend-controller');

		/**
		 * Action route: 'backend-action'
		 */
		$this->addGet('/:controller/:action/:params', [
				'controller' => 1,
				'action' => 2,
				'params' => 3
			])
			->setName('backend-action');

		/**
		 * Add all Skeleton\Backend specific routes here
		 */
	}
}
