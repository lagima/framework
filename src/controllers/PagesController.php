<?
namespace Mercury\Controller;

use Mercury\Model\PageModel;
use Mercury\Model\RouteModel;
use Mercury\Model\ModuleModel;
use Mercury\Model\BlueprintModel;

class PagesController extends BaseController {


	public function initcontroller() {

		$this->pagemodel = new PageModel($this->di);
		$this->routemodel = new RouteModel($this->di);
		$this->modulemodel = new ModuleModel($this->di);
		$this->blueprintmodel = new BlueprintModel($this->di);
	}

	public function controllersAction() {

		$this->setview('pages');

		// Get the controllers
		$la_pages = $this->pagemodel->getpages('CONTROLLER');

		$this->buildresponse(['la_pages' => $la_pages]);
		$this->buildresponse(['ls_pagetitle' => 'Controller']);
		$this->buildresponse(['ls_addurl' => '/admin/controller/add']);
		$this->buildresponse(['ls_editurl' => '/admin/controller/edit']);
		$this->buildresponse(['ls_deleteurl' => '/admin/model/delete']);

	}

	public function controllerAction($ps_action, $pi_id = null) {

		switch($ps_action) {

			case 'add':

				if (isset($_POST) && !empty($_POST)) {

					// Default values here
					$_POST['__type'] = 'CONTROLLER';
					$_POST['__created'] = date('Y-m-d H:i:s');

					$this->pagemodel->commitaddfrompost();

					// Get the module
					$lo_module = $this->modulemodel->getrow(['moduleid' => $this->postvalue('__moduleid')]);

					// Create the folder
					$ls_folder = $this->getdocumentroot() . '/application/'  . strtolower($lo_module->name) . '/controllers';
					$this->createfolder($ls_folder);

					// Create the file
					$ls_file = $ls_folder . '/' . ucfirst(strtolower($this->postvalue('__name'))) . 'Controller.php';
					$lo_blueprint = $this->blueprintmodel->getrow(['type' => 'CONTROLLER']); // Fill some starter content
					$this->createfile($ls_file, $lo_blueprint->content);

					// Redirect
					$this->redirect('/admin/controllers');
				}

				// Add needs a special view
				$this->setview('addpage');

				$this->buildresponse(['ls_actionurl' => '/admin/controller/add']);

			break;

			case 'edit':

				// Get the models
				$lo_page = $this->pagemodel->getrow(['type' => 'CONTROLLER', 'pageid' => $pi_id]);

				if (isset($_POST) && !empty($_POST)) {

					// Default values here
					$_POST['__type'] = 'CONTROLLER';

					$this->pagemodel->commitupdatefrompost('pageid', $pi_id);

					// Get the module
					$lo_module = $this->modulemodel->getrow(['moduleid' => $this->postvalue('__moduleid')]);

					// Create the folder if not exists
					$ls_folder = $this->getdocumentroot() . '/application/'  . strtolower($lo_module->name) . '/controllers';
					$this->createfolder($ls_folder);

					// Create the file if not exists
					$ls_file = $ls_folder .'/' . ucfirst(strtolower($lo_page->name)) . 'Controller.php';
					$lo_blueprint = $this->blueprintmodel->getrow(['type' => 'CONTROLLER']); // Fill some starter content
					$this->createfile($ls_file, $lo_blueprint->content);

					// Rename the file
					$ls_originalfile = $ls_folder . '/' . ucfirst(strtolower($lo_page->name)) . 'Controller.php';
					$ls_newfile = $ls_folder . '/' . ucfirst(strtolower($this->postvalue('__name'))) . 'Controller.php';


					$this->renamefile($ls_originalfile, $ls_newfile);

					// Redirect
					$this->redirect('/admin/controllers');
				}

				$this->setview('page');
				$this->buildresponse(['ls_actionurl' => '/admin/controller/edit/' . $pi_id]);
				$this->buildresponse(['lo_page' => $lo_page]);

			break;

			case 'delete':

				// Get the models
				$lo_page = $this->pagemodel->getrow(['type' => 'CONTROLLER', 'pageid' => $pi_id]);

				// Get the module
				$lo_module = $this->modulemodel->getrow(['moduleid' => $lo_page->moduleid]);

				// Delete the record
				$this->pagemodel->delete(['pageid' => $pi_id]);

				// Remove the file
				$ls_file = $this->getdocumentroot() . '/application/' . strtolower($lo_module->name) . '/controllers/' . ucfirst(strtolower($lo_page->name)) . 'Controller.php';

				unlink($ls_file);

				// Redirect
				$this->redirect('/admin/controllers');

			break;
		}

		$la_modules = $this->getallmodels();
		$this->buildresponse(['la_modules' => $la_modules]);

		$this->buildresponse(['ls_pagetitle' => 'Controller']);
	}

