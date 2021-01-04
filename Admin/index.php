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
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">overview</h2>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Familiarize yourself with Josnem Schools Admin Dashboard Main Features</h4>
                                    </div>
                                    <div class="card-body">
                                        <h5>Add Payment</h5>
                                        <p>This tab helps you to add a new payment plan e.g. for first term 2020 school fees, new trip that the students have to pay etc.</p>

                                        <h5 class="pt-3">Add Upcoming Payments</h5>
                                        <p>This tab helps you to add the payments that need be paid at specific times. Parents can only pay for fees that are only listed in the upcoming section.</p>

                                        <h5 class="pt-3">Reports-All Students</h5>
                                        <p>This tab helps analyse payments and reports from all the students.</p>

                                         <h5 class="pt-3">Report-Specific Student</h5>
                                        <p>This tab helps analyse payments and reports of a specific student.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                      <?php
                       include 'footer.php';
                       ?>