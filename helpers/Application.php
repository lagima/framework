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


	public function runadmin() {

		// Set the view folders
		$lo_config = new \stdClass;
		$lo_config->viewpath = $this->getdocumentroot() . '/mercury/views';
		$lo_config->templatepath = $this->getdocumentroot() . '/mercury/views/templates';
		$lo_config->assetpath = $this->getdocumentroot();
		$this->setconfig('view', $lo_config);

		// Get the route object from DI container
		$lo_router = isset($this->di['router']) ? $this->di['router'] : null;

		// Set the admin routes
		$lo_router->setadminroutes();

		// Execute the route
		$la_params = $lo_router->executeroute();

		if ($la_params === false) {

			// here you can handle 404
			echo "Here you can handle 404";

			return false;
		}

		$ps_controller = $lo_router->getcontroller();
		$ps_action = $lo_router->getaction();

		// Build the namespaced class and action of it
		$ps_class = "Mercury\\Controller\\{$ps_controller}Controller";
		$ps_method = "{$ps_action}Action";

		if (is_callable(array($ps_class, $ps_method))) {

			// Get the page from route
			$po_page = $lo_router->getpage();

			// Init the controller
			$lo_controller = new $ps_class($this->di);

			// Call the action
			call_user_func_array(array($lo_controller, $ps_method), $la_params);

			// Get the page details & data to serve
			$pa_responsedata = $lo_controller->getresponsedata();


			// Get view object from DI
			$lo_view = isset($this->di['view']) ? $this->di['view'] : null;

			// Inject the view from controller if any set
			$ls_view = $lo_controller->getview();
			$lo_view->setview($ls_view);

			// Render the page
			$lo_view->renderpage($po_page, $pa_responsedata);

		} else {

			// Throw an exception in debug, send a  500 error in production
			trigger_error("Trying to call $ps_controller with no luck", E_USER_NOTICE);
		}
	}

}