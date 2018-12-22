<!DOCTYPE html>
<html>
	<?php
	ob_start();
	require_once ("includes/init.php");
	$page="dashboard";
	$title ="Internado | Company";
	$page_title="Internships";
	$breadcrumb = "<li class='breadcrumb-item active'>Welcome to Internship Portal!</li>";
	include_once("includes/head.php");
	Session::startSession();
    if(!Session::isSessionStart()){
		        Functions::redirect("../index_login.php");
    }

    ?>
    <body>

        <!-- Begin page -->
        <div id="wrapper">
			<!--INCLUDING SIDEBAR-->
            <?php include_once("includes/sidebar.php"); ?>
            <?php include_once("includes/top-bar.php"); ?>
            
            <!--INCLUDING MAIN CONTENTS OF THE PAGE-->
            <?php include_once("internship.php"); ?>
            
        </div>
        <!-- END wrapper -->

        <!-- jQuery  -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/popper.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/metisMenu.min.js"></script>
        <script src="../assets/js/waves.js"></script>
        <script src="../assets/js/jquery.slimscroll.js"></script>

        <!-- Dashboard Init -->
        <script src="../assets/pages/jquery.dashboard.init.js"></script>

        <!-- App js -->
        <script src="../assets/js/jquery.core.js"></script>
        <script src="../assets/js/jquery.app.js"></script>

    </body>
</html>