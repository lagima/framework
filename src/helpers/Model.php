<?
namespace Mercury\Helper;

use Mercury\Helper\Core;

class Model extends Core {

	protected $di;
	protected $db;

	private $table;


	public function __construct($di) {

		$this->di = $di;

		// Get the database connection
		$this->db = isset($di['database']) ? $di['database'] : null;

		// No point in continuing without database connection
		if(!is_object($this->db)) {
			trigger_error("No database configured when model is called", E_USER_ERROR);
			return false;
		}

		// Set the default model from called model
		$this->settablefromcalled();

		// Child classes are not allowed to use the constructor so workaround
		$this->initmodel();
	}


	protected function initmodel(){
		// implemented in child
	}


	public function settable($ps_table) {
		$this->table = addslashes($ps_table);
	}


	public function starttransaction() {
		$this->db->starttransaction();
	}


	public function committransaction() {
		$this->db->committransaction();
	}


	public function rollbacktransaction() {
		$this->db->rollbacktransaction();
	}


	/* Update this to move query to database class */
	public function gettablefields($ps_table) {

		$ps_table = addslashes($ps_table);
		$la_fields = $this->db->getallobjects("SHOW COLUMNS FROM `$ps_table`");
		$la_result = [];

		foreach($la_fields as $lo_field) {
			$la_result[] = $lo_field->Field;
		}

		return $la_result;
	}


	/* Update this to move query to database class */
	public function getrow($pa_condition) {

		$la_where = [];
		$la_binds = [];

		foreach($pa_condition as $ls_field => $ls_value) {
			// Start constructing the query
			$la_where[] = " AND `$ls_field` = :$ls_field";
			$la_binds[$ls_field] = $ls_value;
		}

		$lo_row = $this->db->getsingleobject("SELECT * FROM `$this->table` WHERE TRUE " . implode(PHP_EOL, $la_where), $la_binds);

		return $lo_row;
	}


	/* Update this to move query to database class */
	public function getrows($pa_condition = [], $pi_limit = null) {

		$la_where = [];
		$ls_limit = '';
		$la_binds = [];

		foreach($pa_condition as $ls_field => $ls_value) {
			// Start constructing the query
			$la_where[] = " AND `$ls_field` = :$ls_field";
			$la_binds[$ls_field] = $ls_value;
		}

		if(!is_null($pi_limit)) {
			$ls_limit = 'LIMIT :limit';
			$la_binds['limit'] = $pi_limit;
		}

		$la_rows = $this->db->getallobjects("SELECT * FROM `$this->table` WHERE TRUE " . implode(PHP_EOL, $la_where) . " $ls_limit", $la_binds);

		return $la_rows;
	}


	public function delete($pa_condition = []) {
		$this->db->dbdelete($this->table, $pa_condition);
	}


	private function settablefromcalled() {

        $ls_class = get_called_class();
        $la_parts = explode('\\', $ls_class);

        $ls_part = array_pop($la_parts);

        // Strip the word Model
        $ls_table = str_replace('Model', '', $ls_part);

        $this->table = strtolower($ls_table);

    }

    /* Update this to move query to database class */
    /**
	 * Will check if the value already exists in database
	 * @param  string $ps_key          Key field in the database to check the duplicate for
	 * @param  mixed $pm_value         Value for the key field above
	 * @param  string $ps_table        Table to check the duplicate for
	 * @param  string $ps_exceptfield  If passed will exclude checking row matching this field and its value $pm_exceptvalue
	 * @param  mixed $pm_exceptvalue   Value for the field above
	 * @return boolean                 True/False
	 */
	public function isduplicate($ps_key, $pm_value, $ps_table, $ps_exceptfield = null, $pm_exceptvalue = null) {

		if(empty($ps_key) || empty($ps_table) || empty($ps_key))
			trigger_error("Data is empty. Cant find duplicate.", E_USER_ERROR);

		// Escaping
		$ps_key = addslashes($ps_key);
		$ps_table = addslashes($ps_table);
		$ps_exceptfield = addslashes($ps_exceptfield);
		$pm_exceptvalue = addslashes($pm_exceptvalue);

		$la_sqlvalue = array($ps_key => $pm_value);
		$la_extrawhere = array();

		if(!empty($ps_exceptfield)){
			$la_extrawhere[] = " AND `$ps_exceptfield` != :$ps_exceptfield";
			$la_sqlvalue[$ps_exceptfield] = $pm_exceptvalue;
		}

		// Check for duplicate now
		$lo_item = $this->getsingleobject("SELECT `$ps_key` FROM `$ps_table`
											WHERE `$ps_key` = :$ps_key
											" . implode(PHP_EOL, $la_extrawhere) . "
											", $la_sqlvalue);

		return is_object($lo_item);
	}


	public function commitaddfrompost($ps_table = ''){

		if(empty($ps_table))
			$ps_table = $this->table;

		if(empty($_POST))
			trigger_error("POST data is empty", E_USER_ERROR);

		// Get values from POST with __ prefix in an useable array
		$la_values = array();

		foreach($_POST as $ls_key => $lm_value) {

			if(strpos($ls_key, '__') !== false)
				$la_values[substr($ls_key, 2)] = $lm_value;
		}

		if(empty($la_values))
			trigger_error("Useable POST data is empty", E_USER_ERROR);

		// Now put it in the table
		$ps_table = addslashes($ps_table);

		$li_id = $this->db->dbinsert($ps_table, $la_values);

		return $li_id;
	}


	public function commitupdatefrompost($ps_keyfield, $ps_keyvalue, $ps_table = ''){

		if(empty($ps_table))
			$ps_table = $this->table;

		if(empty($_POST))
			trigger_error("POST data is empty", E_USER_ERROR);

		// Get values from POST with __ prefix in an useable array
		$la_values = array();

		foreach($_POST as $ls_key => $lm_value) {

			if(strpos($ls_key, '__') !== false)
				$la_values[substr($ls_key, 2)] = $lm_value;
		}

		if(empty($la_values))
			trigger_error("Useable POST data is empty", E_USER_ERROR);

		// Now put it in the table
		$ps_table = addslashes($ps_table);

		$li_id = $this->db->dbupdate($ps_table, $ps_keyfield, $ps_keyvalue, $la_values);

		return $li_id;
	}


	public function update($ps_keyfield, $ps_keyvalue, $pa_values, $ps_table = ''){

		if(empty($ps_table))
			$ps_table = $this->table;

		if(empty($pa_values))
			trigger_error("Data is empty", E_USER_ERROR);

		// Get values from POST with __ prefix in an useable array
		$la_values = array();

		foreach($pa_values as $ls_key => $lm_value) {

			if(strpos($ls_key, '__') !== false)
				$la_values[substr($ls_key, 2)] = $lm_value;
		}

		if(empty($la_values))
			trigger_error("Useable data is empty", E_USER_ERROR);

		// Now put it in the table
		$ps_table = addslashes($ps_table);

		$li_id = $this->db->dbupdate($ps_table, $ps_keyfield, $ps_keyvalue, $la_values);

		return $li_id;
	}


	public function updaterows($pa_values, $pa_condition) {

		if(empty($ps_table))
			$ps_table = $this->table;

		if(empty($pa_values))
			trigger_error("Data is empty", E_USER_ERROR);

		if(empty($pa_condition))
			trigger_error("Cannot update the table without condition.", E_USER_ERROR);

		$lb_updated = $this->db->dbupdaterows($ps_table, $pa_values, $pa_condition);

		return $lb_updated;
	}

}