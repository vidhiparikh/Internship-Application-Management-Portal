<?php
	include_once("Database.php");
    require_once("Session.php");
	include_once("GeneralFunctions.php");
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
		/*public function readInternship(){
			$result_set = $this->connection->query("SELECT * FROM internship");
			return $result_set;
		}*/
		public function delete($bid){
			$deleted=1;
			$sql="UPDATE application SET deleted = $deleted WHERE application_id=$bid";
			$this->connection->query($sql);
		}
		public function insert($user_id, $internship_id){
			$result_set = $this->connection->query("Select student_id from student where user_id = $user_id");
			while($row = mysqli_fetch_assoc($result_set)){
			$student_id = $row['student_id'];
			$current_date=date("Y-m-d");
			$query = "INSERT INTO $this->tableName (student_id, internship_id, apply_date) VALUES(?, ?, ?)";
			if(!$preparedStatement = $this->connection->prepare($query)){
				die($this->connection->error);
			}
			
			$preparedStatement->bind_param("iis", $student_id, $internship_id, $current_date);
			if($preparedStatement->execute()){
				return $this->connection->insert_id;
			}
			else{
				die("ERROR WHILE INSERTING Application ".$this->connection->error);
			}
			
		}
		}
		
		
		
		
		
		public function displayRecordsWithPagination($records_per_page, $id){
			echo "<table class='table'>
                            <thead class='thead-light'>
                            <tr>
                                <th>SrNo</th>
								<th>Name</th>
                                <th>Approval Status</th>
								<th>Duration</th>
								<th>Stipend</th>
								<th>Apply Date</th>
								<th>Approve Date</th>
								<th>Upload files</th>
                                
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
							if(isset($_POST['key'])){
								$key=$_POST['key'];
								$condition="AND (name like '%$key%' or duration like '%$key%') ";
							}else{
								$key="jpmc";
								$condition="AND (name like '%$key%' or duration like '%$key%') ";
							}
                            $total_records = $this->getTotalRecordsCountWithCondition($this->tableName, $condition,"internship");
							//$total_records = $this->getTotalRecordCount($this->tableName);
                            $num_of_pages = ceil($total_records/$records_per_page);
                            $result_set = $this->readAllRecordsWithCondition($this->tableName, $condition,"internship", $id);
							//$result_set = $this->readRecords($this->tableName);
                            $sr_no = $records_per_page * $page - $records_per_page + 1;
                            while ($row = mysqli_fetch_assoc($result_set)) {
                                $id = $row['application_id'];
								?>
                                <tr>
									<th scope="row"><?php echo $sr_no; ?></th>
                                    <td><?php echo $row['name']; ?></td>
                                    <td class="approval_status"><?php echo $row['approval_status']; ?>
                                    </td>
                                    <td><?php echo $row['duration']; ?> months</td>
                                    <td><?php echo $row['stipend']; ?></td>
                                    <td><?php echo $row['apply_date']; ?></td>
                                    <?php if ($row['approval_status'] != 'approved'){ ?>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <!--<div class="button-list">
                                           
                                            <a type="button"
                                               class="btn btn-icon waves-effect waves-light btn-danger delete-record"
                                               data-toggle="tooltip" title="Delete Application!"
                                               data-record-id="<?php echo $id; ?>"> <i class="fa fa-remove"></i> </a>
                                        </div>
-->                                    </td>
                                    <?php }
									else{?>
									<td><?php echo $row['approve_date']; ?></td>
                               		<td><a class="btn btn-primary" href="upload.php">Upload feedback form</a></td>
                               		<?php } ?>
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
        
		
	}
	?>
	
