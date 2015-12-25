<?
namespace Mercury\Controller;

use Mercury\Model\PageModel;

class IndexController extends BaseController {


	public function initcontroller() {

		$this->pagemodel = new PageModel($this->di);
	}

	public function indexAction() {

		$this->buildresponse(['test' => 'test value']);
	}

	public function controllersAction() {

		// Get the controllers
		$la_controllers = $this->pagemodel->getrows(['type' => 'CONTROLLER']);

		$this->buildresponse(['la_controllers' => $la_controllers]);

	}

	public function controllerAction($ps_action, $pi_pageid) {


		switch($ps_action) {

			case 'edit':

				// Get the controllers
				$lo_controller = $this->pagemodel->getrow(['type' => 'CONTROLLER', 'pageid' => $pi_pageid]);

				$this->buildresponse(['po_controller' => $lo_controller]);

			break;

			case 'save':


			break;
		}
	}

	public function routesAction() {

		// This uses a different table set that
		$this->pagemodel->settable('m_route');

		// Get the controllers
		$la_routes = $this->pagemodel->getrows();

		$this->buildresponse(['la_routes' => $la_routes]);

	}

	public function routeAction($ps_action, $pi_id) {


		switch($ps_action) {

			case 'add':



			break;

			case 'edit':

				// Get the controllers
				$lo_controller = $this->pagemodel->getrow(['routeid' => $pi_id]);

				$this->buildresponse(['po_route' => $lo_controller]);

			break;

			case 'save':


			break;
		}
	}
}