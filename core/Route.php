<?php
require_once("AppException.php");
class Route {

	public static $uri;
	public static $module;
	public static $action;

	//resolve uri alias/resource location
	public static function set(array $request, $set_session = FALSE) {

		self::$uri['request'] = array();
		
		//if the requested module does not match a module folder we assume that it has been given an alias in configs/routes.php
		if(!is_dir("modules/{$request['module']}")) {
				//include configs/routes to access alias configuration
				include_once("configs/routes.php");
				//see if the requested module is an alias
				if(key_exists($request['module'], $routes['modules'])) {
				
					self::$uri['real_request_module'] = array();
					self::$module = $routes['modules'][$request['module']]['alias_for'];
					
					array_push(self::$uri['real_request_module'], $routes['modules'][$request['module']]);
					
					//load the module
					App::load()->module($routes['modules'][$request['module']], $request['action']);
				}
				else {
                                        $error = new AppException();
                                        $error->get404("assets/templates/404_view.inc.php", array("title" => "Page Not Found"));     
				}
			
				
		} 
		elseif(is_dir("modules/{$request['module']}")) {
			self::$module = $request['module'];
			App::load()->module($request['module'], $request['action']);
		}
		else {
			header("Status: 404 Not Found");
			exit();
		}
	}
}
