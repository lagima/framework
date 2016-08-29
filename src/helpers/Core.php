<?
namespace Mercury\Helper;

class Core {

	// Constants
	const FRAMEWORK_VERSION = '1.0.0';

	private $_errors;


	function __construct() {


	}

	public function getversion() {
		return self::FRAMEWORK_VERSION;
	}


	/**
	 * Track the visitor/ each page requests into a log file
	 * It records IP address time and the URL visited
	 * @return none
	 */
	public function trackvisitor(){

		if(get_class($this) != 'admin'){

			$ls_protocol = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";

			$ls_url = $ls_protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

			if(!isset($_SESSION['gs_visitor_log']))
				$_SESSION['gs_visitor_log'] = '';

			if($_SESSION['gs_visitor_log'] == $ls_url)
			 	return false;

			$_SESSION['gs_visitor_log'] = $ls_url;


			$this->logtofile('visitors.txt', "[{$_SERVER['REMOTE_ADDR']}] visited $ls_url", true, 2);

		}

	}

	/**
	 * This function will log the message to specified file also uses log rotating feature
	 * @param  string  $ls_file
	 * @param  string  $ls_content
	 * @param  boolean $lb_enablerotator
	 * @param  integer $li_rotateduration
	 * @return boolean
	 */
	public function logtofile($ls_file, $ls_content, $lb_enablerotator = false, $li_rotateduration = 30)
	{

		$ls_filepath = $this->getdocumentroot()."/sitelogs/$ls_file";

		// Create the folder if not exists
		$this->createfolder($this->getdocumentroot()."/sitelogs");

		// This method will create file if not exists
		$this->createfile($ls_filepath);


		$ls_templatedata = "----------------------------\nCreated: " . date('Y-m-d') . "\n----------------------------\n";
		$ls_currentcontent = file_get_contents($ls_filepath);

		if (empty($ls_currentcontent)) {
			file_put_contents($ls_filepath, $ls_templatedata);
			$ls_currentcontent = $ls_templatedata;

		} elseif ($lb_enablerotator) { //Check for rotation

			$ls_lines = file($ls_filepath);
			$ls_created = trim(str_replace("Created:", "", $ls_lines[1]));

			if (strtotime("+$li_rotateduration days", strtotime($ls_created)) < time()) {
				file_put_contents($ls_filepath, $ls_templatedata);
			}
		}

		$ls_newfilecontent = "\n" . date("Y-m-d H:i:s") . ": " . $ls_content;
		file_put_contents($ls_filepath, $ls_newfilecontent, FILE_APPEND);

		return true;
	}


	public function getdocumentroot() {
		return $_SERVER['DOCUMENT_ROOT'];
	}

