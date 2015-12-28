<?
namespace Mercury\Controller;

use Mercury\Model\PageModel;
use Mercury\Model\RouteModel;
use Mercury\Model\ModuleModel;

class IndexController extends BaseController {


	public function initcontroller() {

		$this->pagemodel = new PageModel($this->di);
		$this->routemodel = new RouteModel($this->di);
		$this->modulemodel = new ModuleModel($this->di);
	}

	public function indexAction() {

		$this->buildresponse(['test' => 'test value']);
	}

	public function controllersAction() {

		// Get the controllers
		$la_controllers = $this->pagemodel->getrows(['type' => 'CONTROLLER']);

		$this->buildresponse(['la_controllers' => $la_controllers]);

	}

	public function controllerAction($ps_action, $pi_id = null) {

		switch($ps_action) {

			case 'add':

				if (isset($_POST) && !empty($_POST)) {

					// Default values here
					$_POST['__type'] = 'CONTROLLER';

					$this->pagemodel->commitaddfrompost();

					// Create the file
					if($this->postvalue('__core'))
						$ls_file = $this->getdocumentroot() . '/mercury/controller' . ucfirst(strtolower($this->postvalue('__name'))) . 'Controller.php';
					else
						$ls_file = $this->getdocumentroot() . '/application/controller' . ucfirst(strtolower($this->postvalue('__name'))) . 'Controller.php';

					$this->createfile($ls_file);
				}

				$this->setview('addcontroller');

			break;

			case 'edit':

				if (isset($_POST) && !empty($_POST)) {

					// Default values here
					$_POST['__type'] = 'CONTROLLER';

					$this->pagemodel->commitupdatefrompost('pageid', $pi_id);

					// Create the file
					if($this->postvalue('__core'))
						$ls_file = $this->getdocumentroot() . '/mercury/controllers/' . ucfirst(strtolower($this->postvalue('__name'))) . 'Controller.php';
					else
						$ls_file = $this->getdocumentroot() . '/application/controllers/' . ucfirst(strtolower($this->postvalue('__name'))) . 'Controller.php';

					$this->createfile($ls_file);
				}

				// Get the controllers
				$lo_controller = $this->pagemodel->getrow(['type' => 'CONTROLLER', 'pageid' => $pi_id]);

				$this->buildresponse(['po_controller' => $lo_controller]);

			break;
		}
	}

	public function routesAction() {

		// Get the controllers
		$la_routes = $this->routemodel->getrows();

		$this->buildresponse(['la_routes' => $la_routes]);

	}

	public function routeAction($ps_action, $pi_id = null) {

		// Get all pages
		$la_pages = $this->pagemodel->getrows();

		// Get all modules
		$la_rawmodules = $this->modulemodel->getrows();

		// Classify them based on type
		$la_controllers = [];
		$la_modules = [];

		foreach($la_pages as $lo_page) {

			$lo_row = new \stdClass;
			$lo_row->id = $lo_page->pageid;
			$lo_row->label = $lo_page->label;

			if($lo_page->type == 'CONTROLLER')
				$la_controllers[] = $lo_row;
		}

		$this->buildresponse(['pa_controllers' => $la_controllers]);

		foreach($la_rawmodules as $lo_item) {

			$lo_row = new \stdClass;
			$lo_row->id = $lo_item->moduleid;
			$lo_row->label = $lo_item->name;

			$la_modules[] = $lo_row;
		}

		$this->buildresponse(['pa_modules' => $la_modules]);

		switch($ps_action) {

			case 'add':

				if(isset($_POST) && !empty($_POST))
					$this->routemodel->commitaddfrompost();

				$this->setview('addroute');

			break;

			case 'edit':

				if(isset($_POST) && !empty($_POST))
					$this->routemodel->commitupdatefrompost('routeid', $pi_id);

				// Get the controllers
				$lo_route = $this->routemodel->getrow(['routeid' => $pi_id]);

				$this->buildresponse(['po_route' => $lo_route]);

			break;
		}
	}

	public function searchAction() {

		$client = new \SebastianBergmann\Git('/mercury');
		// $repo = $client->api('repo')->update('skdeepak88', 'mercury', array('description' => 'some new description'));

		// $repositories = $client->api('repo')->all();

		$this->debugx($client);



	}
}