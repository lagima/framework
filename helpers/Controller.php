<?
namespace Mercury\Helper;


class Controller {

	private $view;

	public $viewdata;


	public function __construct() {

		// Try to set the view from
	}

	protected function setview($ps_view) {

		$this->view = $ps_view;
	}

	public function getviewdata() {
		return $this->viewdata;
	}

}