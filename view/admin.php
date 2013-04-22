<?php
	check_login();
		
	spl_autoload_register('class_autoloader');
	
	$events = EventModel::getEventList();
?>
<a href="<?php echo BASE_URL ?>admin/logout" id="logout">Logout</a>