	public function modelsAction() {

		$this->setview('pages');

		// Get the models
		$la_pages = $this->pagemodel->getpages('MODEL');

		$this->buildresponse(['la_pages' => $la_pages]);
		$this->buildresponse(['ls_pagetitle' => 'Model']);
		$this->buildresponse(['ls_addurl' => '/admin/model/add']);
		$this->buildresponse(['ls_editurl' => '/admin/model/edit']);
		$this->buildresponse(['ls_deleteurl' => '/admin/model/delete']);

	}

	public function modelAction($ps_action, $pi_id = null) {

		switch($ps_action) {

			case 'add':

				if (isset($_POST) && !empty($_POST)) {

					// Default values here
					$_POST['__type'] = 'MODEL';
					$_POST['__created'] = date('Y-m-d H:i:s');

					$this->pagemodel->commitaddfrompost();

					// Get the module
					$lo_module = $this->modulemodel->getrow(['moduleid' => $this->postvalue('__moduleid')]);

					// Create the folder
					$ls_folder = $this->getdocumentroot() . '/application/'  . strtolower($lo_module->name) . '/models';
					$this->createfolder($ls_folder);

					// Create the file
					$ls_file = $ls_folder . '/' . ucfirst(strtolower($this->postvalue('__name'))) . 'Model.php';
					$lo_blueprint = $this->blueprintmodel->getrow(['type' => 'MODEL']); // Fill some starter content
					$this->createfile($ls_file, $lo_blueprint->content);


					// Redirect
					$this->redirect('/admin/models');
				}

				// Add needs a special view
				$this->setview('addpage');

				$this->buildresponse(['ls_actionurl' => '/admin/model/add']);

			break;

			case 'edit':

				// Get the model
				$lo_page = $this->pagemodel->getrow(['type' => 'MODEL', 'pageid' => $pi_id]);

				if (isset($_POST) && !empty($_POST)) {

					// Default values here
					$_POST['__type'] = 'MODEL';

					$this->pagemodel->commitupdatefrompost('pageid', $pi_id);

					// Get the module
					$lo_module = $this->modulemodel->getrow(['moduleid' => $this->postvalue('__moduleid')]);

					// Create the folder if not exists
					$ls_folder = $this->getdocumentroot() . '/application/'  . strtolower($lo_module->name) . '/models';
					$this->createfolder($ls_folder);

					// Create the file if not exists
					$ls_file = $ls_folder . '/' . strtolower($lo_page->name) . 'Model.php';
					$lo_blueprint = $this->blueprintmodel->getrow(['type' => 'MODEL']); // Fill some starter content
					$this->createfile($ls_file, $lo_blueprint->content);

					// Rename the file
					$ls_originalfile = $ls_folder . '/' . ucfirst(strtolower($lo_page->name)) . 'Model.php';
					$ls_newfile = $ls_folder . '/' . ucfirst(strtolower($this->postvalue('__name'))) . 'Model.php';
					$this->renamefile($ls_originalfile, $ls_newfile);

					// Redirect
					$this->redirect('/admin/models');
				}

				$this->setview('page');
				$this->buildresponse(['ls_actionurl' => '/admin/model/edit/' . $pi_id]);
				$this->buildresponse(['lo_page' => $lo_page]);

			break;

			case 'delete':

				// Get the models
				$lo_page = $this->pagemodel->getrow(['type' => 'MODEL', 'pageid' => $pi_id]);

				// Get the module
				$lo_module = $this->modulemodel->getrow(['moduleid' => $lo_page->moduleid]);

				// Delete the record
				$this->pagemodel->delete(['pageid' => $pi_id]);

				// Remove the file
				$ls_file = $this->getdocumentroot() . '/application/' . strtolower($lo_module->name) . '/models/' . ucfirst(strtolower($lo_page->name)) . 'Model.php';

				unlink($ls_file);

				// Redirect
				$this->redirect('/admin/models');

			break;
		}

		$la_modules = $this->getallmodels();
		$this->buildresponse(['la_modules' => $la_modules]);

		$this->buildresponse(['ls_pagetitle' => 'Model']);
	}

	public function viewsAction() {

		// Get the controllers
		$la_pages = $this->pagemodel->getviews();

		$this->buildresponse(['la_pages' => $la_pages]);
		$this->buildresponse(['ls_pagetitle' => 'Views']);
		$this->buildresponse(['ls_addurl' => '/admin/view/add']);
		$this->buildresponse(['ls_editurl' => '/admin/view/edit']);
		$this->buildresponse(['ls_deleteurl' => '/admin/model/delete']);

	}

