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
									<input class="form-control" id="adm" placeholder="Admission Number" type="text">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="exampleInputPassword1" placeholder="Password" type="password">
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
									<input class="form-control" id="class" placeholder="Class" type="text">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="adm" placeholder="Admission Number" type="text">
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
	
	<div id="carouselExampleControls" class="carousel slide bs-slider box-slider" data-ride="carousel" data-pause="hover" data-interval="false" >
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleControls" data-slide-to="1"></li>
			<li data-target="#carouselExampleControls" data-slide-to="2"></li>
			<li data-target="#carouselExampleControls" data-slide-to="3"></li>
			<li data-target="#carouselExampleControls" data-slide-to="4"></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="carousel-item active">
				<div id="home" class="first-section" style="background-image:url('images/slider1.jpg');">
					<div class="dtab">
						<div class="container">
							<div class="row">
								<div class="col-md-12 col-sm-12 text-center">
									<div class="big-tagline">
										<h2><strong>JOSNEM </strong> Schools</h2>
										<p class="lead">To be a centre of quality learning for educational excellence.</p>
											<a href="contacts.php" class="hover-btn-new"><span>Contact Us</span></a>
									</div>
								</div>
							</div><!-- end row -->            
						</div><!-- end container -->
					</div>
				</div><!-- end section -->
			</div>
			<div class="carousel-item">
				<div id="home" class="first-section" style="background-image:url('images/slider2.jpg');">
					<div class="dtab">
						<div class="container">
							<div class="row">
								<div class="col-md-12 col-sm-12 text-center">
									<div class="big-tagline">
										<h2 data-animation="animated zoomInRight">JOSNEM <strong>Schools</strong></h2>
										<p class="lead" data-animation="animated fadeInLeft">To be a centre of quality learning for educational excellence.</p>
											<a href="contacts.php" class="hover-btn-new"><span>Contact Us</span></a>
									</div>
								</div>
							</div><!-- end row -->            
						</div><!-- end container -->
					</div>
				</div><!-- end section -->
			</div>
			<div class="carousel-item">
				<div id="home" class="first-section" style="background-image:url('images/slider3.jpg');">
					<div class="dtab">
						<div class="container">
							<div class="row">
								<div class="col-md-12 col-sm-12 text-center">
									<div class="big-tagline">
										<h2 data-animation="animated zoomInRight"><strong>JOSNEM</strong> Schools</h2>
										<p class="lead" data-animation="animated fadeInLeft">To be a centre of quality learning for educational excellence.</p>
											<a href="contacts.php" class="hover-btn-new"><span>Contact Us</span></a>
									</div>
								</div>
							</div><!-- end row -->            
						</div><!-- end container -->
					</div>
				</div><!-- end section -->
			</div>
			<div class="carousel-item">
				<div id="home" class="first-section" style="background-image:url('images/slider4.jpg');">
					<div class="dtab">
						<div class="container">
							<div class="row">
								<div class="col-md-12 col-sm-12 text-center">
									<div class="big-tagline">
										<h2 data-animation="animated zoomInRight">JOSNEM <strong>Schools</strong></h2>
										<p class="lead" data-animation="animated fadeInLeft">To be a centre of quality learning for educational excellence.</p>
											<a href="contacts.php" class="hover-btn-new"><span>Contact Us</span></a>
									</div>
								</div>
							</div><!-- end row -->            
						</div><!-- end container -->
					</div>
				</div><!-- end section -->
			</div><div class="carousel-item">
				<div id="home" class="first-section" style="background-image:url('images/slider5.jpg');">
					<div class="dtab">
						<div class="container">
							<div class="row">
								<div class="col-md-12 col-sm-12 text-center">
									<div class="big-tagline">
										<h2 data-animation="animated zoomInRight">JOSNEM <strong>Schools</strong></h2>
										<p class="lead" data-animation="animated fadeInLeft">To be a centre of quality learning for educational excellence.</p>
											<a href="contacts.php" class="hover-btn-new"><span>Contact Us</span></a>
									</div>
								</div>
							</div><!-- end row -->            
						</div><!-- end container -->
					</div>
				</div><!-- end section -->
			</div>
			<!-- Left Control -->
			<a class="new-effect carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				<span class="fa fa-angle-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>

			<!-- Right Control -->
			<a class="new-effect carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				<span class="fa fa-angle-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
	
    <div id="overviews" class="section wb">
        <div class="container">
            <div class="section-title row text-left">
                <div class="col-md-8 offset-md-2">
                    <h3 class="text-center">About</h3>
