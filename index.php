<?php 
include_once('config.php');

function dispatcher($routes){
	global $session;

	$url = $_SERVER['REQUEST_URI'];
	$params = parse_params();
	$url = str_replace('?'.$_SERVER['QUERY_STRING'], '', $url);
	$url = str_replace(APP_ROOT, '', $url);	
	$route_match = false;
	
	foreach($routes as $urls=>$route){  
	
	//if match found appends $matches to $params
		if(preg_match($route['url'], $url, $matches)){
			$params = array_merge($params, $matches);
			$route_match = true;
			break;
		}
	}
	
	if(!$route_match){
		exit('Invalid URL');
	}
	
	include_once(SERVER_ROOT.APP_ROOT.'controllers'.DS.$route['controller'].'.php');
	if($session->logged_in){
		include(VIEW_PATH.'layouts'.DS.'admin.php');
	}else{
		include(VIEW_PATH.'layouts'.DS.'public.php');
	}
}

dispatcher($routes);

 ?>