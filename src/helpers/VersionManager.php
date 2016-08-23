<?
namespace Mercury\Helper;

use Mercury\Helper\Core;

class VersionManager extends Core {

	private $config;
	private $repositorypath;
	private $remoterepository;
	private $username;
	private $password;
	private $author;
	private $error;

	public function __construct($di) {

		// Get the configuration helper
		$this->configuration = isset($di['config']) ? $di['config'] : null;

		$this->repositorypath = $this->getdocumentroot();
		$this->remoterepository = $this->configuration->getconfigvalue('GIT_REPO_PATH');
		$this->username = $this->configuration->getconfigvalue('GIT_USERNAME');
		$this->password = $this->configuration->getconfigvalue('GIT_PASSWORD');
		$this->author = $this->configuration->getconfigvalue('GIT_AUTHOR');
	}

	public function getcurrentbranch() {

		$lm_output = $this->execute('git symbolic-ref HEAD');
		$tmp = explode('/', $lm_output[0]);

		return $lm_output;
	}

	public function getrevisions() {

		$lm_output = $this->execute(
			'git log --no-merges --date-order --reverse --format=medium'
		);

		$la_revisions = [];

		for ($i = 0; $i < count($lm_output); $i++) {

			$la_tmp = explode(' ', $lm_output[$i]);

			if (count($la_tmp) == 2 && $la_tmp[0] == 'commit') {

				$ls_sha1 = $la_tmp[1];

			} elseif (count($la_tmp) == 4 && $la_tmp[0] == 'Author:') {

				$ls_author = implode(' ', array_slice($la_tmp, 1));

			} elseif (count($la_tmp) == 9 && $la_tmp[0] == 'Date:') {

				$la_revisions[] = array(
				  'author'  => $ls_author,
				  'date'    => \DateTime::createFromFormat(
					  'D M j H:i:s Y O',
					  implode(' ', array_slice($la_tmp, 3))
				  ),
				  'sha1'    => $ls_sha1,
				  'message' => isset($lm_output[$i+2]) ? trim($lm_output[$i+2]) : ''
				);

			}
		}

		return $la_revisions;
	}

	public function getdiff($ps_from, $ps_to = '') {

		$la_output = $this->execute(
			'git diff --name-only ' . $ps_from . ' ' . $ps_to
		);

		return $la_output;
	}

	public function getchangedfiles() {

		$la_output = $this->execute(
			'git diff HEAD  --name-only'
		);

		return $la_output;
	}

	public function search($ps_search) {

		if(empty($ps_search))
			return [];

		$la_output = $this->execute(
			"git grep -l '$ps_search'"
		);

		return $la_output;
	}

	/**
	 * @param string $revision
	 */
	public function checkout($ps_revision) {

		$ls_output = $this->execute(
			'git checkout --force --quiet ' . $ps_revision . ' 2>&1'
		);

		return $ls_output;
	}


	public function add($ps_filepath = '-A') {

		$ls_output = $this->execute(
			'git add ' . $ps_filepath
		);

		return $ls_output;
	}

	public function removedeleted() {

		$ls_output = $this->execute(
			'git add -u'
		);

		return $ls_output;
	}

	public function commit($ps_message) {

		if(empty($ps_message)) {
			$this->setlasterror("Commit message cannot be empty");
			return false;
		}

		$ls_output = $this->execute(
			'git commit -a --author="' . $this->author . '" -m "' . $ps_message . '"'
		);

		return $ls_output;
	}


	public function push() {

		$ls_output = $this->execute(
			'git push https://' . $this->username . ':' . $this->password . '@' . $this->remoterepository . ' --all --force'
		);

		return $ls_output;
	}


	protected function execute($ps_command) {

		if(!is_dir($this->repositorypath)) {
			trigger_error("Please check if your repository is configured properly", E_USER_WARNING);
			return false;
		}

		// Get the current working directory
		$ls_cwd = getcwd();

		// Change to the repository path
		chdir($this->repositorypath);

		// Run the command
		exec($ps_command, $lm_output, $lm_returnvalue);

		// Change back to working directory
		chdir($ls_cwd);

		if ($lm_returnvalue !== 0) {

			$lm_output = empty($lm_output) ? 'An unknown error occured from calling ' . debug_backtrace()[1]['function'] . '()' : $lm_output;
			$this->setlasterror($lm_output);

			return false;
		}

		return $lm_output;
	}

	private function setlasterror($ps_error) {
		$this->error = $ps_error;
	}

	public function getlasterror() {
		return $this->error;
	}
}