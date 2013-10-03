<?php 

class Subject extends DatabaseObject{
	public $id;
	public $menu;
	public $position;
	public $visible;
	public $contained_pages;
	protected static $table_name = "subject";
	public static $columns;



	function __construct(){
		$this->find_all_pages();

	}
	/**
	* *****Find all pages for a subject********
	* An entire function for this because this way I'd be able to put the
	* pages in an array in the subject class where they belong 
	* right from the start
	* @param none 
	* @return object-array
	*/
	public function find_all_pages(){
		global $db;

		$query  = "SELECT * from pages WHERE subject_id = ? order by position";
		$stmt = $db->prepare($query);
		$stmt->execute(array($this->id));
		$this->contained_pages = $stmt->fetchAll(PDO::FETCH_CLASS, 'page');

	}//********************************************************************
		//AND IT FREAKING WORKS**************************************




}



 ?>