	public function viewAction($ps_action, $pi_id = null) {

		switch($ps_action) {

			case 'add':

				if (isset($_POST) && !empty($_POST)) {

					// Default values here
					$_POST['__type'] = 'VIEW';
					$_POST['__created'] = date('Y-m-d H:i:s');

					$this->pagemodel->commitaddfrompost();

					// Get the controller & module
					$lo_controller = $this->pagemodel->getrow(['type' => 'CONTROLLER', 'pageid' => $this->postvalue('__controllerid')]);
					$lo_module = $this->modulemodel->getrow(['moduleid' => $this->postvalue('__moduleid')]);

					// Create the folder
					$ls_folder = $this->getdocumentroot() . '/application/'  . strtolower($lo_module->name) . '/views/' . strtolower($lo_controller->name);
					$this->createfolder($ls_folder);

					// Create the file
					$ls_file = $ls_folder . '/' . strtolower($this->postvalue('__name')) . '.php';
					$lo_blueprint = $this->blueprintmodel->getrow(['type' => 'VIEW']); // Fill some starter content
					$this->createfile($ls_file, $lo_blueprint->content);

					// Redirect
					$this->redirect('/admin/views');
				}

				// Add needs a special view
				$this->setview('addview');

				$this->buildresponse(['ls_actionurl' => '/admin/view/add']);

			break;

			case 'edit':

				// Get the view
				$lo_page = $this->pagemodel->getrow(['type' => 'VIEW', 'pageid' => $pi_id]);

				if (isset($_POST) && !empty($_POST)) {

					// Default values here
					$_POST['__type'] = 'VIEW';

					$this->pagemodel->commitupdatefrompost('pageid', $pi_id);

					// Get the controller
					$lo_controller = $this->pagemodel->getrow(['type' => 'CONTROLLER', 'pageid' => $this->postvalue('__controllerid')]);
					$lo_module = $this->modulemodel->getrow(['moduleid' => $this->postvalue('__moduleid')]);

					// Create the folder if not exists
					$ls_folder = $this->getdocumentroot() . '/application/'  . strtolower($lo_module->name) . '/views/' . strtolower($lo_controller->name);
					$this->createfolder($ls_folder);

					// Create the file if not exists
					$ls_file = $ls_folder . '/' . strtolower($lo_page->name) . '.php';
					$lo_blueprint = $this->blueprintmodel->getrow(['type' => 'VIEW']); // Fill some starter content
					$this->createfile($ls_file, $lo_blueprint->content);

					// Rename the folder
					$ls_originalfile = $ls_folder . '/' . strtolower($lo_page->name) . '.php';
					$ls_newfile = $ls_folder . '/' . strtolower($this->postvalue('__name')) . '.php';
					$this->renamefile($ls_originalfile, $ls_newfile);

					// Redirect
					$this->redirect('/admin/views');
				}

				$this->buildresponse(['ls_actionurl' => '/admin/view/edit/' . $pi_id]);
				$this->buildresponse(['lo_page' => $lo_page]);

			break;

			case 'delete':

				// Get the models
				$lo_page = $this->pagemodel->getrow(['type' => 'VIEW', 'pageid' => $pi_id]);

				// Get the module
				$lo_module = $this->modulemodel->getrow(['moduleid' => $lo_page->moduleid]);

				// Delete the record
				$this->pagemodel->delete(['pageid' => $pi_id]);

				// Remove the file
				$ls_file = $this->getdocumentroot() . '/application/' . strtolower($lo_module->name) . '/views/' . ucfirst(strtolower($lo_page->name)) . '.php';

				unlink($ls_file);

				// Redirect
				$this->redirect('/admin/views');

			break;


		}

		$la_controllers = $this->getallcontrollers();
		$this->buildresponse(['la_controllers' => $la_controllers]);

		$la_modules = $this->getallmodels();
		$this->buildresponse(['la_modules' => $la_modules]);

		$la_templates = $this->getalltemplates();
		$this->buildresponse(['la_templates' => $la_templates]);

		$this->buildresponse(['ls_pagetitle' => 'View']);
	}

	public function templatesAction() {

		// Get the controllers
		$la_pages = $this->pagemodel->getviews('TEMPLATE');

		$this->setview('pages');

		$this->buildresponse(['la_pages' => $la_pages]);
		$this->buildresponse(['ls_pagetitle' => 'Templates']);
		$this->buildresponse(['ls_addurl' => '/admin/template/add']);
		$this->buildresponse(['ls_editurl' => '/admin/template/edit']);
		$this->buildresponse(['ls_deleteurl' => '/admin/template/delete']);

	}

