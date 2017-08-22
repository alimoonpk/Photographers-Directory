
    <?php require_once("Include/DB.php"); ?>
    <?php require_once("Include/Sessions.php"); ?>
    <?php require_once("Include/Functions.php"); ?>
<?php
if(isset($_POST["loginbutton"])){
$Username=mysql_real_escape_string($_POST["logusername"]);
$Password=mysql_real_escape_string($_POST["logpassword"]);

if(empty($Username)||empty($Password)){
	$_SESSION["ErrorMessage"]="All Fields must be filled out";
	Redirect_to("index.php");
	
}
else{
	$Found_Account=Login_Attempt($Username,$Password);
	$_SESSION["User_Id"]=$Found_Account["id"];
	$_SESSION["Username"]=$Found_Account["username"];
	if($Found_Account){
	$_SESSION["SuccessMessage"]="Welcome  {$_SESSION["Username"]} ";
	Redirect_to("dashboard-add-listing.php");
		
	}else{
		$_SESSION["ErrorMessage"]="Invalid Username / Password";
	Redirect_to("index.php");
	}
	
}	
}	


?>

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

						<li><a class="current" href="#">Home</a></li>

						<li><a href="listings-list-full-width.php">Listings</a>
							
						</li>

						<li><a href="#">User Panel</a>
							<ul>
								<li><a href="dashboard.php">Dashboard</a></li>
								<li><a href="dashboard-add-listing.php">Add Listing</a></li>
							</ul>
						</li>

						<li><a href="contact.php">Contact</a>
						
						</li>
						
					</ul>
				</nav>
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->
				
			</div>
			<!-- Left Side Content / End -->


			<!-- Right Side Content / End -->
			<div class="right-side">
				<div class="header-widget">
					<a href="#sign-in-dialog" class="sign-in popup-with-zoom-anim"><i class="sl sl-icon-login"></i> Sign In</a>
					<a href="dashboard-add-listing.php" class="button border with-icon">Add Listing <i class="sl sl-icon-plus"></i></a>
				</div>
			</div>
			<!-- Right Side Content / End -->

			<!-- Sign In Popup -->
			<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">

				<div class="small-dialog-header">
					<h3>Sign In</h3>
				</div>

				<!--Tabs -->
				<div class="sign-in-form style-1">

					<ul class="tabs-nav">
						<li class=""><a href="#tab1">Log In</a></li>
						<li><a href="#tab2">Register</a></li>
					</ul>

					<div class="tabs-container alt">

						<!-- Login -->
						<div class="tab-content" id="tab1" style="display: none;">
							<form method="post" action="index.php" class="login">

								<p class="form-row form-row-wide">
									<label for="logusername">Username:
										<i class="im im-icon-Male"></i>
										<input type="text" class="input-text" name="logusername" id="logusername" value="" />
									</label>
								</p>

								<p class="form-row form-row-wide">
									<label for="logpassword">Password:
										<i class="im im-icon-Lock-2"></i>
										<input class="input-text" type="password" name="logpassword" id="logpassword"/>
									</label>
									<span class="lost_password">
										<a href="#" >Lost Your Password?</a>
									</span>
								</p>

								<div class="form-row">
									<input type="submit" class="button border margin-top-5" name="loginbutton" value="Login" />
									<div class="checkboxes margin-top-10">
										<input id="remember-me" type="checkbox" name="check">
										<label for="remember-me">Remember Me</label>
									</div>
								</div>
								
							</form>
						</div>

						<!-- Register -->
						<div class="tab-content" id="tab2" style="display: none;">

							<form method="post" class="register">
								
							<p class="form-row form-row-wide">
								<label for="username2">Username:
									<i class="im im-icon-Male"></i>
									<input type="text" class="input-text" name="username" id="username2" value="" />
								</label>
							</p>
								
							<p class="form-row form-row-wide">
								<label for="email2">Email Address:
									<i class="im im-icon-Mail"></i>
									<input type="text" class="input-text" name="email" id="email2" value="" />
								</label>
							</p>

							<p class="form-row form-row-wide">
								<label for="password1">Password:
									<i class="im im-icon-Lock-2"></i>
									<input class="input-text" type="password" name="password1" id="password1"/>
								</label>
							</p>

							<p class="form-row form-row-wide">
								<label for="password2">Repeat Password:
									<i class="im im-icon-Lock-2"></i>
									<input class="input-text" type="password" name="password2" id="password2"/>
								</label>
							</p>

							<input type="submit" class="button border fw margin-top-10" name="register" value="Register" />
	
							</form>
						</div>

					</div>
				</div>
			</div>
			<!-- Sign In Popup / End -->

		</div>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->


