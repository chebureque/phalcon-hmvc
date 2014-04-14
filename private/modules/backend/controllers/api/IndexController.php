<?php

namespace Skeleton\Backend\Controllers\API;

use \Skeleton\Backend\Controllers\ModuleApiController;

/**
 * Concrete implementation of Backend module controller
 *
 * @RoutePrefix("/backend/api")
 */
class IndexController extends ModuleApiController
{
	/**
     * @Route("/index", paths={module="backend"}, methods={"GET"}, name="backend-index-index")
     */
    public function indexAction()
    {

    }
}