	public function templateAction($ps_action, $pi_id = null) {

		switch($ps_action) {

			case 'add':

				if (isset($_POST) && !empty($_POST)) {

					// Default values here
					$_POST['__type'] = 'TEMPLATE';
					$_POST['__created'] = date('Y-m-d H:i:s');

					$this->pagemodel->commitaddfrompost();

					// Get the controller
					$lo_module = $this->modulemodel->getrow(['moduleid' => $this->postvalue('__moduleid')]);

					// Create the folder
					$ls_folder = $this->getdocumentroot() . '/application/'  . strtolower($lo_module->name) . '/views/templates';
					$this->createfolder($ls_folder);

					// Create the file
					$ls_file = $ls_folder . '/' . strtolower($this->postvalue('__name')) . '.php';
					$lo_blueprint = $this->blueprintmodel->getrow(['type' => 'TEMPLATE']); // Fill some starter content
					$this->createfile($ls_file, $lo_blueprint->content);

					// Redirect
					$this->redirect('/admin/templates');
				}

				// Add needs a special view
				$this->setview('addpage');

				$this->buildresponse(['ls_actionurl' => '/admin/template/add']);

			break;

			case 'edit':

				// Get the view
				$lo_page = $this->pagemodel->getrow(['type' => 'TEMPLATE', 'pageid' => $pi_id]);

				if (isset($_POST) && !empty($_POST)) {

					// Default values here
					$_POST['__type'] = 'TEMPLATE';

					$this->pagemodel->commitupdatefrompost('pageid', $pi_id);

					// Get the controller
					$lo_module = $this->pagemodel->getrow(['moduleid' => $this->postvalue('__moduleid')]);

					// Create the folder if not exists
					$ls_folder = $this->getdocumentroot() . '/application/'  . strtolower($lo_module->name) . '/views/templates';
					$this->createfolder($ls_folder);

					// Create the file if not exists
					$ls_file = $ls_folder . '/' . strtolower($lo_page->name) . '.php';
					$lo_blueprint = $this->blueprintmodel->getrow(['type' => 'TEMPLATE']); // Fill some starter content
					$this->createfile($ls_file, $lo_blueprint->content);

					// Rename the file
					$ls_originalfile = $ls_folder . '/' . strtolower($lo_page->name) . '.php';
					$ls_newfile = $ls_folder . '/' . strtolower($this->postvalue('__name')) . '.php';
					$this->renamefile($ls_originalfile, $ls_newfile);

					// Redirect
					$this->redirect('/admin/templates');
				}

				$this->setview('page');

				$this->buildresponse(['ls_actionurl' => '/admin/template/edit/' . $pi_id]);
				$this->buildresponse(['lo_page' => $lo_page]);

			break;

			case 'delete':

				// Get the models
				$lo_page = $this->pagemodel->getrow(['type' => 'TEMPLATE', 'pageid' => $pi_id]);

				// Get the module
				$lo_module = $this->modulemodel->getrow(['moduleid' => $lo_page->moduleid]);

				// Delete the record
				$this->pagemodel->delete(['pageid' => $pi_id]);

				// Remove the file
				$ls_file = $this->getdocumentroot() . '/application/' . strtolower($lo_module->name) . '/views/templates/' . ucfirst(strtolower($lo_page->name)) . '.php';

				unlink($ls_file);

				// Redirect
				$this->redirect('/admin/templates');

			break;
		}

		$la_controllers = $this->getallcontrollers();
		$this->buildresponse(['la_controllers' => $la_controllers]);

		$la_modules = $this->getallmodels();
		$this->buildresponse(['la_modules' => $la_modules]);

		$this->buildresponse(['ls_pagetitle' => 'View']);
	}

	public function partialsAction() {

		// Get the controllers
		$la_pages = $this->pagemodel->getviews('PARTIAL');

		$this->setview('pages');

		$this->buildresponse(['la_pages' => $la_pages]);
		$this->buildresponse(['ls_pagetitle' => 'Partials']);
		$this->buildresponse(['ls_addurl' => '/admin/partial/add']);
		$this->buildresponse(['ls_editurl' => '/admin/partial/edit']);
		$this->buildresponse(['ls_deleteurl' => '/admin/partial/delete']);

	}

