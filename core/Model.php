<?php

abstract class Model {

private static $instance;
private static $file_path;
protected $model;

private function __construct() {}

//Singleton to ensure that class is instantiated once
public static function get_instance() {
	if(empty(self::$instance)) {
		self::$instance = new Model();
	}
	
	return self::$instance;
}

//Check if model exists in Module 
public static function load_model($model_name) {

	$module_folder = str_replace("_model", "", $model_name);
	self::$file_path = "modules/" . $module_folder . "/models/$model_name.php";

	if(!file_exists(self::$file_path)) {
		throw new Exception("Model $model_name.php could not be located");
	} 
	else {
			
		try {
			require_once(self::$file_path);
			$model = new $model_name();
	
			return $model;	
		} 
		catch(Exception $e) {
			echo $e->getMessage();	
		}
	}
}

public function show($scope) {
	return $this->db->show($scope);
}
/*
public function create($table, $postVals) {
	return $this->db->insert($table, $postVals);
}

public function update($table, $where, $postVals) {
	return $this->db->update($table, $where, $postVals);
}

public function delete($table, $args) {
	return $this->db->delete($table, $args);
}

public function getOne($table, array $args) {
	return $this->db->findOne($table, $args);
}
*/
}//END CLASS

?>
