<?
namespace Mercury\Controller;

class IndexController extends BaseController {

	public function indexAction() {

		$this->response = ['test' => 'test value'];
	}

	public function controllersAction() {

		// Get the controllers
		$la_controllers = $this->db->getallobjects("SELECT * FROm `m_page` WHERE `type` = :type", ['type' => 'CONTROLLER']);

		$this->response = ['la_controllers' => $la_controllers];

	}
}