<p class="lead">Josnem school is a mixed day and boarding school laid onstrong christian values.The school is located in Nyandarua County, Mirangine Sub-County 5km from Nakuru-Dondori highway.<<<a href="location.php">View map</a>>>
<br>
The foundation stone of the school was laid on the grounds of a Successful Academic Institution.
<br><br>
The main aim was to empower the society and as ussual, be a center of excellence.
The first national examination by Josnemians was in 2009 where 39 candidates were enrolled and managed a mean score of 312 marks.
The mean score has has been appreciating over the years, and through hardwork and determination, the school recorded a colorful mean score
of 389 marks(2011) ranking it position 9 countrywide and a mean score of 411 marks(2013) ranking it position 6 countrywide.<<<a href="#academic-achievements">See the results</a>>>
<br><br>
With a vision of being a center of quality learning for educational excellence, <b>Hard-work + Determination + Discipline</b> has <b>Never</b> disappointed our
mission '<strong><i>TO TRAIN AND EQUIP LEARNERS WITH KNOWLEDGE, SKILLS AND RIGHT ATTITUDE FOR SELF ACTUALIZATION</i></strong>';
Still  convinced that hardwork wins since the school now has E.C.D.E. diploma college all under the school umbrella.
<br><br>
We are concerned and strongly feel that the school will forever fly high.<br>

<strong><center><i>...MAY GOD BLESS JOSNEM!</i></center></strong>
</p>
                </div>
            </div><!-- end title -->
        </div><!-- end container -->
    </div><!-- end section -->

    <section class="section lb page-section">
		<div class="container">
			 <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3 id="academic-achievements">Our Achievements</h3>
                    <p class="lead">In our success milestones, we have recorded the below listed academic achievements, and we aim to do even better.</p>
                </div>
            </div><!-- end title -->
			<div class="timeline">
				<div class="timeline__wrap">
					<div class="timeline__items">
						<div class="timeline__item">
							<div class="timeline__content img-bg-01">
								<h2>2019</h2>
								<p>Ranked position 8 nationally with a mean-score of 392 marks.<br>
								Top school in Nyandarua County.</p>
							</div>
						</div>
						<div class="timeline__item">
							<div class="timeline__content img-bg-02">
								<h2>2018</h2>
								<p>Top school in Nyandarua County.</p>
							</div>
						</div>
						<div class="timeline__item">
							<div class="timeline__content img-bg-03">
								<h2>2017</h2>
								<p>Top school in Nyandarua County.</p>
							</div>
						</div>
						<div class="timeline__item">
							<div class="timeline__content img-bg-03">
								<h2>2016</h2>
								<p>Top school in Nyandarua County.</p>
							</div>
						</div>
						<div class="timeline__item">
							<div class="timeline__content img-bg-03">
								<h2>2015</h2>
								<p>Top school in Nyandarua County.</p>
							</div>
						</div>
						<div class="timeline__item">
							<div class="timeline__content img-bg-03">
								<h2>2014</h2>
								<p>Top school in Nyandarua County.</p>
							</div>
						</div>
						<div class="timeline__item">
							<div class="timeline__content img-bg-03">
								<h2>2013</h2>
								<p>Ranked position 9 nationally with a mean-score of 411 marks.<br>
								Top school in Nyandarua County.</p>
							</div>
						</div>
						<div class="timeline__item">
							<div class="timeline__content img-bg-03">
								<h2>2007-2012</h2>
								<p>Top school in Nyandarua County.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php
    //footer
    include 'components/footer.php';
    ?>