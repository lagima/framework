<?
namespace Mercury\Helper;

use \Pimple\Container;
use Mercury\Helper\Database;
use Mercury\Helper\View;
use Mercury\Helper\Router;

/**
*
*/
class Application {

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


	public function getdocumentroot() {
		return $_SERVER['DOCUMENT_ROOT'];
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

	public function runsite() {

		// Get the route object from DI container
		$router = isset($di['router']) ? $di['router'] : null;

		if(!$router instanceof Router)
			trigger_error("Router not defined");

		// Execute the route
		$pa_match = $router->executeroute();


		if ($pa_match === false) {

			// here you can handle 404
			echo "Here you can handle 404";

		} else {

			list($ps_module, $ps_controller, $ps_action) = explode('#', $pa_match['target']);

			$ps_controller = "Application\\{$ps_module}\\Controller\\$ps_controller";

			if (is_callable(array($ps_controller, $ps_action))) {

				$lo_controller = new $ps_controller();

				call_user_func_array(array($lo_controller, $ps_action), $pa_match['params']);

				$pa_viewdata = $lo_controller->getviewdata();

				$this->servepage($pa_viewdata);

			} else {

				// Throw an exception in debug, send a  500 error in production
				echo "Trying to call $ps_controller with no luck";
			}
		}
	}


	public function runadmin() {

		// Set the admin view folder
		$lo_config = new \stdClass;
		$lo_config->path = $this->getdocumentroot() . '/mercury/views';
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

		$ps_class = "Mercury\\Controller\\{$ps_controller}Controller";
		$ps_method = "{$ps_action}Action";

		if (is_callable(array($ps_class, $ps_method))) {

			$lo_controller = new $ps_class();

			call_user_func_array(array($lo_controller, $ps_method), $la_params);

			$po_page = $lo_router->getpage();
			$pa_responsedata = $lo_controller->getresponsedata();

			$this->servepage($po_page, $pa_responsedata);

		} else {

			// Throw an exception in debug, send a  500 error in production
			trigger_error("Trying to call $ps_controller with no luck", E_USER_NOTICE);
		}

	}


	public function servepage($po_page, $pa_response) {

		// Get view object from DI
		$lo_view = isset($this->di['view']) ? $this->di['view'] : null;

		// Render the page
		$lo_view->renderview($po_page, $pa_response);

	}

	public function debug($pm_value) {

		echo '<pre>';
		print_r($pm_value);
		echo '</pre>';

	}

	public function debugx($pm_value) {

		echo '<pre>';
		print_r($pm_value);
		echo '</pre>';

		exit;
	}

}