<?php
	$_SESSION = array();
	session_destroy();
	redirect('home');
?>