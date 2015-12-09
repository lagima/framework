<?
namespace Mercury\Helper;

use \Pimple\Container;
use Mercury\Helper\View;

/**
*
*/
class Application {

	private $di;

	function __construct() {

		// Initialize the DI container
		$this->di = new Container();

		$this->initconfig();

		$this->initroute();
		$this->initview();

	}


	public function getdocumentroot() {

		return $_SERVER['DOCUMENT_ROOT'];

	}

	protected function initdb() {


	}


	protected function initconfig() {

		$this->di['config'] = function () {
			return [];
		};


		$lo_config = new \stdClass;
		$lo_config->path = $this->getdocumentroot() . '/mercury/views';
		$this->setconfig('view', $lo_config);

		$lo_config = new \stdClass;
		$lo_config->path = $this->getdocumentroot() . '/mercury/views';
		$this->setconfig('application', $lo_config);

		return true;
	}


	public function setconfig($ps_type, $pm_value) {

		$this->di['config'] = $this->di->extend('config', function($pa_config) use ($ps_type, $pm_value) {

			$pa_config[$ps_type] = $pm_value;

			return $pa_config;

		});

		return true;
	}


	protected function initroute() {

		$this->di['router'] = function() {

			$lo_router = new \AltoRouter();

			// map homepage
			$lo_router->map('GET', '/', 'Index#index');

			// map users details page
			$lo_router->map('GET|POST', '/users/[i:id]', 'Index#user');

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

		if(!$router instanceof Altorouter)
			trigger_error("Router not defined");

		// Execute the route
		$pa_match = $router->match();


		if ($pa_match === false) {

			// here you can handle 404
			echo "Here you can handle 404";

		} else {

			list($ps_module, $ps_controller, $ps_action) = explode('#', $pa_match['target']);

			$ps_controller = "Application\\{$ps_module}\\Controller\\$ps_controller";

			if (is_callable(array($ps_controller, $ps_action))) {

				$lo_controller = new $ps_controller();

				call_user_func_array(array($lo_controller, $ps_action), $pa_match['params']);

				// Render the page
				$this->render($lo_controller->view);

			} else {

				// Throw an exception in debug, send a  500 error in production
				echo "Trying to call $ps_controller with no luck";
			}
		}
	}

	public function runadmin() {

		// Get the route object from DI container
		$lo_router = isset($this->di['router']) ? $this->di['router'] : null;


		if(!$lo_router instanceof \AltoRouter)
			trigger_error("Router not defined", E_USER_ERROR);

		// Execute the route
		$pa_match = $lo_router->match();

		if ($pa_match === false) {

			// here you can handle 404
			echo "Here you can handle 404";

			return false;
		}

		list($ps_controller, $ps_action) = explode('#', $pa_match['target']);

		$ps_class = "Mercury\\Controller\\{$ps_controller}Controller";
		$ps_method = "{$ps_action}Action";

		if (is_callable(array($ps_class, $ps_method))) {

			$lo_controller = new $ps_class();

			call_user_func_array(array($lo_controller, $ps_method), $pa_match['params']);

			// Get view object from DI
			$lo_view = isset($this->di['view']) ? $this->di['view'] : null;

			// Render the page
			if($lo_view instanceof View){

				$pa_viewdata = $lo_controller->getviewdata();

				$lo_page = new \stdClass;
				$lo_page->controller = $ps_controller;
				$lo_page->action = $ps_action;
				$lo_page->template = 'admin-template';
				$lo_page->type = 'webpage';

				$lo_view->renderview($pa_viewdata, $lo_page);

			}

		} else {

			// Throw an exception in debug, send a  500 error in production
			trigger_error("Trying to call $ps_controller with no luck", E_USER_NOTICE);
		}

	}


	public function renderpage() {



	}

}