<?
namespace Mercury\Helper;


class Controller {

	private $view;

	public $response;


	public function __construct($di) {

		$this->di = $di;

		// Get the database connection
		$this->db = isset($di['database']) ? $di['database'] : null;

		// No point in continuing without database connection
		if(is_null($this->db)) {
			trigger_error("No database configured when router is called", E_USER_ERROR);
			return false;
		}

	}

	protected function setview($ps_view) {

		$this->view = $ps_view;
	}

	public function getresponsedata() {
		return $this->response;
	}

}