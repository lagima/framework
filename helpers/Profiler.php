<?
namespace Mercury\Helper;

/**
*
*/
class Profiler {

	private $profiling;

	function __construct() {

		$this->start();

	}


	protected function start() {

		// Check if the profiling is enabled
		if(isset($_GET['xhprof'])){
			setcookie('xhprof', $_GET['xhprof'], time() + 600, '/');
			$_COOKIE['xhprof'] = $_GET['xhprof'];
		}

		$this->profiling = isset($_COOKIE['xhprof']) && $_COOKIE['xhprof'] == 1;

		if($this->profiling)
			xhprof_enable();

	}


	public function showresult() {

		// Render the profiling link
		if($this->profiling) {

			// stop profiler
			$lo_xhprofdata = xhprof_disable();

			include_once "mercury/vendor/xhprof/xhprof_lib/utils/xhprof_lib.php";
			include_once "mercury/vendor/xhprof/xhprof_lib/utils/xhprof_runs.php";

			$lo_xhprofruns = new \XHProfRuns_Default();

			// Save the run under a namespace "xhprof_basket".
			$li_runid = $lo_xhprofruns->save_run($lo_xhprofdata, "mercury");

			echo '	<div style="position:absolute; bottom:0; left:0; z-index:1000">
						<a class="btn btn-warning" target="_blank" href="mercury/vendor/xhprof/xhprof_html/index.php?run=' . $li_runid . '&source=mercury">
							Profile
						</a>
					</div>';
		}

	}

}