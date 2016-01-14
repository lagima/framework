<?
namespace Mercury\Helper;

use \Pimple\Container;
use Mercury\Helper\Core;
use Mercury\Helper\Database;
use Mercury\Helper\View;
use Mercury\Helper\Router;

/**
*
*/
class Application extends Core {

	private $di;

	function __construct() {

		// Initialize the DI container
		$this->di = new Container();

		// Set the enpty config container
		$this->di['config'] = function () {
			return [];
		};

		$this->initdb();
		$this->initroute();
		$this->initview();
	}


	public function setconfig($ps_type, $pm_value) {

		$this->di['config'] = $this->di->extend('config', function($pa_config) use ($ps_type, $pm_value) {

			$pa_config[$ps_type] = $pm_value;

			return $pa_config;

		});

		return true;
	}


	protected function initdb() {

		$this->di['database'] = function($di) {

			$lo_database = new Database($di);

			return $lo_database;
		};

		return true;
	}


	protected function initroute() {

		$this->di['router'] = function($di) {

			$lo_router = new Router($di);

			return $lo_router;
		};

		return true;
	}

	protected function initview() {

		$di = $this->di;

		$this->di['view'] = function() use($di) {

			$lo_view = new View($di);

			return $lo_view;
		};

		return true;
	}

	public function runapp() {

		// Get the url part and check if its admin or site
		$ls_type = $this->geturlparameter(0);

		switch($ls_type) {

			case 'admin':
				$this->runadmin();
			break;

			default:
				$this->runsite();
			break;
		}
	}

	public function runadmin() {

		// Get the route object from DI container
		$lo_router = isset($this->di['router']) ? $this->di['router'] : null;

		// Set the admin routes
		$lo_router->setadminroutes();

		// Execute the route
		$la_params = $lo_router->executeroute();

		if ($la_params === false) {

			// here you can handle 404
			$this->showerrorpage(404);

			return false;
		}

		// Get the page from route
		$po_page = $lo_router->getadminpage();

		// Execute the page
		$this->executeadminpage($po_page, $la_params);
	}

	public function runsite() {

		// Set the view folders
		$lo_config = new \stdClass;
		$lo_config->templatepath = $this->getdocumentroot() . '/application/views/templates';
		$lo_config->defaultspath = $this->getdocumentroot() . '/application/views/templates';
		$lo_config->assetpath = $this->getdocumentroot();
		$this->setconfig('view', $lo_config);

		// Get the route object from DI container
		$lo_router = isset($this->di['router']) ? $this->di['router'] : null;

		// Set the admin routes
		$lo_router->setsiteroutes();

		// Execute the route
		$la_params = $lo_router->executeroute();

		if ($la_params === false) {

			// Show the error page
			$this->showerrorpage(404);

			return false;
		}

		// Get the page from route
		$po_page = $lo_router->getpage();

		// Execute the page
		$this->executepage($po_page, $la_params);
	}


	public function install() {

		chdir($this->getdocumentroot() . '/assets');
		exec("git archive --remote=https://github.com/mercury/mercury.git master <path> | tar xvf -");
	}

	private function executeadminpage($po_page, $pa_params = []) {

		if(!is_object($po_page))
			trigger_error("Invalid page", E_USER_NOTICE);


		$ps_controller = $po_page->controller;
		$ps_action = $po_page->action;

		// Build the namespaced class and action of it
		$ps_class = "Mercury\\Controller\\{$ps_controller}Controller";
		$ps_method = "{$ps_action}Action";

		if (is_callable(array($ps_class, $ps_method))) {

			// Init the controller
			$lo_controller = new $ps_class($this->di);

			// Call the action
			call_user_func_array(array($lo_controller, $ps_method), $pa_params);

			// Get the page details & data to serve
			$pa_responsedata = $lo_controller->getresponsedata();

			// Get view object from DI
			$lo_view = isset($this->di['view']) ? $this->di['view'] : null;

			// Render the page
			$lo_view->renderpage($po_page, $pa_responsedata);

		} else {
			// Throw an exception in debug, send a  500 error in production
			trigger_error("Trying to call $ps_class::$ps_action with no luck", E_USER_NOTICE);

			// Show the error page
			$this->showerrorpage(404);
		}
	}


	private function executepage($po_page, $pa_params = []) {

		if(!is_object($po_page))
			trigger_error("Invalid page", E_USER_NOTICE);


		$ps_controller = $po_page->controller;
		$ps_action = $po_page->action;
		$ps_module = $po_page->module;

		// Build the namespaced class and action of it
		$ps_class = "Mercury\\App\\{$ps_module}\\Controllers\\{$ps_controller}Controller";
		$ps_method = "{$ps_action}Action";

		if (is_callable(array($ps_class, $ps_method))) {

			// Init the controller
			$lo_controller = new $ps_class($this->di);

			// Call the action
			call_user_func_array(array($lo_controller, $ps_method), $pa_params);

			// Get the page details & data to serve
			$pa_responsedata = $lo_controller->getresponsedata();

			// Get view object from DI
			$lo_view = isset($this->di['view']) ? $this->di['view'] : null;

			// Render the page
			$lo_view->renderpage($po_page, $pa_responsedata);

		} else {
			// Throw an exception in debug, send a  500 error in production
			trigger_error("Trying to call $ps_class::$ps_action with no luck", E_USER_NOTICE);
		}
	}
}