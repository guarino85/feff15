<?php
define('MODEL_DIR', 'model/');
define('VIEW_DIR', 'view/');
define('CONTROLLER_DIR', 'controller/');
define('AJAX_DIR', VIEW_DIR . 'ajax/');

define('ADMIN_DIR', 'view/admin/');
define('STYLE_DIR', 'css/');
define('SCRIPT_DIR', 'js/');
define('UPLOADS_DIR', 'uploads/');
define('IMG_DIR', 'img/');

define('HOME_PAGE', VIEW_DIR . 'home.php');
define('ERROR_PAGE', VIEW_DIR . '404.php');

define('BASE_URL', 'http://localhost/joe-guarino/subdomains/feff15/');

define('DB_HOST', '127.0.0.1');
define('DB_USER',  'joeguarino');
define('DB_PASSWORD', 'gigu9670');
define('DB_NAME', 'feff15');
define('LOGIN_USERNAME', 'Admin');
define('LOGIN_PASSWORD', 'gigu9670');
define('TABLE_PREFIX', '');

function redirect($page){
	header('Location: ' . BASE_URL . $page);
}

function baseURL(){
	echo BASE_URL;
}

function style_exists($page){
	if(file_exists(STYLE_DIR . $page . '.less')) return STYLE_DIR . $page . '.less';
	else return null;
}

function script_exists($page){
	if(file_exists(SCRIPT_DIR . $page . '.js')) return SCRIPT_DIR . $page . '.js';
	else return null;
}

function include_styles($page){
	$style = style_exists($page);
	if($style)
		echo '<link href="' . BASE_URL . $style . '" rel="stylesheet/less" type="text/css">';
}

function include_scripts($page){
	$script = script_exists($page);
	if($script)
		echo '<script src="' . BASE_URL . $script . '" type="text/javascript"></script>';
}

function print_current_page($page){
	echo $page;
}

function ajax_page_exists($page){
	if(file_exists(AJAX_DIR . $page . '.php')) return AJAX_DIR . $page . '.php';
	else return false;
}

/** CLASS MODELLING **/

function class_autoloader($class) {
	include MODEL_DIR . $class . '.php';
}

function validateControllerMethod($string){
	return str_replace('-', '_', $string);
}

/* TEXT FORMATTING */

function text_format($txt){
	return str_replace('<br />', '</p><p>', nl2br($txt));
}

function human_date($date){
	return date('jS F Y', strtotime($date));
}

function event_date($date){
	return date('d M H:i', strtotime($date));
}

function archive_date($date){
	return date('M j, Y', strtotime($date));
}

function event_length($length){
	$hours = intval($length/60);
	$minutes = $length%60;
	return (($hours > 0) ? $hours . 'h' : '') . (($minutes > 0) ? ' ' . $minutes . 'm' : '');
}

function slug($str) { return strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'), array('', '-', ''), remove_accent($str))); }

function remove_accent($str) { $a = array('À','Á','Â','Ã','Ä','Å','Æ','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ð','Ñ','Ò','Ó','Ô','Õ','Ö','Ø','Ù','Ú','Û','Ü','Ý','ß','à','á','â','ã','ä','å','æ','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ø','ù','ú','û','ü','ý','ÿ','Ā','ā','Ă','ă','Ą','ą','Ć','ć','Ĉ','ĉ','Ċ','ċ','Č','č','Ď','ď','Đ','đ','Ē','ē','Ĕ','ĕ','Ė','ė','Ę','ę','Ě','ě','Ĝ','ĝ','Ğ','ğ','Ġ','ġ','Ģ','ģ','Ĥ','ĥ','Ħ','ħ','Ĩ','ĩ','Ī','ī','Ĭ','ĭ','Į','į','İ','ı','Ĳ','ĳ','Ĵ','ĵ','Ķ','ķ','Ĺ','ĺ','Ļ','ļ','Ľ','ľ','Ŀ','ŀ','Ł','ł','Ń','ń','Ņ','ņ','Ň','ň','ŉ','Ō','ō','Ŏ','ŏ','Ő','ő','Œ','œ','Ŕ','ŕ','Ŗ','ŗ','Ř','ř','Ś','ś','Ŝ','ŝ','Ş','ş','Š','š','Ţ','ţ','Ť','ť','Ŧ','ŧ','Ũ','ũ','Ū','ū','Ŭ','ŭ','Ů','ů','Ű','ű','Ų','ų','Ŵ','ŵ','Ŷ','ŷ','Ÿ','Ź','ź','Ż','ż','Ž','ž','ſ','ƒ','Ơ','ơ','Ư','ư','Ǎ','ǎ','Ǐ','ǐ','Ǒ','ǒ','Ǔ','ǔ','Ǖ','ǖ','Ǘ','ǘ','Ǚ','ǚ','Ǜ','ǜ','Ǻ','ǻ','Ǽ','ǽ','Ǿ','ǿ'); $b = array('A','A','A','A','A','A','AE','C','E','E','E','E','I','I','I','I','D','N','O','O','O','O','O','O','U','U','U','U','Y','s','a','a','a','a','a','a','ae','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','o','u','u','u','u','y','y','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','D','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','IJ','ij','J','j','K','k','L','l','L','l','L','l','L','l','l','l','N','n','N','n','N','n','n','O','o','O','o','O','o','OE','oe','R','r','R','r','R','r','S','s','S','s','S','s','S','s','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Y','Z','z','Z','z','Z','z','s','f','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','A','a','AE','ae','O','o'); return str_replace($a, $b, $str); }


function arrayToObject($array) {
   if(!is_array($array)) {
   	return $array;
   }
   
   $object = new stdClass();
   if (is_array($array) && count($array) > 0) {
    foreach ($array as $name=>$value) {
      $name = strtolower(trim($name));
      if (!empty($name)) {
       	$object->$name = arrayToObject($value);
      }
    }
    return $object; 
   }
   else {
    return FALSE;
   }
}

/* ADMIN */

function check_login(){
	if(!$_SESSION['username']) redirect('login');
}


/** DATABASE FUNCTIONS **/

function db_connect(){
	$connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	return $connection;
}

function db_disconnect($connection){
	$thread_id = $connection->thread_id;
	$connection->kill($thread_id);
	return $connection->close();
}

?>