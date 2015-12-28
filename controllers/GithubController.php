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
		$this->buildresponse(['test' => 'test value']);
	}

	public function commitAction() {

		$lo_git = new VersionManager($this->di);

		$la_changes = $lo_git->getchangedfiles();

		$this->buildresponse(['la_changes' => $la_changes]);

		if (isset($_POST) && !empty($_POST)) {
			$lo_git->add();
			$lo_git->commit($this->postvalue('__message'));
			$lo_git->push();
		}
	}
}