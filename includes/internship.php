<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<?php
ob_start();
require_once ("includes/init.php");
Session::startSession();
    User::checkActiveSession();
	include_once("includes/head.php");
	$page_title = "Dashboard";
	$breadcrumb = "<li class='breadcrumb-item active'>Welcome to Internship Portal!</li>";
	include_once("top-bar.php");
	$internship = new Internship();
?>
<div class="content-page">

	

	<!-- Start Page content -->
	<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                       <div class="pull-left form-row">
							<div class="form-group">
								<select id="num-rows-choice" class="custom-select" onchange="loadData();">
									<option value="0" selected>Rows Per Page</option>
									<option>10</option>
									<option>25</option>
									<option>50</option>
								</select>
							</div>
							<div class="form-group">
								<input type="text" class="form-control"placeholder="Search"name="key" id="key" onkeyup="search(this.value)" style="margin-left: 10px;" >
							</div>
						
						</div>
                        
					<?php 
						Session::startSession();
						$user_id = $_SESSION['user_id'];?>
                            <div class="form-group col-md-6">
                                <input type="hidden" class="form-control" name="user_id" id="id" value="<?php echo $user_id;?>"/>
                            </div>	
                    <div id="internship-info">
                    	
                    </div>
                    </div>

                </div>

            </div>
            <!-- end row -->

        </div>
        <!-- container -->

    </div>
    <!-- content -->

    <?php include_once("includes/footer.php"); ?>

</div>

 <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <!-- Parsley js USED FOR VALIDATION-->
        <script type="text/javascript" src="plugins/parsleyjs/parsley.min.js"></script>
        <!--SweetAlert is used for creating user friendly modal -->
		<script src="plugins/sweet-alert/sweetalert2.min.js"></script>

        <!-- Dashboard Init -->
        <script src="assets/pages/jquery.internship.init.js"></script>
        <script src="plugins/Code7-toastr/build/toastr.min.js"></script>
        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <?php include_once("includes/scripts/show-notifications.php");?>
   

	
	<!-- content -->

	




<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->