	public function partialAction($ps_action, $pi_id = null) {

		switch($ps_action) {

			case 'add':

				if (isset($_POST) && !empty($_POST)) {

					// Default values here
					$_POST['__type'] = 'PARTIAL';
					$_POST['__created'] = date('Y-m-d H:i:s');

					$this->pagemodel->commitaddfrompost();

					// Get the controller
					$lo_module = $this->modulemodel->getrow(['moduleid' => $this->postvalue('__moduleid')]);

					// Create the folder if not exists
					$ls_folder = $this->getdocumentroot() . '/application/'  . strtolower($lo_module->name) . '/views/partials';
					$this->createfolder($ls_folder);

					// Create the file
					$ls_file = $ls_folder . '/' . strtolower($this->postvalue('__name')) . '.php';
					$this->createfile($ls_file);

					// Redirect
					$this->redirect('/admin/partials');
				}

				// Add needs a special view
				$this->setview('addpage');

				$this->buildresponse(['ls_actionurl' => '/admin/partial/add']);

			break;

			case 'edit':

				// Get the view
				$lo_page = $this->pagemodel->getrow(['type' => 'PARTIAL', 'pageid' => $pi_id]);

				if (isset($_POST) && !empty($_POST)) {

					// Default values here
					$_POST['__type'] = 'PARTIAL';

					$this->pagemodel->commitupdatefrompost('pageid', $pi_id);

					// Get the controller
					$lo_module = $this->pagemodel->getrow(['moduleid' => $this->postvalue('__moduleid')]);

					// Create the folder if not exists
					$ls_folder = $this->getdocumentroot() . '/application/'  . strtolower($lo_module->name) . '/views/partials';
					$this->createfolder($ls_folder);

					// Create the file if not exists
					$ls_file = $ls_folder . '/' . strtolower($lo_page->name) . '.php';
					$this->createfile($ls_file);

					// Create the file
					$ls_originalfile = $ls_folder . '/'. strtolower($lo_page->name) . '.php';
					$ls_newfile = $ls_folder . '/'. strtolower($this->postvalue('__name')) . '.php';

					$this->renamefile($ls_originalfile, $ls_newfile);

					// Redirect
					$this->redirect('/admin/partials');
				}

				$this->setview('page');

				$this->buildresponse(['ls_actionurl' => '/admin/partial/edit/' . $pi_id]);
				$this->buildresponse(['lo_page' => $lo_page]);

			break;

			case 'delete':

				// Get the models
				$lo_page = $this->pagemodel->getrow(['type' => 'PARTIAL', 'pageid' => $pi_id]);

				// Get the module
				$lo_module = $this->modulemodel->getrow(['moduleid' => $lo_page->moduleid]);

				// Delete the record
				$this->pagemodel->delete(['pageid' => $pi_id]);

				// Remove the file
				$ls_file = $this->getdocumentroot() . '/application/' . strtolower($lo_module->name) . '/views/partials/' . ucfirst(strtolower($lo_page->name)) . '.php';

				unlink($ls_file);

				// Redirect
				$this->redirect('/admin/partials');

			break;
		}

		$la_controllers = $this->getallcontrollers();
		$this->buildresponse(['la_controllers' => $la_controllers]);

		$la_modules = $this->getallmodels();
		$this->buildresponse(['la_modules' => $la_modules]);

		$this->buildresponse(['ls_pagetitle' => 'Partial']);
	}

	public function helpersAction() {

		// Get the controllers
		$la_pages = $this->pagemodel->getviews('HELPER');

		$this->buildresponse(['la_pages' => $la_pages]);
		$this->buildresponse(['ls_pagetitle' => 'Helpers']);
		$this->buildresponse(['ls_addurl' => '/admin/helper/add']);
		$this->buildresponse(['ls_editurl' => '/admin/helper/edit']);
		$this->buildresponse(['ls_deleteurl' => '/admin/helper/delete']);

	}

	public function helperAction($ps_action, $pi_id = null) {

		switch($ps_action) {

			case 'add':

				if (isset($_POST) && !empty($_POST)) {

					// Default values here
					$_POST['__type'] = 'HELPER';
					$_POST['__created'] = date('Y-m-d H:i:s');

					$this->pagemodel->commitaddfrompost();

					// Create the folder if not exists
					$ls_folder = $this->getdocumentroot() . '/application/helpers';
					$this->createfolder($ls_folder);

					// Create the file
					$ls_file = $ls_folder . '/' . ucfirst(strtolower($this->postvalue('__name'))) . '.php';
					$lo_blueprint = $this->blueprintmodel->getrow(['type' => 'HELPER']); // Fill some starter content
					$this->createfile($ls_file, $lo_blueprint->content);

					// Redirect
					$this->redirect('/admin/helpers');
				}

				$this->setview('addhelper');

				$this->buildresponse(['ls_actionurl' => '/admin/helper/add']);

			break;

			case 'edit':

				// Get the view
				$lo_page = $this->pagemodel->getrow(['type' => 'HELPER', 'pageid' => $pi_id]);

				if (isset($_POST) && !empty($_POST)) {

					// Default values here
					$_POST['__type'] = 'HELPER';

					$this->pagemodel->commitupdatefrompost('pageid', $pi_id);

					// Create the folder if not exists
					$ls_folder = $this->getdocumentroot() . '/application/helpers';
					$this->createfolder($ls_folder);

					// Create the file if not exists
					$ls_file = $ls_folder . '/' . ucfirst(strtolower($lo_page->name)) . '.php';
					$lo_blueprint = $this->blueprintmodel->getrow(['type' => 'HELPER']); // Fill some starter content
					$this->createfile($ls_file, $lo_blueprint->content);

					// Create the file
					$ls_originalfile = $ls_folder . '/' . ucfirst(strtolower($lo_page->name)) . '.php';
					$ls_newfile = $ls_folder . '/' . ucfirst(strtolower($this->postvalue('__name'))) . '.php';

					$this->renamefile($ls_originalfile, $ls_newfile);

					// Redirect
					$this->redirect('/admin/helpers');
				}

				$this->buildresponse(['ls_actionurl' => '/admin/helper/edit/' . $pi_id]);
				$this->buildresponse(['lo_page' => $lo_page]);

			break;

			case 'delete':

				// Get the models
				$lo_page = $this->pagemodel->getrow(['type' => 'HELPER', 'pageid' => $pi_id]);

				// Get the module
				$lo_module = $this->modulemodel->getrow(['moduleid' => $lo_page->moduleid]);

				// Delete the record
				$this->pagemodel->delete(['pageid' => $pi_id]);

				// Remove the file
				$ls_file = $this->getdocumentroot() . '/application/helpers/' . ucfirst(strtolower($lo_page->name)) . '.php';

				unlink($ls_file);

				// Redirect
				$this->redirect('/admin/partials');

			break;
		}

		$la_controllers = $this->getallcontrollers();
		$this->buildresponse(['la_controllers' => $la_controllers]);
		$this->buildresponse(['ls_pagetitle' => 'Helper']);

	}