<!-- Banner
================================================== -->
<div class="main-search-container" data-background-image="images/main-search-background-01.jpg">
	<div class="main-search-inner">

		<div class="container">
			<div class="row">
               
				<div class="col-md-12">
                     <h1 class="label" style="color:red; background-color:yellow;">
                <?php echo Message();
	      echo SuccessMessage();
	?></h1>
					<h2>Find Nearby Attractions</h2>
					<h4>Expolore top-rated Photographers</h4>

				</div>
			</div>
		</div>

	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	<div class="row">

		<div class="col-md-12">
			<h3 class="headline centered margin-top-75">
				Best Photographer for any Event!
				<span>Browse <i>the most desirable</i> categories</span>
			</h3>
		</div>

	</div>
</div>


<!-- Categories Carousel -->
<div class="fullwidth-carousel-container margin-top-25">
	<div class="fullwidth-slick-carousel category-carousel">

		<!-- Item -->
		<div class="fw-carousel-item">

			<!-- this (first) box will be hidden under 1680px resolution -->
			<div class="category-box-container half">
				<a href="listings-list-full-width.php" class="category-box" data-background-image="images/category-box-01.jpg">
					<div class="category-box-content">
						<h3>Hotels</h3>
						
					</div>
					<span class="category-box-btn">Browse</span>
				</a>
			</div>

			<div class="category-box-container half">
				<a href="listings-list-full-width.php?Search=&Category=Wedding&SearchButton=" class="category-box" data-background-image="images/category-box-04.jpg">
					<div class="category-box-content">
						<h3>Wedding PhotoShoot</h3>
						
					</div>
					<span class="category-box-btn">Browse</span>
				</a>
			</div>
		</div>

		<!-- Item -->
		<div class="fw-carousel-item">
			<div class="category-box-container">
				<a href="listings-list-full-width.php?Search=&Category=Birthday+Party&SearchButton=" class="category-box" data-background-image="images/category-box-03.jpg">
					<div class="category-box-content">
						<h3>BirthDay Party</h3>
						
					</div>
					<span class="category-box-btn">Browse</span>
				</a>
			</div>
		</div>

		<!-- Item -->
		<div class="fw-carousel-item">
			<div class="category-box-container">
				<a href="listings-list-full-width.php" class="category-box" data-background-image="images/category-box-02.jpg">
					<div class="category-box-content">
						<h3>Other</h3>
						
					</div>
					<span class="category-box-btn">Browse</span>
				</a>
			</div>
		</div>

		<!-- Item -->
		<div class="fw-carousel-item">
			<div class="category-box-container">
				<a href="listings-list-full-width.php?Search=&Category=Picnic&SearchButton=" class="category-box" data-background-image="images/category-box-05.jpg">
					<div class="category-box-content">
						<h3>Picnic</h3>
						
					</div>
					<span class="category-box-btn">Browse</span>
				</a>
			</div>
		</div>

		<!-- Item -->
		<div class="fw-carousel-item">
			<div class="category-box-container">
				<a href="listings-list-full-width.php?Search=&Category=Concert&SearchButton=" class="category-box" data-background-image="images/category-box-06.jpg">
					<div class="category-box-content">
						<h3>Concert</h3>
						
					</div>
					<span class="category-box-btn">Browse</span>
				</a>
			</div>
		</div>

	</div>
</div>
<!-- Categories Carousel / End -->



