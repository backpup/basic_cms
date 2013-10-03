<?php 

if(!isset($params['pid'])){
//preparing the array to be passed in to the object create function
	$array=array();
	foreach($params['post'] as $key=>$value){
		$array[]=$value;
	}
	$subject = new Subject();
	$sub_id=$subject->create($array);
	if($sub_id){
		$session->message("Success. A new subject was added.");
		redirect_to(APP_ROOT);
	}else{
		$session->message("Failure. Failed to add a new subject.");
	}

}else{
	$array=array();
	foreach($params['post'] as $key=>$value){
		$array[]=$value;
	}

	$page = new Page();
	$page_id = $page->create($array);
	if($page_id){
		$session->message("Success. A new page was added.");
		$addr = 'pages'.DS.safeguard_menu($current_subject->menu).DS.$page_id;
		redirect_to($addr);
	}else{
		$session->message("Failure. Failed to add a new page.");
	}

}
 ?>
