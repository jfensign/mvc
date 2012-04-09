<?php

class Navigation {

private static $instance = NULL;
private $installs, $elements;

private function __construct() {

		if($_SESSION) {
		foreach($_SESSION as $key => $val) {
			
			if(strpos($key, "perms") && $val == 1) {
				switch($key) {
					case "wishlist_perms_key":
					$this->installs[] = "wishlist";
					break;
					
					case "tp_perms_key":
					$this->installs[] = "tuition_portal";
					break;

					case "bert_perms_key":
					$this->installs[] = "bert";
					break;

					default: 
					NULL;
					break;
				}
			}

		}
		
		return !empty($this->installs) ? $this->installs : FALSE;
	}
}

public static function get_instance() {
	if(empty(self::$instance)) {
		self::$instance = new Navigation();
	}
	return self::$instance;
}

public function get_installs() {
	return $this->installs;
}

public function generate_nav() {
	return $this->installs;
}

}


?>
