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


	function __construct($di) {

		$this->di = $di;

		$this->routemodel = new RouteModel($this->di);

		$this->router = new \AltoRouter();
	}


	public function setadminroutes() {

		// Get the redefined admin routes
		$la_routes = $this->routemodel->getadminroutes();

		foreach($la_routes as $lo_route)
			$this->router->map($lo_route->method, $lo_route->requesturi, $lo_route->routeid);
	}


	public function setsiteroutes() {

		// Get the routes from database
		$lo_search = new \stdClass;
		$lo_search->core = 0;
		$la_routes = $this->routemodel->getroutes($lo_search);

		foreach($la_routes as $lo_route) {

			$ls_modue = ucfirst($lo_route->module);
			$ls_controller = ucfirst($lo_route->controller);
			$ls_action = ucfirst($lo_route->action);

			$this->router->map($lo_route->method, $lo_route->requesturi, $lo_route->routeid); //"$ls_modue#$ls_controller#$ls_action"
		}
	}


	public function executeroute($ps_requesturl = null, $ps_requestmethod = null) {

		if(!is_null($ps_requesturl) && is_null($ps_requestmethod))
			$ps_requestmethod = 'GET';

		$pa_match = $this->router->match($ps_requesturl, $ps_requestmethod);

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
		$lo_page->pagetitle = 'Mercury';

		return $lo_page;
	}

	public function getadminpage() {

		if(empty($this->routeid))
			trigger_error("Cannot find the route", E_USER_ERROR);

		// Get the route from DB
		$lo_route = $this->routemodel->getadminroute($this->routeid);

		$lo_page = new \stdClass;
		$lo_page->controller = ucfirst($lo_route->controller);
		$lo_page->action = ucfirst($lo_route->action);
		$lo_page->module = 'Admin';
		$lo_page->pagetitle = 'Mercury';

		return $lo_page;
	}

}