<?php 
/**
 *version 1.0 of my very basic DB object. All the models will extend this.
 *
 * */
class DatabaseObject{


		//********************************************************************
	/**
	* Gives the columns of the table 
	* @param bool id_pop pops id if true
	* @return array of columns
	*/
	public static function get_columns($id_pop = true){
		global $db;

		$query = $db->prepare("DESCRIBE ".static::$table_name);
		$query->execute();
		$columns=$query->fetchAll(PDO::FETCH_COLUMN);
		if($id_pop){
			array_shift($columns);
			return $columns;
		}else{
			return $columns;
		}
	}//********************************************************************

	/**
	* Stupid function just to facilitate execute(array()) in queries by 
	* outputting questionmarks as placeholders	
	* @param array
	* @return string of questionmarks
	*/

	public function autofill($array){
		$count = count($array);
		$fill = "";
		for($i=1; $i<=$count; $i++){
			$fill .= " ?";
			if($i<$count){
				$fill .= ",";
			}
		}
		return $fill;
	}//********************************************************************

	/**
	* Given an id finds the corresponding record in DB
	* @param string id
	* @return class object
	*/
	
	public static function find_by_id($id){
		global $db;
		$class = get_called_class();

		$query  = "SELECT * from ".static::$table_name." WHERE id=?";
		$stmt = $db->prepare($query);
		$stmt->bindValue(1, $id, PDO::PARAM_INT);
		$stmt->execute();
		$result = $stmt->fetchALL(PDO::FETCH_CLASS, $class);
		$row = array_shift($result);
		return $row;



	}//********************************************************************

	/**
	* Find all results from table
	* @param none 
	* @return object array
	*/
	public static function find_all(){
		global $db;
		$class = get_called_class();

		$query = "SELECT * FROM ".static::$table_name." order by position";
		$stmt  = $db->query($query, PDO::FETCH_CLASS, $class);
		$result = $stmt->fetchAll();
		return $result;

	}//********************************************************************

	public static function num_count($subject_id = null){
		global $db;
		$row_count= 0;
		if(isset($subject_id)){
			$query = 'SELECT COUNT(*) FROM '.static::$table_name;
			$query .= " Where subject_id = '$subject_id'";
		}else{
			$query = 'SELECT COUNT(*) FROM '.static::$table_name;
		}
		$stmt=$db->prepare($query);
		$stmt->execute();
		if($stmt){
			$row_count=$stmt->fetchColumn(0);
		}
		return $row_count;

	}//********************************************************************



	public function create($array){
		global $db;
		$fields = static::get_columns();
		//$input_marks = $this->autofill($fields);

		$query  = "INSERT INTO ".static::$table_name."(";
		$query .= join(", ",$fields);
		$query .= ") VALUES ("; 
		$query .= $this->autofill($fields);
		$query .=")";

		$stmt=$db->prepare($query);
		$stmt->execute($array);
		$affected_rows = $stmt->rowCount();
		if($stmt){
			return $db->lastInsertId();
		}else{
			return false;
		}

	}//********************************************************************

	public function update($array, $id){
		global $db;

		$fields = static::get_columns();
		
		$attribute_pairs = array();
		foreach($fields as $field){
			$attribute_pairs[] = "$field = ?";
		}

		$query  = "UPDATE ".static::$table_name." SET ";
		$query .= join(", ", $attribute_pairs);
		$query .= " WHERE id = $id";

		$stmt=$db->prepare($query);
		$stmt->execute($array);
		$affected_rows = $stmt->rowCount();
		if($stmt){
			return true;
		}else{
			return false;
		}

	}//********************************************************************

	public function delete($id){
		global $db;

		$query = "DELETE from ".static::$table_name." WHERE id = ?";
		$stmt=$db->prepare($query);
		$stmt->bindValue(1, $id, PDO::PARAM_INT);
		$stmt->execute();
		if($stmt){
			return true;
		}else{
			return false;
		}

	}//********************************************************************


}



 ?>
