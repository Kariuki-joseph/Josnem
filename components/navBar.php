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
					</ul>
					<ul class="nav navbar-nav navbar-right">
                        <li><a class="hover-btn-new log orange" href="#" data-toggle="modal" data-target="#login"><span>Login</span></a></li>
                    </ul>
				</div>
			</div>
		</nav>
	</header>