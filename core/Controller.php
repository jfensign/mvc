<?php

require_once("AbstractController.php");

class Controller extends AbstractController {

private static $file_path;
private static $instance, $crud;

protected function __construct() {
	parent::__construct();
}

public static function load_controller($file_path, $method) {
	
	$tmp = explode(DIRECTORY_SEPARATOR, $file_path);
	$class = str_replace(".php", "", end($tmp));

	require_once($file_path);
	$control = new $class();
	
	return method_exists($control, $method) && $method != '' ? $control->$method() : $control->index();
	
}

}

?>
