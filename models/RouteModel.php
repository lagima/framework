<?
namespace Mercury\Model;

class RouteModel extends BaseModel {

	private $routes;

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
		if(isset($this->routes[$pi_routeid]))
			return $this->routes[$pi_routeid];


		// If cant find query it :(
		$lo_route = $this->db->getsingleobject("SELECT r.*, p.`name` as `controller`, m.`name` as `module`
													FROM `m_route` r
													LEFT JOIN `m_module` m ON m.`moduleid` = r.`moduleid`
													LEFT JOIN `m_page` p ON p.`pageid` = r.`pageid`
													WHERE r.`routeid` = '$pi_routeid'");

		return $lo_route;
	}

}