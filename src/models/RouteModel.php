<?
namespace Mercury\Model;

class RouteModel extends BaseModel {

	private $routes;
	private $adminroutes;

	protected function initmodel() {

		// Set this because the table name is not in standard format
		$this->settable('m_route');

	}

	public function getroutes($po_search) {

		if(empty($po_search))
			return false;

		// Initialise the query variables
		$la_where = array();
		$la_binds = array();

		// Start constructing the query
		if(isset($po_search->core) && !empty($po_search->core)){
			$la_where[] = ' AND r.`core` = :core';
			$la_binds['core'] = $po_search->core;
		}

		$la_routes = $this->db->getallobjects("SELECT r.*, p.`name` as `controller`, m.`name` as `module`
													FROM `m_route` r
													LEFT JOIN `m_module` m ON m.`moduleid` = r.`moduleid`
													LEFT JOIN `m_page` p ON p.`pageid` = r.`controllerid`
													WHERE TRUE " . implode(PHP_EOL, $la_where) . "
													ORDER BY NULL", $la_binds);

		foreach($la_routes as $lo_route)
			$this->routes[$lo_route->routeid] = $lo_route;

		return $this->routes;
	}

	public function getroute($pi_routeid) {

		// Check if we already got this route
		if(!isset($this->routes[$pi_routeid]))
			trigger_error("Cannot find route by calling getroute($pi_routeid)");

		return $this->routes[$pi_routeid];
	}

	public function getadminroutes() {

		$la_routes[] = ['routeid' => 1,
						'requesturi' => '/admin',
						'controller' => 'Pages',
						'action' => 'index',
						'method' => 'GET|POST'];

		$la_routes[] = ['routeid' => 2,
						'requesturi' => '/admin/controllers',
						'controller' => 'Pages',
						'action' => 'controllers',
						'method' => 'GET'];

		$la_routes[] = ['routeid' => 3,
						'requesturi' => '/admin/controller/[a:a]?/[i:id]?',
						'controller' => 'Pages',
						'action' => 'controller',
						'method' => 'GET|POST'];

		$la_routes[] = ['routeid' => 4,
						'requesturi' => '/admin/routes',
						'controller' => 'Pages',
						'action' => 'routes',
						'method' => 'GET'];

		$la_routes[] = ['routeid' => 5,
						'requesturi' => '/admin/route/[a:a]?/[i:id]?',
						'controller' => 'Pages',
						'action' => 'route',
						'method' => 'GET|POST'];

		$la_routes[] = ['routeid' => 6,
						'requesturi' => '/admin/models',
						'controller' => 'Pages',
						'action' => 'models',
						'method' => 'GET'];

		$la_routes[] = ['routeid' => 7,
						'requesturi' => '/admin/gitsearch',
						'controller' => 'Github',
						'action' => 'search',
						'method' => 'GET|POST'];

		$la_routes[] = ['routeid' => 8,
						'requesturi' => '/admin/gitcommit',
						'controller' => 'Github',
						'action' => 'commit',
						'method' => 'GET|POST'];

		$la_routes[] = ['routeid' => 9,
						'requesturi' => '/admin/model/[a:a]?/[i:id]?',
						'controller' => 'Pages',
						'action' => 'model',
						'method' => 'GET|POST'];

		$la_routes[] = ['routeid' => 10,
						'requesturi' => '/admin/views',
						'controller' => 'Pages',
						'action' => 'views',
						'method' => 'GET'];

		$la_routes[] = ['routeid' => 11,
						'requesturi' => '/admin/view/[a:a]?/[i:id]?',
						'controller' => 'Pages',
						'action' => 'view',
						'method' => 'GET|POST'];

		$la_routes[] = ['routeid' => 12,
						'requesturi' => '/admin/templates',
						'controller' => 'Pages',
						'action' => 'templates',
						'method' => 'GET'];

		$la_routes[] = ['routeid' => 13,
						'requesturi' => '/admin/template/[a:a]?/[i:id]?',
						'controller' => 'Pages',
						'action' => 'template',
						'method' => 'GET|POST'];

		$la_routes[] = ['routeid' => 14,
						'requesturi' => '/admin/modules',
						'controller' => 'Pages',
						'action' => 'modules',
						'method' => 'GET'];

		$la_routes[] = ['routeid' => 15,
						'requesturi' => '/admin/module/[a:a]?/[i:id]?',
						'controller' => 'Pages',
						'action' => 'module',
						'method' => 'GET|POST'];

		// Make it an object
		foreach($la_routes as $la_route)
			$this->adminroutes[$la_route['routeid']] = json_decode(json_encode($la_route));

		return $this->adminroutes;
	}


	public function getadminroute($pi_routeid) {

		// Check if we already got this route
		if(!isset($this->adminroutes[$pi_routeid]))
			trigger_error("Cannot find route by calling getadminroute($pi_routeid)");

		return $this->adminroutes[$pi_routeid];
	}

}