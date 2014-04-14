<?php

namespace Skeleton\Test;

use \Phalcon\DI,
	\Phalcon\Loader,
	Skeleton\Test\Helper\UnitTestCase;

/**
 * Test class for Skeleton Application class
 */
class ApplicationTest extends UnitTestCase
{
	/**
	 * Test application instance matches the app service
	 *
	 * @covers \Skeleton\Application\Application::__construct
	 */
	public function testInternalApplicationService()
	{
		$this->assertEquals($this->application, $this->application->di->get('app'));
	}

	/**
	 * Test service registration
	 *
	 * @covers \Skeleton\Application\Application::_registerServices
	 */
	public function testServiceRegistration()
	{
		$this->assertInstanceOf('\Phalcon\Mvc\Router', $this->application->di->get('router'));
		$this->assertInstanceOf('\Phalcon\Session\Adapter', $this->application->di->get('session'));
		$this->assertInstanceOf('\Phalcon\Mvc\Model\MetaData', $this->application->di->get('modelsMetadata'));
		$this->assertInstanceOf('\Phalcon\Annotations\Adapter', $this->application->di->get('annotations'));
		$this->assertInstanceOf('\Phalcon\Events\Manager', $this->application->getEventsManager());
	}

	/**
	 * Simple test for registerModules method
	 *
	 * @covers \Skeleton\Application\Application::registerModules
	 */
	public function testModuleIsRegistered()
	{
		$this->assertArrayHasKey('frontend', $this->application->getModules());
	}

	/**
	 * Test applicaton HMVC request
	 *
	 * @covers \Skeleton\Application\Application::request
	 */
	public function testHMVCApplicationRequest()
	{
		$controllerName = 'index';
		$indexCntrl = $this->getController($controllerName);

        $this->assertInstanceOf(
        	'\Phalcon\Mvc\Controller',
        	$indexCntrl,
        	sprintf('Make sure the %sController matches the internal HMVC request.', ucfirst($controllerName))
        );

		$this->assertEquals(
			$indexCntrl->indexAction(),
			$this->application->request([
				'namespace' => 'Skeleton\Frontend\Controllers\API',
				'module' => 'frontend',
				'controller' => $controllerName,
				'action' => 'index'
			]),
			sprintf(
				'Assert that calling the %s action of the %sController matches the internal HMVC request.',
				$controllerName,
				ucfirst($controllerName)
			)
		);
	}

	/**
	 * Helper to load the a controller
	 *
	 * @coversNothing
	 */
	public function getController($name)
	{
		$loader = new Loader();
		$loader->registerClasses([
			'\Skeleton\Frontend\Controllers\API\\' . ucfirst($name) . 'Controller' => ROOT_PATH . 'modules/frontend/controller/api/'
		])->register();

		$indexCntrl = new \Skeleton\Frontend\Controllers\API\IndexController();
		$this->assertNotNull($indexCntrl, 'Make sure the index controller could be loaded');

		return $indexCntrl;
	}
}
