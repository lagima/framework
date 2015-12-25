<?
namespace Mercury\Helper;

use Mercury\Helper\Core;

class View extends Core {

	private $config;

	public function __construct($di) {

		if(!isset($di['config']['view']))
			trigger_error('View configuration not defined');

		$this->config = $di['config']['view'];

	}

	public function renderview($po_page, $pa_viewdata) {

		$ls_viewfolder = $this->getviewfolder($po_page->controller);

		if($po_page->type == 'webpage'){

			// Prepare data
			$ps_controller = strtolower($po_page->controller);
			$ps_action = strtolower($po_page->action);

			// Create new Plates instance
			$lo_templates = new \League\Plates\Engine($ls_viewfolder);

			// Load asset extension
			$lo_templates->loadExtension(new \League\Plates\Extension\Asset($this->config->assetpath, true));

			$lo_templates->addFolder('templates', $this->config->templatepath);

			// Configure the template
			$pa_viewdata['gs_template'] = 'templates::' . $po_page->template;
			$pa_viewdata['ga_templatedata'] = ['title' => 'User Profile'];

			// Render the view
			echo $lo_templates->render($ps_action, $pa_viewdata);
		}

		else
			trigger_error('View not defined: ' . $ls_viewfile, E_USER_ERROR);

		return true;
	}

	public function getviewfolder($ps_controller) {

		$ps_controller = strtolower($ps_controller);

		return $this->config->viewpath . '/' . $ps_controller;
	}

	public function getviewfile($ps_controller, $ps_action = 'index') {

		$ps_controller = strtolower($ps_controller);
		$ps_action = strtolower($ps_action);

		return "/$ps_controller/$ps_action.php";
	}


}