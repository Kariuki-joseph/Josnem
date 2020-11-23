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
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Edit User Details</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Edit User Details</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Name</label>
                                                <input id="cc-name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Name" value="<?php echo $currentUser->getUsername(); ?>">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="email" class="control-label mb-1"> Email</label>
                                                <input id="cc-email" name="email" type="email" class="form-control" data-val="true"
                                                placeholder="Email" value="<?php echo $currentUser->getEmail(); ?>">
                                                </div>

                                                 <div class="form-group">
                                                <label for="phone" class="control-label mb-1"> Phone</label>
                                                <input id="cc-phone" name="phone" type="number" class="form-control" data-val="true"
                                                placeholder="Phone" value="<?php echo $currentUser->getPhone(); ?>">
                                                </div>
                                                <div class="container pl-3 pr-5">
                                                 <div class="row">
                                                <div class="col-sm-6">
                                                <label for="profile_pic" class="control-label mb-1"> Profile Picture</label>
                                                <input id="cc-profile" name="profile_pic" type="file" class="form-control" value="" data-val="true"
                                                >
                                                </div>
                                                <div class="col-sm-4">
                                                    <?php
                                                    if ($currentUser->getProfilePic() != '') {
                                                    ?>
                                                    <img src="<?php echo $currentUser->getProfilePic(); ?>">
                                                    <?php
                                                }else{
                                                    ?>
                                                <img src="images/icon/user.png">
                                                <?php
                                            }
                                                ?>
                                                </div>
                                                <div class="col-sm-2">
                                                    <button class="btn btn-warning">Update profile </button>
                                                </div>
                                              </div>
                                            </div>
                                            <div>
                                                <button id="btnSendUserDetails" type="submit" class="btn btn-lg btn-info btn-block mt-3">
                                                    <i class="fa fa-paper-plane fa-lg"></i>&nbsp;
                                                    <span id="send-button-amount">Update</span>
                                                    <span id="bntSending" style="display:none;">Sending…</span>
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