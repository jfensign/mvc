<?php

class AppException extends Exception {
        
        

	public function __construct($msg="", $code = 0) {
		//PHP's Exception class will handle all of the necessary validation
		parent::__construct($msg, $code);
	}
	
	public function __toString() {
	  return "[{$this->code}]: <span class='error'>{$this->message}</span><br />" . var_dump($this);
	}
	
	private static function renderExceptionView($path, $vars) {
          if(!file_exists($path)) {
            echo "Specified Template Does not Exist";
	  }
	  else {
	    if(is_array($vars) && count($vars) > 0) {
	      extract($vars, EXTR_PREFIX_SAME, "AppException_");
	      include_once($path);
	      return FALSE;
	    }
	 }
       }
	
	public function get404($view = NULL, array $viewVars = NULL) {
	  header("Status: 404 Not Found");
	  self::renderExceptionView($view, $viewVars);
	}
}

