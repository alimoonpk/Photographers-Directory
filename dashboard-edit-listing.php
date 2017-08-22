
    <?php require_once("Include/DB.php"); ?>
    <?php require_once("Include/Sessions.php"); ?>
    <?php require_once("Include/Functions.php"); ?>
    <?php Confirm_Login(); ?>
    <?php
    if(isset($_POST["Submit"])){
    $studioname=mysql_real_escape_string($_POST["Studioname"]);
    $personname=mysql_real_escape_string($_POST["Personname"]);
    $pricingpp=mysql_real_escape_string($_POST["Pricingpp"]);
    $pricingph=mysql_real_escape_string($_POST["Pricingph"]);
    $cell=mysql_real_escape_string($_POST["Cell"]);
    $web=mysql_real_escape_string($_POST["Web"]);
    $email=mysql_real_escape_string($_POST["Email"]);
    $Category=mysql_real_escape_string($_POST["Category"]);
    $overview=mysql_real_escape_string($_POST["Overview"]);
    date_default_timezone_set("Asia/Karachi");
    $CurrentTime=time();
    //$DateTime=strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
    $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
    $DateTime;
        
    //$Admin=$_SESSION["Username"];
    $Image1=$_FILES["Image1"]["name"];
    $Image2=$_FILES["Image2"]["name"];
    $Image3=$_FILES["Image3"]["name"];
    $Image4=$_FILES["Image4"]["name"];
        
    $Target1="Upload/".basename($_FILES["Image1"]["name"]);
    $Target2="Upload/".basename($_FILES["Image2"]["name"]);
    $Target3="Upload/".basename($_FILES["Image3"]["name"]);
    $Target4="Upload/".basename($_FILES["Image4"]["name"]);
        
    if(empty($studioname)){
        $_SESSION["ErrorMessage"]="Studio can't be empty";
        Redirect_to("dashboard.php");

    }elseif(strlen($studioname)<2){
        $_SESSION["ErrorMessage"]="Studio Name Should be at-least 2 Characters";
        Redirect_to("dashboard.php");

    }else{
        global $ConnectingDB;
        
        $EditFromURL=$_GET['Edit'];
	    
        $Query="UPDATE photographerdata SET studioname='$studioname', personname='$personname',category='$Category' ,overview='$overview',pricingpp='$pricingpp',pricingph='$pricingph',cell='$cell',web='$web',email='$email',
        pic1='$Image1',pic2='$Image2',pic3='$Image3',pic4='$Image4' WHERE id='$EditFromURL'";
     
        $Execute=mysql_query($Query);
        move_uploaded_file($_FILES["Image1"]["tmp_name"],$Target1);
        move_uploaded_file($_FILES["Image2"]["tmp_name"],$Target2);
        move_uploaded_file($_FILES["Image3"]["tmp_name"],$Target3);
        move_uploaded_file($_FILES["Image4"]["tmp_name"],$Target4);
        
        if($Execute){
        $_SESSION["SuccessMessage"]="Listing Updated Successfully!";
        Redirect_to("dashboard.php");
        }else{
        $_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
        Redirect_to("dashboard.php");

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

                            <li><a href="index.php">Home</a>

                            </li>

                            <li><a href="listings-list-full-width.php">Listings</a>

                            </li>

                            <li><a class="current" href="#">User Panel</a>
                                <ul>
                                    <li><a href="dashboard.php">Dashboard</a></li>
                                    <li><a href="dashboard-add-listing.php">Add Listing</a></li>
                                </ul>
                            </li>

                            <li><a href="#">Contact

                            </a>

                            </li>

                        </ul>
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
                            <div class="user-name"><span><img src="images/furqan.jpg" alt="" height="45" width="65"></span>Ali Moon</div>
                            <ul>
                                <li><a href="dashboard.php"><i class="sl sl-icon-settings"></i> Dashboard</a></li>
                             
                                <li><a href="dashboard-add-listing.php"><i class="sl sl-icon-settings"></i> Add Listing</a></li>
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
                <li><a href="dashboard.php"><i class="sl sl-icon-settings"></i> Dashboard</a></li>
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
                        <h2>Edit Listing</h2>
                        <!-- Breadcrumbs -->
                        <nav id="breadcrumbs">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Dashboard</a></li>
                                <li>Edit Listing</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">

                    <div id="add-listing">

                        <!-- Section -->
                        <div class="add-listing-section">
                            <?php echo Message();
	      echo SuccessMessage();
	?>
                            
                            <?php
	$SerachQueryParameter=$_GET['Edit'];
	$ConnectingDB;
	$Query="SELECT * FROM photographerdata WHERE id='$SerachQueryParameter'";
	$ExecuteQuery=mysql_query($Query);
	while($DataRows=mysql_fetch_array($ExecuteQuery)){
		$StudioToBeUpdated=$DataRows['studioname'];
        $PersonToBeUpdated=$DataRows['personname'];
		$PPPToBeUpdated=$DataRows['pricingpp'];
        $PPHToBeUpdated=$DataRows['pricingph'];
        $CellToBeUpdated=$DataRows['cell'];
        $WebToBeUpdated=$DataRows['web'];
        $EmailToBeUpdated=$DataRows['email'];	
        $DescToBeUpdated=$DataRows['overview'];
	}
	
	
	?>
                            
<form action="dashboard-edit-listing.php?Edit=<?php echo $SerachQueryParameter; ?>" method="post" enctype="multipart/form-data">
                            <!-- Headline -->
    
                            <div class="add-listing-headline">
                                <h3><i class="sl sl-icon-doc"></i> Basic Informations</h3>
                            </div>

                            <!-- Title -->
                            <div class="row with-forms">
                                <div class="col-md-12">
                                    <h5>Studio Name <i class="tip" data-tip-content="Name of your business"></i></h5>
                                    <input name="Studioname" class="search-field" type="text" value="<?php echo $StudioToBeUpdated ?>"/>
                                    <h5>Owner Name</h5>
                                    <input name="Personname" class="search-field" type="text" value="<?php echo $PersonToBeUpdated?>"/>
                                </div>
                            </div>

                            <!-- Row -->
                            <div class="row with-forms">

                                <!-- Status -->
                                <div class="col-md-6">
                                    <h5>Category</h5>





                                    <select name="Category" class="chosen-select-no-single" >

                                        <?php
    global $ConnectingDB;
    $ViewQuery="SELECT * FROM category ORDER BY id desc";
    $Execute=mysql_query($ViewQuery);
    while($DataRows=mysql_fetch_array($Execute)){
        $Id=$DataRows["id"];
        $CategoryName=$DataRows["name"];
    ?>	
        <option><?php echo $CategoryName; ?></option>
        <?php } ?>

                                    </select>
                                </div>

                               

                            </div>
                            <!-- Row / End -->

                            </div>
                        <!-- Section / End -->

                      


                        <!-- Section -->
                        <div class="add-listing-section margin-top-45">

                            <!-- Headline -->
                            <div class="add-listing-headline">
                                <h3><i class="sl sl-icon-picture"></i> Gallery (Choose your 4 Best Images)</h3>
                            </div>

                            <!-- Dropzone -->
                            <div class="submit-section">
                                <input type="File" class="form-control" name="Image1" id="imageselect">
                                <input type="File" class="form-control" name="Image2" id="imageselect">
                                <input type="File" class="form-control" name="Image3" id="imageselect">
                                <input type="File" class="form-control" name="Image4" id="imageselect">
                            </div>

                        </div>
                        <!-- Section / End -->


                        <!-- Section -->
                        <div class="add-listing-section margin-top-45">

                            <!-- Headline -->
                            <div class="add-listing-headline">
                                <h3><i class="sl sl-icon-docs"></i> Details</h3>
                            </div>

                            <!-- Description -->
                            <div class="form">
                                <h5>Description</h5>
                                <textarea name="Overview" class="WYSIWYG" name="summary" cols="40" rows="3" id="summary" spellcheck="true"><?php echo $DescToBeUpdated; ?></textarea>
                            </div>

                            <!-- Row -->
                            <div class="row with-forms">

                                <!-- Phone -->
                                <div class="col-md-4">
                                    <h5>Phone <span>(optional)</span></h5>
                                    <input value="<?php echo $CellToBeUpdated; ?>" name="Cell" type="text">
                                </div>

                                <!-- Website -->
                                <div class="col-md-4">
                                    <h5>Website <span>(optional)</span></h5>
                                    <input value="<?php echo $WebToBeUpdated; ?>" name="Web" type="text">
                                </div>

                                <!-- Email Address -->
                                <div class="col-md-4">
                                    <h5>E-mail <span>(optional)</span></h5>
                                    <input value="<?php echo $EmailToBeUpdated; ?>" name="Email" type="text">
                                </div>

                            </div>
                            <!-- Row / End -->


                            <!-- Row -->
                            <div class="row with-forms">

                                <!-- Phone -->
                                <div class="col-md-6">
                                    <h5 class="fb-input">Pricing Per Picture <span>(Photoshoot)</span></h5>
                                    <input value="<?php echo $PPPToBeUpdated; ?>" name="Pricingpp" type="text">
                                </div>

                                <!-- Website -->
                                <div class="col-md-6">
                                    <h5 class="twitter-input">Pricing Per Hour<span>(Video)</span></h5>
                                    <input value="<?php echo $PPHToBeUpdated; ?>" name="Pricingph" type="text">
                                </div>

                              
                            </div>
                            <!-- Row / End -->



                        </div>
                        <!-- Section / End -->


                           

                        </div>
                        <!-- Section / End -->


                        
                        <input class="button preview" type="Submit" name="Submit" value="Edit Listing">

                    </div>
                </div>

                </form>
                
                <!-- Copyrights -->
                <div class="col-md-12">
                    <div class="copyrights">© 2017 Best Photography. All Rights Reserved.</div>
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


   

    <!-- DropZone | Documentation: http://dropzonejs.com -->
    <script type="text/javascript" src="scripts/dropzone.js"></script>


    </body>

    </html>