<?
namespace Mercury\Controller;

use Mercury\Helper\VersionManager;
use Mercury\Model\PageModel;
use Mercury\Model\RouteModel;
use Mercury\Model\ModuleModel;

class GithubController extends BaseController {


	public function initcontroller() {

		$this->pagemodel = new PageModel($this->di);
		$this->routemodel = new RouteModel($this->di);
		$this->modulemodel = new ModuleModel($this->di);
	}

	public function indexAction() {

		$this->buildresponse(['test' => 'test value']);
	}

	public function searchAction() {


	}

	public function commitAction() {

		$lo_git = new VersionManager($this->di);

		$lo_git->add();
		$lo_git->commit("Tweaked VersionManager class to pull configured username while committing\nTidy up Github controller");
		$lo_git->push();

	}
}