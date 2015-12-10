<?
namespace Mercury\Helper;


class View {

	private $config;

	public function __construct($di) {

		if(!isset($di['config']['view']))
			trigger_error('View configuration not defined');

		$this->config = $di['config']['view'];

	}

	public function renderview($po_page, $pa_viewdata) {

		$ls_viewfile = $this->getviewfile($po_page->controller, $po_page->action);

		if($po_page->type == 'webpage'){

			$loader = new \Twig_Loader_Filesystem($this->config->path);

			$twig = new \Twig_Environment($loader, array(
				'cache' => $this->config->path,
				// 'auto_reload' => true
			));

			echo $twig->render($ls_viewfile, $pa_viewdata);
		}

		else
			trigger_error('View not defined: ' . $ls_viewfile, E_USER_ERROR);

		return true;
	}


	public function getviewfile($ps_controller, $ps_action = 'index') {

		$ps_controller = strtolower($ps_controller);
		$ps_action = strtolower($ps_action);

		return "/$ps_controller/$ps_action.html";
	}


}