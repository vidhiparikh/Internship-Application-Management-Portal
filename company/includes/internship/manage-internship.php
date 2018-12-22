<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="content-page">

    <?php
    $page_title = "Manage Internship";
    $breadcrumb = "
	<li class='breadcrumb-item'>Internship Management</li>
	<li class='breadcrumb-item active'>Manage Internship</li>";
    include_once("includes/top-bar.php");

    //    $subject = new Subject();

    ?>
    <!-- Start Page content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <div class="pull-left form-row">
                            <div class="form-group">
                                <select id="num-rows-choice" class="custom-select" onchange="loadData()">
                                    <option value="0" selected>Rows Per Page</option>
                                    <option>10</option>
                                    <option>25</option>
                                    <option>50</option>
                                </select>
                            </div>
                        </div>
                        <p class="text-muted font-14 m-b-20 pull-right">
                            <a type="button" href="internship.php?q=add"
                               class="btn btn-primary waves-effect waves-light btn-lg"> <i class="fa fa-plus m-r-5"></i>
                                <span>Add New Internship</span> </a>
                        </p>
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


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->