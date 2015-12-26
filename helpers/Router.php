<?
namespace Mercury\Helper;

use Mercury\Helper\Core;

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


	function __construct($di) {

		$this->di = $di;

		// Get the database connection
		$this->db = isset($di['database']) ? $di['database'] : null;

		// No point in continuing without database connection
		if(is_null($this->db)) {
			trigger_error("No database configured when router is called", E_USER_ERROR);
			return false;
		}

		$this->router = new \AltoRouter();
	}


	public function setadminroutes() {

		// Get the routes from database
		$la_routes = $this->db->getallobjects("SELECT r.*, p.`name` as `controller`, m.`name` as `module`
												FROM `m_route` r
												LEFT JOIN `m_module` m ON m.`moduleid` = r.`moduleid`
												LEFT JOIN `m_page` p ON p.`pageid` = r.`pageid`
												WHERE r.`core` = 1");

		foreach($la_routes as $lo_route) {

			$ls_modue = ucfirst($lo_route->module);
			$ls_controller = ucfirst($lo_route->controller);
			$ls_action = ucfirst($lo_route->action);

			$this->router->map($lo_route->method, $lo_route->requesturi, "$ls_modue#$ls_controller#$ls_action");
		}

		// // For anything else we try to auto route
		// $la_parts = explode('/', ltrim($_SERVER['REQUEST_URI'], '/'));
		// $ls_module = array_shift($la_parts);
		// $ls_controller = array_shift($la_parts);
		// $ls_action = array_shift($la_parts);
		// // $ls_action = array_shift($la_parts);

		// $this->router->map('GET|POST', $_SERVER['REQUEST_URI'], "$ls_module#$ls_controller#$ls_action");

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

		list($ps_module, $ps_controller, $ps_action) = explode('#', $pa_match['target']);

		// Set the matched module, controller, action
		$this->module = ucfirst($ps_module);
		$this->controller = ucfirst($ps_controller);
		$this->action = ucfirst($ps_action);

		return $pa_match['params'];
	}

	public function getpage() {

		if($this->module == 'Admin') {

			$lo_page = new \stdClass;
			$lo_page->controller = $this->controller;
			$lo_page->action = $this->action;
			$lo_page->template = 'admin';
			$lo_page->view = strtolower($this->action);
			$lo_page->type = 'webpage';

			return $lo_page;
		}

		$lo_page = $this->db->getsingleobject("");
	}


	public function getmodule() {
		return $this->module;
	}


	public function getcontroller() {
		return $this->controller;
	}


	public function getaction() {
		return $this->action;
	}

}