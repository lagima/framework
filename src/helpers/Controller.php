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

		if(!is_object($lo_view))
			trigger_error("View is not initialised");

		$lo_view->setview($ps_view);
	}


	public function buildresponse($pa_data) {

		// Get view object from DI
		$lo_view = isset($this->di['view']) ? $this->di['view'] : null;

		if(!is_object($lo_view))
			trigger_error("View is not initialised");

		$lo_view->buildresponse($pa_data);
	}


	public function buildtemplatedata($pa_data) {

		// Get view object from DI
		$lo_view = isset($this->di['view']) ? $this->di['view'] : null;

		if(!is_object($lo_view))
			trigger_error("View is not initialised");

		$lo_view->buildtemplatedata($pa_data);
	}

	public function addscript($ps_file) {

		// Get view object from DI
		$lo_view = isset($this->di['view']) ? $this->di['view'] : null;

		if(!is_object($lo_view))
			trigger_error("View is not initialised");

		$lo_view->addscript($ps_file);
	}


	public function addstylesheet($ps_file) {

		// Get view object from DI
		$lo_view = isset($this->di['view']) ? $this->di['view'] : null;

		if(!is_object($lo_view))
			trigger_error("View is not initialised");

		$lo_view->addstylesheet($ps_file);
	}

}