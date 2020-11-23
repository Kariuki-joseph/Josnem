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
                                    <h2 class="title-1">Feedbacks</h2>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <?php
                                $feedbacks = mysqli_query($conn,"SELECT id FROM feedbacks ORDER BY time asc");
                                while ($row = mysqli_fetch_array($feedbacks)) {
                                ?>
                                <div class="card">
                                    <?php
                                    //new instance of feedbacks
                                    $feedback = new Feedback($row['id']);
                                    ?>
                                    <div class="card-header">
                                        <h4><?php echo $feedback->getFirstName()." ".$feedback->getLastName();
                                        ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <strong>Email:</strong> <?php echo $feedback->getEmail();?><br>
                                        <strong>Phone: </strong><?php echo $feedback->getPhone(); ?><br>
                                        <strong>Time: </strong><?php echo $feedback->getTime(); ?><br><br>

                                        <?php
                                        echo $feedback->getMessage();
                                        ?>    
                                    </div>
                                </div>
                                <?php
                            }
                                ?>
                            </div>
                        </div>
                      <?php
                       include 'footer.php';
                       ?>