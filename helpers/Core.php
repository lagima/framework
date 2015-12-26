<?
namespace Mercury\Helper;

class Core {

	public function getdocumentroot() {
		return $_SERVER['DOCUMENT_ROOT'];
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

	public function createfile($ps_file) {

		if(file_exists($ps_file))
			return false;

		touch($ps_file);
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

	protected function findfile($po_page) {

		if(empty($po_page))
			return false;

		$ls_file = $po_page->alias;

		switch($po_page->type) {

			case 'page':

				$ls_filepath = FRONTEND_PATH."/$ls_file.php";

			break;

			case 'template':

				/**
				 * Find the file
				 * In case of templates we have 2 paths one for module and one for frontend
				 * First check the module and if not exists check the frontend
				 */

				if($po_page->module == 1)
					$ls_filepath = ADMIN_PATH."/$ls_file.php";

				if($po_page->corefile == 1 && $po_page->module == 1)
					$ls_filepath = FRAMEWORK_PATH."/modules/$ls_file.php";

				else
					$ls_filepath = FRONTEND_PATH."/$ls_file.php";

			break;

			case 'module':

				/**
				 * Find the file
				 * In case of modules we have 2 paths one for core and one for user defined
				 * First check the core path and if not exists check the user path
				 */

				if($po_page->corefile == 1)
					$ls_filepath = FRAMEWORK_PATH."/modules/$ls_file.php";

				else
					$ls_filepath = ADMIN_PATH."/$ls_file.php";

			break;

			case 'javascript':

				$ls_filepath = JAVASCRIPT_PATH."/$ls_file.js";

			break;

			case 'stylesheet':

				$ls_filepath = STYLESHEET_PATH."/$ls_file.css";

			break;

			default:

				$ls_filepath = '';

			break;
		}

		return $ls_filepath;
	}


	public function showerrorpage($pi_type) {

		ob_clean();

		switch($pi_type) {

			case 404:

				header("HTTP/1.0 403 Not Found");
				$ls_content = "The page that you have requested could not be found.";

			break;

			case 403:

				header("HTTP/1.0 403 Not Found");
				$ls_content = "The page that you have requested could not be found.";

			break;
		}

		echo str_ireplace('[CONTENT]', $ls_content, $this->geterrortemplate());

		exit;
	}

	public function sendjson($po_data) {

		ob_clean();
		ob_start();

		header('Content-Type: application/json');

		$ls_json = json_encode($po_data);
		echo $ls_json;

		exit;
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

		$ls_value = isset($_POST[$ps_key]) ? filter_var($_POST[$ps_key]) : $pm_default;

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
	public function setflashmessage($pm_message, $ps_type = 'WARNING') {

		if (empty($pm_message))
			return false;

		$pm_message = !is_array($pm_message) ? array($pm_message) : $pm_message;

		$lo_message = new stdClass;
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

		$ls_protocol = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";

		if($pb_full)
			return "$ls_protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		$la_uriparts = explode('?', $_SERVER['REQUEST_URI'], 2);

		return $la_uriparts[0];
	}


}