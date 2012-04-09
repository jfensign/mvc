<?php
//Abstract controller
abstract class AbstractController {

	//CREATE READ UPDATE DELETE
	public static $admin_crud_method;
	//child controller's model
	protected $model;

//Use App's uri variables to perform requested operation
protected function __construct() {}

protected function doCreate($scope) {
	return $this->model->create($scope, $_POST);
}

protected function doUpdate($scope, array $where) {
	return $this->model->update($scope, $where, $_POST);
}

protected function doDelete($scope, array $where) {
	return $this->model->delete($scope, $where);
}

}