<?
namespace Mercury\Helper;


/**
*
*/
class Database {

	private $config;

	public function __construct($di) {

		// Get the configuration
		$lo_config = isset($di['config']) ? $di['config'] : null;

		if(!isset($lo_config)) {
			trigger_error('Configuration is messed up', E_USER_ERROR);
			return false;
		}

		// Get the database config
		$ls_host = $lo_config->getconfigvalue('MYSQL_HOST');
		$ls_dbname = $lo_config->getconfigvalue('MYSQL_DATABASE');
		$ls_dbuser = $lo_config->getconfigvalue('MYSQL_USER');
		$ls_dbpassword = $lo_config->getconfigvalue('MYSQL_PASSWORD');

		// Do the connection
		$this->dbconnect($ls_host, $ls_dbname, $ls_dbuser, $ls_dbpassword);
	}

	protected function dbconnect($ps_dbhost = null, $ps_database = null, $ps_username = null, $ps_password = null) {

		try {

			$this->db = new \PDO('mysql:host=' . $ps_dbhost . ';dbname=' . $ps_database, $ps_username, $ps_password);
			$this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

		} catch(\PDOException $e) {

			trigger_error("Could not connect to database. Please check if database is configured in config.php on your root dir", E_USER_ERROR);

		}


		return $this->db;
	}

	public function dbinsert($ps_table, $pa_values) {

		if(empty($ps_table) || empty($pa_values))
			trigger_error("Improper usage of function dbinsert()", E_USER_ERROR);

		// Process the keys
		$la_fields = array_keys($pa_values);
		array_walk($la_fields, function(&$ls_item, $ls_key) {
			$ls_item = "`$ls_item`";
		});
		$ls_fields = implode(', ', $la_fields);

		// Process the value mapping
		$la_fields = array_keys($pa_values);
		array_walk($la_fields, function(&$ls_item, $ls_key) {
			$ls_item = ':'.$ls_item;
		});
		$ls_mappvar = implode(', ', $la_fields);

		try {

			// Some basic escaping
			$ps_table = addslashes($ps_table);
			$ls_fields = addslashes($ls_fields);
			$ls_mappvar = addslashes($ls_mappvar);

			$ls_sql = "INSERT INTO `$ps_table` ($ls_fields) VALUES ($ls_mappvar)";

			$this->query($ls_sql, $pa_values);

		} catch(\PDOException $e) {

			trigger_error($e->getMessage(), E_USER_ERROR);

		}

		return $this->db->lastInsertId();
	}

	public function dbreplace($ps_table, $pa_values) {

		if(empty($ps_table) || empty($pa_values))
			trigger_error("Improper usage of function dbinsert()", E_USER_ERROR);

		// Process the keys
		$la_fields = array_keys($pa_values);
		array_walk($la_fields, function(&$ls_item, $ls_key) {
			$ls_item = "`$ls_item`";
		});
		$ls_fields = implode(', ', $la_fields);

		// Process the value mapping
		$la_fields = array_keys($pa_values);
		array_walk($la_fields, function(&$ls_item, $ls_key) {
			$ls_item = ':'.$ls_item;
		});
		$ls_mappvar = implode(', ', $la_fields);

		try {

			// Some basic escaping
			$ps_table = addslashes($ps_table);
			$ls_fields = addslashes($ls_fields);
			$ls_mappvar = addslashes($ls_mappvar);

			$ls_sql = "REPLACE INTO `$ps_table` ($ls_fields) VALUES ($ls_mappvar)";

			$this->query($ls_sql, $pa_values);

		} catch(\PDOException $e) {

			trigger_error($e->getMessage(), E_USER_ERROR);

		}

		return $this->db->lastInsertId();
	}


	/* Deprecated */
	public function dbupdate($ps_table, $ps_keyfield, $pm_keyvalue, $pa_values) {

		trigger_error("The method dbupdate() is deprecated. use dbupdaterows() instead", E_USER_DEPRECATED);

		if(empty($ps_table) || empty($ps_keyfield) || empty($pm_keyvalue) || empty($pa_values))
			trigger_error("Improper usage of function dbupdate()", E_USER_ERROR);

		$la_fields = array_keys($pa_values);

		array_walk($la_fields, function(&$ls_item, $ls_key) {
			$ls_item = "`$ls_item` = :$ls_item";
		});

		$ls_mappvar = implode(', ', $la_fields);

		try {

			// Some basic escaping
			$ps_table = addslashes($ps_table);
			$ps_keyfield = addslashes($ps_keyfield);

			$pm_keyvalue = $this->escapesql($pm_keyvalue);

			$ls_sql = "UPDATE `$ps_table` SET $ls_mappvar WHERE `$ps_keyfield` = $pm_keyvalue";

			$this->query($ls_sql, $pa_values);

		} catch(\PDOException $e) {

			trigger_error($e->getMessage(), E_USER_ERROR);

		}

		return true;
	}


	public function dbupdaterows($ps_table, $pa_values, $pa_condition = []) {

		if(empty($ps_table) || empty($pa_condition) || empty($pa_values))
			trigger_error("Improper usage of function dbupdaterows()", E_USER_ERROR);

		// Placeholders
		$la_where = [];
		$la_binds = $pa_values;

		// Map the fields with value keys
		$la_fields = array_keys($pa_values);
		array_walk($la_fields, function(&$ls_item, $ls_key) {
			$ls_item = "`$ls_item` = :$ls_item";
		});
		$ls_mappvar = implode(', ', $la_fields);

		// Build the WHERE condition
		foreach($pa_condition as $ls_field => $ls_value) {

			// Construct the filed key to avoid conflict with the actual value being updated
			$ls_key = "u_$ls_field";

			// Start constructing the query
			$la_where[] = " AND `$ls_field` = :$ls_key";
			$la_binds[$ls_key] = $ls_value;
		}


		try {

			// Some basic escaping
			$ps_table = addslashes($ps_table);

			// Build the query
			$ls_sql = "UPDATE `$ps_table` SET $ls_mappvar WHERE TRUE " . implode(PHP_EOL, $la_where);

			// Run it!
			$this->query($ls_sql, $la_binds);

		} catch(\PDOException $e) {

			trigger_error($e->getMessage(), E_USER_ERROR);

		}

		return true;
	}


