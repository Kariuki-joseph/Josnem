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
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- MAP DATA-->
                                <div class="map-data m-b-40">
                                    <h3 class="title-3 m-b-30">
                                        <i class="zmdi"></i>Reports All Students</h3>
                                    <div class="filters">
                                    <div class="rs-select2--dark rs-select2--sm rs-select2--border">
                                            <select class="js-select2 au-select-dark" name="time" id="class">
                                                <option selected="selected" value="any">Any Class</option>
                                                <?php
                                                for ($i=1; $i < 9; $i++) { 
                                                    if($i < 5){
                                                        echo '<option>Grade '.$i.'</option>';
                                                    }else{
                                                        echo '<option>Class '.$i.'</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
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
                                            <select class="js-select2 au-select-dark" name="time" id="condition" onchange="fetchByCondition(this.value);">
                                                <option selected="selected" value=">">Greater than</option>
                                                <option value="=">Equal to</option>
                                                <option value="<">Less than</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--dark rs-select2--sm rs-select2--border">
                                            <input type="number" name="amount" class="form-control" placeholder="Amt. e.g. 2000" id="amount">
                                            <div class="dropDownSelect2"></div>
                                        </div>

                                        <button class="btn btn-primary pl-3 ml-3" id="btnSearchAll"><i class="fa fa-search"></i> Go</button>
                                    </div>
                                    
                                </div>
                                <!-- END MAP DATA-->
                               <!--table dislay records-->
                               <div class="row">
                               <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3" id="tblResults">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Adm No.</th>
                                                <th>Class</th>
                                                <th>Amount</th>
                                             </tr>
                                        </thead>
                                        <tbody id="reportData">
                                        <!-- <tr>
                                            <td>Joseph Njenga</td>
                                            <td>13614</td>
                                            <td>4D</td>
                                            <td>KSH 400</td>
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