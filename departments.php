<?php
//header
include 'components/header.php';
?>

<body class="host_version"> 

	<!-- Modal -->
	<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header tit-up">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Login</h4>
			</div>
			<div class="modal-body customer-box">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs">
					<li><a class="active" href="#Login" data-toggle="tab">Login</a></li>
					<li><a href="#Registration" data-toggle="tab">Registration</a></li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane active" id="Login">
						<form role="form" class="form-horizontal">
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="email1" placeholder="Name" type="text">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="exampleInputPassword1" placeholder="Email" type="email">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-10">
									<button type="submit" class="btn btn-light btn-radius btn-brd grd1">
										Submit
									</button>
									<a class="for-pwd" href="javascript:;">Forgot your password?</a>
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane" id="Registration">
						<form role="form" class="form-horizontal">
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" placeholder="Name" type="text">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="email" placeholder="Email" type="email">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="mobile" placeholder="Mobile" type="email">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="password" placeholder="Password" type="password">
								</div>
							</div>
							<div class="row">							
								<div class="col-sm-10">
									<button type="button" class="btn btn-light btn-radius btn-brd grd1">
										Save &amp; Continue
									</button>
									<button type="button" class="btn btn-light btn-radius btn-brd grd1">
										Cancel</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	  </div>
	</div>

    <!-- Start header -->
	<?php
	include 'components/navBar.php';
	?>
	<!-- End header -->
	
	<div class="all-title-box">
		<div class="container text-center">
			<h1>Our Departments<span class="m_1">"Together we grow"</span></h1>
		</div>
	</div>

	<div class="row bg-secondary">
		<?php
		//get department entries
		$dept = new Department();
		$categories = $dept->getDistinctCategories();
		//loop thrgh categories
		while ($cat = mysqli_fetch_array($categories)) {
		?>
		<div class="container">
			<h3 class="m-section-title mt-3"><?php echo $cat['category']; ?></h3>
		</div>
		<?php
		//get entries
		$entries = $dept->getByCategory($cat['category']);
		//loopt thrgh entries
		while ($entry = mysqli_fetch_array($entries)) {
		?>
		<div class="col-sm-12 col-md-12 ">		
			<div class="section-wrapper">
				<figure class="mr-5">
					<img src="<?php echo $entry['avator']; ?>">
				</figure>
				<p>
					<strong><?php echo $entry['name']; ?></strong>-<i><?php echo $entry['position']; ?></i><br>
					<?php echo $entry['message']; ?>
				</p>
			</div>
		</div>
		<?php
	}
		}
		?>
	</div>	
	<!-- end section -->	

    <?php
    //foooter
    include 'components/footer.php';
    ?>