	public function dbinsertupdate($ps_table, $pa_values, $pa_updatefields) {

		if(empty($ps_table) || empty($pa_values) || empty($pa_updatefields))
			trigger_error("Improper usage of function dbinsertupdate()", E_USER_ERROR);

		$la_fields = array_keys($pa_values);
		$ls_fields = implode(', ', $la_fields);

		array_walk($la_fields, function(&$ls_item, $ls_key) {
			$ls_item = ':' . $ls_item;
		});
		$ls_mappvar = implode(', ', $la_fields);

		array_walk($pa_updatefields, function(&$ls_item, $ls_key) {
			$ls_item = $ls_item . '= :' . $ls_item;
		});
		$ls_mappupdatevar = implode(', ', $pa_updatefields);

		try {

			$ls_sql = "INSERT INTO `$ps_table`
						($ls_fields) VALUES ($ls_mappvar)
						ON DUPLICATE KEY UPDATE $ls_mappupdatevar";

			$this->query($ls_sql, $pa_values);

		} catch(\PDOException $e) {

			trigger_error($e->getMessage(), E_USER_ERROR);

		}

		return true;
	}


	public function dbdelete($ps_table, $pa_condition) {

		if(empty($ps_table) || empty($pa_condition))
			trigger_error("Improper usage of function dbdelete()", E_USER_ERROR);

		array_walk($pa_condition, function(&$ls_item, $ls_key) {
			$ls_item = "`$ls_key` = '$ls_item'";
		});

		$ls_mappvar = implode(' AND ', $pa_condition);

		try {

			$ls_sql = "DELETE FROM `$ps_table` WHERE $ls_mappvar";

			$this->query($ls_sql);

		} catch(\PDOException $e) {

			trigger_error($e->getMessage(), E_USER_ERROR);

		}

		return true;
	}


	private function getpdodatatype($pm_value) {

		$ls_type = gettype($pm_value);

		switch($ls_type) {

			case 'integer':
				return \PDO::PARAM_INT;

			case 'boolean':
				return \PDO::PARAM_BOOL;

			case 'string':
				return \PDO::PARAM_STR;

			case 'object':
				return \PDO::PARAM_LOB;

			case NULL:
				return \PDO::PARAM_NULL;

			default:
				return \PDO::PARAM_STR;
		}

	}

	public function escapesql($ps_string) {

		if(empty($this->db))
			trigger_error("Database connection not configured", E_USER_ERROR);

		return $this->db->quote($ps_string);
	}

	public function query($ps_query, $pa_bindings = null) {

		$lo_statement = $this->db->prepare($ps_query);

		// Check if any bindings are passed
		if(is_array($pa_bindings)) {

			foreach($pa_bindings as $ls_key => $lm_value) {

				$lm_bindingtype = $this->getpdodatatype($lm_value);

				$lo_statement->bindValue(":$ls_key", $lm_value, $lm_bindingtype);
			}
		}

		$lo_statement->execute();

		return $lo_statement;
	}

	public function getsingleobject($ps_query, $pa_bindings = null) {

		try {

			$lo_statement = $this->query($ps_query, $pa_bindings);

			/* Fetch single object of resultset */
			$lo_result = $lo_statement->fetchObject();

		} catch(\PDOException $e) {

			trigger_error($e->getMessage() . "($ps_query)", E_USER_ERROR);

		}

		return $lo_result;
	}

	public function getallobjects($ps_query, $pa_bindings = null, $pm_keyvalue = null) {

		try {

			$lo_statement = $this->query($ps_query, $pa_bindings);

			/* Fetch all of the rows in the result set */
			$la_result = $lo_statement->fetchAll(\PDO::FETCH_OBJ);

			if(!empty($pm_keyvalue)) {

				$la_processedresut = array();

				foreach($la_result as $lo_item){

					if(!isset($lo_item->{$pm_keyvalue}))
						continue;

					$la_processedresut[$lo_item->{$pm_keyvalue}] = $lo_item;
				}

				$la_result = $la_processedresut;
			}

		} catch(\PDOException $e) {

			trigger_error($e->getMessage(), E_USER_ERROR);

		}

		return $la_result;
	}

	public function getallassocs($ps_query, $pa_bindings = null, $pm_keyvalue = null) {

		try {

			$lo_statement = $this->query($ps_query, $pa_bindings);

			/* Fetch all of the rows in the result set */
			$la_result = $lo_statement->fetchAll(\PDO::FETCH_ASSOC);

			if(!empty($pm_keyvalue)) {

				$la_processedresut = array();

				foreach($la_result as $la_item){

					if(!isset($la_item[$pm_keyvalue]))
						continue;

					$la_processedresut[$la_item[$pm_keyvalue]] = $la_item;
				}

				$la_result = $la_processedresut;
			}

		} catch(\PDOException $e) {

			trigger_error($e->getMessage(), E_USER_ERROR);

		}

		return $la_result;
	}
}