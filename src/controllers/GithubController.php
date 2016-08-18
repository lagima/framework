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

			// If the status is ever false stop
			$lb_status = true;

			// Stage any new files
			if($lb_status !== false)
				$lb_status = $lo_git->add();

			// Remove any deleted files from repo
			if($lb_status !== false)
				$lb_status = $lo_git->removedeleted();

			// Commit with the message
			if($lb_status !== false)
				$lb_status = $lo_git->commit($this->postvalue('__message'));

			//Push it to remove repo
			if($lb_status !== false)
				$lb_status = $lo_git->push();

			// If it ever failed set the message
			$ls_error = $lo_git->getlasterror();

			if(!empty($ls_error))
				$this->setflashmessage($lo_git->getlasterror());
			else
				$this->setflashmessage("All done :)", 'SUCCESS');

		}

		$la_changes = $lo_git->getchangedfiles();
		$la_changes = !is_array($la_changes) ? [] : $la_changes;

		$this->buildresponse(['la_changes' => $la_changes]);
	}
}