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
            <!--receipt preview modal-->
            <div class="modal fade" id="modal-student-receipt-preview" role="modal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header"></div>
                        <div class="modal-body">
                            <div class="container">
                                <img src="" alt="Receipt for this payment seems to be missing." id="payment-receipt-image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--receipt preview modal-->
<!--MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- MAP DATA-->
                                <div class="map-data m-b-40">
                                    <h3 class="title-3 m-b-30">
                                        <i class="zmdi"></i>Report Specific Sudent</h3>
                                    <div class="filters">
                                    <div class="rs-select2--dark rs-select2--sm rs-select2--border">
                                        <input type="number" name="adm" class="form-control" placeholder="Adm No." id="admNo">
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                    <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
                                            <select class="js-select2" name="property" id="paymentFor" onchange="fetchByPayment(this.value);">

                                                <?php
                                                //new instance of payables
                                                $payables = new Payable();
                                                $availablePayables = $payables->getAvailable();
                                                //loop through the available payables
                                                while ($row = mysqli_fetch_array($availablePayables)) {
                                                 ?>
                                                <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                                                <?php 
                                            }
                                                 ?>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--dark rs-select2--sm rs-select2--border">
                                            <select class="js-select2 au-select-dark" name="time" id="bal_report">
                                                <option selected="selected">Balance</option>
                                                <option value="">Report</option>
                                              </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        
                                         <button id="btnSearchOne" class="btn btn-primary pl-3 ml-3" onclick="getReportSpecific()"><i class="fa fa-search"></i> Go</button>
                                    </div>
                                    
                                </div>
                                <!-- END MAP DATA-->
                          
                               <!--table dislay records-->
                               <div class="row">
                               <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <?php 
                                    //log error messages
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
                                       ?>
                                    <table class="table table-borderless table-data3" id="tablResults">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Adm No.</th>
                                                <th>Class</th>
                                                <th>Amount To Be paid</th>
                                                <th>Amount Paid</th>
                                                <th>Balance</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                           <!-- <tr>
                                                <td>Joseph Njenga</td>
                                                <td>13614</td>
                                                <td>4 d</td>
                                                <td>Ksh. 0.00</td>
                                                <td>13614</td>
                                                <td>13614</td>
                                            </tr> -->
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                            </div>
                              <!--table dislay records-->
                            </div>
                        </div>
                        </div>
                       <?php
                       include 'footer.php';                       
                        ?>
                        
