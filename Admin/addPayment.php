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
                                    <div class="card-header">Add Payment</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Add Payment</h3>
                                        </div>
                                        <hr>
                                        <form action="../processCrude.php" method="POST" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Payment Name</label>
                                                <input id="cc-pament" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Payment name">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Payment Amount</label>
                                                <input id="cc-number" name="amount" type="number" class="form-control cc-number identified visa" value="" data-val="true"
                                                    data-val-required="Please enter the payment amount" 
                                                    autocomplete="cc-number" placeholder="Amount to be paid">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="add_payment_method">
                                                    <i class="fa fa-paper-plane fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Submit</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Available</strong> Payments
                                    </div>
                                    <div class="card-body card-block">
                                       <ol class="container-fluid">
                                        <?php
                                        $availPayables = new Payable();
                                        $payables = $availPayables->getAvailable();

                                        while ($pay = mysqli_fetch_array($payables)) {
                                        ?>
                                          <li><?php echo $pay['name']; ?> <b>Ksh. </b><?php echo $pay['amount']; ?></li>
                                          <?php
                                      }
                                          ?> 
                                       </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Upcoming</strong> Payments
                                    </div>
                                    <div class="card-body card-block">
                                        <table cellpadding="10px" class="container container-fluid">
                                            <tr><th></th><th></th></tr>
                                            <?php
                                            $availPayables = new Payable();
                                            $payables = $availPayables->getAvailable();
                                            while ($pay = mysqli_fetch_array($payables)) {
                                                ?>
                                            <tr><td><?php echo $pay['name']; ?></td> 
                                                <td><button class="btn btn-primary" id="btnAddPayable" data-id="<?php echo $pay['id'];?>"><i class="fa fa-plus"></i> Add</button> <button class="btn btn-danger" data-id="<?php echo $pay['id'];?>" id="btnRemovePayable"><i class="fa fa-ban"></i> Remove</button></td></tr>
                                                <?php
                                                }
                                                 ?>
                                        </table>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Available Upcoming</strong> Payments
                                    </div>
                                    <div class="card-body card-block">
                                        <table cellpadding="10px" class="container container-fluid" id="upcoming_payables">
                                            <tr><th>Payment Name</th><th>Amount</th>
                                            </tr>
                                            <?php
                                            $upcoming = new Payable();
                                            $ups = $upcoming->getUpcoming();
                                            while ($up = mysqli_fetch_array($ups)) {
                                            ?>
                                            <tr><td><?php echo $up['name']; ?></td> 
                                            <td class="ml-1">Ksh. <?php echo $up['amount']; ?></td>
                                            <?php
                                        }
                                            ?>
                                            </tr>
                                        </table>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        include 'footer.php';
                        ?>