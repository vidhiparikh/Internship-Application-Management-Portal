<?php
ob_start();
require_once ("includes/init.php");
include_once ("classes/Student.php");
include_once ("classes/Functions.php");
Session::startSession();
    User::checkActiveSession();
	if(isset($_POST['update_student'])){
		$cv = $_FILES["fileToUpload"]['name'];
        $cv_temp = $_FILES["fileToUpload"]["tmp_name"];
        move_uploaded_file($cv_temp, "assets/cv/$cv");
		extract($_POST);
		$student=new Student();
		if(empty($fileToUpload)){
			$result_set = $student->getFilePath($_SESSION['user_id']);
			if($row=mysqli_fetch_assoc($result_set)){
			extract($row);
			$cv = $row['student_cv'];
			}
		}
		$hod = 1;
		//echo $cv;
		$student->update($_SESSION['user_id'], $student_contactno, $year_of_study, $semester, $course, $branch, $division, $student_rollno, $cv, $parent_first_name, $parent_email, $parent_gender, $proctor, $hod);
		//Functions::redirect("index.php");
	}
	$page = "apply";
	$title ="Internado | Manage Profile";
	include_once("includes/head.php");
	$id = $_SESSION['user_id'];
	$student = new Student();
	$result_set = $student->getAllDetailsByID($id);
	if($row=mysqli_fetch_assoc($result_set)){
		extract($row);
    ?>
    <body>

        <!-- Begin page -->
        
			<!--INCLUDING SIDEBAR-->
            <?php include_once("includes/sidebar.php"); ?>
            <div class="content-page">

	<?php
	$page_title = "Manage Application";
	$breadcrumb = "
	<li class='breadcrumb-item'>Application Management</li>
	<li class='breadcrumb-item active'>Add Application</li>";
	include_once("includes/top-bar.php");
	?>
		<!-- Start Page content -->
		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="card-box">
							<form class="" action="" name="add-application" id="add-application" method="POST">
							<h4>Application Details</h4>
							
							<div class="form-row">
							<div class="form-group col-md-6">
									<label for="student_name">Student Name</label>
									<input type="text" class="form-control" name="student_name" id="student_name" required disabled value="<?php echo $student_first_name;?>"/>
								</div>
								<div class="col-md-6 form-group">
									<label for="student_rollno">Roll No</label>
									<input type="number" class="form-control" name="student_rollno" id="student_rollno" value="<?php echo $student_rollno;?>" required>
								</div>
								<div class="col-md-6 form-group">
									<label for="student_contactno">Contact No</label>
									<input type="number" class="form-control" name="student_contactno" id="student_contactno" value="<?php echo $student_contactno;?>" required>
								</div>

								<div class="form-group col-md-6">
                                    <label for="year_of_study">Year Of Study</label>
                                    <select name="year_of_study" id="year_of_study" class="form-control">
                                        <option value="1" <?php if($year_of_study == 1) echo 'selected';?>>FY</option>
                                        <option value="2" <?php if($year_of_study == 2) echo 'selected';?>>SY</option>
                                        <option value="3" <?php if($year_of_study == 3) echo 'selected';?>>TY</option>
                                        <option value="4" <?php if($year_of_study == 4) echo 'selected';?>>LY</option>
                               </select>
                             </div>
                                <div class="form-group col-md-6">
                                    <label for="semester">Semester</label>
                                    <select name="semester" id="semester" class="form-control">
                                        <option value="1" <?php if($semester == 1) echo 'selected';?>>1</option>
                                        <option value="2" <?php if($semester == 2) echo 'selected';?>>2</option>
                                        <option value="3" <?php if($semester == 3) echo 'selected';?>>3</option>
                                        <option value="4" <?php if($semester == 4) echo 'selected';?>>4</option>
                                        <option value="5" <?php if($semester == 5) echo 'selected';?>>5</option>
										<option value="6" <?php if($semester == 6) echo 'selected';?>>6</option>
                               </select>
                             </div>
							<div class="form-group col-md-6">
                                    <label for="course">Course</label>
                                    <select name="course" id="course" class="form-control">
                                        <option value="B Tech" <?php if($course == 'B Tech') echo 'selected';?>>B.Tech</option>
                                        <option value="M Tech" <?php if($course == 'M Tech') echo 'selected';?>>M.Tech</option>
                                        
                               </select>
                             </div>
                              <div class="form-group col-md-6">
                                    <label for="branch">Branch</label>
                                    <select name="branch" id="branch" class="form-control">
                                        <option value="1" <?php if($branch == 1) echo 'selected';?>>Computer Engineering</option>
                                        <option value="2" <?php if($branch == 2) echo 'selected';?>>Electronics & Telecommunication Engineering</option>
                                        <option value="3" <?php if($branch == 3) echo 'selected';?>>Electronics Engineering</option>
                                        <option value="4" <?php if($branch == 4) echo 'selected';?>>Information Technology</option>
                                        <option value="5" <?php if($branch == 5) echo 'selected';?>>Mechanical</option>
                                        
                               </select>
                             </div>
                              <div class="form-group col-md-6">
                                    <label for="division">Division</label>
                                    <select name="division" id="division" class="form-control">
                                        <option value="A" <?php if($division == 'A') echo 'selected';?>>A</option>
                                        <option value="B" <?php if($division == 'B') echo 'selected';?>>B</option>
                                        
                               </select>
                             </div> 
							<div class="form-group col-md-6">
                                    <label for="proctor">Proctor</label>
                                    <select name="proctor" id="proctor" class="form-control">
                                        <option value="1" <?php if($proctor_id == 1) echo 'selected';?>>Bharathi HN</option>
                                        <option value="2" <?php if($proctor_id == 2) echo 'selected';?>>Manish Potey</option>
                                        <option value="1" <?php if($proctor_id == 1) echo 'selected';?>>Rohini Nair</option>
                                        <option value="2" <?php if($proctor_id == 2) echo 'selected';?>>Jyoti Tryambake</option>
                               </select>
                             </div> 
							<div class="form-group col-md-6">
                                    <label for="hod">HOD</label>
                                    <select name="hod" id="hod" class="form-control">
                                        <option value="1" <?php if($hod_id == 1) echo 'selected';?>>Computer Engineering</option>
                                        <option value="2" <?php if($hod_id == 2) echo 'selected';?>>Electronics & Telecommunication Engineering</option>
                                        <option value="1" <?php if($hod_id == 3) echo 'selected';?>>Electronics Engineering</option>
                                        <option value="2" <?php if($hod_id == 4) echo 'selected';?>>Information Technology</option>
                                        <option value="1" <?php if($hod_id == 5) echo 'selected';?>>Mechanical</option>
                                        
                               </select>
                             </div>
                             <div class="col-md-6 form-group">
									<label for="parent_first_name">Parent Name</label>
									<input type="text" class="form-control" name="parent_first_name" id="parent_first_name" value="<?php echo $parent_first_name;?>" required>
								</div>
								<div class="col-md-6 form-group">
									<label for="parent_email">Parent Email</label>
									<input type="text" class="form-control" name="parent_email" id="parent_email" value = "<?php echo $parent_email;?>" required>
								</div>
								<div class="form-group col-md-6">
                                    <label for="parent_gender">Parent gender</label>
                                    <select name="parent_gender" id="parent_gender" class="form-control">
                                        <option value="M" <?php if($parent_gender == 'M') echo 'selected';?>>Male</option>
                                        <option value="F" <?php if($parent_gender == 'F') echo 'selected';?>>Female</option>
                                        
                               </select>
                             </div>
                             
                             <!-- <div class="form-group col-md-12">
                             	<iframe src="assets/cv/<?php echo $row['student_cv']; ?>" frameborder="0" height="600px" width="100%"></iframe>
                             </div> -->
                             <?php } ?>
                             <div class="form-group col-md-12">
								
									<label for="">Upload your CV</label>
								    <input type="file" name="fileToUpload" id="fileToUpload">
								
                             </div>
                            </div>
								<div class="form-group">
									<div>
										<button type="submit" class="btn btn-custom waves-effect waves-light" name="update_student">
                                                    Update Changes
                                        </button>
										<button type="reset" class="btn btn-light waves-effect m-l-5">
                                                    Cancel
                                        </button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
			<!-- container -->

		</div>
		<!-- content -->

		<?php 
			
			include_once("includes/footer.php");?>

</div>
		



