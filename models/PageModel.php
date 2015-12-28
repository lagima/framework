<?
namespace Mercury\Model;

class PageModel extends BaseModel {


	protected function initmodel() {

		// Set this because the table name is not in standard format
		$this->settable('m_page');

	}

	public function getviews() {

		$la_views = $this->db->getallobjects("SELECT p.*, c.`label` as `controller`, m.`name` as `module`
											FROM `m_page` p
											LEFT JOIN `m_page` c ON c.`pageid` = p.`controllerid`
											LEFT JOIN `m_module` m ON m.`moduleid` = p.`moduleid`
											WHERE p.`type` = :type", ['type' => 'VIEW']);

		return $la_views;
	}

	public function getpages($ps_type) {

		$la_pages = $this->db->getallobjects("SELECT p.*, m.`name` as `module`
											FROM `m_page` p
											LEFT JOIN `m_module` m ON m.`moduleid` = p.`moduleid`
											WHERE p.`type` = :type", ['type' => $ps_type]);

		return $la_pages;
	}

}