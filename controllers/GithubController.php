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

		$client = new VersionManager($this->di);
		// $repo = $client->api('repo')->update('skdeepak88', 'mercury', array('description' => 'some new description'));

		// $repositories = $client->api('repo')->all();
		$this->debugx($client->add());

		$this->debugx($client->getdiff('4188f6bc289e59bce03440a58cf291821dd33ece', '33540bdb7a1fa49b5e29062b1b2525113afd6e96'));
	}
}