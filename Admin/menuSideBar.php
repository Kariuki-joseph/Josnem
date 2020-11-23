<!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/icon/logo.png" alt="Josnem Schools" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub">
                            <a class="js-arrow" href="index.php">
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
                            ?>
                            </ul>
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
                        <li class="has-sub">
                            <a class="js-arrow" href="kcpe-results.php">
                                <i class="fa fa-comments-o"></i>Add KCPE Result
                            </a>
                        </li>
                        <?php
                      }
                        ?>
                     </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
