<?
namespace Mercury\Helper;

use \Pimple\Container;

/**
*
*/
class Application {

	private $di;

	function __construct() {

		// Initialize the DI container
		$this->di = new Container();

		// $this->initconfig();

		$this->initroute();

	}

	protected function initdb() {


	}

	protected function initroute() {

		$this->di['router'] = function() {

			$lo_router = new \AltoRouter();

			// map homepage
			$lo_router->map('GET', '/', 'IndexController#indexAction');

			// map users details page
			$lo_router->map('GET|POST', '/users/[i:id]', 'IndexController#userAction');

		    return $lo_router;
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

			$ps_controller = "Application\\$ps_module\\Controller\\$ps_controller";

			if (is_callable(array($ps_controller, $ps_action))) {

				$lo_obj = new $ps_controller();

				call_user_func_array(array($lo_obj, $ps_action), $pa_match['params']);

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

		$ps_controller = "Mercury\\Controller\\$ps_controller";

		if (is_callable(array($ps_controller, $ps_action))) {

			$lo_obj = new $ps_controller();

			call_user_func_array(array($lo_obj, $ps_action), $pa_match['params']);

		} else {

			// Throw an exception in debug, send a  500 error in production
			echo "Trying to call $ps_controller with no luck";
		}

	}
}