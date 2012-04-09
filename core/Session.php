<?php

class Session {

	public $session_data = array();

	public function __construct() {
	
		if(empty($_SESSION)) {
			session_start();
		}
	
	}
	
	public static function setRouteVars(array $route_vals) {
	
		$_SESSION['Route'] = array();
	
		foreach($route_vals as $key => $val) {
			$_SESSION['Route'][$key] = $val;
		}
	}
	
	public function get($index, $key) {
		if(array_key_exists($key, $_SESSION[$index])) {
			return $_SESSION[$index][$key];
		}
		else {
			return FALSE;
		}
	}
	
	public function __destruct() {
		unset($_SESSION);
	}
	
	
}

?>