<?php 

class MySQLDatabase{

	public $db;

	function __construct(){
		 $this->open_connection();
	}

	public function open_connection(){
		$DSN = 'mysql:host=localhost;dbname=webdev';
		try{
			$this->db = new PDO($DSN, 'removed', 'removed', array(PDO::ATTR_EMULATE_PREPARES=>false,
														PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
		} catch (PDOException $e){
			echo "There was an error".$e->getMessage();
			die();
		}
	}



}



$connection = new MySQLDatabase();
$db = $connection->db;

 ?>
