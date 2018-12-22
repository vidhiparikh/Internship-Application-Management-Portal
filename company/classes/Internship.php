<?php
include_once("Database1.php");
include_once("GeneralFunctions.php");
class Internship extends GeneralFunctions
{
    private $connection;
    public $recordsPerPage;
    private $tableName;
    public function __construct()
    {
        parent::__construct();
        global $database;
        $this->connection = $database->getConnection();
        $this->recordsPerPage = 2;
        $this->tableName = "internship";
    }
    public function insert($name, $duration, $stipend, $skills, $no_ofstudents, $user_id, $user_role)
    {
		if($user_role == 2){
			$type='company';
		}
		else{
			$type='college';
		}
        $query = "INSERT INTO $this->tableName(name, duration, stipend, type, skills, no_ofstudents, user_id) VALUES (?, ?, ?, ?, ?, ?, ?)";

        $preparedStatement = $this->connection->prepare($query);
        $preparedStatement->bind_param("sssssii", $name, $duration, $stipend, $type, $skills, $no_ofstudents, $user_id);
        if ($preparedStatement->execute()) {
            return $this->connection->insert_id;
        } else {
            die("error while inserting record in $this->tableName".$preparedStatement->error);
        }
    }




    
    public function displayRecordsWithPagination($records_per_page, $id){
			echo "<table class='table'>
                            <thead class='thead-light'>
                            <tr>
                                <th>SrNo</th>
								<th>Name</th>
								<th>Duration</th>
								<th>Stipend</th>
								<th>Skills</th>
								<th>No Of Students</th>
								<th>ID</th>
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
							}
                            $total_records = $this->getTotalRecordCount($this->tableName);
                            $num_of_pages = ceil($total_records/$records_per_page);
							//$id=$_SESSION['user_id'];
                            $result_set = $this->readRelatedInternships($id);
                            $sr_no = $records_per_page * $page - $records_per_page + 1;
                            while ($row = mysqli_fetch_assoc($result_set)) {
                               // $id = $row['id'];
								?>
                                <tr>
									<th scope="row"><?php echo $sr_no; ?></th>                 <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['duration']; ?> months</td>
                                    <td><?php echo $row['stipend']; ?></td>
                                    <td><?php echo $row['skills']; ?></td>
                                    <td><?php echo $row['no_ofstudents']; ?></td>
                                    <td><?php echo $row['internship_id']; ?></td>
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
	
