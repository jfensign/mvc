<?php if(!defined("VALID_APP")) exit("No direct script access allowed");

require_once("AbstractController.php");

class AdminActionController extends AbstractController {

private static $file_path;
private static $instance, $crud;

protected function __construct() {

	if($_SESSION['logged_in'] != TRUE || !$_SESSION['logged_in']) {
		header("Status: 401 Denied");
		header("Location: " . BASE_URL . AUTH_MODULE . "/login");
		exit();
	}
	
}

public function index() {}

public static function load_controller($file_path, $method) {
	
	$tmp = explode(DIRECTORY_SEPARATOR, $file_path);
	$class = str_replace(".php", "", end($tmp));
        
	require_once($file_path);

	$control = new $class();
	
	if(!method_exists($control, $method) && $method != '') {
	  $x = new AppException();
	  $x->get404();
	}
	else {
	  return method_exists($control, $method) && $method != '' ? "{$control->$method()}" : $control->index();
	}
}

}

?>
