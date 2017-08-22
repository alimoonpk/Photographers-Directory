
    <?php require_once("Include/DB.php"); ?>
    <?php require_once("Include/Sessions.php"); ?>
    <?php require_once("Include/Functions.php"); ?>
    <?php Confirm_Login(); ?>
<!DOCTYPE html>

<head>

<!-- Basic Page Needs
================================================== -->
<title>Photographers Directory</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/colors/main.css" id="colors">

</head>

<body>

<!-- Wrapper -->
<div id="wrapper">

<!-- Header Container
================================================== -->
<header id="header-container" class="fixed fullwidth dashboard">

	<!-- Header -->
	<div id="header" class="not-sticky">
		<div class="container">
			
			<!-- Left Side Content -->
			<div class="left-side">
				
				<!-- Logo -->
				<div id="logo">
					<a href="index.php"><img src="images/logo.png" alt=""></a>
					<a href="index.php" class="dashboard-logo"><img src="images/logo.png" alt=""></a>
				</div>

				<!-- Mobile Navigation -->
				<div class="menu-responsive">
					<i class="fa fa-reorder menu-trigger"></i>
				</div>

				<!-- Main Navigation -->
				<nav id="navigation" class="style-1">
					<ul id="responsive">

						<li><a href="#">Home</a>
							
						</li>

						<li><a href="#">Listings</a>
							
						</li>

						<li><a class="current" href="#">User Panel</a>
							<ul>
								<li><a href="dashboard.php">Dashboard</a></li>
								<li><a href="dashboard-my-listings.php">My Listings</a></li>
								<li><a href="dashboard-add-listing.php">Add Listing</a></li>
							</ul>
						</li>

						<li><a href="#">Contact</a>
							
				</nav>
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->
				
			</div>
			<!-- Left Side Content / End -->

			<!-- Right Side Content / End -->
			<div class="right-side">
				<!-- Header Widget -->
				<div class="header-widget">
					
					<!-- User Menu -->
					<div class="user-menu">
						<div class="user-name"><span><img src="images/furqan.jpg" alt="" height="55" width="65"></span>Furqan Patel</div>
						<ul>
							<li><a href="dashboard.php"><i class="sl sl-icon-settings"></i> Dashboard</a></li>
						 <li><a href="dashboard-add-listing.php"><i class="sl sl-icon-layers"></i>Add New Listing</a></li>
							<li><a href="Logout.php"><i class="sl sl-icon-power"></i> Logout</a></li>
						</ul>
					</div>

					<a href="dashboard-add-listing.php" class="button border with-icon">Add Listing <i class="sl sl-icon-plus"></i></a>
				</div>
				<!-- Header Widget / End -->
			</div>
			<!-- Right Side Content / End -->

		</div>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->


