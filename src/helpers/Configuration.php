<?
namespace Mercury\Helper;

use Mercury\Helper\Core;
use Mercury\Model\ConfigModel;

/**
*
*/
class Configuration extends Core {

	// System config keys
	const GIT_REPO = 'GIT_REPO';
	const GIT_AUTHOR = 'GIT_AUTHOR';
	const GIT_USERNAME = 'GIT_USERNAME';
	const GIT_PASSWORD = 'GIT_PASSWORD';
	const GIT_MASTER_BRANCH = 'GIT_MASTER_BRANCH';

	private $di;
	private $config = [];

	function __construct($di) {

		$this->di = $di;

		// $this->configmodel = new ConfigModel($this->di);
	}


	public function getgitconfig() {

		// Get all config variables
		$la_configvars = $this->configmodel->getconfigs();

		$lo_config = new \stdClass;
		$lo_config->localrepopath = $this->getdocumentroot();
		$lo_config->remoterepopath = $la_configvars[self::GIT_REPO];
		$lo_config->author = $la_configvars[self::GIT_AUTHOR];
		$lo_config->username = $la_configvars[self::GIT_USERNAME];
		$lo_config->password = $la_configvars[self::GIT_PASSWORD];
		$lo_config->branch = $la_configvars[self::GIT_MASTER_BRANCH];

		return $lo_config;
	}


	public function setconfig($ps_type, $pm_value) {
		$this->config[$ps_type] = $pm_value;
	}

	public function getconfig($ps_type) {
		return $this->config[$ps_type] ?? null;
	}

}