<?php
	ob_start();
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	require_once('app/core.php');
	require_once('app/utils.php');
	$base_controller = new BaseController();
?>
<?php session_start(); ?>
<?php $_SESSION['db'] = db_connect(); ?>
<? $current_page = !isset($_GET['page']) ? 'home' : $_GET['page']; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width; initial-scale=1.0;" />
		<title>Far East Film Festival 15</title>
		
		<link href="<?php baseURL() ?>css/frontend.less" rel="stylesheet" type="text/less" />
		<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed|Noto+Serif' rel='stylesheet' type='text/css'>
		<?php include_styles($current_page); ?>
		<script src="http://code.jquery.com/jquery-latest.js" type="text/javascript"></script>
		<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
		
		<script src="<?php baseURL() ?>js/less-1.3.3.min.js" type="text/javascript"></script>
		<script src="<?php baseURL() ?>js/jquery.scrollTo-1.4.3.1-min.js" type="text/javascript"></script>
		<script src="<?php baseURL() ?>js/jquery.localscroll-1.2.7-min.js" type="text/javascript"></script>
		<script src="<?php baseURL() ?>js/jquery.ellipsis.js" type="text/javascript"></script>
		<?php include_scripts($current_page); ?>
	</head>
	<body class="<?php print_current_page($current_page) ?>">
		<section id="content" class="<?php print_current_page($current_page) ?>">
		<?php $base_controller->loadView($_GET); ?>
		</section>
	</body>
</html>
<?php db_disconnect($_SESSION['db']); ?>
<?php  ob_end_flush(); ?>