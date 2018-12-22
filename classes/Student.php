<?php
	include_once("Database.php");
	require_once("Session.php");
	require_once("Functions.php");
	class Student{
        private $connection;
        public function __construct(){
            global $database;
            $this->connection=$database->getConnection();
            Session::startSession();
			$this->tableName="student";
        }
		public function firstLogin($email){
			
			
			$query = "SELECT first_login,student_first_name,student_id FROM student WHERE user_id=(Select user_id from users WHERE user_email = ?)";
			$preparedStatement = $this->connection->prepare($query);
			$preparedStatement->bind_param("s", $email);//s stands for string,i for integer,d for double, b for blob.
			$preparedStatement->execute();
			
			$preparedStatement->store_result();//database ke saare columns locally leke aayega.method of php 7
			
			$count = $preparedStatement->num_rows;//store_result chala to hi num_rows will display value.
			if($count==1){
				$preparedStatement->bind_result($first_login,$student_first_name,$student_id);
				$preparedStatement->fetch();
				if($first_login == 0){
					$_SESSION['student_id']=$student_id;
					$_SESSION['student_name']=$student_first_name;
					return true;
				}else{
					return false;
				}
			}//method of php 7
			
		}
		
		public function getStudentId($user_id){
			$sql = "SELECT student_id FROM student WHERE user_id = $user_id";
			$result_set = $this->connection->query($sql);
			if(mysqli_num_rows($result_set) > 0){
				if($row = mysqli_fetch_assoc($result_set)){
					return $row['student_id'];
				}
			}
		}
		
		public function insert($year_of_study, $semester, $course, $branch, $division, $student_rollno, $cv, $parent_first_name, $parent_email, $parent_gender, $proctor, $hod, $user_id){
			$student_id = $this->getStudentId($user_id);
			$query = "Insert into parents (parent_first_name, parent_email, parent_gender) values(?, ?, ?)";
				if(!$preparedStatement = $this->connection->prepare($query)){
					die($this->connection->error);
				}
				$preparedStatement->bind_param("sss", $parent_first_name, $parent_email, $parent_gender);
				if($preparedStatement->execute()){
					$pid = $this->connection->insert_id;
					$query = "insert into guardian (sid, parent_id, proctor_id, hod_id) values(?, ?, ?, ?)";
					if(!$preparedStatement = $this->connection->prepare($query)){
						die($this->connection->error);
					}
			
					$preparedStatement->bind_param("iiii", $student_id, $pid, $proctor, $hod);
					if($preparedStatement->execute()){
						$query = "UPDATE student SET student_rollno = ?, year_of_study = ?, semester = ?, course = ?, branch = ?, division = ?, student_cv = ?, first_login = ? WHERE student_id = ?";
						if(!$preparedStatement = $this->connection->prepare($query)){
							die($this->connection->error);
						}
						$first_login = 1;
						$preparedStatement->bind_param("isisissii", $student_rollno, $year_of_study, $semester, $course, $branch, $division, $cv, $first_login, $student_id);
						if($preparedStatement->execute()){
							return $this->connection->insert_id;
						}
						else{
							die("ERROR WHILE INSERTING Application ".$this->connection->error);
						}

					}else{
						die("ERROR WHILE Updating Guardian ".$this->connection->error);
					}
				}else{
					die("ERROR WHILE Updating Parent ".$this->connection->error);
				}
						
		}
		public function update($id, $student_contactno, $year_of_study, $semester, $course, $branch, $division, $student_rollno, $cv, $parent_first_name, $parent_email, $parent_gender, $proctor, $hod){
			$query = "Update parents set parent_first_name = ?, parent_email = ?, parent_gender = ? where pid in (select parent_id from guardian where sid in ( select student_id from student where user_id = $id))";
				if(!$preparedStatement = $this->connection->prepare($query)){
					die($this->connection->error);
				}
				$preparedStatement->bind_param("sss", $parent_first_name, $parent_email, $parent_gender);
				if($preparedStatement->execute()){
					$pid = $this->connection->insert_id;
					$query = "Update guardian set proctor_id = ?, hod_id = ? where sid in ( select student_id from student where user_id = $id)";
					if(!$preparedStatement = $this->connection->prepare($query)){
						die($this->connection->error);
					}
			
					$preparedStatement->bind_param("ii", $proctor, $hod);
					if($preparedStatement->execute()){
						return $this->connection->insert_id;
					}
					else{
						die("ERROR WHILE Updating Guardian ".$this->connection->error);
					}
				}
				else{
					die("ERROR WHILE Updating Parent ".$this->connection->error);
				}
			$query = "UPDATE $this->tableName SET student_contactno = ?, student_first_name = ?, year_of_study = ?, semester = ?, course = ?, branch = ?, division = ?, cv = ?, student_rollno = ?, first_login = 1 WHERE student_id = $id";
			if(!$preparedStatement = $this->connection->prepare($query)){
				die($this->connection->error);
			}
			$preparedStatement->bind_param("sssisissi", $student_contactno, $student_first_name, $year_of_study, $semester, $course, $branch, $division, $cv, $student_rollno);
			if($preparedStatement->execute()){
				return $this->connection->insert_id;
				
			}
			else{
				die("ERROR WHILE INSERTING Application ".$this->connection->error);
			}

			
		}
		public function getAllDetailsByID($id){
			$result_set = $this->connection->query("select * from student s inner join parents pa inner join  guardian g inner join  proctor p inner join hod h on  s.student_id = g.sid and pa.pid = g.parent_id and p.proctor_id = g.proctor_id and h.hod_id = g.hod_id and g.sid in ( select student_id from student where user_id = $id)");
			return $result_set;
		}
		public function getFilePath($user_id){
			$result_set = $this->connection->query("SELECT student_cv FROM student WHERE user_id = $user_id");
			return $result_set;
		}
	}?>
		
