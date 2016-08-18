<?
namespace Mercury\Helper;

use \Pimple\Container;
use Mercury\Helper\Core;

class ErrorHandler extends Core {

	function __construct() {
		set_error_handler([$this, "mercuryerrorhandler"], E_WARNING);
	}


	public function mercuryerrorhandler($ps_errorno, $ps_errorstr, $ps_errorfile, $ps_errorline, $ps_errorcontext) {
		echo "<b>Error:</b> [$ps_errorno on $ps_errorfile line $ps_errorline] $ps_errorstr<br>";
		echo "Ending Script";
		// exit;
	}
}