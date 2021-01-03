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
            <!--modal for receipt preview-->
            <div class="modal" role="modal" id="modal_receipt_preview">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header"></div>
                        <div class="modal-body">
                            <div class="container">
                                <img src="receipts/bf234d4237e3c8480c01.jpeg" alt="Receipt for this payment seems to be missing." id = "receipt_image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--modal for receipt preview-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- MAP DATA-->
                                <div class="map-data m-b-40">
                                    <h3 class="title-3 m-b-30">
                                        <i class="zmdi"></i>Overall Report</h3>
                                    <div class="filters">
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
                                                <option selected="selected">Report</option>
                                                <option value="">Balance</option>
                                              </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        
                                         <button class="btn btn-primary pl-3 ml-3" id="btnGetOverall" onclick="getOverall()"><i class="fa fa-search"></i> Go</button>
                                    </div>
                                    
                                </div>
                                <!-- END MAP DATA-->
                               <!--table display records-->
                               <div class="row">
                               <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3" id="tableResult">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Adm No.</th>
                                                <th>Class</th>
                                                <th>Amount</th>
                                                <th>Time</th>
                                                <th>Receipt</th>
                                             </tr>
                                        </thead>
                                        
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                            </div>
                             <!--table display records-->
                             <div class="container mt-0 pb-5 pr-5 pl-5" id="paymentSummary">
                                <h3 class="text-center pb-3">Payment Summary</h3>
                             <div class="row">
                            <div class="col-md-8">
                                     <b>Total Amount To Be Paid:</b>
                                    </div>
                                    <div class="col-md-4">
                             <i>Ksh.</i><input type="number" name="" id="totalAmt" class="form-control"> 
                            </div>
                            <div class="col-md-8">
                                    <b>Total Amount Paid:</b>
                                </div>
                                <div class="col-md-4">
                              <i>Ksh.</i><input type="number" name="" id="amtPaid" class="form-control"> 
                            </div>
                             <div class="col-md-8">
                                     <b>Balance:</b>
                                </div>
                                <div class="col-md-4">
                               <i>Ksh.</i><input type="number" name="" id="balance" class="form-control"> 
                            </div>
                             </div>

                             </div>
                            </div>
                        </div>
                        
                        </div>
                        <?php
                        include 'footer.php';
                        ?>