	public function vardump($pm_value) {

		echo '<pre>';
		var_dump($pm_value);
		echo '</pre>';

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

	public function codex($pm_value) {

		echo '<code>';
		print_r($pm_value);
		echo '</code>';

		exit;
	}

	public function createfile($ps_file, $ps_content = '') {

		if(file_exists($ps_file))
			return false;

		touch($ps_file);
		file_put_contents($ps_file, $ps_content);
		chmod($ps_file, 0664);

		return $ps_file;
	}

	public function renamefile($ps_originalfile, $ps_newfile) {

		if(!file_exists($ps_originalfile))
			return false;

		// If the filenames are same dont bother renaming
		if($ps_originalfile == $ps_newfile)
			return false;

		rename($ps_originalfile, $ps_newfile);

		return $ps_newfile;
	}

	public function createfolder($ps_folder) {

		if(file_exists($ps_folder))
			return false;

		mkdir($ps_folder, 0755, true);

		return $ps_folder;
	}

	public function renamefolder($ps_originalfolder, $ps_newfolder) {

		if(!file_exists($ps_originalfolder))
			return false;

		// If the filenames are same dont bother renaming
		if($ps_originalfolder == $ps_newfolder)
			return false;

		rename($ps_originalfolder, $ps_newfolder);

		return $ps_newfolder;
	}


	public function deletefolder($ps_dir) {

		if(!file_exists($ps_dir))
			return false;

		$lo_it = new \RecursiveDirectoryIterator($ps_dir, \RecursiveDirectoryIterator::SKIP_DOTS);
		$la_files = new \RecursiveIteratorIterator($lo_it, \RecursiveIteratorIterator::CHILD_FIRST);

		foreach($la_files as $lo_file) {

			if ($lo_file->isDir())
				rmdir($lo_file->getRealPath());

			else
				unlink($lo_file->getRealPath());

		}

		return rmdir($ps_dir);
	}


	public function showerrorpage($pi_type) {

		$this->cleanbuffer();

		$ls_customdir = $this->getdocumentroot() . '/errors';

		switch($pi_type) {

			case 404:

				header("HTTP/1.0 404 Not Found");

				$ls_customfile = $ls_customdir . '/404.html';

				if(is_file($ls_customfile))
					$ls_content = file_get_contents($ls_customfile);
				else
					$ls_content = "The page that you have requested could not be found.";

			break;

			case 403:

				header("HTTP/1.0 403 Not Found");

				if(is_file($ls_customfile))
					$ls_content = file_get_contents($ls_customfile);
				else
					$ls_content = "The page that you have requested could not be found.";

			break;
		}

		echo $ls_content;

		exit;
	}

	public function sendjson($po_data) {

		$this->cleanbuffer();

		header('Content-Type: application/json');

		$ls_json = json_encode($po_data);
		echo $ls_json;

		exit;
	}

	public function cleanbuffer() {

		if(ob_get_length()) {
			ob_end_clean();
			ob_start();
		}
	}

	public function getrandomhash($pi_length = 30, $ps_filterexp = '[:alnum:]') {

		// Base characters are based on the [:graph:] character class ("printing characters, excluding space") with a code of 127 or less
		$ls_basechars = '!"#$%&\'()*+,-./0123456789:;<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZ[\]^_`abcdefghijklmnopqrstuvwxyz{|}~';

		// Filter to the specified characters. Defaults to alpha-numeric.
		$ls_source = preg_replace('/[^' . $ps_filterexp . ']/', '', $ls_basechars);

		$ls_string = '';

		for ($i = 0; $i < $pi_length; ++$i) {
			$ls_string .= $ls_source[rand(0, strlen($ls_source  ) - 1)];
		}

		return $ls_string;
	}

	public function getuniquehash($ps_string = '') {

		$ps_string = empty($ps_string) ? uniqid() : $ps_string;

		$ls_string = hash('ripemd160', $ps_string);

		return $ls_string;
	}


	public function stringhash($ps_string) {
		return password_hash($ps_string, PASSWORD_BCRYPT);
	}


	public function verifyhash($ps_string, $ps_hash) {
		return password_verify($ps_string, $ps_hash);
	}


	public function redirect($ps_page) {

		$this->redirecting = 1;

		header('Location: '. $ps_page);

		session_write_close();

		exit;
	}

	public function getvalue($ps_key, $pm_default = '') {

		if(empty($ps_key))
			return false;

		$ls_value = isset($_GET[$ps_key]) ? filter_var($_GET[$ps_key]) : $pm_default;

		return $ls_value;
	}

	public function postvalue($ps_key, $pm_default = '') {

		if(empty($ps_key))
			return false;

		$ls_value = isset($_POST[$ps_key]) ? $_POST[$ps_key] : $pm_default;

		return $ls_value;
	}


	public function styleselector($ps_current, $ps_actual, $ps_style = 'active') {

		if(empty($ps_current) && empty($ps_actual))
			return false;

		if(strcasecmp($ps_actual, $ps_current) == 0)
			return $ps_style;

		return false;
	}

	/**
	 * Set a session based message available for only one request
	 * @param  string $pm_message
	 * @param  string $ps_type    Type can be INFO, ERROR, WARNING
	 * @return boolean            TRUE on success, FALSE on failure
	 */
	public function setflashmessage($pm_message, $ps_type = 'ERROR') {

		if (empty($pm_message))
			return false;

		$pm_message = !is_array($pm_message) ? array($pm_message) : $pm_message;

		$lo_message = new \stdClass;
		$lo_message->content = implode(PHP_EOL, $pm_message);
		$lo_message->type = $ps_type;

		$_SESSION['SITE_FLASHMESSAGE'] = $lo_message;

		return true;
	}


	/**
	 * Once this method is called the message is erased
	 * @return string
	 */
	public function getflashmessage($ps_type = '') {

		$lo_message = isset($_SESSION['SITE_FLASHMESSAGE']) ? $_SESSION['SITE_FLASHMESSAGE'] : '';

		if(!is_object($lo_message))
			return;

		unset($_SESSION['SITE_FLASHMESSAGE']);

		switch ($ps_type){

			case 'PLAIN':
				return $lo_message->content;

			case 'OBJECT':
				return $lo_message;

			default:
				return '<p class="alert alert-' . strtolower($lo_message->type) . '">' . nl2br($lo_message->content) . '</p>';

		}

	}


	public function checkemail($ps_email){

		if(empty($ps_email))
			return false;

		return filter_var($ps_email, FILTER_VALIDATE_EMAIL);
	}


	public function setcache($ps_key, $ps_value = null, $pi_duration = null) {

		if(empty($ps_key))
			trigger_error("Improper usage of setcache() method", E_USER_ERROR);

		// Use session for now
		$_SESSION[$ps_key] = $ps_value;
	}


	public function getcache($ps_key) {

		if(empty($ps_key))
			trigger_error("Improper usage of getcache() method", E_USER_ERROR);

		if(!isset($_SESSION[$ps_key]))
			return false;

		return $_SESSION[$ps_key];
	}


	/**
	 * Returns the page URL
	 * @return string
	 */
	public function getpageurl($pb_query = true) {

		$ls_protocol = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";

		$ls_url = $ls_protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

		if(!$pb_query)
			$ls_url = $ls_protocol . $_SERVER['HTTP_HOST'] . strtok($_SERVER["REQUEST_URI"],'?');

		return $ls_url;
	}


	/**
	 * Returns the host URL
	 * @return string
	 */
	public function getcurrenturl($pb_full = false) {

		$ls_protocol = (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") ? "https://" : "http://";

		if($pb_full)
			return "$ls_protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		$la_uriparts = explode('?', $_SERVER['REQUEST_URI'], 2);

		return $la_uriparts[0];
	}


	public function geturlparameter($pi_position = 1, $ps_separator = '/') {

		$ls_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

		$la_params = explode($ps_separator, $ls_path);
		array_shift($la_params);

		return isset($la_params[$pi_position])? $la_params[$pi_position]: null;
	}


	/**
	 * Accumulate the error in errors array.
	 * Which will then be used in geterrors()
	 * @param  string $ps_error
	 * @return boolean
	 */
	public function seterror($ps_error) {

		if(empty($ps_error))
			return false;

		$this->_errors[] = $ps_error;

		return true;
	}


	/**
	 * Returns the error accumulated by seterror()
	 * There are 2 ways this method can return data
	 * ARRAY => As the array of errors
	 * PLAIN => The error array will be imploded using PHP_EOL
	 * @param  string $ps_type
	 * @return mixed
	 */
	public function geterrors($ps_type = 'ARRAY') {

		if(empty($this->_errors))
			return false;

		switch($ps_type) {

			case 'ARRAY':
				return $this->_errors;

			case 'PLAIN':
				return implode(PHP_EOL, $this->_errors);

		}

		return;
	}


	/**
	 * Checks if any error is set and returns true on success
	 * @return boolean
	 */
	public function haserrors() {
		return !empty($this->_errors);
	}

}