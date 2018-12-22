<?php
ob_start();
require_once ("includes/init.php");
/*if(Session::isUser()){
	Functions::redirect("index_login.php");
}*/
//User::checkActiveSession();
?>
<?
Session::startSession();
    User::checkActiveSession();
	$page = "apply";
	$title ="Internado | Manage Application";
	include_once("includes/head.php");
    ?>
    <body>

        <!-- Begin page -->
        
			<!--INCLUDING SIDEBAR-->
            <?php include_once("includes/sidebar.php"); ?>
            
            <!--INCLUDING MAIN CONTENTS OF THE PAGE-->
            <?php 
			if(isset($_GET['q'])){
				$q = $_GET['q'];
				$id = $_GET['id'];
			}else{
				$q="default";
			}
				switch ($q)
				{
					case 'add':
						include_once("includes/apply/add-application.php");
						break;
					case 'delete':
						include_once("includes/apply/delete-application.php");
						break;
					default:
						include_once("includes/apply/manage-application.php"); 
						break;
					
				}
			
			
			
			
			
			
			
			?>
            
        
        <!-- END wrapper -->
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
        <script src="assets/pages/jquery.apply.init.js"></script>
        <script src="plugins/Code7-toastr/build/toastr.min.js"></script>
        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <?php include_once("includes/scripts/show-notifications.php");?>
   

    </body>
</html>