<!-- Dashboard -->
<div id="dashboard">

	<!-- Navigation
	================================================== -->

	<!-- Responsive Navigation Trigger -->
	<a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>

	<div class="dashboard-nav">

		<ul data-submenu-title="Main">
			<li class="active"><a href="dashboard.php"><i class="sl sl-icon-settings"></i> Dashboard</a></li>
             <li><a href="dashboard-add-listing.php"><i class="sl sl-icon-layers"></i>Add New Listing</a></li>
		</ul>
		
		
		<ul data-submenu-title="Account">
			<li><a href="Logout.php"><i class="sl sl-icon-power"></i> Logout</a></li>
		</ul>

	</div>
	<!-- Navigation / End -->


	<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Dashboard</h2> <span>User Panel Dashboard</span>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li>Dashboard</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<!-- Notice -->
		<div class="row">
			<div class="col-md-12">
				<div class="notification success closeable margin-bottom-30">
					<p>Your listing <strong>for Wedding Photography</strong> has been approved!</p>
					<a class="close" href="#"></a>
				</div>
			</div>
		</div>

		<!-- Content -->
		<div class="row">

			<!-- Item -->
			<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-1">
					<div class="dashboard-stat-content"><h4>6</h4> <span>Active Listings</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Map2"></i></div>
				</div>
			</div>

			<!-- Item -->
			<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-2">
					<div class="dashboard-stat-content"><h4>726</h4> <span>Total Views</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Line-Chart"></i></div>
				</div>
			</div>

			
			<!-- Item -->
			<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-3">
					<div class="dashboard-stat-content"><h4>95</h4> <span>Total Reviews</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Add-UserStar"></i></div>
				</div>
			</div>

			<!-- Item -->
			<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-4">
					<div class="dashboard-stat-content"><h4>126</h4> <span>Times Bookmarked</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Heart"></i></div>
				</div>
			</div>
		</div>


		<div class="row">
			
			<!-- Recent Activity -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box with-icons margin-top-20">
					<h4>Recent Activities</h4>
					<ul>
						<li>
							<i class="list-box-icon sl sl-icon-layers"></i> Your listing <strong><a href="#">for Wedding Photography</a></strong> has been approved!
							<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
						</li>

						<li>
							<i class="list-box-icon sl sl-icon-star"></i> Muhammed Ali left a review <div class="numerical-rating" data-rating="5.0"></div> on <strong><a href="#">Dream Studio</a></strong>
							<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
						</li>

						<li>
							<i class="list-box-icon sl sl-icon-heart"></i> Asad Raza bookmarked your <strong><a href="#">Shutter Up Studio</a></strong> listing!
							<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
						</li>

						
						<li>
							<i class="list-box-icon sl sl-icon-star"></i> Abtahaj Ashraf left a review <div class="numerical-rating" data-rating="2.5"></div> on <strong><a href="#">Strike A Pose Photo Studio</a></strong>
							<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
						</li>
					</ul>
				</div>
			</div>
			
			<!-- Invoices -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box invoices with-icons margin-top-20">
					<h4>Invoices</h4>
					<ul>
						
						<li><i class="list-box-icon sl sl-icon-doc"></i>
							<strong>Professional Plan</strong>
							<ul>
								<li class="unpaid">Unpaid</li>
								<li>Order: #00124</li>
								<li>Date: 20/07/2017</li>
							</ul>
							<div class="buttons-to-right">
								<a href="dashboard-invoice.php" class="button gray">View Invoice</a>
							</div>
						</li>
						
						<li><i class="list-box-icon sl sl-icon-doc"></i>
							<strong>Extended Plan</strong>
							<ul>
								<li class="paid">Paid</li>
								<li>Order: #00108</li>
								<li>Date: 14/07/2017</li>
							</ul>
							<div class="buttons-to-right">
								<a href="dashboard-invoice.php" class="button gray">View Invoice</a>
							</div>
						</li>

						<li><i class="list-box-icon sl sl-icon-doc"></i>
							<strong>Extended Plan</strong>
							<ul>
								<li class="paid">Paid</li>
								<li>Order: #00097</li>
								<li>Date: 10/07/2017</li>
							</ul>
							<div class="buttons-to-right">
								<a href="dashboard-invoice.php" class="button gray">View Invoice</a>
							</div>
						</li>
						
						<li><i class="list-box-icon sl sl-icon-doc"></i>
							<strong>Basic Plan</strong>
							<ul>
								<li class="paid">Paid</li>
								<li>Order: #00091</li>
								<li>Date: 30/06/2017</li>
							</ul>
							<div class="buttons-to-right">
								<a href="dashboard-invoice.php" class="button gray">View Invoice</a>
							</div>
						</li>

					</ul>
				</div>
			</div>


			<!-- Copyrights -->
			<div class="col-md-12">
				<div class="copyrights">© 2017 Photography. All Rights Reserved.</div>
			</div>
		</div>

	</div>
	<!-- Content / End -->


</div>
<!-- Dashboard / End -->


</div>
<!-- Wrapper / End -->


<!-- Scripts
================================================== -->
<script type="text/javascript" src="scripts/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="scripts/jpanelmenu.min.js"></script>
<script type="text/javascript" src="scripts/chosen.min.js"></script>
<script type="text/javascript" src="scripts/slick.min.js"></script>
<script type="text/javascript" src="scripts/rangeslider.min.js"></script>
<script type="text/javascript" src="scripts/magnific-popup.min.js"></script>
<script type="text/javascript" src="scripts/waypoints.min.js"></script>
<script type="text/javascript" src="scripts/counterup.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>
<script type="text/javascript" src="scripts/tooltips.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>


</body>

</html>