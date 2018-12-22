<?php
	include_once ("classes/Student.php");
	include_once ("classes/Functions.php");
	if(isset($_POST['insert_application'])){
		$cv = $_FILES["fileToUpload"]['name'];
        $cv_temp = $_FILES["fileToUpload"]["tmp_name"];
        move_uploaded_file($cv_temp, "assets/cv/$cv");
		
		extract($_POST);
		$student=new Student();
		//echo $cv;
		$student->insert($year_of_study, $semester, $course, $branch, $division, $student_rollno, $cv, $parent_first_name, $parent_email, $parent_gender, $proctor, $hod, $user_id);
		Functions::redirect("index.php");
	}
?>


<?php
ob_start();
require_once ("includes/init.php");

/*if(Session::isUser()){
	Functions::redirect("index_login.php");
}*/
//User::checkActiveSession();
?>
<?php
	Session::startSession();
    User::checkActiveSession();
	$page = "apply";
	$title ="Internado | Manage Profile";
	include_once("includes/head.php");
    ?>
    <body>

        <!-- Begin page -->
        
			<!--INCLUDING SIDEBAR-->
            <!--<?php //include_once("includes/sidebar.php"); ?>-->
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
							<form class="" action="" name="add-application" id="add-application" method="POST" enctype="multipart/form-data">
							<h4>Application Details</h4>
							
							<div class="form-row">
							<div class="form-group col-md-6">
									<label for="student_name">Student Name</label>
									<input type="text" class="form-control" name="student_name" id="student_name" required disabled value="<?php echo $_SESSION['student_name'];?>"/>
								</div>
								<div class="col-md-6 form-group">
									<label for="student_rollno">Roll No</label>
									<input type="number" class="form-control" name="student_rollno" id="student_rollno" required>
								</div>
								<div class="form-group col-md-6">
                                    <label for="year_of_study">Year Of Study</label>
                                    <select name="year_of_study" id="year_of_study" class="form-control">
                                        <option value="1">FY</option>
                                        <option value="2">SY</option>
                                        <option value="3">TY</option>
                                        <option value="4">LY</option>
                               </select>
                             </div>
                                <div class="form-group col-md-6">
                                    <label for="semester">Semester</label>
                                    <select name="semester" id="semester" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
										<option value="6">6</option>
                               </select>
                             </div>
							<div class="form-group col-md-6">
                                    <label for="course">Course</label>
                                    <select name="course" id="course" class="form-control">
                                        <option value="B Tech">B.Tech</option>
                                        <option value="M Tech">M.Tech</option>
                                        
                               </select>
                             </div>
                              <div class="form-group col-md-6">
                                    <label for="branch">Branch</label>
                                    <select name="branch" id="branch" class="form-control">
                                        <option value="1">Computer Engineering</option>
                                        <option value="2">Electronics & Telecommunication Engineering</option>
                                        <option value="3">Electronics Engineering</option>
                                        <option value="4">Information Technology</option>
                                        <option value="5">Mechanical</option>
                                        
                               </select>
                             </div>
                              <div class="form-group col-md-6">
                                    <label for="division">Division</label>
                                    <select name="division" id="division" class="form-control">
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        
                               </select>
                             </div> 
							<div class="form-group col-md-6">
                                    <label for="proctor">Proctor</label>
                                    <select name="proctor" id="proctor" class="form-control">
                                        <option value="1">Bharathi HN</option>
                                        <option value="2">Manish Potey</option>
                                        <option value="1">Rohini Nair</option>
                                        <option value="2">Jyoti Tryambake</option>
                               </select>
                             </div> 
							<div class="form-group col-md-6">
                                    <label for="hod">HOD</label>
                                    <select name="hod" id="hod" class="form-control">
                                        <option value="1">Computer Engineering</option>
                                        <option value="2">Electronics & Telecommunication Engineering</option>
                                        <option value="1">Electronics Engineering</option>
                                        <option value="2">Information Technology</option>
                                        <option value="1">Mechanical</option>
                                        
                               </select>
                             </div>
                             <div class="col-md-6 form-group">
									<label for="parent_first_name">Parent Name</label>
									<input type="text" class="form-control" name="parent_first_name" id="parent_first_name" required>
								</div>
								<div class="col-md-6 form-group">
									<label for="parent_email">Parent Email</label>
									<input type="text" class="form-control" name="parent_email" id="parent_email" required>
								</div>
								<div class="form-group col-md-6">
                                    <label for="parent_gender">Parent gender</label>
                                    <select name="parent_gender" id="parent_gender" class="form-control">
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                        
                               </select>
                             </div>
                             <div class="form-group col-md-12">
								<div class="form-group">
									<label for="">Upload your CV</label>
								    <input type="file" name="fileToUpload" id="fileToUpload">
								</div>
                             </div>
                             <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                            </div>
								<div class="form-group">
									<div>
										<button type="submit" class="btn btn-custom waves-effect waves-light" name="insert_application" id="insert_application">
                                                    Submit
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

		<?php include_once("includes/footer.php");?>
		<!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>

        <!-- Dashboard Init -->
        <script src="assets/pages/jquery.dashboard.init.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

<!--
		<script src="plugins/dropzone/dropzone.js"></script>
-->

</div>



