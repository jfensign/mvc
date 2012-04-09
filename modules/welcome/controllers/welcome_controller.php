<?php

class welcome_controller extends ActionController {
	
	protected $model;
	private $view_data = array();
	
	public function __construct() {}
	
	public function index() {
		App::load()->view("defaultTemplate.inc.php", $this->view_data, TRUE);
	}
	
	public function about() {
		echo __FUNCTION__;
	}
	
	
}

?>