<!-- Fullwidth Section -->
<section class="fullwidth margin-top-65 padding-top-75 padding-bottom-70" data-background-color="#f8f8f8">

	<div class="container">
		<div class="row">

			<div class="col-md-12">
				<h3 class="headline centered margin-bottom-45">
					Top Photographers
					<span>Discover top-rated Photographers</span>
				</h3>
			</div>

			<div class="col-md-12">
				<div class="simple-slick-carousel dots-nav">

				<!-- Listing Item -->
				<div class="carousel-item">
					<a href="listings-single-page.php?id=10" class="listing-item-container">
						<div class="listing-item">
							<img src="images/listing_01.jpg" alt="">

							<div class="listing-badge now-open">Now Open</div>
							
							<div class="listing-item-content">
								<span class="tag">Wedding Event</span>
								<h3>Dream studio</h3>
								
							</div>
							
						</div>
						<div class="star-rating" data-rating="3.5">
							<div class="rating-counter">(12 reviews)</div>
						</div>
					</a>
				</div>
				<!-- Listing Item / End -->

				<!-- Listing Item -->
				<div class="carousel-item">
					<a href="listings-single-page.php?id=9" class="listing-item-container">
						<div class="listing-item">
							<img src="images/listing_02.jpg" alt="">

							<div class="listing-badge now-open">Now Open</div>

							<div class="listing-item-details">
								
							</div>
							<div class="listing-item-content">
								<span class="tag">BirthDay Event Photography</span>
								<h3>Strike a Pose Photo Studio</h3>
								
							</div>
							
						</div>
						<div class="star-rating" data-rating="5.0">
							<div class="rating-counter">(23 reviews)</div>
						</div>
					</a>
				</div>
				<!-- Listing Item / End -->		

				<!-- Listing Item -->
				<div class="carousel-item">
					<a href="listings-single-page.php?id=8" class="listing-item-container">
						<div class="listing-item">
							<img src="images/listing_03.jpg" alt="">

							<div class="listing-badge now-open">Now Open</div>

							<div class="listing-item-details">
								
							</div>
							<div class="listing-item-content">
								<span class="tag">Picnic</span>
								<h3>Shutter Up Studio</h3>
								
							</div>
							
						</div>
						<div class="star-rating" data-rating="2.0">
							<div class="rating-counter">(17 reviews)</div>
						</div>
					</a>
				</div>
				<!-- Listing Item / End -->

			
</section>
<!-- Fullwidth Section / End -->


<!-- Info Section -->
<div class="container">

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2 class="headline centered margin-top-80">
				Explore The Photographers of Your Dreams 
				<span class="margin-top-25">Explore some of the best Photography from around the city from our partners and friends.  Discover some of the most popular Photographer in Pakistan.</span>
			</h2>
		</div>
	</div>

	<div class="row icons-container">
		<!-- Stage -->
		<div class="col-md-4">
			<div class="icon-box-2 with-line">
				<i class="im im-icon-Map2"></i>
				<h3>Find Best Photographers</h3>
				<p>Best Photographers In The Town.</p>
			</div>
		</div>

		<!-- Stage -->
		<div class="col-md-4">
			<div class="icon-box-2 with-line">
				<i class="im im-icon-Mail-withAtSign"></i>
				<h3>Contact a Nearby Photographer</h3>
				<p>Easily Contact Via Call or SMS</p>
			</div>
		</div>

		<!-- Stage -->
		<div class="col-md-4">
			<div class="icon-box-2">
				<i class="im im-icon-Checked-User"></i>
				<h3>Make a Reservation</h3>
				<p>In Reasonable Price.</p>
			</div>
		</div>
	</div>

</div>
<!-- Info Section / End -->

<br><br><br>

<!-- Footer
================================================== -->
<div id="footer" class="sticky-footer">
	<!-- Main -->
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-6">
				<img class="footer-logo" src="images/logo.png" alt="">
				<br><br>
				<p>“Taking an image, freezing a moment, reveals how rich reality truly is.”<br>		— Anonymous.</p>
			</div>

			

			<div class="col-md-4  col-sm-12">
				<h4>Contact Us</h4>
				<div class="text-widget">
					<span>DHA Phase VI , KARACHI</span> <br>
					Phone: <span> 0334-1349002 </span><br>
					E-Mail:<span> <a href="#"><span class="__cf_email__" data-cfemail="f79891919e9492b7928f969a879b92d994989a">[email&#160;protected]</span><script data-cfhash='f9e31' type="text/javascript">/* <![CDATA[ */!function(t,e,r,n,c,a,p){try{t=document.currentScript||function(){for(t=document.getElementsByTagName('script'),e=t.length;e--;)if(t[e].getAttribute('data-cfhash'))return t[e]}();if(t&&(c=t.previousSibling)){p=t.parentNode;if(a=c.getAttribute('data-cfemail')){for(e='',r='0x'+a.substr(0,2)|0,n=2;a.length-n;n+=2)e+='%'+('0'+('0x'+a.substr(n,2)^r).toString(16)).slice(-2);p.replaceChild(document.createTextNode(decodeURIComponent(e)),c)}p.removeChild(t)}}catch(u){}}()/* ]]> */</script></a> </span><br>
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
				<div class="copyrights">© 2017 Best Photography. All Rights Reserved.</div>
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
