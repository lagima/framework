<?
namespace Mercury\Model;

class BlueprintModel extends BaseModel {


	protected function initmodel() {

		// Set this because the table name is not in standard format
		$this->settable('m_blueprint');

	}

}