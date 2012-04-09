<?php

class Module {

private static $file_path;
private static $instance;

public static function load_module($request, $action) {
	
	if(!$request) { //in case index.php is ommitted from URL
		header("Location: " . BASE_URL . BASE_MODULE);
		exit();
	}

	if(is_array($request)) {
	$module_controller = Route::$module . "_controller";
	} 
	elseif(is_string($request)) {
		$module_controller = $request . "_controller";
		$request['is_admin'] = FALSE;
	}
	
	self::$file_path = "modules" . DIRECTORY_SEPARATOR . 
						Route::$module . DIRECTORY_SEPARATOR . 
						"controllers" . DIRECTORY_SEPARATOR . 
						$module_controller . ".php";

	if(!file_exists(self::$file_path)) {
		return FALSE;
	} 
	else {
		try {
			if(array_key_exists("real_request_module", Route::$uri)) {
				App::load()->controller(self::$file_path, $action, Route::$uri['real_request_module'][0]['is_admin']);
			} else {
				App::load()->controller(self::$file_path, $action, FALSE);
			}
		}
		catch(Exception $e) {
			echo $e->getMessage();
		}
	}
	
}
	
}

?>
