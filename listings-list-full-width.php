
    <?php require_once("Include/DB.php"); ?>
    <?php require_once("Include/Sessions.php"); ?>
    <?php require_once("Include/Functions.php"); ?>

<!DOCTYPE html>
<head>

<!-- Basic Page Needs
================================================== -->
<title>Listeo</title>
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
<header id="header-container">

	<!-- Header -->
	<div id="header">
		<div class="container">
			
			<!-- Left Side Content -->
			<div class="left-side">
				
				<!-- Logo -->
				<div id="logo">
					<a href="index.php"><img src="images/logo.png" alt=""></a>
				</div>

				<!-- Mobile Navigation -->
				<div class="menu-responsive">
					<i class="fa fa-reorder menu-trigger"></i>
				</div>

					<!-- Main Navigation -->
				<nav id="navigation" class="style-1">
					<ul id="responsive">

						<li><a href="index.php">Home</a>
							
						</li>

						<li><a class="current" href="listings-list-full-width.php">Listings</a>
							
						</li>

						<li><a href="#">User Panel</a>
							<ul>
								<li><a href="dashboard.php">Dashboard</a></li>
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
				<div class="header-widget">
					<a href="dashboard-add-listing.php" class="button border with-icon">Add Listing <i class="sl sl-icon-plus"></i></a>
				</div>
			</div>
			<!-- Right Side Content / End -->

			

		</div>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->


<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Directory</h2><span>Your Perfect Photographer is just a Click Away</span>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li>Listings</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	<div class="row">
		
		<!-- Search -->
        <form action="listings-list-full-width.php">
		<div class="col-md-12">
			<div class="main-search-input gray-style margin-top-0 margin-bottom-10">

				<div class="main-search-input-item">
					<input type="text" name="Search" placeholder="What are you looking for?" value=""/>
				</div>

				<div class="main-search-input-item">
					<select name="Category" data-placeholder="All Categories" class="chosen-select" >
						
                         <?php
    global $ConnectingDB;
    $ViewQuery="SELECT * FROM category ORDER BY id asc";
    $Execute=mysql_query($ViewQuery);
    while($DataRows=mysql_fetch_array($Execute)){
        $Id=$DataRows["id"];
        $CategoryName=$DataRows["name"];
    ?>	
        <option><?php echo $CategoryName; ?></option>
        <?php } ?>
                        
					</select>
				</div>
                
<button class="button" name="SearchButton">Search</button>
                
		</div>
				
			</div>
		</div>
        </form>
		<!-- Search Section / End -->


		<div class="col-md-12">

			<!-- Sorting - Filtering Section -->
			<div class="row margin-bottom-25 margin-top-30">

				<div class="col-md-6">
					<!-- Layout Switcher -->
					<div class="layout-switcher">
						<a href="#" class="grid"><i class="fa fa-th"></i></a>
						<a href="#" class="list active"><i class="fa fa-align-justify"></i></a>
					</div>
				</div>

				<div class="col-md-6">
					<div class="fullwidth-filters">
						
						

						<!-- Sort by -->
						<div class="sort-by">
							<div class="sort-by-select">
								<select data-placeholder="Default order" class="chosen-select-no-single">
									<option>Default Order</option>	
									<option>Highest Rated</option>
									<option>Most Reviewed</option>
									<option>Newest Listings</option>
									<option>Oldest Listings</option>
								</select>
							</div>
						</div>
						<!-- Sort by / End -->

					</div>
				</div>

			</div>
			<!-- Sorting - Filtering Section / End -->

			<div class="row">

				<!-- Listing Item -->    
                
			
                        
                        
                        <!-- PHP to List Listing Start -->
 
                        <!-- PHP to List Listing End -->
                        
                        
						
                            
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
               
                
                    <div class="col-lg-12 col-md-12">
					<div class="listing-item-container list-layout">
                        
				<a href="listings-single-page.php?id=<?php echo $PostId; ?>" class="listing-item">
                                
							<!-- Image -->
							<div class="listing-item-image">
								<img src="Upload/<?php echo $Image;  ?>" alt="">
								<span class="tag"><?php echo htmlentities($Category); ?></span>
							</div>
							
							<!-- Content -->
							<div class="listing-item-content">
								<div class="listing-badge now-open">Now Open</div>

								<div class="listing-item-inner">
                                
									<h3><?php echo htmlentities($Studioname); ?></h3>
									<span><?php echo htmlentities($Cell); ?></span>
									<div class="star-rating" data-rating="<?php echo $AvgRating;?>">
										<div class="rating-counter">(<?php echo $TotalRatingCount;?> Reviews)</div>
									</div>
								</div>

								<span class="like-icon"></span>
                                <div class="listing-item-details"><?php echo htmlentities($DateTime); ?></div>
							</div>
						</a>
					</div>
				</div>
                
                
                <?php } ?>
                
                 
                
				<!-- Listing Item / End -->
                
        

			

			</div>

			<!-- Pagination -->
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12">
					<!-- Pagination -->
					<div class="pagination-container margin-top-20 margin-bottom-40">
						<nav class="pagination">
							<ul>
								<li><a href="#" class="current-page">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
			<!-- Pagination / End -->

		</div>

	</div>
</div>


<!-- Footer
================================================== -->
<div id="footer" class="margin-top-15">
	<!-- Main -->
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-sm-6">
				<img class="footer-logo" src="images/logo.png" alt="">
				<br><br>
				<p>“Photography is a way of feeling, of touching, of loving. What you have caught on film is captured forever… It remembers little things, long after you have forgotten everything.”<br>
— Aaron Siskind.</p>
			</div>

			<div class="col-md-4 col-sm-6 ">
				
			</div>		

			<div class="col-md-3  col-sm-12">
				<h4>Contact Us</h4>
				<div class="text-widget">
					<span>DHA Phase VI</span> <br>
					Phone: <span>0334-1349002 </span><br>
					E-Mail:<span> <a href="#"><span class="__cf_email__" data-cfemail="721d14141b111732170a131f021e175c111d1f">[email&#160;protected]</span><script data-cfhash='f9e31' type="text/javascript">/* <![CDATA[ */!function(t,e,r,n,c,a,p){try{t=document.currentScript||function(){for(t=document.getElementsByTagName('script'),e=t.length;e--;)if(t[e].getAttribute('data-cfhash'))return t[e]}();if(t&&(c=t.previousSibling)){p=t.parentNode;if(a=c.getAttribute('data-cfemail')){for(e='',r='0x'+a.substr(0,2)|0,n=2;a.length-n;n+=2)e+='%'+('0'+('0x'+a.substr(n,2)^r).toString(16)).slice(-2);p.replaceChild(document.createTextNode(decodeURIComponent(e)),c)}p.removeChild(t)}}catch(u){}}()/* ]]> */</script></a> </span><br>
				</div>

				<ul class="social-icons margin-top-20">
					<li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
					<li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
					<li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
					<li><a class="vimeo" href="#"><i class="icon-vimeo"></i></a></li>
				</ul>

			</div>

		</div>
		
		<!-- Copyright -->
		<div class="row">
			<div class="col-md-12">
				<div class="copyrights">© 2017 Best Photgraphy. All Rights Reserved.</div>
			</div>
		</div>

	</div>

</div>
<!-- Footer / End -->


<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>


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