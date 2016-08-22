<?
namespace Mercury\Model;

class ConfigModel extends BaseModel {


	protected function initmodel() {

		// Set this because the table name is not in standard format
		$this->settable('m_config');

	}

	public function getconfigs($pa_condition = []) {

		// Get the result first
		$la_rows = $this->getrows($pa_condition);

		// Make the key as key field
		$la_config = [];

		foreach($la_rows as $lo_row)
			$la_config[$lo_row->key] = $lo_row->value;

		return $la_config;
	}

}