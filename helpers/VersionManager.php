<?
namespace Mercury\Helper;

use Mercury\Helper\Core;

class VersionManager extends Core {

	private $config;
	private $git;
	private $repositorypath;

	public function __construct($di) {

		if(!isset($di['config']['git']))
			trigger_error('GIT configuration not defined');

		$this->config = $di['config']['git'];

		$this->repositorypath = realpath($this->config->localrepopath);
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

	public function getdiff($ps_from, $ps_to) {

		$la_output = $this->execute(
			'git diff --no-ext-diff ' . $ps_from . ' ' . $ps_to
		);

		return implode("\n", $la_output);
	}

	/**
	 * @param string $revision
	 */
	public function checkout($ps_revision) {

		$this->execute(
			'git checkout --force --quiet ' . $ps_revision . ' 2>&1'
		);
	}


	public function add($ps_filepath = '-A') {

		$this->execute(
			'git add ' . $ps_filepath . ' 2>&1'
		);
	}

	public function commit($ps_message) {

		$ls_output = $this->execute(
			'git commit --author="' . $this->config->username . '" -m "' . $ps_message . '"'
		);

		return $ls_output;
	}


	public function push() {

		$ls_output = $this->execute(
			'git push https://' . $this->config->username . ':' . $this->config->password . '@' . $this->config->remoterepopath . ' --all'
		);

		return $ls_output;
	}


	protected function execute($ps_command) {

		$ls_cwd = getcwd();
		chdir($this->repositorypath);

		exec($ps_command, $lm_output, $lm_returnvalue);
		chdir($ls_cwd);

		if ($lm_returnvalue !== 0) {
			throw new \RuntimeException(implode("\r\n", $lm_output));
		}

		return $lm_output;
	}
}