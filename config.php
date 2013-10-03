<?php 

define('DS', DIRECTORY_SEPARATOR);
define('SERVER_ROOT', $_SERVER['DOCUMENT_ROOT']);

//Application Directory
define('APP_ROOT', '/sites/basic_cms/');

//MVC paths
define('MODEL_PATH', SERVER_ROOT.APP_ROOT.'models'.DS);
define('VIEW_PATH', SERVER_ROOT.APP_ROOT.'views'.DS);
define('CONTROLLER_PATH', SERVER_ROOT.APP_ROOT.'controller'.DS);

//lib
include_once(SERVER_ROOT.APP_ROOT.'lib'.DS.'database.php');
include_once(SERVER_ROOT.APP_ROOT.'lib'.DS.'databaseObject.php');
include_once(MODEL_PATH.'sessions.php');
include_once(SERVER_ROOT.APP_ROOT.'lib'.DS.'functions.php');

include(MODEL_PATH.'user.php');
include(MODEL_PATH.'subject.php');
include(MODEL_PATH.'page.php');

$routes = array(  //order is important here
	array('url'=>'/^pages\/(?P<subject>\w+)\/?$/', 'controller'=>'pages', 'view'=>'show'),
	array('url'=>'/^pages\/(?P<subject>\w+)\/(?P<pid>\d+)?\/?edit$/', 'controller'=>'pages', 'view'=>'edit'),
	array('url'=>'/^pages\/(?P<subject>\w+)\/(?P<pid>\d+)?\/?new$/', 'controller'=>'pages', 'view'=>'new'),
	array('url'=>'/^pages\/(?P<subject>\w+)\/(?P<pid>\d+)?\/?create$/', 'controller'=>'pages', 'view'=>'create'),

	array('url'=>'/^pages\/(?P<subject>\w+)\/(?P<pid>\d+)$/', 'controller'=>'pages', 'view'=>'show'),
	array('url'=>'/^pages\/(?P<subject>\w+)\/(?P<pid>\d+)?\/?(?P<process>\w+)$/',
			 'controller'=>'pages', 'view'=>'process'),
	array('url'=> '/^(pages\/?)?$/', 'controller'=>'pages','view'=>'show')

	);


 ?>