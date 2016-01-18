<?
namespace Mercury\Helper;

use Mercury\Helper\Core;
use Mercury\Helper\HtmlExtension;
use Mercury\Model\PageModel;

class View extends Core {

	private $config;
	private $defaulttemplate;
	private $view;
	private $viewdata;
	private $templatedata;

	protected $replacement;


	public function __construct($di) {

		$this->defaulttemplate = __DIR__ . '/../views/templates';

		$this->pagemodel = new PageModel($di);
	}

	public function setview($ps_view) {
		$this->view = $ps_view;
	}

	private function getview() {
		return $this->view;
	}

	public function buildresponse($pa_data) {

		if(!is_array($this->viewdata))
			$this->viewdata = [];

		$this->viewdata = array_merge($this->viewdata, $pa_data);
	}

	public function getviewdata() {
		return $this->viewdata;
	}

	public function buildtemplatedata($pa_data) {

		if(!is_array($this->templatedata))
			$this->templatedata = [];

		$this->templatedata = array_merge($this->templatedata, $pa_data);
	}

	public function gettemplatedata() {
		return $this->templatedata;
	}

	public function renderpage($po_page) {

		// Get view folder and file
		$ls_viewfolder = $this->getviewfolder($po_page);
		$ls_viewfile = $this->getviewfile($po_page);
		$ls_templatefolder = $this->gettemplatefolder($po_page);
		$ls_assetsfolder = $this->getasstesfolder($po_page);

		// Get the data
		$la_viewdata = $this->getviewdata();
		$la_templatedata = $this->gettemplatedata();

		// If no view is defined and view data is set throw error
		if(!$this->hasview($po_page) && !empty($pa_viewdata))
			trigger_error('View not defined: ' . $ls_viewfolder . '/' . $ls_viewfile, E_USER_ERROR);

		if(!$this->hasview($po_page))
			return false;

		// Create new Plates instance
		$lo_templates = new \League\Plates\Engine($ls_viewfolder);

		// Load asset extension
		$lo_assetextention = new \League\Plates\Extension\Asset($ls_assetsfolder, true);
		$lo_templates->loadExtension($lo_assetextention);

		// Load html helpers
		$lo_templates->loadExtension(new HtmlExtension());

		$lo_templates->addFolder('templates', $ls_templatefolder);
		$lo_templates->addFolder('defaults', $this->defaulttemplate);

		// Get the view details from db if non admin
		if(strcasecmp($po_page->module, 'admin') === 0 ) {

			// Configure the template
			$la_viewdata['gs_template'] = 'templates::admin';
			$la_viewdata['ga_templatedata'] = ['gs_title' => 'Mercury PHP', 'gs_currentpage' => $this->getcurrenturl()];

		} else {

			$lo_search = new \stdClass;
			$lo_search->name = $ls_viewfile;
			$lo_search->controllerid = $po_page->controllerid;
			$lo_search->moduleid = $po_page->moduleid;
			$lo_viewdetail = $this->pagemodel->getviewdetails($lo_search);

			// Configure the template
			$la_viewdata['gs_template'] = is_object($lo_viewdetail) && !empty($lo_viewdetail->template) ? 'templates::' . strtolower($lo_viewdetail->template) : 'defaults::blank';
			$la_viewdata['ga_templatedata'] = array_merge($la_templatedata, ['gs_title' => $po_page->pagetitle, 'gs_currentpage' => $this->getcurrenturl()]);
		}

		// Render the view if exists
		$ls_pagecontent = $lo_templates->render($ls_viewfile, $la_viewdata);

		// Do the replacements if configured any
		$ls_pagecontent = $this->replacecontents($ls_pagecontent, $lo_assetextention);

		// Output the page
		echo $ls_pagecontent;

		return true;
	}

	public function hasview($po_page) {

		$ls_viewfolder = $this->getviewfolder($po_page);
		$ls_viewfile = $this->getviewfile($po_page);

		return is_file($ls_viewfolder.'/'.$ls_viewfile.'.php');
	}

	public function getviewfile($po_page) {

		if(!is_object($po_page))
			trigger_error('Page is invalid', E_USER_ERROR);

		$ls_viewfile = '';

		// Check if a view is set
		if(isset($this->view) && !empty($this->view))
			$ls_viewfile = $this->view;

		// If not set try to resolve from controller action
		if(empty($ls_viewfile))
			$ls_viewfile = strtolower($po_page->action);

		return $ls_viewfile;
	}


	public function getviewfolder($po_page) {

		if(!is_object($po_page))
			trigger_error('Page is invalid', E_USER_ERROR);

		$ls_controller = strtolower($po_page->controller);
		$ls_module = strtolower($po_page->module);

		if(strcasecmp($ls_module, 'admin') === 0)
			return  __DIR__ . '/../views/' . $ls_controller;

		return  $this->getdocumentroot() . '/application/' . $ls_module . '/views/' . $ls_controller;
	}


	public function gettemplatefolder($po_page) {

		if(!is_object($po_page))
			trigger_error('Page is invalid', E_USER_ERROR);

		$ls_module = strtolower($po_page->module);

		if(strcasecmp($ls_module, 'admin') === 0)
			return  __DIR__ . '/../views/templates';

		return  $this->getdocumentroot() . '/application/' . $ls_module . '/views/templates';
	}


	public function getasstesfolder($po_page) {

		if(!is_object($po_page))
			trigger_error('Page is invalid', E_USER_ERROR);


		return  $this->getdocumentroot();
	}


	protected function addresourcefile($ps_file) {

		if(empty($ps_file))
			return false;

		// Check if the page is external
		$ls_file = $this->getdocumentroot() . $ps_file;

		if(!is_file($ls_file))
			trigger_error("Invalid resource file or file not found!", E_USER_ERROR);

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

	private function replacecontents($ps_buffer, $po_assetextention) {

		// Get all the replacement
		if(isset($this->replacement['script'])){

			$lf_filter = function($ls_file) use ($po_assetextention) { return '<script type="text/javascript" src="' . $po_assetextention->cachedAssetUrl($ls_file) . '"></script>' . PHP_EOL; };

			$la_files = array_map($lf_filter, $this->replacement['script']);

			$ps_buffer = preg_replace('#</body>#i', implode(PHP_EOL, $la_files) . PHP_EOL . '</body>', $ps_buffer);
		}

		if(isset($this->replacement['stylesheet'])){

			$lf_filter = function($ls_file) use ($po_assetextention) { return '<link href="' . $po_assetextention->cachedAssetUrl($ls_file) . '" rel="stylesheet" type="text/css"/>' . PHP_EOL; };

			$la_files = array_map($lf_filter, $this->replacement['stylesheet']);

			$ps_buffer = preg_replace('#</head>#i', implode(PHP_EOL, $la_files) . PHP_EOL . '</head>', $ps_buffer);
		}

		return $ps_buffer;
	}

}