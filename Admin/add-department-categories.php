<?php
include 'header.php';
?>

<body class="animsition">
    <div class="page-wrapper">

        <?php
include 'headerMobile.php';
include 'menuSideBar.php';
        ?>
        
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <?php
            include 'headerDesktop.php';
            ?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">Add Gallery Items Categories</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2"></h3>
                                        </div>
                                        <hr>
                                        
                                            <div class="form-group">
                                                <label for="cc-categoryName" class="control-label mb-1">Department Name</label>
                                                <input id="cc-deptCategoryName" name="category" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Department name">
                                            </div>
                                            <div>
                                                <button id="add-categories-button" class="btn btn-lg btn-info btn-block" name="add_gallery_category" onclick="addDepartmentCategory()">
                                                    <i class="fa fa-paper-plane fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Add</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
                                            </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Available</strong> Categories
                                    </div>
                                    <div class="card-body card-block">
                                       <ol class="container-fluid" id="availCategories">
                                        <?php
                                        //new instance of department
                                        $dept = new Department();
                                        $departments = $dept->getAvailable();

                                        while ($department = mysqli_fetch_array($departments)) {
                                        ?>
                                          	<li>
                                          	<?php echo $department['name']; ?>
                                          	</li>
                                          <?php
                                      }
                                          ?> 
                                       </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        include 'footer.php';
                        ?>