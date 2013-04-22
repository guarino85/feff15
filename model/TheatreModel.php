<?php

	class TheatreModel extends BaseModel{
		
		function __construct($id){
			parent::__construct($id);			
		}
		
		static function getTableName(){
	    return TABLE_PREFIX . 'theatres';
    }
    
    static function exists($id){
	    $result = $_SESSION['db']->query('SELECT id FROM '.TheatreModel::getTableName().' WHERE id="' . $id . '"');
			return ($result->num_rows > 0);
    }
    
    static function getTheatreList(){
    	$theatres = array();
	    $result = $_SESSION['db']->query('SELECT * FROM ' . TheatreModel::getTableName());
			while ($row = $result->fetch_object()){
				$theatre = new TheatreModel($row->id);
			  $theatres[] = $theatre;
			}
			$result->close();
			return $theatres;
		}
	}
?>