	public function extensionsAction() {

		// Get the controllers
		$la_pages = $this->pagemodel->getviews('VIEWEXTENSION');

		$this->buildresponse(['la_pages' => $la_pages]);
		$this->buildresponse(['ls_pagetitle' => 'View Extensions']);
		$this->buildresponse(['ls_addurl' => '/admin/extension/add']);
		$this->buildresponse(['ls_editurl' => '/admin/extension/edit']);
		$this->buildresponse(['ls_deleteurl' => '/admin/extension/delete']);

	}

	public function extensionAction($ps_action, $pi_id = null) {

		switch($ps_action) {

			case 'add':

				if (isset($_POST) && !empty($_POST)) {

					// Default values here
					$_POST['__type'] = 'VIEWEXTENSION';
					$_POST['__created'] = date('Y-m-d H:i:s');

					$this->pagemodel->commitaddfrompost();

					// Create the folder if not exists
					$ls_folder = $this->getdocumentroot() . '/application/extensions';
					$this->createfolder($ls_folder);

					// Create the file
					$ls_file = $ls_folder . '/' . ucfirst(strtolower($this->postvalue('__name'))) . '.php';
					$lo_blueprint = $this->blueprintmodel->getrow(['type' => 'VIEWEXTENSION']); // Fill some starter content
					$this->createfile($ls_file, $lo_blueprint->content);

					// Redirect
					$this->redirect('/admin/extensions');
				}

				$this->setview('addextension');
				$this->buildresponse(['ls_actionurl' => '/admin/extension/add']);

			break;

			case 'edit':

				// Get the view
				$lo_page = $this->pagemodel->getrow(['type' => 'VIEWEXTENSION', 'pageid' => $pi_id]);

				if (isset($_POST) && !empty($_POST)) {

					// Default values here
					$_POST['__type'] = 'VIEWEXTENSION';

					$this->pagemodel->commitupdatefrompost('pageid', $pi_id);

					// Create the folder if not exists
					$ls_folder = $this->getdocumentroot() . '/application/extenstions';
					$this->createfolder($ls_folder);

					// Create the file if not exists
					$ls_file = $ls_folder . '/' . ucfirst(strtolower($lo_page->name)) . '.php';
					$lo_blueprint = $this->blueprintmodel->getrow(['type' => 'VIEWEXTENSION']); // Fill some starter content
					$this->createfile($ls_file, $lo_blueprint->content);

					// Create the file
					$ls_originalfile = $ls_folder . '/'. ucfirst(strtolower($lo_page->name)) . '.php';
					$ls_newfile = $ls_folder . '/' . ucfirst(strtolower($this->postvalue('__name'))) . '.php';

					$this->renamefile($ls_originalfile, $ls_newfile);

					// Redirect
					$this->redirect('/admin/extensions');
				}

				$this->buildresponse(['ls_actionurl' => '/admin/extension/edit/' . $pi_id]);
				$this->buildresponse(['lo_page' => $lo_page]);

			break;

			case 'delete':

				// Get the models
				$lo_page = $this->pagemodel->getrow(['type' => 'VIEWEXTENSION', 'pageid' => $pi_id]);

				// Get the module
				$lo_module = $this->modulemodel->getrow(['moduleid' => $lo_page->moduleid]);

				// Delete the record
				$this->pagemodel->delete(['pageid' => $pi_id]);

				// Remove the file
				$ls_file = $this->getdocumentroot() . '/application/extensions/' . ucfirst(strtolower($lo_page->name)) . '.php';

				unlink($ls_file);

				// Redirect
				$this->redirect('/admin/extensions');

			break;
		}

		$la_controllers = $this->getallcontrollers();
		$this->buildresponse(['la_controllers' => $la_controllers]);
		$this->buildresponse(['ls_pagetitle' => 'View Extensions']);
	}


