<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-red">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.php">
					<img src="images/logo.jpg" alt=""/>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-host">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" id="dropdown-a" data-toggle="dropdown" href="#">School Gallery</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<?php
								//fetch categories
								$galleryCategories = new Gallery();
								$distinct = $galleryCategories->getDistinctCategories();
								//loop through the categories
								while ($cat = mysqli_fetch_array($distinct)) {
								?>
								<a class="dropdown-item" href="gallery.php?category=<?php echo $cat['category'];?>"><?php echo $cat['category']; ?></a>
								<?php
								}
								?>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" id="dropdown-a" data-toggle="dropdown" href="#">KCPE Results</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<?php
								//fetch kcpe result images
								$kcpeResults = new KCPEResults();
								$all = $kcpeResults->getAll();
								//loop through the categories
								while ($result = mysqli_fetch_array($all)) {
								?>
								<a class="dropdown-item" href="results.php?year=<?php echo $result['year'];?>">
									<?php echo $result['name']; ?></a>
								<?php
								}
								?>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" id="dropdown-a" data-toggle="dropdown" href="#">Downloads</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="#">Newsletter</a>
								<a class="dropdown-item" href="#">Fees Structure</a>
							</div>
						</li>
						<li class="nav-item"><a class="nav-link" href="departments.php">From The Departments</a></li>
						<li class="nav-item"><a class="nav-link" href="location.php">Location Map</a></li>
						<li class="nav-item"><a class="nav-link" href="contacts.php">Contact Us</a></li>
						<li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#modal_fees_payment">Pay Fees</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
                        <li><a class="hover-btn-new log orange" href="#" data-toggle="modal" data-target="#login"><span>Login</span></a></li>
                    </ul>
				</div>
			</div>
		</nav>
	</header>

	<!-- fees payment modal-->
	<div class="modal" id="modal_fees_payment">
		<div class="modal-dialog modal-dialog-centered modal-md">
			<div class="modal-content">
				<div class="modal-header">

				</div>
				<div class="modal-body">
					<div class="container">
					<section id="section1">
						<form action="#" method="post" id="form_fees_payment">
								<div class="form-group">
									<input type="number" name="adm_number" id="adm_number" class="form-control" placeholder="Enter Admission Number to proceed." data-msg="Plese enter admission number">
									<div class="validate"></div>
								</div>
								<div class="form-group">
									<select name="payment" id="payment" class="form-control" data-msg="Plese select a payment to proceed.">
										<option value="">--Select the payment--</option>
										<?php
											$payment = new Payable();
											$upcomings = $payment->getUpcoming();
											while($pay = mysqli_fetch_array($upcomings)){
												?>
												<option value="<?php echo $pay['name']; ?>"><?php echo $pay['name']; ?></option>
										<?php
											}
										?>
									</select>
									<div class="validate"></div>
								</div>
								<div class="form-group">
									<input type="number" name="amount" id="amount" class="form-control" placeholder="Enter Amount e.g. 1000" data-msg="Plese enter amount paid to proceed.">
									<div class="validate"></div>
								</div>
								<div class="form-group">
									<input type="file" name="receipt" id="receipt" type="image/" class="form-control" data-msg="Plese select the payment receipt to continue.">
									<div class="validate"></div>
								</div>
								<div class="receipt_preview">
									<img src="" alt="Payment Receipt" id="receipt_img" style="display: none;">
								</div>
						</form>
						<div class="d-flex justify-content-between mr-4">
							<button class="btn mt-3 bg-red" onclick="cancelPayment()"> CANCEL  <i class="fa fa-times"></i></button>
							<button class="btn bg-red mt-3" id="btn_next">NEXT <i class="fa fa-arrow-right"></i></button>
						</div>
					</section>
					<section id="section2" class="d-none">
					<p> </p>
					<div class="d-flex justify-content-between">
					<button class="btn bg-red" id="btn_back" onclick="goToSection1()"><i class="fa fa-arrow-left"></i> BACK</button>
					<button class="btn bg-red" onclick="submitPayment()"><i class="fa fa-paper-plane-o"></i> CONFIRM AND SEND</button>
					</div>					
					</section>
					<section id="section3" class="d-none">
					<p> </p>
					<div class="d-flex justify-content-end">
						<button id="btn_close_modal_payment" class="btn bg-red" class="close" data-dismiss="modal" onclick="finishPayment()"> CLOSE &times;</button>
					</div>
					</section>
					</div>
				</div>
				<!-- <div class="modal-footer">
					<button class="btn btn-danger" id="btn_next_1">NEXT</button>
				</div> -->
			</div>
		</div>
	</div>
	<!--/ fees payment modal-->
	