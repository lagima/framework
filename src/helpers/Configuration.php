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
	private $configfile;

	function __construct($di) {

		$this->di = $di;

		// Create the file if not exists
		$this->configfile = $this->getdocumentroot() .'/config.php';
		$this->createfile($this->configfile, $this->defaultconfig());

		// Get the content of it in a var
		$this->config = include $this->configfile;
		$this->config = is_array($this->config) ? $this->config : [];
	}


	private function defaultconfig() {

		return "<? return array (
				  1 =>
				  array (
				    'configid' => 1,
				    'admin' => 1,
				    'hidden' => 0,
				    'key' => 'MYSQL_HOST',
				    'value' => '',
				  ),
				  2 =>
				  array (
				    'configid' => 2,
				    'admin' => 1,
				    'hidden' => 0,
				    'key' => 'MYSQL_USER',
				    'value' => '',
				  ),
				  3 =>
				  array (
				    'configid' => 3,
				    'admin' => 1,
				    'hidden' => 0,
				    'key' => 'MYSQL_PASSWORD',
				    'value' => '',
				  ),
				  4 =>
				  array (
				    'configid' => 4,
				    'admin' => 1,
				    'hidden' => 0,
				    'key' => 'MYSQL_DATABASE',
				    'value' => '',
				  ),
				  5 =>
				  array (
				    'configid' => 5,
				    'admin' => 1,
				    'hidden' => 1,
				    'key' => 'GIT_INITIALISED',
				    'value' => '',
				  ),
				);";

	}


	public function setconfig($ps_key, $pm_value) {

		// Get the config id
		$la_config = $this->getconfig($ps_key);
		$la_config = $this->config[$la_config['configid']];

		if(!is_array($la_config)) {
			trigger_error("Trying to set undefined config '$ps_key'", E_USER_WARNING);
			return false;
		}

		// Change the calue
		$la_config['value'] = $pm_value;
		$this->config[$la_config['id']] = $la_config;

		$this->writetoconfigfile();
	}


	/**
	 * Get all the visible config variables configured
	 * If passed true it will return even the hidden ones
	 *
	 * @param boolean $pb_all
	 * @return array
	 */
	public function getconfigs($pb_all = false) {

		$la_configs = $this->config;

		if($pb_all)
			return $la_configs;

		// Filter out hidden ones
		$la_visible = [];

		foreach ($la_configs as $li_index => $la_config) {

			if($la_config['hidden'] == 1)
				continue;

			$la_visible[$li_index] = $la_config;
		}

		return $la_visible;
	}


	public function getconfig($pm_value) {

		// Possible values
		$li_configid = intval($pm_value);
		$ls_key = strval($pm_value);

		// Get all configs
		$la_configs = $this->getconfigs(true);

		foreach($la_configs as $la_config) {

			// If the $pm_value is integer it must be configid
			if(!empty($li_configid) && $la_config['configid'] == $li_configid)
				return $la_config;

			// If the $pm_value is string it must be key
			elseif($la_config['key'] == $ls_key)
				return $la_config;
		}

		return [];
	}


	public function getconfigvalue($ps_key) {

		// Get the config entry
		$la_config = $this->getconfig($ps_key);

		if(empty($la_config))
			return '';

		return $la_config['value'];
	}

	public function addconfig($ps_key, $ps_value) {

		// Build the config
		$la_config = [];
		$la_config['configid'] = time();
		$la_config['admin'] = 0;
		$la_config['hidden'] = 0;
		$la_config['key'] = $ps_key;
		$la_config['value'] = $ps_value;

		$this->config[$la_config['configid']] = $la_config;

		$this->writetoconfigfile();
	}

	public function updateconfig($pi_id, $pm_value) {

		if(!isset($this->config[$pi_id]))
			return false;

		// Convert the values passed to array for easier access
		$pa_value = !is_array($pm_value) ? (array)$pm_value : $pm_value;

		// Make sure we have the minimum required field fom the passed in value
		if(!isset($pa_value['key']) || !isset($pa_value['value'])) {
			trigger_error("Required data not passed to update the config variable");
			return false;
		}

		$la_config = $this->getconfig($pi_id);

		// If admin use the same key
		if(!$la_config['admin'])
			$la_config['key'] = $pa_value['key'];

		// Copy the value
		$la_config['value'] = $pa_value['value'];

		$this->config[$pi_id] = $la_config;

		$this->writetoconfigfile();
	}


	public function deleteconfig($pi_id) {

		$la_config = $this->getconfig($pi_id);

		if(empty($la_config))
			return false;

		// Cant delete admin variable
		if($la_config['admin'])
			return false;

		// Unset and save
		unset($this->config[$pi_id]);

		$this->writetoconfigfile();
	}


	private function writetoconfigfile() {
		file_put_contents($this->configfile, '<? return ' . var_export($this->config, true) . ';');
	}

}