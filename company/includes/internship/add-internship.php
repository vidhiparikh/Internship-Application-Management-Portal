<?php
if(isset($_POST['add_internship'])){
    extract($_POST);
    $internship = new Internship();
    $internship_id = $internship->insert($name, $duration, $stipend, $skills, $no_ofstudents, $user_id, $user_role);
    echo "done";
    Functions::redirect("internship.php?op=ins&p=success&page=internship");
}
?>


<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="content-page">

    <?php
    $page_title = "Add Internship";
    $breadcrumb = "
	<li class='breadcrumb-item'>Internship Management</li>
	<li class='breadcrumb-item active'>Add Internship</li>";
    include_once("includes/top-bar.php");
    ?>
    <!-- Start Page content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <form class="" method="post" action="#" name="form-add-internship" id="add_subject">
                            <h4>Internship Details</h4>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Internship Name</label>
                                <input type="text" class="form-control" required placeholder="Enter Internship Name" name="name" id="name" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>Internship Duration</label>
                                <input type="text" class="form-control" required placeholder="Enter Internship Duration" name="duration" id="duration" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>Internship Stipend</label>
                                <input type="text" class="form-control" required placeholder="Enter Internship Stipend" name="stipend" id="stipend" />
                            </div>
							<div class="form-group col-md-6">
                                <label>Internship Field</label>
                                <input type="text" class="form-control" required placeholder="Enter Internship Field" name="skills" id="skills" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>Number of intern needed</label>
                                <input type="text" class="form-control" required placeholder="Enter No of students needed" name="no_ofstudents" id="no_ofstudents" />
                            </div>
                            <?php 
								Session::startSession();
								$user_id = $_SESSION['user_id'];
								$user_role = $_SESSION['user_role'];?>
                            <div class="form-group col-md-6">
                                <input type="hidden" class="form-control" name="user_id" id="user_id" value="<?php echo $user_id;?>"/>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="hidden" class="form-control" name="user_role" id="user_role" value="<?php echo $user_role; ?>"/>
                            </div>
							</div>
                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-custom waves-effect waves-light" name="add_internship" id="add_internship">
                                        Submit
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

    <?php include_once("includes/footer.php");?>

</div>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->
