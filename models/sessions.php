<?php 

class Session{

	public $logged_in;
	public $user_id;
	public $message;

	function __construct(){
		session_start();
		$this->check_message();
		$this->check_login();
	}


	public function login($user){
		if($user){
			$this->user_id = $_SESSION['user_id']=$user->id;
			$this->logged_in = true;
		}
	}//********************************************************************

	public function logout(){
		$this->logged_in = false;
		unset($this->user_id);
		unset($_SESSION['user_id']);
	}//********************************************************************

	public function check_login(){
		if(isset($_SESSION['user_id'])){
			$this->user_id = $_SESSION['user_id'];
			$this->logged_in = true;
		}else{
			unset($this->user_id);
			$this->logged_in = false;
		}
	}//********************************************************************

	public function check_message(){
		if(isset($_SESSION['message'])){
			$this->message = $_SESSION['message'];
			unset($_SESSION['message']);
		}else{
			$this->message="";
		}
	}//********************************************************************

	public function message($msg=""){
		if(!empty($msg)){
			$_SESSION['message']=$msg;
		}else{
			return $this->message;
		}
	}//********************************************************************


}
$session = new Session();

 ?>
