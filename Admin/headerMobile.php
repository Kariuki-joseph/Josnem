<!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.php">
                            <img src="images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="admin.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <?php
                          //for bursar/admin
                          if (isset($_SESSION['bursar']) || isset($_SESSION['admin'])) {
                           ?>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-book"></i>Payments</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                <a href="addPayment.php">
                                 <i class="fas fa-plus"></i>Add Payment</a>
                            </li>
                            <li>
                                <a href="addPayment.php">
                                <i class="fas fa-plus"></i>Add Upcoming Payments</a>
                            </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-book"></i>Reports</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                <a href="reports.php">
                                <i class="fas fa-book"></i>Reports-All Students</a>
                            </li>
                            <li>
                                <a href="report.php">
                                <i class="fas fa-book"></i>Report-Specific Student</a>
                            </li>
                            <?php
                            }
                            if (isset($_SESSION['admin'])) {
                             ?>
                            <li>
                                <a href="reportOverall.php">
                                <i class="fas fa-book"></i>Report-Overall</a>
                            </li>
                            <?php
                        }
                            ?></ul>
                        </li>
                        <?php
                        if (isset($_SESSION['admin']) || isset($_SESSION['user'])) {
                        ?>
                        <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-camera"></i>Add Gallery Items
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                  <li>
                                      <a href="add-gallery-categories.php">
                                        <i class="fa fa-plus"></i>Add Categories</a>
                                  </li>
                                  <li>
                                      <a href="add-gallery-photos.php">
                                        <i class="fa fa-plus"></i>Add Photos</a>
                                </li>
                                </ul>  
                                
                        </li>
                            
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-building"></i>Departments
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                              <li>
                                  <a href="add-department-categories.php">
                                    <i class="fa fa-plus"></i>Add Categories</a>
                              </li>
                              <li>
                                  <a href="add-department-entries.php">
                                    <i class="fa fa-plus"></i>Add New Entry</a>
                              </li>  
                            </ul>
                        </li>
                        <?php
                        }
                        if (isset($_SESSION['admin'])) {
                        ?>
                        <li class="has-sub">
                            <a class="js-arrow" href="feedbacks.php">
                                <i class="fa fa-comments-o"></i>Feedbacks
                            </a>
                        </li>
                        <?php
                      }
                        ?>
                        <li class="has-sub">
                            <a class="js-arrow" href="kcpe-results.php">
                                <i class="fa fa-graduation-cap"></i>Add KCPE Result
                            </a>
                        </li>
                     </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->
