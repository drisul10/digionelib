<?php

namespace core;

use config\Db;

class Base_Model {

	public $table, $field_id, $field_is_deleted, $field_updated_at, $query_count = 0;

	protected $connection, $query;
	
	public function __construct($charset = 'utf8') {
		$config = new Db();

		$this->connection = new \mysqli($config->dbhost, $config->dbuser, $config->dbpass, $config->dbname);

		if ($this->connection->connect_error) {
			die('Failed to connect to MySQL - ' . $this->connection->connect_error);
		}
		$this->connection->set_charset($charset);
	}

	public function get_all()
    {
        return $this->query("SELECT * FROM $this->table WHERE $this->field_is_deleted='0' ORDER BY $this->field_updated_at DESC")->fetchAll();
	}
	
	public function get_one($id)
    {
		$q = $this->query("SELECT * FROM $this->table WHERE $this->field_id='$id' AND $this->field_is_deleted='0'");
		
		if ($q->numRows() > 0) return $q->fetchArray();

		return false;
	}

	public function get_only_col($col_name)
    {
        return $this->query("SELECT $col_name FROM $this->table WHERE $this->field_is_deleted='0' ORDER BY $this->field_updated_at DESC")->fetchAll();
	}
	
	public function drop($id)
    {
        $q = $this->query("UPDATE $this->table SET $this->field_is_deleted='1' WHERE $this->field_id='$id'");

        if ($q->affectedRows() == 1) {
            return true;
        }

        return false;
    }
	
    public function query($query) {
		if ($this->query = $this->connection->prepare($query)) {
            if (func_num_args() > 1) {
                $x = func_get_args();
                $args = array_slice($x, 1);
				$types = '';
                $args_ref = array();
                foreach ($args as $k => &$arg) {
					if (is_array($args[$k])) {
						foreach ($args[$k] as $j => &$a) {
							$types .= $this->_gettype($args[$k][$j]);
							$args_ref[] = &$a;
						}
					} else {
	                	$types .= $this->_gettype($args[$k]);
	                    $args_ref[] = &$arg;
					}
                }
				array_unshift($args_ref, $types);
                call_user_func_array(array($this->query, 'bind_param'), $args_ref);
            }
            $this->query->execute();
           	if ($this->query->errno) {
				//die('Unable to process MySQL query (check your params) - ' . $this->query->error);
           	}
			$this->query_count++;
        } else {
            //die('Unable to prepare statement (check your syntax) - ' . $this->connection->error);
        }
		return $this;
    }

	public function fetchAll() {
	    $params = array();
	    $meta = $this->query->result_metadata();
	    while ($field = $meta->fetch_field()) {
	        $params[] = &$row[$field->name];
	    }
	    call_user_func_array(array($this->query, 'bind_result'), $params);
        $result = array();
        while ($this->query->fetch()) {
            $r = array();
            foreach ($row as $key => $val) {
                $r[$key] = $val;
            }
            $result[] = $r;
        }
        $this->query->close();
		return $result;
	}

	public function fetchArray() {
	    $params = array();
	    $meta = $this->query->result_metadata();
	    while ($field = $meta->fetch_field()) {
	        $params[] = &$row[$field->name];
	    }
	    call_user_func_array(array($this->query, 'bind_result'), $params);
        $result = array();
		while ($this->query->fetch()) {
			foreach ($row as $key => $val) {
				$result[$key] = $val;
			}
		}
        $this->query->close();
		return $result;
	}
	
	public function numRows() {
		$this->query->store_result();
		return $this->query->num_rows;
	}

	public function close() {
		return $this->connection->close();
	}

	public function affectedRows() {
		return $this->query->affected_rows;
	}

	private function _gettype($var) {
	    if(is_string($var)) return 's';
	    if(is_float($var)) return 'd';
	    if(is_int($var)) return 'i';
	    return 'b';
	}

}