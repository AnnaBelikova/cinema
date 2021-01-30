<?php

	class Router {

		private $routes;

		public function __construct() {
			include_once('config/routes.php');
			$this->routes = $routes;
		}

		public function run() {
			$requestedUrl = trim($_SERVER['REQUEST_URI'], '/');
			foreach ($this->routes as $controller => $availableRoutes) {
				foreach ($availableRoutes as $availableRoute => $action) {
					if (preg_match("~$availableRoute~", $requestedUrl, $matches)) {
                        $id = isset($matches[1]) ? $matches[1] : 0;
                        $date = isset($matches[2]) ? $matches[2] : '2017-02-01';
						$requestedController = new $controller();
						$requestedController->main($id, $date);
						break 2;
					}
				}
			}
		}
	}