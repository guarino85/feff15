<?php

	class CountryModel extends BaseModel{
		
		function __construct($id){
			parent::__construct($id);			
		}
		
		static function getTableName(){
	    return TABLE_PREFIX . 'countries';
    }
    
    static function exists($id){
	    $result = $_SESSION['db']->query('SELECT id FROM '.CountryModel::getTableName().' WHERE id="' . $id . '"');
			return ($result->num_rows > 0);
    }
    
    static function getCountryList(){
    	$countries = array();
	    $result = $_SESSION['db']->query('SELECT * FROM ' . CountryModel::getTableName());
			while ($row = $result->fetch_object()){
				$country = new CountryModel($row->id);
			  $countries[] = $country;
			}
			$result->close();
			return $countries;
		}
	}
?>