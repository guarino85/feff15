<?php

	class EventModel extends BaseModel{
		
		function __construct($id){
			parent::__construct($id);			
		}
		
		function getCountries(){
			$countries = array();
			$str = '';
			$eventCountries = explode(',', $this->fields->country);
			foreach($eventCountries as $eventCountry){
				$result = $_SESSION['db']->query('SELECT * FROM ' . CountryModel::getTableName() . ' WHERE id="' . $eventCountry . '"');
				while ($row = $result->fetch_object()){
					$country = new CountryModel($row->id);
					$countries[] = $country;
				}
			}
			for($i = 0; $i<count($countries); $i++){
				$str .= $countries[$i]->fields->name . (($i < count($countries) - 1) ? ', ' : '' );
			}
			return $str;
		}
		
		function getTheatre(){
			$theatre;
			$result = $_SESSION['db']->query('SELECT * FROM ' . TheatreModel::getTableName() . ' WHERE id="' . $this->fields->theatre . '"');
			while ($row = $result->fetch_object()){
				$theatre = new TheatreModel($row->id);
			}
			return $theatre->fields->name;
		}
		
		function getPlot(){
			//return str_replace('\n', '<br /><br />', $this->fields->plot);
			//return nl2br($this->fields->plot);
			return ($this->fields->plot != null) ? '<p>'.str_replace(array("\r\n", "\r", "\n"), "</p><p>", $this->fields->plot).'</p>' : '';
		}
		
		static function getTableName(){
	    return TABLE_PREFIX . 'events';
    }
    
    static function exists($id){
	    $result = $_SESSION['db']->query('SELECT id FROM '.EventModel::getTableName().' WHERE id="' . $id . '"');
			return ($result->num_rows > 0);
    }
    
    static function getEventList($day=null){
    	$events = array();
    	if($day)
		    $result = $_SESSION['db']->query('SELECT * FROM ' . EventModel::getTableName() . ' WHERE date BETWEEN \'2013-04-'.$day.' 08:00:00\' AND \'2013-04-'.($day+1).' 01:00:00\' ORDER BY date');
		   else
		   	$result = $_SESSION['db']->query('SELECT * FROM ' . EventModel::getTableName() . ' ORDER BY date');
			while ($row = $result->fetch_object()){
				$event = new EventModel($row->id);
			  $events[] = $event;
			}
			$result->close();
			return $events;
		}
	}
?>