	public function routesAction() {

		// Get the controllers
		$la_routes = $this->routemodel->getrows();

		$this->buildresponse(['la_routes' => $la_routes]);

	}

	public function routeAction($ps_action, $pi_id = null) {


		$la_controllers = $this->getallcontrollers();
		$this->buildresponse(['la_controllers' => $la_controllers]);

		$la_modules = $this->getallmodels();
		$this->buildresponse(['la_modules' => $la_modules]);

		switch($ps_action) {

			case 'add':

				if(isset($_POST) && !empty($_POST)){

					// Default values here
					$_POST['__created'] = date('Y-m-d H:i:s');

					$this->routemodel->commitaddfrompost();

					// Redirect
					$this->redirect('/admin/routes');
				}

				$this->setview('addroute');

			break;

			case 'edit':

				if(isset($_POST) && !empty($_POST)){

					$this->routemodel->commitupdatefrompost('routeid', $pi_id);

					// Redirect
					$this->redirect('/admin/routes');
				}

				// Get the controllers
				$lo_route = $this->routemodel->getrow(['routeid' => $pi_id]);

				$this->buildresponse(['po_route' => $lo_route]);

			break;
		}
	}

	public function modulesAction() {

		// Get the controllers
		$la_modules = $this->modulemodel->getrows();

		$this->buildresponse(['la_modules' => $la_modules]);
	}

	public function moduleAction($ps_action, $pi_id = null) {

		switch($ps_action) {

			case 'add':

				if (isset($_POST) && !empty($_POST)) {

					$this->modulemodel->commitaddfrompost();

					// Create the module folder
					$ls_folder = $this->getdocumentroot() . '/application/' . strtolower($this->postvalue('__name'));
					$this->createfolder($ls_folder);

					// Create the controller folder
					$ls_folder = $this->getdocumentroot() . '/application/' . strtolower($this->postvalue('__name')) . '/controllers';
					$this->createfolder($ls_folder);

					// Create the model folder
					$ls_folder = $this->getdocumentroot() . '/application/' . strtolower($this->postvalue('__name')) . '/models';
					$this->createfolder($ls_folder);

					// Create the view folder
					$ls_folder = $this->getdocumentroot() . '/application/' . strtolower($this->postvalue('__name')) . '/views';
					$this->createfolder($ls_folder);

					// Create the template folder
					$ls_folder = $this->getdocumentroot() . '/application/' . strtolower($this->postvalue('__name')) . '/views/templates';
					$this->createfolder($ls_folder);

					// Create the partials folder
					$ls_folder = $this->getdocumentroot() . '/application/' . strtolower($this->postvalue('__name')) . '/views/partials';
					$this->createfolder($ls_folder);


					// Redirect
					$this->redirect('/admin/modules');
				}

				// Add needs a special view
				$this->setview('addmodule');

			break;

			case 'edit':

				// Get the module
				$lo_module = $this->modulemodel->getrow(['moduleid' => $pi_id]);

				if (isset($_POST) && !empty($_POST)) {

					$this->modulemodel->commitupdatefrompost('moduleid', $pi_id);

					// Create the file
					$ls_originalfolder = $this->getdocumentroot() . '/application/' . strtolower($lo_module->name);
					$ls_newfolder = $this->getdocumentroot() . '/application/' . strtolower($this->postvalue('__name'));
					$this->renamefolder($ls_originalfolder, $ls_newfolder);

					// Create the controller folder
					$ls_originalfolder = $this->getdocumentroot() . '/application/' . strtolower($lo_module->name) . '/controllers';
					$ls_newfolder = $this->getdocumentroot() . '/application/' . strtolower($this->postvalue('__name')) . '/controllers';
					$this->renamefolder($ls_originalfolder, $ls_newfolder);

					// Create the model folder
					$ls_originalfolder = $this->getdocumentroot() . '/application/' . strtolower($lo_module->name) . '/models';
					$ls_newfolder = $this->getdocumentroot() . '/application/' . strtolower($this->postvalue('__name')) . '/models';
					$this->renamefolder($ls_originalfolder, $ls_newfolder);

					// Create the view folder
					$ls_originalfolder = $this->getdocumentroot() . '/application/' . strtolower($lo_module->name) . '/views';
					$ls_newfolder = $this->getdocumentroot() . '/application/' . strtolower($this->postvalue('__name')) . '/views';
					$this->renamefolder($ls_originalfolder, $ls_newfolder);

					// Create the template folder
					$ls_originalfolder = $this->getdocumentroot() . '/application/' . strtolower($lo_module->name) . '/views/templates';
					$ls_newfolder = $this->getdocumentroot() . '/application/' . strtolower($this->postvalue('__name')) . '/views/templates';
					$this->renamefolder($ls_originalfolder, $ls_newfolder);

					// Create the template folder
					$ls_originalfolder = $this->getdocumentroot() . '/application/' . strtolower($lo_module->name) . '/views/partials';
					$ls_newfolder = $this->getdocumentroot() . '/application/' . strtolower($this->postvalue('__name')) . '/views/partials';
					$this->renamefolder($ls_originalfolder, $ls_newfolder);

					// Redirect
					$this->redirect('/admin/modules');
				}

				$this->setview('module');

				$this->buildresponse(['lo_module' => $lo_module]);

			break;

			case 'delete':

				// Get the module
				$lo_module = $this->modulemodel->getrow(['moduleid' => $pi_id]);

				// Delete the record
				$this->modulemodel->delete(['moduleid' => $pi_id]);

				if(!is_object($lo_module))
					$this->redirect('/admin/modules');

				// Remove the file
				if(!$lo_module->core) {
					$ls_folder = $this->getdocumentroot() . '/application/' . strtolower($lo_module->name);
					$this->deletefolder($ls_folder);
				}

				// Remove orphaned records
				$this->pagemodel->delete(['moduleid' => $pi_id]);
				$this->routemodel->delete(['moduleid' => $pi_id]);

				// Redirect
				$this->redirect('/admin/modules');

			break;
		}

		$la_controllers = $this->getallcontrollers();
		$this->buildresponse(['la_controllers' => $la_controllers]);

		$la_modules = $this->getallmodels();
		$this->buildresponse(['la_modules' => $la_modules]);

		$this->buildresponse(['ls_pagetitle' => 'View']);
	}


