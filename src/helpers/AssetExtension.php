<?
namespace Mercury\Helper;

use League\Plates\Engine;
use League\Plates\Extension\ExtensionInterface;
use League\Plates\Extension\Asset;

class AssetExtension extends Asset implements ExtensionInterface {

	protected $replacement;

	public function register(Engine $po_engine) {

		parent::register($po_engine);

		$po_engine->registerFunction('addscript', [$this, 'addscript']);
		$po_engine->registerFunction('addstylesheet', [$this, 'addstylesheet']);
		$po_engine->registerFunction('getscripts', [$this, 'getscripts']);
		$po_engine->registerFunction('getstylesheets', [$this, 'getstylesheets']);
	}

	protected function addresourcefile($ps_file) {

		if(empty($ps_file))
			return false;

		// // Check if the page exists
		// $ls_file = $this->getdocumentroot() . $ps_file;

		// if(!is_file($ls_file))
		// 	trigger_error("Invalid resource file or file not found!", E_USER_ERROR);

		return $ps_file;
	}

	public function addscript($ps_file) {

		if(empty($ps_file))
			return false;

		$this->replacement['script'][] = $this->addresourcefile($ps_file);
	}


	public function addstylesheet($ps_file) {

		if(empty($ps_file))
			return false;

		$this->replacement['stylesheet'][] = $this->addresourcefile($ps_file);

	}

	public function getscripts($ps_position = '') {

		if(!isset($this->replacement['script']))
			return false;

		$lf_filter = function($ls_file) { return '<script type="text/javascript" src="' . $this->cachedAssetUrl($ls_file) . '"></script>' . PHP_EOL; };

		$la_files = array_map($lf_filter, $this->replacement['script']);

		$ls_content = implode(PHP_EOL, $la_files) . PHP_EOL;

		return $ls_content;
	}

	public function getstylesheets($ps_position = '') {

		if(!isset($this->replacement['stylesheet']))
			return false;

		$lf_filter = function($ls_file) { return '<link href="' . $this->cachedAssetUrl($ls_file) . '" rel="stylesheet" type="text/css"/>' . PHP_EOL; };

		$la_files = array_map($lf_filter, $this->replacement['stylesheet']);

		$ls_content = implode(PHP_EOL, $la_files) . PHP_EOL;

		return $ls_content;
	}

}