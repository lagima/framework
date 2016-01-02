<?
namespace Mercury\Helper;

use Mercury\Helper\Core;

class Controller extends Core {

	protected $di;
	private $response;


	public function __construct($di) {

		$this->di = $di;

		// Get the database connection
		$this->db = isset($di['database']) ? $di['database'] : null;

		// No point in continuing without database connection
		if(is_null($this->db)) {
			trigger_error("No database configured when controller is called", E_USER_ERROR);
			return false;
		}

		// Child classes are not allowed to use the constructor so workaround
		$this->initcontroller();
	}


	protected function initcontroller() {
		// Implemented in child class
	}

	protected function setview($ps_view) {

		// Get view object from DI
		$lo_view = isset($this->di['view']) ? $this->di['view'] : null;

		if(!is_object($lo_view))
			trigger_error("View is not initialised");

		$lo_view->setview($ps_view);
	}


	public function buildresponse($pa_data) {

		if(!is_array($this->response))
			$this->response = [];

		$this->response = array_merge($this->response, $pa_data);
	}

	public function getresponsedata() {
		return $this->response;
	}

}