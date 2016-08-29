<?
namespace Mercury\Helper;

use Mercury\Helper\Core;

class Controller extends Core {

	protected $di;
	protected $configuration;
	protected $currentpage;


	public function __construct($di) {

		$this->di = $di;

		// Get the database connection
		$this->db = isset($di['database']) ? $di['database'] : null;

		// Get the configuration helper
		$this->configuration = isset($di['config']) ? $di['config'] : null;

		// No point in continuing without database connection
		if(!is_object($this->db)) {
			trigger_error("No database configured when controller is called", E_USER_ERROR);
			return false;
		}

		// Get the current page
		$this->currentpage = isset($di['currentpage']) ? $di['currentpage'] : null;

		// Child classes are not allowed to use the constructor so workaround
		$this->initcontroller();
	}


	protected function initcontroller() {
		// Implemented in child class
	}

	protected function setview($ps_view) {

		// Get view object from DI
		$lo_view = isset($this->di['view']) ? $this->di['view'] : null;

		if(!is_object($lo_view)) {
			trigger_error("View is not initialised", E_USER_ERROR);
			return false;
		}

		$lo_view->setview($ps_view);
	}


	public function buildresponse($pa_data) {

		// Get view object from DI
		$lo_view = isset($this->di['view']) ? $this->di['view'] : null;

		if(!is_object($lo_view)) {
			trigger_error("View is not initialised", E_USER_ERROR);
			return false;
		}

		$lo_view->buildresponse($pa_data);
	}


	public function buildtemplatedata($pa_data) {

		// Get view object from DI
		$lo_view = isset($this->di['view']) ? $this->di['view'] : null;

		if(!is_object($lo_view)) {
			trigger_error("View is not initialised", E_USER_ERROR);
			return false;
		}

		$lo_view->buildtemplatedata($pa_data);
	}


	public function setformerror($ps_error, $ps_field, $ps_form = 'GLOBAL') {

		// Get view object from DI
		$lo_view = isset($this->di['view']) ? $this->di['view'] : null;

		if(!is_object($lo_view)) {
			trigger_error("View is not initialised", E_USER_ERROR);
			return false;
		}

		$lo_view->setformerror($ps_error, $ps_field, $ps_form);
	}


	public function hasformerrors($ps_form = 'GLOBAL') {

		// Get view object from DI
		$lo_view = isset($this->di['view']) ? $this->di['view'] : null;

		if(!is_object($lo_view)) {
			trigger_error("View is not initialised", E_USER_ERROR);
			return false;
		}

		return $lo_view->hasformerrors($ps_form);
	}


	/**
	 * Method used in internal routing.
	 * This wont actually redirect the page but will route the request to another route gracefully
	 *
	 * @param string $ps_route  the route as defined in Routes module
	 * @return none
	 */
	public function routeto($ps_route) {

		// Get the current running app
		$lo_app = isset($this->di['app']) ? $this->di['app'] : null;

		if(!is_object($lo_app)) {
			trigger_error("App is not initialised", E_USER_ERROR);
			return false;
		}

		// Execute the route
		$lo_app->runsite($ps_route, true);
	}

}