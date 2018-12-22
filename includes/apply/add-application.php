<?php
	if(isset($_POST['add_application'])){
		extract($_POST);
		$apply=new Apply();
		$apply->insert($_SESSION['user_id'], $id);
		Functions::redirect("apply.php");
	}
	if(isset($_GET['id'])){
				$id = $_GET['id'];
	}
?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="content-page">

	<?php
	$page_title = "Add Application";
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
							<form class="" action="" name="add_application" id="add_application" method="POST">
							<h4>Application Details</h4>
							<?php Session::startSession();
						$user_id = $_SESSION['user_id'];?>
							<div class="form-row">	
								<div class="form-group col-md-6">
									<label for="internship_id">Internship ID</label>
									<input type="text" class="form-control" id="internship_id" name="internship_id" required disabled value="<?php echo $id;?>"/>
								</div>
                                                           </div>
								<div class="form-group">
									<div>
										<button type="submit" class="btn btn-custom waves-effect waves-light" name="add_application">
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
