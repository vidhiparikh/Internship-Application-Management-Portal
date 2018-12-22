<?php
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
		public function readRecords($tableName){
			$result_set = $this->connection->query("SELECT * FROM $tableName");
			return $result_set;
		}
		public function readRelatedInternships($id){
			//$id=$_SESSION['user_id'];
			$result_set = $this->connection->query("Select * from internship where user_id = $id ");
			return $result_set;
		}
		public function readAllRecordsWithCondition($tableName,$condition,$anothertable, $id)
    	{
			//$user=$_SESSION['user_id'];
			$user=6;
			$result_set=$this->connection->query("select s.student_first_name, s.student_last_name, s.course, a.application_id,a.internship_id from student s inner join application a on s.student_id=a.student_id where s.student_id in ( select student_id from application where internship_id in ( select internship_id from internship where user_id=$id)) and a.approval_status!='approved'");
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