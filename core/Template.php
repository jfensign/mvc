<?php
require_once("AppException.php");
class Template {
	
	public $file_path,
		   $view,
		   $vars;
	
	public function __construct($view_name, $view_vars = NULL, $isTemplate) {
		
		$this->vars = $view_vars;
		
		if($isTemplate === FALSE) {
			$this->file_path = "modules/" . Route::$module . "/views/$view_name";
		} else {
			$this->file_path = "assets/templates/$view_name"; 
		}
		

		if(!file_exists($this->file_path)) {
			try {
			echo $this->file_path;
			}
			catch(AppException $e) {
				echo $e->getMessage();
			}
		}
		
		if(is_array($this->vars) && count($this->vars) > 0) {
			extract($this->vars, EXTR_PREFIX_SAME, "APP_");
		}
		
		include_once($this->file_path);
	
		return FALSE;
	
	}
	
	public function redirect() {
		header("Location: " . $_SERVER['HTTP_REFERER']);
	}
	
}

?>