	public function configvarsAction() {


		// Get the config vars
		$la_configvars = $this->configuration->getconfigs();

		$this->buildresponse(['la_configvars' => $la_configvars]);

	}


	public function configvarAction($ps_action, $pi_id = null) {

		switch($ps_action) {

			case 'add':

				if (isset($_POST) && !empty($_POST)) {

					$this->configuration->addconfig($this->postvalue('__key'), $this->postvalue('__value'));

					// Redirect
					$this->redirect('/admin/configvars');
				}

				// Add needs a special view
				$this->setview('addconfigvar');

			break;

			case 'edit':

				// Get the config
				$la_configvar = $this->configuration->getconfig($pi_id);

				if (isset($_POST) && !empty($_POST)) {

					// Build data
					$la_data = [];
					$la_data['key'] = $this->postvalue('__key', '');
					$la_data['value'] = $this->postvalue('__value', '');

					$this->configuration->updateconfig($pi_id, $la_data);

					// Redirect
					$this->redirect('/admin/configvars');
				}

				$this->setview('configvar');

				$this->buildresponse(['la_configvar' => $la_configvar]);

			break;

			case 'delete':

				// Delete the record
				$this->configuration->deleteconfig($pi_id);

				// Redirect
				$this->redirect('/admin/configvars');

			break;
		}

		$this->buildresponse(['ls_pagetitle' => 'Config Variable']);
	}


	private function getallmodels() {

		$la_rawmodules = $this->modulemodel->getrows();
		$la_modules = [];

		foreach($la_rawmodules as $lo_item) {

			$lo_row = new \stdClass;
			$lo_row->id = $lo_item->moduleid;
			$lo_row->label = $lo_item->name;

			$la_modules[] = $lo_row;
		}

		return $la_modules;
	}

	private function getallcontrollers() {

		// Get all pages
		$la_pages = $this->pagemodel->getrows();
		$la_controllers = [];

		foreach($la_pages as $lo_page) {

			$lo_row = new \stdClass;
			$lo_row->id = $lo_page->pageid;
			$lo_row->label = $lo_page->label;

			if($lo_page->type == 'CONTROLLER')
				$la_controllers[] = $lo_row;
		}

		return $la_controllers;
	}

	private function getalltemplates() {

		// Get all pages
		$la_pages = $this->pagemodel->getrows();
		$la_templates = [];

		foreach($la_pages as $lo_page) {

			$lo_row = new \stdClass;
			$lo_row->id = $lo_page->pageid;
			$lo_row->label = $lo_page->label;

			if($lo_page->type == 'TEMPLATE')
				$la_templates[] = $lo_row;
		}

		return $la_templates;
	}


}