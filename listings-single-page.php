 <?php require_once("Include/DB.php"); ?>
    <?php require_once("Include/Sessions.php"); ?>
    <?php require_once("Include/Functions.php"); ?>

<?php
if(isset($_POST["SubmitButton"])){
$Name=mysql_real_escape_string($_POST["myname"]);
$Rating=mysql_real_escape_string($_POST["rating"]);
$Comment=mysql_real_escape_string($_POST["mycomment"]);
date_default_timezone_set("Asia/Karachi");
$CurrentTime=time();
//$DateTime=strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
$DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
$DateTime;
$PostId=$_GET["id"];

if(empty($Name)|| empty($Comment)){
	$_SESSION["ErrorMessage"]="All Fields are required";
	
}elseif(strlen($Comment)>500){
	$_SESSION["ErrorMessage"]="only 500  Characters are Allowed in Comment";
	
}else{
	global $ConnectingDB;
	$PostIDFromURL=$_GET['id'];
        $Query="INSERT into reviews (datetime,name,comment,rating,photographer_id)
	VALUES ('$DateTime','$Name','$Comment','$Rating','$PostIDFromURL')";
	$Execute=mysql_query($Query);
	if($Execute){
	$_SESSION["SuccessMessage"]="Comment Submitted Successfully";
	Redirect_to("listings-single-page.php?id={$PostId}");
	}else{
	$_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
	Redirect_to("listings-single-page.php?id={$PostId}");
		
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
			<div id="header" class="not-sticky">
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

								<li><a class="current" href=listings-list-full-width.php>Listings</a>

								</li>


								</li>

								<li><a href="#">User Panel</a>
									<ul>
										<li><a href="dashboard.php">Dashboard</a></li>
										<li><a href="dashboard-add-listing.php">Add Listing</a></li>
									</ul>
								</li>

								<li><a href="#">Contact</a>

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

    <!-- PHP to List Data -->

<?php
		global $ConnectingDB;
        $PostIDFromURL=$_GET["id"];
		$ViewQuery="SELECT * FROM photographerdata WHERE id='$PostIDFromURL'
		ORDER BY datetime desc";

		$Execute=mysql_query($ViewQuery);
		while($DataRows=mysql_fetch_array($Execute)){
			$PostId=$DataRows["id"];
			$DateTime=$DataRows["datetime"];
			$StudioName=$DataRows["studioname"];
            $PersonName=$DataRows["personname"];
			$Category=$DataRows["category"];
            $Overview=$DataRows["overview"];
            $Pricingpp=$DataRows["pricingpp"];
            $Pricingph=$DataRows["pricingph"];
            $Cell=$DataRows["cell"];
            $Web=$DataRows["web"];
            $Email=$DataRows["email"];
			$Image1=$DataRows["pic1"];
            $Image2=$DataRows["pic2"];
            $Image3=$DataRows["pic3"];
            $Image4=$DataRows["pic4"];
		
		?>

		
	

<!-- PHP List Data END -->
    

<!-- Slider
================================================== -->
<div class="listing-slider mfp-gallery-container margin-bottom-0">
	<a href="Upload/<?php echo $Image1;?>" data-background-image="Upload/<?php echo $Image1;?>" class="item mfp-gallery" title="Title 1"></a>
    <a href="Upload/<?php echo $Image2;?>" data-background-image="Upload/<?php echo $Image2;?>" class="item mfp-gallery" title="Title 2"></a>
    <a href="Upload/<?php echo $Image3;?>" data-background-image="Upload/<?php echo $Image3;?>" class="item mfp-gallery" title="Title 3"></a>
    <a href="Upload/<?php echo $Image4;?>" data-background-image="Upload/<?php echo $Image4;?>" class="item mfp-gallery" title="Title 4"></a>

</div>

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
    
<!-- Content
================================================== -->
<div class="container">
	<div class="row sticky-wrapper">
		<div class="col-lg-8 col-md-8 padding-right-30">

			<!-- Titlebar -->
			<div id="titlebar" class="listing-titlebar">
                <h1 style="color:red; background-color:yellow;"><?php echo Message();  echo SuccessMessage(); ?></h1> <br><br>
				<div class="listing-titlebar-title">
					<h2><?php echo htmlentities($StudioName); ?> <span class="listing-tag"><?php echo htmlentities($Category); ?></span></h2>
					<span>
					<h4><?php echo htmlentities($PersonName); ?></h4>
					</span>
                    <div class="pull-right"><?php echo htmlentities($DateTime);?></div>
					<div class="star-rating" data-rating="<?php echo $AvgRating; ?> ">
						<div class="rating-counter"><a href="#listing-reviews">(<?php echo $TotalRatingCount; ?> reviews)</a></div>
					</div>
				</div>
			</div>

			<!-- Listing Nav -->
			<div id="listing-nav" class="listing-nav-container">
				<ul class="listing-nav">
					<li><a href="#listing-overview" class="active">Overview</a></li>
					<li><a href="#listing-pricing-list">Pricing</a></li>
					<li><a href="#listing-location">Location</a></li>
					<li><a href="#listing-reviews">Reviews</a></li>
					<li><a href="#add-review">Add Review</a></li>
				</ul>
			</div>

			<!-- Overview -->
			<div id="listing-overview" class="listing-section">

				<!-- Description -->

				<p>
                    <?php echo nl2br($Overview); ?>
				</p>
			</div>


			<!-- Picture Menu -->
			<div id="listing-pricing-list" class="listing-section">
				<h3 class="listing-desc-headline margin-top-70 margin-bottom-30">Pricing</h3>

				<div class="show-more">
					<div class="pricing-list-container">

						<!-- Picture List -->
						<h4>PhotoShoot</h4>
						<ul>
							<li>
								<h5>Per Picture</h5>
								<span>$<?php echo $Pricingpp;?></span>
							</li>

						</ul>

						<!-- Video List -->
						<h4>Video</h4>
						<ul>
							<li>
								<h5>Per Hour</h5>
								<span>$<?php echo $Pricingph;?></span>
							</li>

						</ul>

					</div>
				</div>
			</div>
			<!-- Picture Menu / End -->


			<!-- Location -->
			<div id="listing-location" class="listing-section">
				<h3 class="listing-desc-headline margin-top-60 margin-bottom-30">Location</h3>

				<div id="singleListingMap-container">
					<img src="images/map.jpg" alt="" height="76%" width="110%">
				</div>
			</div>

			<!-- Reviews -->
			<div id="listing-reviews" class="listing-section">
				<h3 class="listing-desc-headline margin-top-75 margin-bottom-20">Reviews <span><?php echo $AvgRating; ?></span></h3>

				<div class="clearfix"></div>

				<!-- Reviews -->
                
             
                
				<section class="comments listing-reviews">

					<ul>
                           <?php
$ConnectingDB;
$TotalRating=0;
$SrNo=0;
$PostIdForComments=$_GET["id"];
$ExtractingCommentsQuery="SELECT * FROM reviews
WHERE photographer_id='$PostIdForComments' ";
$Execute=mysql_query($ExtractingCommentsQuery);
while($DataRows=mysql_fetch_array($Execute)){
	$CommentDate=$DataRows["datetime"];
	$CommenterName=$DataRows["name"];
    $CommenterRating=$DataRows["rating"];
	$Comments=$DataRows["comment"];
    $TotalRating+=$CommenterRating;
    $SrNo++;
    $AvgRating=$TotalRating/$SrNo;


?>
                        
						<li>
							<div class="avatar"><img src="images/gravatar.png" alt="" /></div>
							<div class="comment-content">
								<div class="arrow-comment"></div>
								<div class="comment-by"><?php echo $CommenterName; ?><span class="date"><?php echo $CommentDate; ?></span>
									<div class="star-rating" data-rating="<?php echo $CommenterRating; ?>"></div>
								</div>
								<p><?php echo nl2br($Comments); ?>
                            
								</p>

								<div class="review-images mfp-gallery-container">
									<a href="images/listing_01.jpg" class="mfp-gallery"><img src="images/listing_01.jpg" alt=""></a>
								</div>
								<a href="#" class="rate-review"><i class="sl sl-icon-like"></i> Helpful Review <span>20</span></a>
							</div>
						</li>


<?php } ?>
						
					</ul>
				</section>


			</div>

	<?php } ?>
            
            
            
			<!-- Add Review Box -->
			<div id="add-review" class="add-review-box">

				<!-- Add Review -->
				<h3 class="listing-desc-headline margin-bottom-20">Add Review</h3>

				<span class="leave-rating-title">Your rating for this listing</span>

				<!-- Rating / Upload Button -->
                <form method="post" action="listings-single-page.php?id=<?php echo $PostIDFromURL; ?>"  enctype="multipart/form-data" >
				<div class="row">
					<div class="col-md-6">
						<!-- Leave Rating -->
						<div class="clearfix"></div>
						<div class="leave-rating margin-bottom-30">
							<input type="radio" name="rating" id="rating-1" value="5" />
							<label for="rating-1" class="fa fa-star"></label>
							<input type="radio" name="rating" id="rating-2" value="4" />
							<label for="rating-2" class="fa fa-star"></label>
							<input type="radio" name="rating" id="rating-3" value="3" />
							<label for="rating-3" class="fa fa-star"></label>
							<input type="radio" name="rating" id="rating-4" value="2" />
							<label for="rating-4" class="fa fa-star"></label>
							<input type="radio" name="rating" id="rating-5" value="1" />
							<label for="rating-5" class="fa fa-star"></label>
						</div>
						<div class="clearfix"></div>
					</div>

					<div class="col-md-6">
						
					</div>
				</div>

				<!-- Review Comment -->
				
					<fieldset>

						<div class="row">
							<div class="col-md-6">
								<label>Name:</label>
								<input type="text" name="myname" value="" />
							</div>

							
						</div>

						<div>
							<label>Review:</label>
							<textarea name="mycomment" cols="40" rows="3"></textarea>
						</div>

					</fieldset>
                    
                    <button class="button" name="SubmitButton">Submit Review</button>
					
					
				</form>
<div class="clearfix"></div>
			</div>
			<!-- Add Review Box / End -->


		</div>


		<!-- Sidebar
		================================================== -->
		<div class="col-lg-4 col-md-4 margin-top-75 sticky">

			<!-- Contact -->
			<div class="boxed-widget">
				<h3><i class="sl sl-icon-pin"></i> Contact Details (Hire Now) </h3>
				<ul class="listing-details-sidebar">
					<li><i class="sl sl-icon-phone"></i><?php echo $Cell;?></li>
					<li><i class="sl sl-icon-globe"></i> <a href="#"><?php echo $Web;?></a></li>
					<li><i class="fa fa-envelope-o"></i> <a href="#">
                    <span ><?php echo $Email;?></span>
</a>
</li>
</ul>


<br>
<div class="listing-share margin-top-40 margin-bottom-40 no-border">

	<!-- Share Buttons -->
	<ul class="share-buttons margin-top-40 margin-bottom-0">
		<li><a class="fb-share" href="#"><i class="fa fa-facebook"></i> Share</a></li>
		<li><a class="twitter-share" href="#"><i class="fa fa-twitter"></i> Tweet</a></li>
		<li><a class="gplus-share" href="#"><i class="fa fa-google-plus"></i> Share</a></li>
		<!-- <li><a class="pinterest-share" href="#"><i class="fa fa-pinterest-p"></i> Pin</a></li> -->
	</ul>
	<div class="clearfix"></div>
</div>

</div>
<!-- Sidebar / End -->

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
				<p> “If the photographer is interested in the people in front of his lens, and if he is compassionate, it’s already a lot.
					The instrument is not the camera but the photographer.”</p>

			</div>


			<div class="col-md-3  col-sm-12">
				<h4>Contact Us</h4>
				<div class="text-widget">
					<span>DHA Phase VI</span> <br> Phone: <span>0334-1349002 </span><br> E-Mail:
					<span> <a href="#"><span class="__cf_email__" data-cfemail="d8b7bebeb1bbbd98bda0b9b5a8b4bdf6bbb7b5">[email&#160;protected]</span>
					<script data-cfhash='f9e31' type="text/javascript">/* <![CDATA[ */!function (t, e, r, n, c, a, p) { try { t = document.currentScript || function () { for (t = document.getElementsByTagName('script'), e = t.length; e--;)if (t[e].getAttribute('data-cfhash')) return t[e] } (); if (t && (c = t.previousSibling)) { p = t.parentNode; if (a = c.getAttribute('data-cfemail')) { for (e = '', r = '0x' + a.substr(0, 2) | 0, n = 2; a.length - n; n += 2)e += '%' + ('0' + ('0x' + a.substr(n, 2) ^ r).toString(16)).slice(-2); p.replaceChild(document.createTextNode(decodeURIComponent(e)), c) } p.removeChild(t) } } catch (u) { } } ()/* ]]> */</script>
</a>
</span><br>
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
<div id="backtotop">
	<a href="#"></a>
</div>


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

<!-- Maps -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
<script type="text/javascript" src="scripts/infobox.min.js"></script>
<script type="text/javascript" src="scripts/markerclusterer.js"></script>
<script type="text/javascript" src="scripts/maps.js"></script>





</body>


</html>