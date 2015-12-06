<?
namespace Mercury\Controller;

use Mercury\View;

class BaseController {

	public function indexAction() {
		echo 'product list';
	}

	public function itemAction($id) {
		return "product $id";
	}
}