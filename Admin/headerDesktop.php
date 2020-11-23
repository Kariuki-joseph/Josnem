   <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..."/>
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>
                                       <span class="quantity">0</span>
                                        <div class="mess-dropdown js-dropdown"> <div class="mess__footer">
                                                <a href="#">You have no new messages</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-email"></i>
                                        <span class="quantity">0</span>
                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__title">
                                                <p>You have no new emails</p>
                                            </div>
                                          </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">0</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have no new notifications</p>
                                            </div>
                                          </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <?php
                                            if ($currentUser->getProfilePic() != '') {
                                             ?>
                                          <img src="<?php echo $currentUser->getProfilePic();?>" alt="Profile Pic" />
                                            <?php
                                        }else{
                                            ?>
                                        <img src="images/icon/user.png" alt="Profile Pic" />

                                        <?php
                                    }
                                        ?>
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $currentUser->getUsername(); ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <?php
                                            if ($currentUser->getProfilePic() != '') {
                                             ?>
                                          <img src="<?php echo $currentUser->getProfilePic();?>" alt="Profile Pic" />
                                            <?php
                                        }else{
                                            ?>
                                        <img src="images/icon/user.png" alt="Profile Pic" />

                                        <?php
                                    }
                                        ?>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $currentUser->getUsername(); ?></a>
                                                    </h5>
                                                    <span class="email"><?php echo $currentUser->getEmail(); ?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="myAccount.php">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                               </div>
                                            <div class="account-dropdown__footer">
                                                <a href="logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->