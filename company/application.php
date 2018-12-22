<!DOCTYPE html>
<html>
<?php
ob_start();
include_once("includes/init.php");
$page = "application";
$title ="Internado | Manage Application";
include_once("includes/head.php");
?>

<body>

<!-- Begin page -->
<div id="wrapper">
    <!--INCLUDING SIDEBAR-->
    <?php include_once("includes/sidebar.php"); ?>

    <!--INCLUDING MAIN CONTENTS OF THE PAGE-->
    <?php
            include_once("includes/apply/manage-application.php");
            
    
    ?>

</div>
<!-- END wrapper -->
<!-- jQuery  -->
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/metisMenu.min.js"></script>
<script src="../assets/js/waves.js"></script>
<script src="../assets/js/jquery.slimscroll.js"></script>
<!-- Parsley js USED FOR VALIDATION-->
<script type="text/javascript" src="../plugins/parsleyjs/parsley.min.js"></script>

<!--SWEET ALERT JS for MODALs-->
<script src="../plugins/sweet-alert/sweetalert2.min.js"></script>

<!--Toastr Plugin-->
<script src="../plugins/Code7-toastr/build/toastr.min.js"></script>
<!-- Dashboard Init -->
<script src="../assets/pages/jquery.apply.init.js"></script>


<!-- App js -->
<script src="../assets/js/jquery.core.js"></script>
<script src="../assets/js/jquery.app.js"></script>
<?php include_once("includes/scripts/show-notifications.php");?>
</body>

</html>