<?php 



switch($route['view']){
	case "show":
		if(isset($params['subject']) && $params['subject']==='toggle'){
			if(isset($_SESSION['user_id'])){
				unset($_SESSION['user_id']);
			}else{
				$_SESSION['user_id']=1;
			}
			$session->check_login();
			$url ='pages';
			redirect_to($url);
		}
		$current_page = null;
		$current_subject = null;
		$subjects = Subject::find_all();

		
	break;

	case "edit":
		$subjects = Subject::find_all();
	break;

	case "new":
		$subjects = Subject::find_all();

	break;

	case "create":
		$subjects = Subject::find_all();
		

	break;

	case "process":
		$array=array();
		if(isset($params['post'])){
			foreach($params['post'] as $key=>$value){
				$array[]=$value;
			}
		}
		$subjects = Subject::find_all();

	break;
}



 ?>