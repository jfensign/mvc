<?php
class home_model extends Model {
private $db;
public function __construct() {
$this->db = App::load()->database();
}
public function get_page() {
return $this->db->find_where("pages", array("uri", App::$vars["module"]));
}
}
?>