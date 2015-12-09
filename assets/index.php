<?
// echo phpinfo();
// exit;
error_reporting(E_ALL);
ini_set('display_errors', 1);

define('DS', '/'); // Directory separator (Unix-Style works on all OS)
define('FRAMEWORK', realpath(__DIR__) . DS . 'mercury' . DS); // Absolute path to the system folder
define('APPLICATION', realpath(__DIR__) . DS . 'application' . DS); // Absolute path to the system folder

// Check if the profiling is enabled
if(isset($_GET['xhprof'])){
	setcookie('xhprof', $_GET['xhprof'], time() + 600, '/');
	$_COOKIE['xhprof'] = $_GET['xhprof'];
}

$pb_profiling = isset($_COOKIE['xhprof']) && $_COOKIE['xhprof'] == 1;

if($pb_profiling)
	xhprof_enable();

// Autoload
$autoload = require(FRAMEWORK . 'vendor/autoload.php');

// use Pimple\Container;

// Initialize the DI container
$di = new Container();

// Init the router
$di['router'] = function() {

	$router = new AltoRouter();

    return $router;
};

// Create the application
$app = new Application($di);

$app->initadmin();


// Render the profiling link
if($pb_profiling) {

	// stop profiler
	$lo_xhprofdata = xhprof_disable();

	include_once  "mercury/vendor/xhprof/xhprof_lib/utils/xhprof_lib.php";
	include_once  "mercury/vendor/xhprof/xhprof_lib/utils/xhprof_runs.php";

	$lo_xhprofruns = new XHProfRuns_Default();

	// Save the run under a namespace "xhprof_basket".
	$li_runid = $lo_xhprofruns->save_run($lo_xhprofdata, "mercury");

	echo '	<div style="position:absolute; bottom:0; left:0; z-index:1000">
				<a class="btn btn-warning" target="_blank" href="mercury/vendor/xhprof/xhprof_html/index.php?run=' . $li_runid . '&source=mercury">
					Profile
				</a>
			</div>';
}

?>