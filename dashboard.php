
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
            <li><a href="dashboard.php"><i class="sl sl-icon-layers"></i>Edit Listings</a></li>
             <li><a href="dashboard.php"><i class="sl sl-icon-layers"></i>Delete Listings</a></li>
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
					<p><?php echo Message();
	      echo SuccessMessage();
	?></p>
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
					<div class="dashboard-stat-content"><h4>1</h4> <span>Active User</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Heart"></i></div>
				</div>
			</div>
		</div>


		<div class="row">
			
			<!-- Recent Listings -->
			<div class="col-lg-12 col-md-12">
                
				
					<h4>Recent Listings</h4>
					<?php
		global $ConnectingDB;
		// Query when Search Button is Active
		if(isset($_GET["SearchButton"])){
        $Search=$_GET["Search"];
        $Category=$_GET["Category"];
			
		$ViewQuery="SELECT * FROM photographerdata
		WHERE studioname LIKE '%$Search%' AND category='$Category'
        ORDER BY id desc";
		}
        
		// The Default Query for Blog.php Page
		else{
            
		$ViewQuery="SELECT * FROM photographerdata ORDER BY id desc LIMIT 0,100";}
		$Execute=mysql_query($ViewQuery);
		while($DataRows=mysql_fetch_array($Execute)){
			$PostId=$DataRows["id"];
			$DateTime=$DataRows["datetime"];
			$Studioname=$DataRows["studioname"];
			$Category=$DataRows["category"];
			$Image=$DataRows["pic1"];
            $Cell=$DataRows["cell"];		
		?>
                
        <?php
$ConnectingDB; 
$ExtractingCommentsQuery="SELECT COUNT(*) FROM reviews
WHERE photographer_id='$PostId' ";
$ExecuteRating=mysql_query($ExtractingCommentsQuery);
$RowsRating=mysql_fetch_array($ExecuteRating);
$TotalRatingCount=array_shift($RowsRating);
            
$AvgQuery="SELECT AVG(rating) FROM reviews
WHERE photographer_id='$PostId' ";
$ExecuteAvg=mysql_query($AvgQuery);
$RowsAvg=mysql_fetch_array($ExecuteAvg);
$AvgRating=array_shift($RowsAvg);
            
?>
               
                <div class="dashboard-list-box with-icons margin-top-20">
                    <div class="col-lg-12 col-md-12">
					<ul>
						<li>
							<i class="list-box-icon sl sl-icon-layers"></i>
                            <a href="listings-single-page.php?id=<?php echo $PostId; ?>"</a>
                            <?php echo htmlentities($Studioname); ?>
							<a href="dashboard-delete-listing.php?Delete=<?php echo $PostId; ?>" class="close-list-item"><i class="fa fa-close"></i></a>
                            <a href="dashboard-edit-listing.php?Edit=<?php echo $PostId; ?>" class="sl sl-icon-settings"><i class="fa fa-close"></i></a>
						</li>
                        
                        </ul>
						</a>
					</div>
				</div>
                
                
                <?php } ?>
                
                 
                
				<!-- Listing Item / End -->
                
        

			

			</div>
				</div>
			</div>
			
			<!-- Invoices -->
			<div class="col-lg-12 col-md-12">
				
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