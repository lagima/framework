<?
namespace Mercury\Helper;

use Mercury\Helper\Core;
use Mercury\Helper\HtmlExtension;
use Mercury\Model\PageModel;

class View extends Core {

	private $config;
	private $defaulttemplate;
	private $view;

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


	public function renderpage($po_page, $pa_viewdata) {

		// Get view folder and file
		$ls_viewfolder = $this->getviewfolder($po_page);
		$ls_viewfile = $this->getviewfile($po_page);
		$ls_templatefolder = $this->gettemplatefolder($po_page);
		$ls_assetsfolder = $this->getasstesfolder($po_page);

		if(!$this->hasview($po_page))
			trigger_error('View not defined: ' . $ls_viewfolder . '/' . $ls_viewfile, E_USER_ERROR);

		// Create new Plates instance
		$lo_templates = new \League\Plates\Engine($ls_viewfolder);

		// Load asset extension
		$lo_templates->loadExtension(new \League\Plates\Extension\Asset($ls_assetsfolder, true));

		// Load html helpers
		$lo_templates->loadExtension(new HtmlExtension());

		$lo_templates->addFolder('templates', $ls_templatefolder);
		$lo_templates->addFolder('defaults', $this->defaulttemplate);

		// Get the view details from db if non admin
		if(strcasecmp($po_page->module, 'admin') === 0 ) {

			// Configure the template
			$pa_viewdata['gs_template'] = 'templates::admin';
			$pa_viewdata['ga_templatedata'] = ['gs_title' => 'Mercury PHP', 'gs_currentpage' => $this->getcurrenturl()];

		} else {

			$lo_search = new \stdClass;
			$lo_search->name = $ls_viewfile;
			$lo_search->controllerid = $po_page->controllerid;
			$lo_search->moduleid = $po_page->moduleid;
			$lo_viewdetail = $this->pagemodel->getviewdetails($lo_search);

			// Configure the template
			$pa_viewdata['gs_template'] = is_object($lo_viewdetail) && !empty($lo_viewdetail->template) ? 'templates::' . $lo_viewdetail->template : 'defaults::blank';
			$pa_viewdata['ga_templatedata'] = ['gs_title' => $po_page->pagetitle, 'gs_currentpage' => $this->getcurrenturl()];
		}

		// Render the view if exists
		echo $lo_templates->render($ls_viewfile, $pa_viewdata);

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

		$ps_controller = strtolower($po_page->controller);
		$ps_module = strtolower($po_page->module);

		if(strcasecmp($po_page->module, 'admin') === 0)
			return  __DIR__ . '/../views/' . $ps_controller;

		return  $this->getdocumentroot() . '/application/' . $ps_module . '/views/' . $ps_controller;
	}


	public function gettemplatefolder($po_page) {

		if(!is_object($po_page))
			trigger_error('Page is invalid', E_USER_ERROR);


		if(strcasecmp($po_page->module, 'admin') === 0)
			return  __DIR__ . '/../views/templates';

		return  $this->getdocumentroot() . '/application/' . $ps_module . '/views/templates';
	}


	public function getasstesfolder($po_page) {

		if(!is_object($po_page))
			trigger_error('Page is invalid', E_USER_ERROR);


		return  $this->getdocumentroot();
	}


}