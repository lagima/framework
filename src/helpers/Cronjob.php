<?
namespace Mercury\Helper;

use Mercury\Helper\Core;

class Cronjob extends Core {

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
			trigger_error("No database configured when cronjob is called", E_USER_ERROR);
			return false;
		}

	}




}