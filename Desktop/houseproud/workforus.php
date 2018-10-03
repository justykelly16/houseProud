<?php
session_start();
include("connect.php");
if(!isset($_SESSION["id_40214842"]))
{
        header("Location: index.php");
    }
       
   
    $id=$_SESSION['id_40214842'];
     $admin=$_SESSION["admin_40214842"];
     if($admin=='No'){
      $firstname=$_SESSION['firstname_40214842'];
      $contractor=$_SESSION['contractor_40214842'];
      if($contractor=='Yes'){
         header("Location: index.php");
        
    }
     }
    
    
   
    


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>House Proud</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<!-- Main styles -->
	<link href="css/style.css" rel="stylesheet" />
	<!--<link rel="stylesheet/less" href="css/style.less" />-->
	<!-- IE styles -->
	<link href="css/ie.css" rel="stylesheet" />
	<!-- Font Awesome -->
	<link href="css/font-awesome.min.css" rel="stylesheet" />
	<!-- Jquery UI -->
	<link href="css/jquery-ui.css" rel="stylesheet" />
	<!-- OWL Carousel -->
	<link href="css/owl.carousel.css" rel="stylesheet" />

	<link href="css/select-style.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<!-- Overlay preloader-->
<div class="htlfndr-loader-overlay"></div>

