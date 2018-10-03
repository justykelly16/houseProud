<?php
session_start();
include("connect.php");
if(!isset($_SESSION["id_40214842"]))
{
        header("Location: index.php");
    }
    
    if(!isset($_SESSION["contractorid_40214842"]))
{
        header("Location: index.php");
    }
       
   
    $id=$_SESSION['id_40214842'];
   $firstname=$_SESSION['firstname_40214842'];
   $lastname=$_SESSION['lastname_40214842'];
   $pic=$_SESSION['pic_40214842'];
   $contractorid=$_SESSION['contractorid_40214842'];
   $tasks=$_SESSION['tasks_40214842'];
   $countiescovered=$_SESSION['counties_covered_40214842'];
   
   $query="SELECT * FROM `PRO_Post_Task` INNER JOIN PRO_Jobs_assigned
       ON PRO_Post_Task.taskid=PRO_Jobs_assigned.id 
       WHERE find_in_set(job_category,'$tasks')>0 AND find_in_set(county,'$countiescovered')>0;";
   
   $result = mysqli_query($conn, $query) or die(mysqli_errno($conn));
    


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
                                                                       
                                                                          
                                                                            <li><a href='viewconprofile.php?conid=<?php echo"$contractorid";?>'>My Contractor Profile</a></li> 
                                                                            <li><a href="browsejobs.php">Browse Jobs</a></li>
                                                                        
                                                                      
									
                                                                        
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
		
		
		<main id="htlfndr-main-content" role="main">
                     <br>
                    		<div class="htlfndr-user-person-navigation-wrapper hidden-sm hidden-xs col-md-3">
					<div class="widget htlfndr-widget-archive">
					<div class="htlfndr-widget-main-content htlfndr-widget-padding">
						<div class="htlfndr-user-avatar">
							<img src="images/<?php echo"$pic";?>" alt="user avatar"/>
						</div>
                                            <h3 class="htlfndr-user-name"><?php echo "$firstname $lastname" ?></h3>
						
							<ul role="tablist">
                                                    <li><a href="myjobs.php"><i class="fa fa-user"></i>my jobs</a></li>
                                                    <li><a href="postajob.php"><i class="fa fa-clock-o"></i>post a job</a></li>
                                                    <li><a href="userprofile.php?userid=<?php echo"$id";?>"><i class='fa fa-user'></i> my profile</a></li> 
                                                    
                                                    
                                                       <li><a href='viewconprofile.php?conid=<?php echo"$contractorid";?>'><i class='fa fa-user'></i> my contractor profile</a></li> 
                                                            <li><a href='browsejobs.php'><i class='fa fa-book'></i>browse jobs</a></li>
                                                            
                                                        
                                                   
                                                    
							<li><a href="paymentmethods.php"><i class="fa fa-credit-card"></i> payment methods</a></li>
                                                        <li><a href="completedjobs.php"><i class="fa fa-history"></i> my completed jobs</a></li>
							<li><a href="settings.php"><i class="fa fa-wrench"></i> settings</a></li>
						</ul>
                                        </div>
					</div><!-- .htlfndr-user-person-navigation -->
				</div><!-- .htlfndr-user-person-navigation-wrapper -->
			<div class="htlfndr-user-panel col-md-9 col-sm-8 htlfndr-credit-page">
                            <?php 
                            if(mysqli_num_rows($result)>0){
                                while($row= mysqli_fetch_assoc($result)){
                                    $clientjobid=$row['taskid'];
                                     $clientjobtitle=$row['job_title'];
                                                        $budget=$row['Budget'];
                                                        $clienttown=$row['town'];
                                                        $clientcounty=$row['county'];
                                                        $duedate=$row['Due_date'];
                                                        $userid=$row['userfk'];
                                                        $jobcat=$row['job_category'];
                                                        $jobstatus=$row['job_status'];
                                                        
                                                        $title= substr($clientjobtitle, 0,16);
                                                       
                                                         if(($userid!=$id)&&($jobstatus=='Open')){
                                                         echo" 
                                                         <div class='htlfndr-credit-card'>
						
						<div class='htlfndr-person-card'>
							<span class='htlfndr-person-name'>$title</span>
							<span class='pull-right'><h5><b>&pound$budget</b></h5></span>
						</div>
						<div class='htlfndr-person-card'>
                                               
							<h5><i class='fa fa-location-arrow'></i>  $clienttown, $clientcounty<h/5><br>
							<h5><i class='fa fa-calendar'></i>  $duedate<h/5>
						<br>
                                                
                                                    
                                     <span class='pull-left'><form method='POST' action='viewjob.php'>
                                                                <input type='hidden' value='$jobcat' name='jobcat'>
                                                                    <input type='hidden' value='$userid' name='clientid'>
                                                                        <input type='hidden' value='$clientcounty' name='countyid'>
                                                                            <input type='hidden' value='$clientjobid' name='jobid'>
                                                                   <input type='submit' value='View' class='btn-primary'>
                                                                   </form>
                                                                   </form></span>
                                                </div>            
					</div>
                                       
                                        ";
                                                         }
                                }
                            }
                            else{
                                
                            
                            echo"
                            

		
					<div class='htlfndr-credit-card'>
						<div class='htlfndr-add-card'>
							
								<div class='htlfndr-person-card'>
								<span class='htlfndr-person-name'>No Jobs Available In Your Area</span>
							</div>
						</div>
					</div>	
                                    ";
                            }
                            ?>
				</div><!-- .row .htlfndr-user-tabs-3 -->
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