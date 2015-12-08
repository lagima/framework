<?
namespace Mercury\Controller;

class IndexController extends BaseController {

	public function indexAction() {
		echo 'product list';
	}

	public function userAction($pi_id) {
		echo "user" . $pi_id;
	}
}