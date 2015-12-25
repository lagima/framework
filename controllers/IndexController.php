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
}