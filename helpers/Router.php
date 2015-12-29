<?
namespace Mercury\Helper;

use Mercury\Helper\Core;
use Mercury\Model\RouteModel;

/**
*
*/
class Router extends Core {

	private $di;
	private $router;
	private $db;

	private $module;
	private $controller;
	private $action;
	private $routeid;


	function __construct($di) {

		$this->di = $di;

		$this->routemodel = new RouteModel($this->di);

		$this->router = new \AltoRouter();
	}


	public function setadminroutes() {

		// Get the routes from database
		$lo_search = new \stdClass;
		$lo_search->core = 1;
		$la_routes = $this->routemodel->getroutes($lo_search);

		foreach($la_routes as $lo_route) {

			$ls_modue = ucfirst($lo_route->module);
			$ls_controller = ucfirst($lo_route->controller);
			$ls_action = ucfirst($lo_route->action);

			$this->router->map($lo_route->method, $lo_route->requesturi, $lo_route->routeid); //"$ls_modue#$ls_controller#$ls_action"
		}
	}

	public function setsiteoutes() {

		// map homepage
		$this->router->map('GET', '/admin', 'Admin#Index#index');

		// map users details page
		$this->router->map('GET|POST', '/admin/[i:id]', 'Admin#Index#user');

	}


	public function executeroute() {

		$pa_match = $this->router->match();

		if ($pa_match === false)
			return false;

		$li_routeid = $pa_match['target'];

		$this->routeid = $li_routeid;

		return $pa_match['params'];
	}

	public function getpage() {

		if(empty($this->routeid))
			trigger_error("Cannot find the route", E_USER_ERROR);

		// Get the route from DB
		$lo_route = $this->routemodel->getroute($this->routeid);

		$lo_page = new \stdClass;
		$lo_page->controller = ucfirst($lo_route->controller);
		$lo_page->controllerid = $lo_route->controllerid;
		$lo_page->action = ucfirst($lo_route->action);
		$lo_page->moduleid = $lo_route->moduleid;
		$lo_page->module = ucfirst($lo_route->module);

		// $lo_page->view = strtolower($lo_route->action);

		return $lo_page;
	}

}