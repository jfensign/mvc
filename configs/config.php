<?php

$protocol_var = str_replace('/1.1', '://', $_SERVER['SERVER_PROTOCOL']);
define('PROTOCOL', $protocol_var);
define("BASEPATH", str_replace('/1.1', '://', strtolower($_SERVER['SERVER_PROTOCOL'])).$_SERVER['SERVER_NAME']);
define("APP_PATH", str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']));
define("APP_LOCATION", BASEPATH . APP_PATH . "/");

define("BASE_MODULE", "welcome");
define("ADMIN_MODULE", "");
define("AUTH_MODULE", "");

define("BASE_URL", PROTOCOL . 'localhost/mvc/index.php/');
define("APP_ROOT", str_replace("index.php/", "", BASE_URL));

define("STYLES_PATH", APP_ROOT . "assets/styles/");
define("SCRIPTS_PATH", APP_ROOT . "assets/scripts/");
define("IMG_PATH", APP_ROOT . "assets/images/");
define("TEMPLATES_PATH", APP_ROOT . "assets/templates/");

?>
