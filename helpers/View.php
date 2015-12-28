<?
namespace Mercury\Helper;

use Mercury\Helper\Core;
use Mercury\Helper\HtmlExtension;

class View extends Core {

	private $config;
	private $view;

	public function __construct($di) {

		if(!isset($di['config']['view']))
			trigger_error('View configuration not defined');

		$this->config = $di['config']['view'];

	}

	public function setview($ps_view) {
		$this->view = $ps_view;
	}

	private function getview() {
		return $this->view;
	}

	public function renderpage($po_page, $pa_viewdata) {

		$ls_viewfolder = $this->getviewfolder($po_page);
		$ls_viewfile = $this->getviewfile($po_page);

		if($po_page->type == 'webpage'){

			// Prepare data
			$ps_controller = strtolower($po_page->controller);
			$ps_action = strtolower($po_page->action);

			// Create new Plates instance
			$lo_templates = new \League\Plates\Engine($ls_viewfolder);

			// Load asset extension
			$lo_templates->loadExtension(new \League\Plates\Extension\Asset($this->config->assetpath, true));

			// Load html helpers
			$lo_templates->loadExtension(new HtmlExtension());


			$lo_templates->addFolder('templates', $this->config->templatepath);

			// Configure the template
			$pa_viewdata['gs_template'] = 'templates::' . $po_page->template;
			$pa_viewdata['ga_templatedata'] = ['gs_title' => 'Mercury', 'gs_currentpage' => $this->getcurrenturl()];

			// Render the view if exists
			if(is_file($ls_viewfolder.'/'.$ls_viewfile.'.php'))
				echo $lo_templates->render($ls_viewfile, $pa_viewdata);

			else
				$this->debug($pa_viewdata);
		}

		else
			trigger_error('View not defined: ' . $ls_viewfile, E_USER_ERROR);

		return true;
	}


	public function getviewfile($po_page) {

		if(!is_object($po_page))
			trigger_error('Page is invalid', E_USER_ERROR);

		$ls_viewfile = '';

		// Check if a view is set
		if(isset($this->view) && !empty($this->view))
			$ls_viewfile = $this->view;

		// If not set try to resolve from controller
		if(empty($ls_viewfile))
			$ls_viewfile = strtolower($po_page->action);

		return $ls_viewfile;
	}


	public function getviewfolder($po_page) {

		if(!is_object($po_page))
			trigger_error('Page is invalid', E_USER_ERROR);

		$ps_controller = strtolower($po_page->controller);

		return "{$this->config->viewpath}/$ps_controller";
	}


}