<div class="htlfndr-wrapper">
	<header>
		<div class="htlfndr-top-header">
			<div class="navbar navbar-default htlfndr-blue-hover-nav">
				<div class="container">
							<a class="htlfndr-logo navbar-brand" href="index.php">
									
									<p class="htlfndr-logo-text">House <span>Proud</span></p>
								</a>	
						<ul class="nav navbar-nav">
                                                    <?php if($admin=='No'){ ?>
							<li>
								<a href="postajob.php">post a job</a>
							</li>
							<li><a href="myjobs.php">my jobs</a></li>
						
							<li>
								<a href="about-us.php">about</a>
							</li>
							
                                                                          <?php
                                                                             if($contractor=='No'){
                                                            echo"
                                                                <li>
								<a href='workforus.php'>work for us</a>
							</li>";
                                                        }
                                                       
                                                                        ?>
                                                    
                                                        
							<li  class="dropdown">
                                                            <a href="#" onclick="return false;"><?php echo "$firstname"?></a>
                                                        
								<ul class="dropdown-menu">
							
									<li><a href="myjobs.php">My Jobs</a></li>
									<li><a href="postajob.php">Post a Job</a></li>
                                                                        <li><a href="completedjobs.php">My Completed Jobs</a></li>
                                                                        <li><a href="userprofile.php?userid=<?php echo"$id"?>">My Profile</a></li>
                                                                       
                                                                          
                                                                            <?php if($contractor=='Yes'){
                                                                            echo"
                                                                            <li><a href='viewconprofile.php?conid=$contractorid'>My Contractor Profile</a></li> 
                                                                                <li><a href='browsejobs.php'>Browse Jobs</a></li>
                                                                        ";} 
                                                                        
                                                                        ?> 
                                                                     
                                                                        
                                                                      
									
                                                                        
									<li><a href="paymentmethods.php">Payment Methods</a></li>
                                                                        <li><a href="settings.php">Settings</a></li>
                                                                         <li><a href="#" onclick="logout()">Logout</a></li>
								</ul>
							</li>
                                                        <?php }else if($admin=='Yes'){?>
                                                        <li>
								<a href="contractors.php">Contractors</a>
							</li>
							<li><a href="customers.php">Customers</a></li>
						
							<li>
								<a href="pendingcontractors.php">Pending Contractors</a>
							</li>
							<li>
								<a href="messages.php">messages</a>
							</li>
                                                        <li><a href="settings.php"><i class="fa fa-wrench"></i> settings</a></li>
                                                         <li><a href="#" onclick="logout()">Logout</a></li>
                                                        <?php } ?>
						</ul>
                                    
                                              <script>
              
 function logout() {
var logout = confirm('Are you sure you want to logout?');

if(logout){
     location.href = 'logout.php';
}
}
</script>
					
				</div><!-- .container -->
			</div><!-- .navbar.navbar-default.htlfndr-blue-hover-nav-->
		</div><!-- .htlfndr-top-header -->
		<!-- Start of main navigation -->
	
		<!-- End of main navigation -->
		<noscript><h2>You have JavaScript disabled!</h2></noscript>
	</header>

	<!-- Start of main content -->
	
		
		
		
			<div class="htlfndr-about-us">	
			<main id="htlfndr-main-content" class=" htlfndr-main-content" role="main">	
			<article>
				
				<h1 class="text-center">Start Earning Money </h1>
				<div class="htlfndr-section-under-title-line"></div>
				<div class="htlfndr-text">
					<p>Start working for us today. Simply complete are registering process and once verified by our team. Gain access to hundred of jobs in your chosen area</p>
					
				</div>
			</article>	
			<article class="htlfndr-creative-team">
			
					<p class="text-center htlfndr-font-24"><i class="fa fa-users"></i></p>	
				<h1 class="text-center">Become a member of the team</h1>
				<hr>
				
				<div class="row container">
					<div class="col-md-3 col-sm-6 col-xs-6">
						<div class="htlfndr-user-person-navigation">
								<div class="htlfndr-user-avatar">
                                                                    <img src="images/pound.png">
								</div>
							<h3 class="htlfndr-user-name">Great Pay</h3>
							
                                                        <p class="text-center">Our top professionals make more than &pound500 a week</p>
                                                     
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-6">
						<div class="htlfndr-user-person-navigation">
								<div class="htlfndr-user-avatar">
                                                                    <img src="images/boss.png">
								</div>
							<h3 class="htlfndr-user-name">You're in Charge</h3>
							
                                                        <p class="text-center">Select jobs that you would like to complete and for the clients you are happy to work with </p>
                                                       
                                                        
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-6">
						<div class="htlfndr-user-person-navigation">
								<div class="htlfndr-user-avatar">
                                                                    <img src='images/easypayments.png'>
								</div>
							<h3 class="htlfndr-user-name">Quick Payments</h3>
							
                                                        <p class="text-center">As soon as the job is complete payments are directly deposited</p>
                                                       
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-6">
						<div class="htlfndr-user-person-navigation">
								<div class="htlfndr-user-avatar">
                                                                    <img src='images/schedule.png'>
								</div>
							<h3 class="htlfndr-user-name">Flexible Schedule</h3>
							
							<p class="text-center">Build a schedule that suits you</p>
                                                       
						</div>
					</div>
				</div>
			</article>
			<article class="htlfndr-contact container">	
				
				<p class="text-center"><a class="btn-default" href="registertowork.php">Get Started</a></p>
			</article>		

			

		
			
				
                </main>
        </div>
		




	<!-- Start of the Footer -->
	<footer class="htlfndr-footer">
		<button class="htlfndr-button-to-top" role="button"><span>Back to top</span></button><!-- Button "To top" -->

		<div class="widget-wrapper">
			<div class="container">
				<div class="row">
					<aside class="col-xs-12 col-sm-6 col-md-3 htlfndr-widget-column">
						<div class="widget">
							<a class="htlfndr-logo navbar-brand" href="#">
								<img src='images/logo2.png' alt='Logo' />
								<p class="htlfndr-logo-text">House <span>proud</span></p>
							</a>
							<hr />
							
							<h5>address</h5>
							<p>House Proud	<br />86 Crawfordstown Road, Ballynahinch, N.Ireland</p>
							<hr />
							<h5>phone number</h5>
							<p>1-555-5555-5555</p>
							<hr />
							<h5>email address</h5>
							<p>support@houseproud.com</p>
						</div><!-- .widget -->
					</aside><!-- .col-xs-12.col-sm-6.col-md-3.htlfndr-widget-column -->
					<aside class="col-xs-12 col-sm-6 col-md-3 htlfndr-widget-column">
						<div class="widget">
						<h3 class="widget-title">popular services</h3>
                                                <p>Handyman</p>
                                                <p>Furniture Assembly</p>
                                                <p>Home Cleaning</p>
                                                <p>Removals</p>
                                                <p>Gardening Maintenance</p>
                                                <p>Window Cleaning</p>
						</div><!-- .widget -->
					</aside><!-- .col-xs-12.col-sm-6.col-md-3.htlfndr-widget-column -->
					<aside class="col-xs-12 col-sm-6 col-md-3 htlfndr-widget-column">
						<div class="widget">
							<h3 class="widget-title">follow us</h3>
							<!-- Start of Follow Us buttons -->
							<div class="htlfndr-follow-plugin">
								<a href="https://www.facebook.com/Houseproud/" target="_blank" class="htlfndr-follow-button button-facebook"></a>
								<a href="https://twitter.com/Houseproud" target="_blank" class="htlfndr-follow-button button-twitter"></a>
								<a href="https://plus.google.com/+Houseproud" target="_blank" class="htlfndr-follow-button button-google-plus"></a>
								<a href="https://www.linkedin.com/company/Houseproud/" target="_blank" class="htlfndr-follow-button button-linkedin"></a>
								<a href="#" class="htlfndr-follow-button button-pinterest"></a>
								<a href="https://www.youtube.com/Houseproud" target="_blank" class="htlfndr-follow-button button-youtube"></a>
							</div><!-- .htlfndr-follow-plugin -->	
						</div><!-- .widget -->
					</aside><!-- .col-xs-12.col-sm-6.col-md-3.htlfndr-widget-column -->
			
				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- .widget-wrapper -->

		<div class="htlfndr-copyright">
			<div class="container" role="contentinfo">
				<p>Copyright 2017 | Spagere | All Rights Reserved | Designed by Spagere</p>
			</div><!-- .container -->
		</div><!-- .htlfndr-copyright -->
	</footer>
</div><!-- .htlfndr-wrapper -->



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-1.11.3.min.js"></script>
<!-- Include Jquery UI script file -->
<script src="js/jquery-ui.min.js"></script>
<!-- Include Query UI Touch Punch is a small hack that enables the use
		 of touch events on sites using the jQuery UI user interface library. -->
		 <script src="js/jquery.responsiveTabs.min.js"></script>
<script src="js/jquery.ui.touch-punch.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<!-- Include Touch Menu Hover script file -->
<script src="js/jquery.ui.touch-punch.min.js"></script>
<!-- Include Owl Carousel script file -->
<script src="js/owl.carousel.min.js"></script>

<script type="text/javascript" src="js/jquery.custom-select.js"></script>
<!-- Include main script file -->
<script src="js/script.js"></script>
</body>
</html>