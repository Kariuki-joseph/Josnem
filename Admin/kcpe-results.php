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
                                <?php
                                //logging error and success messages
                                if (isset($_SESSION['error'])) {
                                 ?>
                                 <div class="alert alert-danger">
                                     <a href="#" class="close" data-dismiss="alert">&times</a>
                                     <?php 
                                     echo $_SESSION['error'];
                                     unset($_SESSION['error']);
                                      ?>
                                 </div>
                                 <?php
                             }
                             elseif (isset($_SESSION['success'])) {
                                 ?>
                                 <div class="alert alert-success">
                                     <a href="#" class="close" data-dismiss="alert">&times</a>
                                     <?php 
                                     echo $_SESSION['success'];
                                     unset($_SESSION['success']);
                                      ?>
                                    </div>
                                      <?php
                                  }
                                      ?>
                                 </div>
                                <div class="card container">
                                    <div class="card-header">Add KCPE Result Entry</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2"></h3>
                                        </div>
                                        <hr>
                                        <form method="POST" action="processCrude.php" enctype="multipart/form-data">
                                          <div class="form-group">
                                                <label for="cc-name" class="control-label mb-1">Name</label>
                                                <input id="cc-name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="KCPE Results Name e.g. KCPE 2009">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-position" class="control-label mb-1">KCPE Year</label>
                                                <input id="cc-position" name="year" type="number" class="form-control" aria-required="true" aria-invalid="false" placeholder="KCPE Year e.g. 2009">
                                            </div>
                                            <label>Select kcpe result image</label>
                                             <div class="form-group">
                                                <input type="file" name="photo" class="form-control">
                                            </div>
                                            <div>
                                                <button id="add-kcpe-result" type="submit" class="btn btn-lg btn-info btn-block" name="add_kcpe_result">
                                                    <i class="fa fa-paper-plane fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Submit</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        include 'footer.php';
                        ?>