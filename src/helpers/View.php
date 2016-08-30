<?
namespace Mercury\Helper;

use Mercury\Helper\Core;
use Mercury\Extension\HtmlExtension;
use Mercury\Extension\AssetExtension;
use Mercury\Model\PageModel;

class View extends Core {

	private $config;
	private $defaulttemplate;
	private $view;
	private $viewdata;
	private $templatedata;
	private $formerrors;

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

		$la_return = $this->templatedata;
		$la_return = is_array($la_return) ? $la_return : [];

		return $la_return;
	}

	public function renderpage($po_page) {

		// Get view folder and file
		$ls_viewfolder = $this->getviewfolder($po_page);
		$ls_viewfile = $this->getviewfile($po_page);
		$ls_templatefolder = $this->gettemplatefolder($po_page);
		$ls_partialfolder = $this->getpartialfolder($po_page);
		$ls_assetsfolder = $this->getasstesfolder($po_page);

		// Get the data
		$la_viewdata = $this->getviewdata();
		$la_templatedata = $this->gettemplatedata();

		// Has view ?
		$lb_hasview = $this->hasview($po_page);

		// If no view is defined and view data is set throw error
		if(!$lb_hasview && !empty($la_viewdata))
			trigger_error('View not defined: ' . $ls_viewfolder . '/' . $ls_viewfile, E_USER_ERROR);

		// Dont show anything if no view is defined
		if(!$lb_hasview) {
			return false;
		}

		// Create new Plates instance
		$lo_templates = new \League\Plates\Engine($ls_viewfolder);

		// Load URI extension
		$lo_templates->loadExtension(new \League\Plates\Extension\URI($this->getcurrenturl()));

		// Load asset extension
		$lo_templates->loadExtension(new AssetExtension($ls_assetsfolder, true));

		// Prepate the HTML extension for the template engine
		$lo_htmlextension = new HtmlExtension();
		// Inject any validation errors that we accumulated
		$lo_htmlextension->setformerrors($this->getformerrors());

		// Load html extension
		$lo_templates->loadExtension($lo_htmlextension);


		// Get the view details from db if non admin
		if(strcasecmp($po_page->module, 'admin') === 0 ) {

			// Configure the template
			$la_viewdata['gs_template'] = 'templates::admin';
			$la_viewdata['ga_templatedata'] = [
												'gs_title' => 'Mercury PHP',
												'gs_currentpage' => $this->getcurrenturl(),
												'gi_copyrightyear' => date('Y'),
												'gs_version' => $this->getversion()
											  ];

		} else {

			// Load any additional custom extensions
			$la_extensions = $this->pagemodel->getpages('VIEWEXTENSION');
			foreach($la_extensions as $lo_extension) {

				// Prepare the class
				$ls_extension = "\\Mercury\\App\Extensions\\$lo_extension->name";

				if(class_exists($ls_extension)){
					$lo_templates->loadExtension(new $ls_extension());
				}

			}

			// Get more details about template
			$lo_search = new \stdClass;
			$lo_search->name = $ls_viewfile;
			$lo_search->controllerid = $po_page->controllerid;
			$lo_search->moduleid = $po_page->moduleid;
			$lo_viewdetail = $this->pagemodel->getviewdetails($lo_search);

			//Standard values
			$la_standardvals = ['gs_title' => $po_page->pagetitle,
								'gs_currentpage' => $this->getcurrenturl(),
								'gs_viewname' => $lo_viewdetail->name,
								'gi_copyrightyear' => date('Y'),
								'gs_version' => $this->getversion()
								];

			// Configure the template
			$la_viewdata['gs_template'] = is_object($lo_viewdetail) && !empty($lo_viewdetail->template) ? 'templates::' . strtolower($lo_viewdetail->template) : 'defaults::blank';
			$la_viewdata['ga_templatedata'] = array_merge($la_templatedata, $la_standardvals);
		}

		// Add folders used for the engine
		$lo_templates->addFolder('templates', $ls_templatefolder);
		$lo_templates->addFolder('defaults', $this->defaulttemplate);

		if(file_exists($ls_partialfolder))
			$lo_templates->addFolder('partials', $ls_partialfolder);

		// Render the view if exists
		$ls_pagecontent = $lo_templates->render($ls_viewfile, $la_viewdata);

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


	public function getpartialfolder($po_page) {

		if(!is_object($po_page))
			trigger_error('Page is invalid', E_USER_ERROR);

		$ls_module = strtolower($po_page->module);

		if(strcasecmp($ls_module, 'admin') === 0)
			return  __DIR__ . '/../views/partials';

		return  $this->getdocumentroot() . '/application/' . $ls_module . '/views/partials';
	}


	public function getasstesfolder($po_page) {

		if(!is_object($po_page))
			trigger_error('Page is invalid', E_USER_ERROR);

		return  $this->getdocumentroot();
	}


	/**
	 * Add the error log to error array and formerror
	 * Used to show validation errors
	 * @param  string $ps_error Error string
	 * @param  string $ps_field Field string
	 * @param  string $ps_form 	Form name, just a reference
	 * @return boolean
	 */
	public function setformerror($ps_error, $ps_field, $ps_form = 'GLOBAL'){

		if(empty($ps_error))
			return false;

		if(empty($ps_field))
			return false;

		$this->formerrors[$ps_form][$ps_field] = $ps_error;

		return true;
	}


	/**
	 * Returns the accumulated formerrors
	 * @return array
	 */
	public function getformerrors(){
		return $this->formerrors;
	}


	public function hasformerrors($ps_form = 'GLOBAL') {
		return isset($this->formerrors[$ps_form]) && !empty($this->formerrors[$ps_form]);
	}

}