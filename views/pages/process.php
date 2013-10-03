<?php 

if($params['process']=='editing' && $params['direction']=='subject'){
	$subject = new Subject();
	$bool = $subject->update($array, $current_subject->id);
	//finding current_subject again because apparantly the 
	//object value don't refresh instantly
	if($bool){
		$session->message("Success. Subject was edited successfully.");
		$temp_sub = Subject::find_by_id($current_subject->id);
		$pid = find_first_page_id($temp_sub);
		$url = 'pages'.DS.safeguard_menu($temp_sub->menu).DS.$pid;
		redirect_to($url);
	}else{
		$session->message("Failure. Failed to edit subject.");
	}

}elseif($params['process']=='editing' && $params['direction']=='page'){
	$page = new Page();
	$id = $params['current_page_id'];
	$bool = $page->update($array, $id);
	if($bool){
		$session->message("Success. Page was edited successfully.");
		$url = 'pages'.DS.safeguard_menu($current_subject->menu).DS.$id;
		redirect_to($url);
	}else{
		$session->message("Failure. Failed to edit subject.");

	}

}elseif($params['process']=='deleting' && $params['direction']=='delete_subject'){
	$subject = new Subject();
	$bool=$subject->delete($params['subject_id']);
	if($bool){
		$session->message("Subject deleted successfully.");
		redirect_to(APP_ROOT);
	//echo $params['subject_id'];
	}else{
		$session->message("Subject deletion failed.");
	}
}elseif($params['process']=='deleting' && $params['direction']=='delete_page'){
	$page = new Page();
	$bool=$page->delete($params['page_id']);
	if($bool){
		$session->message("Page deleted successfully.");
		$url = APP_ROOT.'pages'.DS.safeguard_menu($current_subject->menu);
		redirect_to($url);
	}else{
		
		$session->message("Page deletion failed.");
	}
}


 ?>