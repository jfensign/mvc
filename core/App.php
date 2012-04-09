<?php

//APPLICATION CLASS
/*
*
*GLOBAL ACCESS SINGLETON CLASS
*
*/
class App {
//Application instance
public static $instance;

//$uri vars
public static $vars = array();

private function __construct() {}

//Enclosed Instatiation / Instance Check
public static function get_instance() {
	if(empty(self::$instance)) {
		self::$instance = new App();
	}
	return self::$instance;
}

//SET URI ARGUMENT
public static function set_vars(array $v) {
	self::$vars = $v;
}

//RETRIEVE URI ARGUMENT
public static function get_vars() {
	return self::$vars;
}

//CALLS LOADER CLASS
public static function load() {
	require_once('Load.php');
	return new Load();
}

public static function session() {
	require_once('Session.php');
	return new Session();
}



//RENDERS TEMPLATE
public static function render($view_name, $vars = '', $json = FALSE) {

	try {
	
	$file_path = $json == FALSE ? "modules/".App::$vars['module']."/views/$view_name" : "modules/" . App::$vars['module'] . "/views/json/$view_name";
	if(!file_exists($file_path)) exit("View file $view_name could not be found.");
	
	if(is_array($vars) && count($vars) > 0) {
		extract($vars, EXTR_PREFIX_SAME, "APP_");
	}
		$json == FALSE ? include('assets/templates/header.php') : NULL;
		include($file_path);
		$json == FALSE ? include_once("assets/templates/footer.php") : NULL;
	} catch(Exception $e) {
		exit($e->getMessage());
	}
		
}

}//End Class App
?>
