<?
namespace Mercury\Controller;

use Mercury\Helper\VersionManager;


class GithubController extends BaseController {


	public function initcontroller() {


	}

	public function indexAction() {
		$this->buildresponse(['test' => 'test value']);
	}

	public function searchAction() {

		$lo_git = new VersionManager($this->di);

		$ps_query = $this->getvalue('q');

		$la_result = $lo_git->search($ps_query);

		$this->buildresponse(['la_result' => $la_result]);
	}

	public function commitAction() {

		// Make SQL dump
		$lo_dbconfig = $this->di['config']['database'];
		$ls_sqlpath = $this->getdocumentroot();

		exec("mysqldump -u=$lo_dbconfig->dbuser -p=$lo_dbconfig->dbpassword $lo_dbconfig->dbname > $ls_sqlpath/install.sql");

		$lo_git = new VersionManager($this->di);

		if (isset($_POST) && !empty($_POST)) {
			$lo_git->add();
			$lo_git->removedeleted();
			$lo_git->commit($this->postvalue('__message'));
			$lo_git->push();
		}

		$la_changes = $lo_git->getchangedfiles();

		$this->buildresponse(['la_changes' => $la_changes]);
	}
}