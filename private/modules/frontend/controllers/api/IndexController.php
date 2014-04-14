<?php

namespace Skeleton\Frontend\Controllers\API;

use \Skeleton\Frontend\Controllers\ModuleApiController;

/**
 * Concrete implementation of Frontend module controller
 *
 * @RoutePrefix("/frontend/api")
 */
class IndexController extends ModuleApiController
{
	/**
     * @Route("/index", paths={module="frontend"}, methods={"GET"}, name="frontend-index-index")
     */
    public function indexAction()
    {

    }
}
