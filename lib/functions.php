<?php 

function redirect_to($location){
	if($location == APP_ROOT){
		header('location: '.APP_ROOT);
	}else{
		header('location: '.APP_ROOT.$location);
	}
}

function parse_params(){
	$params = array();
	if(!empty($_POST)){
		$params = array_merge($params, $_POST);
	}
	if(!empty($_GET)){
		$params = array_merge($params, $_GET);
	}
	return $params;
}

function clean_menu($string){
	return str_replace("_", " ", $string);

}

function safeguard_menu($string){
	return str_replace(" ", "_", $string);
}

/**
* Given current subject and current page finds the current page
* @param objects ^
* @return object current_page
*/

function current_page(){
	global $current_subject;
	global $current_page;
	if(isset($current_page)){
		return $current_page;
	}elseif(isset($current_subject)){
		if(isset($current_subject->contained_pages[0])) {
			return $current_subject->contained_pages[0];
		}
	}else{
		return null;
	}

}//********************************************************************

function current_subject(){
	global $current_subject;
	if($current_subject!=null){
		return $current_subject;
	}
}

function find_first_page_id($subject){
	foreach($subject->contained_pages as $page){
		if($page->visible == 1){
			return $page->id;
		}
	}
}

function navigation($subjects, $params){
	global $current_subject;
	global $current_page;
	foreach($subjects as $subject):
	$sub_link = APP_ROOT.'pages/'.safeguard_menu($subject->menu);
	

	echo "<ul>\n";
	$pid = find_first_page_id($subject);
	//echo "<a href = \"$sub_link\"><h2>".$subject->menu."</h2></a>\n";

	if(isset($params['subject']) && clean_menu($params['subject']) ==$subject->menu){
		$current_subject = $subject;

		echo "<a class = \"current_sub\" href = \"$sub_link/{$pid}\"><h2>".$subject->menu."</h2></a>\n"; 
		

	foreach($current_subject->contained_pages as $page):
			$pg_link = APP_ROOT.'pages/'.safeguard_menu($subject->menu).DS.$page->id;
			if(isset($params['pid']) && $params['pid']==$page->id ){
				$current_page = $page;
				echo "<li><a class=\"current\" href=\"$pg_link\">".$page->menu."</a></li>\n";
				continue;
			}

			echo "<li><a href=\"$pg_link\">".$page->menu."</a></li>\n";

	endforeach;
	}else{
		echo "<a href = \"$sub_link/{$pid}\"><h2>".$subject->menu."</h2></a>\n";
	} 
	echo "</ul>\n";
	endforeach; 
}
//mainlinks is for a footer functionality that I might implement. or not
//just disregard it at this point
function navigation_public($subjects, $params){
	global $current_subject;
	global $current_page;
	global $main_links;
	foreach($subjects as $subject):
	$sub_link = APP_ROOT.'pages/'.safeguard_menu($subject->menu);
	
	if($subject->visible == 1){
		echo "<ul>\n";
		$pid = find_first_page_id($subject);

		if(isset($params['subject']) && clean_menu($params['subject']) ==$subject->menu){
			$current_subject = $subject;
			echo "<a class=\"current_sub\" href = \"$sub_link/{$pid}\"><h2>".$subject->menu."</h2></a>\n";
			$main_links[]="<a class=\"current_sub\" href = \"$sub_link/{$pid}\"><h2>".$subject->menu."</h2></a>";

		foreach($current_subject->contained_pages as $page):
			if($page->visible == 1){
				$pg_link = APP_ROOT.'pages/'.safeguard_menu($subject->menu).DS.$page->id;
				if(isset($params['pid']) && $params['pid']==$page->id ){
					$current_page = $page;
					echo "<li><a class=\"current\" href=\"$pg_link\">".$page->menu."</a></li>\n";
					continue;
				}

				echo "<li><a href=\"$pg_link\">".$page->menu."</a></li>\n";
			}

		endforeach;
		}else{
			echo "<a href = \"$sub_link/{$pid}\"><h2>".$subject->menu."</h2></a>\n";
			$main_links[]="<a href = \"$sub_link/{$pid}\"><h2>".$subject->menu."</h2></a>";
		}
	} 
	echo "</ul>\n";
	endforeach; 
}



 ?>
