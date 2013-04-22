<?php
	
	class BaseModel{
		var $id, $table_fields, $fields;
		
		function __construct($id){
			$this->id = $id;
			$this->table_fields = $this->fetchFields();
			$this->fields = array();
			$this->fill();
    }
    
    private function fetchFields(){
    	$array = array();
	    $query = 'SELECT * FROM ' . $this::getTableName();

			if ($result = $_SESSION['db']->query($query)) {
			
			    /* Get field information for all columns */
			    $finfo = $result->fetch_fields();
			
			    foreach ($finfo as $val)
			    	$array[] = $val->name;
			    	
			    $result->close();
			    return $array;
			}
    }
    
    function fill(){
    	$attributes = array();
	    $query = 'SELECT * FROM ' . $this::getTableName() . ' WHERE id = "' . $this->id . '"';
	    if ($result = $_SESSION['db']->query($query)) {
	    	$row = $result->fetch_object();
	    	foreach($this->table_fields as $field){
	    		$attributes[$field] = $row->$field;
	    	}
	    	$this->fields = arrayToObject($attributes);
	    }
    }
    
    function getTableFields(){ return $this->table_fields; }
    
    static function getTableName(){
	    return str_replace('model', '', TABLE_PREFIX . strtolower(get_class($this))). 's';
    }
    
    static function exists($id){
	    $result = $_SESSION['db']->query('SELECT id FROM '.BaseModel::getTableName().' WHERE id="' . $id . '"');
			return ($result->num_rows > 0);
    }    
	}
?>