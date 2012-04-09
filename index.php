<?php
//error_reporting(0);
if(!ob_start("ob_gzhandler")) ob_start();
@!$_SESSION || @empty($_SESSION) ? session_start() : NULL;

//REQUIRE CONFIGURATION FILES
require_once('configs/config.php');
//REQUIRE App.php (THE APPLICATION OBJECT)
require_once('core/App.php');
require_once('core/Route.php');
/*
*ARRAY $uri
*converts the current uri into an array
*truncating the domain name. The uri elements are then used to identify/call
*system components 
*/
$uri = $_SERVER['REQUEST_URI'];
$uri = str_replace(APP_PATH, "", $uri);
$uri = str_replace("?" . $_SERVER["QUERY_STRING"], "", $uri);
$uri = preg_split('[\\/]', $uri, -1, PREG_SPLIT_NO_EMPTY);

/*
*Associates Url segments with an application component
*http://somesite.com/index.php/MODULE/CONTROLLER/CRUD/VARS/../../../
*/

if(in_array('index.php', $uri)):
	$uri_array['module'] = @$uri[1];
	$uri_array['action'] = str_replace("?" . @$_SERVER['QUERY_STRING'], "",  @$uri[2]);
	$uri_array['arguments'] = array_slice($uri, 3);
else:
	$uri_array['module'] = BASE_MODULE;
	$uri_array['action'] = "";
endif;

//define constant VALID_APP to prevent direct script access.
define("VALID_APP", TRUE);

//sends URI array to App for initialization/instantiation
App::set_vars($uri_array);
Route::set($uri_array, FALSE);

ob_end_flush();
