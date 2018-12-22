<?php
/*
	include_once("../classes/Database.php");
    require_once("../classes/Session.php");*/
	include_once("GeneralFunctions.php");
	include_once("Database1.php");
	class Apply extends GeneralFunctions{
		private $connection;
		public $recordsPerPage;
		private $tableName;
		public function __construct(){
			
			parent::__construct();
			global $database;
			$this->connection=$database->getConnection();
			$this->recordsPerPage=2;
			$this->tableName="application";
            if(!isset($_SESSION['login'])){
                session_start();
            }
		}
		public function updateApprove($id){
			$current_date = date("Y-m-d");
			$query="UPDATE application SET approval_status = 'approved', approve_date = '$current_date' WHERE application_id=$id";
			$this->connection->query($query);
		}
		public function deleteApplication($bid){
			$current_date = date("Y-m-d h:i:sa");
			$deleted=1;
			$deleted_by=$_SESSION['member_id'];
			$sql="UPDATE application SET deleted = $deleted WHERE id=$bid";
			$this->connection->query($sql);
		}
		public function displayRecordsWithPagination($records_per_page, $id){
			echo "<table class='table'>
                            <thead class='thead-light'>
                            <tr>
                                <th>SrNo</th>
								<th>Name</th>
								<th>Last Name</th>
								<th>Course</th>
								<th>Internship ID</th>
								<th>Approve</th>
								
                            </tr>
                            </thead>
                            <tbody>";
                            if(isset($_POST['page'])){
                                $page = $_POST['page'];
                            }else{
                                $page=1;
                            }
                            if($page=="" || $page == 1){
                                $limit_start = 0;
                            }else{
                                $limit_start = ($page * $records_per_page) - $records_per_page;
                            }
							$condition="";
                            $total_records = $this->getTotalRecordsCountWithCondition($this->tableName,$condition, "student");							
                            $num_of_pages = ceil($total_records/$records_per_page);
                            $result_set = $this->readAllRecordsWithCondition($this->tableName,$condition,"student",$id);							
                            $sr_no = $records_per_page * $page - $records_per_page + 1;
                            while ($row = mysqli_fetch_assoc($result_set)) {
                                $id=$row['application_id'];
								?>
                                <tr>
									<th scope="row"><?php echo $sr_no; ?></th>
                                    <td><?php echo $row['student_first_name']; ?></td>
                                    <td><?php echo $row['student_last_name']; ?></td>
                                    <td><?php echo $row['course']; ?></td>                                  
                                    <td><?php echo $row['internship_id']; ?></td>                                  
                                    <td>
                                        <div class="button-list">
                                           
                                            <a type="button"
                                               class="btn btn-icon waves-effect waves-light btn-danger approve-record"
                                               data-toggle="tooltip" title="Approve Application!"
                                               data-record-id="<?php echo $id; ?>"> <i class="fa fa-check"></i> </a>
                                        </div>
                                    </td>
                                    
                                </tr>
                                <?php
                               $sr_no++;
                            }//end of while
                            ?>
                           
                            </tbody>
                        </table>
                        <hr>
                        

                        </ul>
        <?php
 
		}
        public function getRelatedInternships($internship_id, $duration){
            $result = $this->connection->query("SELECT * FROM internships where internship_id=$internship_id or duration=$duration");
            $options="";
            while($row = mysqli_fetch_assoc($result)){
                extract($row);
                $options .= "<option value= '$id'>$name</option>";
            }
            echo $options;
        }
        }
		
	
	?>
	
