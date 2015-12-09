<?
namespace Mercury\Controller;

class IndexController extends BaseController {

	public function indexAction() {

		$this->viewdata = ['test' => 'test value'];
	}

	public function userAction($pi_id) {
		echo "user" . $pi_id;
	}
}