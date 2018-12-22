<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="content-page">

	<?php
	$page_title = "Manage Application";
	$breadcrumb = "
	<li class='breadcrumb-item'>Application Management</li>
	<li class='breadcrumb-item active'>Manage Application</li>";
	include_once("includes/top-bar.php");
	$apply = new Apply();
	
	?>

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
	
                    <div id="application-info">
                    	
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


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->
