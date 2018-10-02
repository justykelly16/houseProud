<?php
session_start();
if(!isset($_SESSION["id_40214842"])||(empty($_POST)))
{
    header("Location: index.php");
}
include("connect.php");
 $admin=$_SESSION["admin_40214842"];
  $id=$_SESSION['id_40214842'];
$sql="SELECT * FROM PRO_Payment WHERE userfk='$id' ";
$res= mysqli_query($conn, $sql) or die(mysqli_errno($conn));
if(mysqli_num_rows($res)==0){
    echo" <script>
        alert('Please add a valid card in payment methods. Before posting a job');
        window.location.href='paymentmethods.php'
        </script>";
}else{

$postjobname= mysqli_real_escape_string($conn,$_POST["job-name"]);
$postjobcategory=mysqli_real_escape_string($conn,$_POST["job-category"]);

$poststreet=mysqli_real_escape_string($conn,$_POST["street"]);
$posttown=mysqli_real_escape_string($conn,$_POST["town"]);
$postcode=mysqli_real_escape_string($conn,$_POST["postcode"]);

$postcounty=mysqli_real_escape_string($conn,$_POST["county"]);

$postbudget=mysqli_real_escape_string($conn,$_POST["budget"]);
$postjobdescription=mysqli_real_escape_string($conn,$_POST["contact-message"]);
$postdate= mysqli_real_escape_string($conn, $_POST['htlfndr-date-in']);
  
   
   if($admin=='No'){ 
         $email=$_SESSION['email_40214842'];
    $contractor=$_SESSION['contractor_40214842'];
     $pic=$_SESSION['pic_40214842'];
       $firstname=$_SESSION['firstname_40214842'];
    $lastname=$_SESSION['lastname_40214842'];
    $pic=$_SESSION['pic_40214842'];
              if($contractor=='Yes'){
              $contractorid=$_SESSION['contractorid_40214842'];
   

              }
   }
  

$query = ("INSERT INTO PRO_Post_Task (taskid,job_title, job_category, Description, 
    street, town,  county, postcode, Budget, Due_date, userfk) VALUES (NULL,'$postjobname','$postjobcategory',
        '$postjobdescription','$poststreet','$posttown','$postcounty',
        '$postcode','$postbudget','$postdate','$id');
        INSERT INTO PRO_Jobs(id,Date_posted,status) VALUES (LAST_INSERT_ID(),CURRENT_TIMESTAMP,'Open');
        INSERT INTO PRO_Jobs_assigned(id,job_status) VALUES(LAST_INSERT_ID(),'Open')");

$result = mysqli_multi_query($conn, $query) or die(mysqli_error($conn));
mysqli_close($conn);


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
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
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

<div class="htlfndr-wrapper htlfndr-user-page">
	<header>
		<div class="htlfndr-top-header">
			<div class="navbar navbar-default htlfndr-blue-hover-nav">
				<div class="container">
							<a class="htlfndr-logo navbar-brand" href="index.php">
									
									<p class="htlfndr-logo-text">House <span>Proud</span></p>
								</a>	
						<ul class="nav navbar-nav">
							<li>
								<a href="postajob.php">post a job</a>
							</li>
                                                        <li><a href="myjobs.php">my jobs</a></li>
						
							<li>
								<a href="about-us.php">about</a>
							</li>
							
							<li  class="dropdown">
								<a href="#" onclick="return false;"><?php echo "$firstname"?></a>
								<ul class="dropdown-menu">
							
									<li><a href="myjobs.php">My Jobs</a></li>
									<li><a href="postajob.php">Post a Job</a></li>
                                                                        <li><a href="userprofile.php?userid=<?php echo"$id"?>">My Profile</a></li>
                                                                         <li><a href="completedjobs.php">My Completed Jobs</a></li>
                                                                          
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
	<div class="container">
			<div class="container">
		
		<main id="htlfndr-main-content" class="htlfndr-main-content" role="main">	
			<article class="htlfndr-thanks-page text-center">
				<h1>Thank You!</h1>		
				<h3>for choosing 
					<a href="index.php">
						<span class="htlfndr-logo-text"> House <span>Proud</span></span>
					</a>
				</h3>
				
                                <a class="htlfndr-more-link text-center" href="myjobs.php">my jobs</a>
                                
                              
			</article><!-- .row .htlfndr-page-content -->
		</main><!-- .htlfndr-Spagere-single-content -->
		</div><!-- .container -->
		
		
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
<!-- Include Query UI Touch Punch is a small hack that enables the use of touch events on sites using the jQuery UI user interface library. -->
<script src="js/jquery.ui.touch-punch.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<!-- Include Touch Menu Hover script file -->
<script src="js/jquery.ui.touch-punch.min.js"></script>
<!-- Include Owl Carousel script file -->
<script src="js/owl.carousel.min.js"></script>
<!-- Include main script file -->
<script src="js/script.js"></script>
<!--<script src="js/less.min.js" ></script> -->
</body>
</html>
<?php } ?>