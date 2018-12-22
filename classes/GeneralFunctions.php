<?php
		include_once("Database.php");
class GeneralFunctions{
		private $connection;
		public function __construct(){
			global $database;
			$this->connection=$database->getConnection();
		}
			public function getTotalRecordCount($tableName){
				$sql = "SELECT count(*) AS total_count from $tableName";
				$result_set = $this->connection->query($sql);
				if($row = mysqli_fetch_assoc($result_set)){
					return $row['total_count'];
				}else{
					die("Error while Fetching total count of students");
				}
		}
		
		public function getTotalRecordsCountWithCondition($tableName,$condition,$anothertable){
				$sql = "SELECT count(*) AS total_count from $tableName,$anothertable WHERE deleted=0 ".$condition;
				$result_set = $this->connection->query($sql);
				if($row = mysqli_fetch_assoc($result_set)){
					return $row['total_count'];
				}else{
					die("Error while Fetching total count of records");
				}
		}
		public function readRecords($condition){
			$result_set = $this->connection->query("SELECT * FROM internship".$condition);
			return $result_set;
		}	
		public function readAllRecordsWithCondition($tableName,$condition,$anothertable,$id)
    	{
        	$result_set = $this->connection->query("select i.name, i.duration, i.stipend, a.approval_status, a.apply_date, a.approve_date, a.application_id from application a inner join internship i where a.internship_id = i.internship_id and a.student_id in ( select student_id from student where user_id = $id)");
        	return $result_set;
		}
		public function getAllDetailsById($tableName, $id){
			$sql="Select * FROM $tableName where id=$id";
			$result_set=$this->connection->query($sql);
			if($this->connection->error){
				echo $this->connection->error;
			}
			return($result_set);
		}

}
?>