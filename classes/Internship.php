<?php
include_once("Database.php");
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
								<th>Apply</th>
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
								$condition=" WHERE (name like '%$key%' or duration like '%$key%') ";
							}
                            $total_records = $this->getTotalRecordCount($this->tableName);
                            $num_of_pages = ceil($total_records/$records_per_page);
                            $result_set = $this->readRecords($condition);
                            $sr_no = $records_per_page * $page - $records_per_page + 1;
                            while ($row = mysqli_fetch_assoc($result_set)) {
                               $id = $row['internship_id'];
								?>
                                <tr>
									<th scope="row"><?php echo $sr_no; ?></th>                 <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['duration']; ?> months</td>
                                    <td><?php echo $row['stipend']; ?></td>
                                    <td><?php echo $row['skills']; ?></td>
                                    <td><?php echo $row['no_ofstudents']; ?></td>
                                     <td>
                                        <div class="button-list">
                                           
                                            <a type="button"
                                               class="btn btn-icon waves-effect waves-light btn-danger apply-record"
                                               data-toggle="tooltip" title="Approve Application!"
                                               data-record-id="<?php echo $id; ?>" href="apply.php?q=add&id=<?php echo $row['internship_id'];?>"> <i class="fa fa-check"></i> </a>
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
	
      		
	}
	?>
	
