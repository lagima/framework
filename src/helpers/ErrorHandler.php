<?
namespace Mercury\Helper;

use \Pimple\Container;
use Mercury\Helper\Core;

class ErrorHandler extends Core {

	function __construct() {
		set_error_handler([$this, "mercuryerrorhandler"]);
	}


	public function mercuryerrorhandler($ps_errorno, $ps_errorstr, $ps_errorfile, $ps_errorline, $ps_errorcontext) {

		echo "<b>Error:</b> [$ps_errorno on $ps_errorfile line $ps_errorline] $ps_errorstr<br>";

		switch ($ps_errorno) {
			case E_USER_ERROR:
			case E_ERROR:

				echo "Ending Script";
				exit;

			break;

			default:

				echo "Continuing Script";

			break;
		}

		// exit;
	}
}