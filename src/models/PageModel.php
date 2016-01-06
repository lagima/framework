<?
namespace Mercury\Model;

class PageModel extends BaseModel {


	protected function initmodel() {

		// Set this because the table name is not in standard format
		$this->settable('m_page');

	}

	public function getviews($ps_type = 'VIEW') {

		$la_views = $this->db->getallobjects("SELECT p.*, c.`label` as `template`, m.`name` as `module`
											FROM `m_page` p
											LEFT JOIN `m_page` c ON c.`pageid` = p.`templateid`
											LEFT JOIN `m_module` m ON m.`moduleid` = p.`moduleid`
											WHERE p.`type` = :type", ['type' => $ps_type]);

		return $la_views;
	}

	public function getviewdetails($po_search) {

		if(empty($po_search))
			return false;

		// Initialise the query variables
		$la_where = array();
		$la_binds = array();

		// Start constructing the query
		if(isset($po_search->name) && !empty($po_search->name)){
			$la_where[] = ' AND p.`name` = :name';
			$la_binds['name'] = $po_search->name;
		}

		if(isset($po_search->moduleid) && !empty($po_search->moduleid)){
			$la_where[] = ' AND p.`moduleid` = :moduleid';
			$la_binds['moduleid'] = $po_search->moduleid;
		}


		// Default condition
		$la_where[] = ' AND p.`type` = :type';
		$la_binds['type'] = 'VIEW';

		$lo_view = $this->db->getsingleobject("SELECT p.*, t.`name` as `template`
												FROM `m_page` p
												LEFT JOIN `m_page` t ON t.`pageid` = p.`templateid`
												WHERE TRUE " . implode(PHP_EOL, $la_where) . "
												ORDER BY NULL", $la_binds);

		return $lo_view;
	}

	public function getpages($ps_type) {

		$la_pages = $this->db->getallobjects("SELECT p.*, m.`name` as `module`
											FROM `m_page` p
											LEFT JOIN `m_module` m ON m.`moduleid` = p.`moduleid`
											WHERE p.`type` = :type", ['type' => $ps_type]);

		return $la_pages;
	}

}