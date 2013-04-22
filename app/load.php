<?php

class Load {
	function view($file_name, $data = null){
		if(is_array($data))
	  	extract($data);
	  include_once(VIEW_DIR . $file_name . '.php');
	}
	
	function viewAdmin($data){
		if($data['action'] == 'logout')
			include_once(ADMIN_DIR . $data['action'] . '.php');
		else
	  	include_once(ADMIN_DIR . $data['category'] . '.php');
	}
	
	function controller($controller){
		if(is_array($controller)){
	  	foreach($controller as $c)
	  		require_once(CONTROLLER_DIR . $c . '.php');
		}
		else require_once(CONTROLLER_DIR . $controller . '.php');
	}
	
}



