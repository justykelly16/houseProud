<?php
header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); 
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
              $contractorid=$_SESSION['contractorid_40214842'];
          }
     }
    $userid=$_GET['userid'];
      
    $sql="SELECT * FROM  PRO_User WHERE id = '$userid';" ;
    $result = mysqli_query($conn, $sql) or die(mysqli_errno($conn));
    
    if(mysqli_num_rows($result)==1){
        $rows= mysqli_fetch_assoc($result);
        $fname=$rows['firstname'];
        $lname=$rows['lastname'];
        $pic=$rows['profile_picture'];
        $county=$rows['County'];
         $town=$rows['Town'];
       
        
    }
     $query1="SELECT AVG(star_rating), COUNT(star_rating) FROM PRO_rate_client 
                                                             WHERE userfk=$userid";
      $result2 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
      if(mysqli_num_rows($result2)>0){
      $rows= mysqli_fetch_assoc($result2);
      $star=$rows['AVG(star_rating)'];
      $reviews=$rows['COUNT(star_rating)'];
      }
      
      $query2="SELECT * FROM PRO_rate_client WHERE userfk='$userid'";
       $result3 = mysqli_query($conn, $query2) or die(mysqli_errno($conn));
       
       function timeAgo($time_ago){
$cur_time 	= time();
$time_elapsed 	= $cur_time - $time_ago;
$seconds 	= $time_elapsed ;
$minutes 	= round($time_elapsed / 60 );
$hours 		= round($time_elapsed / 3600);
$days 		= round($time_elapsed / 86400 );
$weeks 		= round($time_elapsed / 604800);
$months 	= round($time_elapsed / 2600640 );
$years 		= round($time_elapsed / 31207680 );
// Seconds
if($seconds <= 60){
	echo "$seconds seconds ago";
}
//Minutes
else if($minutes <=60){
	if($minutes==1){
		echo "one minute ago";
	}
	else{
		echo "$minutes minutes ago";
	}
}
//Hours
else if($hours <=24){
	if($hours==1){
		echo "an hour ago";
	}else{
		echo "$hours hours ago";
	}
}
//Days
else if($days <= 7){
	if($days==1){
		echo "yesterday";
	}else{
		echo "$days days ago";
	}
}
//Weeks
else if($weeks <= 4.3){
	if($weeks==1){
		echo "a week ago";
	}else{
		echo "$weeks weeks ago";
	}
}
//Months
else if($months <=12){
	if($months==1){
		echo "a month ago";
	}else{
		echo "$months months ago";
	}
}
//Years
else{
	if($years==1){
		echo "one year ago";
	}else{
		echo "$years years ago";
	}
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
	<div class="container">
		
		
		<main id="htlfndr-main-content" role="main">
  <div class='container'>
                                <br>
                                                                 
		  <div class="row">
					<div class="htlfndr-visitor-review">
								<div class="htlfndr-review-left-side">
									<div class="htlfndr-visitor-avatar">
                                                                            <img src="images/<?php echo "$pic";?>" alt="visitor photo" />
									</div><!-- .htlfndr-visitor-avatar -->
									
									<dl>
										<dt><?php echo"$fname $lname";?></dt>
										<dd><i class='fa fa-location-arrow'></i> <?php echo"$town, $county";?></dd>
									</dl>
								</div><!-- .htlfndr-review-left-side -->
								<div class="htlfndr-review-right-side">
									<article class="htlfndr-visitor-post">
                                                                            <h3>Reviews</h3>
                                                                            <p>Overall Rating</p>
										<?php 
                                                                                        if($star>4&&$star<=5){
                                                                 echo"<div class='htlfndr-rating-stars' data-rating='5'>
										<i class='fa fa-star htlfndr-star-color'></i>
										<i class='fa fa-star htlfndr-star-color'></i>
										<i class='fa fa-star htlfndr-star-color'></i>
										<i class='fa fa-star htlfndr-star-color'></i>
										<i class='fa fa-star htlfndr-star-color'></i>
										<p class='htlfndr-Spagere-reviews'>(<span>$reviews</span> reviews)</p>
									</div><!-- .htlfndr-rating-stars -->";
                                                             }else if($star>3&&$star<=4){
                                                                 echo"
                                                             
                                                                 <div class='htlfndr-rating-stars' data-rating='4'>
										<i class='fa fa-star htlfndr-star-color'></i>
										<i class='fa fa-star htlfndr-star-color'></i>
										<i class='fa fa-star htlfndr-star-color'></i>
										<i class='fa fa-star htlfndr-star-color'></i>
										<i class='fa fa-star'></i>
										<p class='htlfndr-Spagere-reviews'>(<span>$reviews</span> reviews)</p>
									</div><!-- .htlfndr-rating-stars -->";
                                                                 
                                                             }else if($star>2&&$star<=3){
                                                                  echo"
                                                             
                                                                 <div class='htlfndr-rating-stars' data-rating='3'>
										<i class='fa fa-star htlfndr-star-color'></i>
										<i class='fa fa-star htlfndr-star-color'></i>
										<i class='fa fa-star htlfndr-star-color'></i>
										<i class='fa fa-star'></i>
										<i class='fa fa-star'></i>
										<p class='htlfndr-Spagere-reviews'>(<span>$reviews</span> reviews)</p>
									</div><!-- .htlfndr-rating-stars -->";
                                                                 
                                                             }else if($star>1&&$star<=2){
                                                                  echo"
                                                             
                                                                 <div class='htlfndr-rating-stars' data-rating='2'>
										<i class='fa fa-star htlfndr-star-color'></i>
										<i class='fa fa-star htlfndr-star-color'></i>
										<i class='fa fa-star'></i>
										<i class='fa fa-star'></i>
										<i class='fa fa-star'></i>
										<p class='htlfndr-Spagere-reviews'>(<span>$reviews</span> reviews)</p>
									</div><!-- .htlfndr-rating-stars -->";
                                                                 
                                                             }else if($star>0&&$star<=1){
                                                                  echo"
                                                             
                                                                 <div class='htlfndr-rating-stars' data-rating='1'>
										<i class='fa fa-star htlfndr-star-color'></i>
										<i class='fa fa-star'></i>
										<i class='fa fa-star'></i>
										<i class='fa fa-star'></i>
										<i class='fa fa-star'></i>
										<p class='htlfndr-Spagere-reviews'>(<span>$reviews</span> reviews)</p>
									</div><!-- .htlfndr-rating-stars -->";
                                                                 
                                                             }
                                                                                ?>
                                                                          
												
						
                                                                              
                                                                                <br>
                                                                                <?php 
                                                                                if(mysqli_num_rows($result3)>0){
                                                                                    while($row= mysqli_fetch_assoc($result3)){
                                                                                        $starrating=$row['star_rating'];
                                                                                        $review=$row['review'];
                                                                                        $clientname=$row['name'];
                                                                                        $time=$row['time'];
                                                                                        
                                                                                        $currenttime=$time;
                                                                                        $time_ago=strtotime($currenttime);
                                                                                        
                                                                                        echo"<div class='col-xs-6 col-sm-6 col-md-6 htlfndr-review-footer-marks'>";
                                                                                            if($starrating>4&&$starrating<=5){
                                                                 echo"
										<i class='fa fa-star htlfndr-star-color'></i>
										<i class='fa fa-star htlfndr-star-color'></i>
										<i class='fa fa-star htlfndr-star-color'></i>
										<i class='fa fa-star htlfndr-star-color'></i>
										<i class='fa fa-star htlfndr-star-color'></i>
                                                                                <p>"; echo timeAgo($time_ago); echo"</p>
										
									";
                                                             }else if($starrating>3&&$starrating<=4){
                                                                 echo"
                                                             
                                                               
										<i class='fa fa-star htlfndr-star-color'></i>
										<i class='fa fa-star htlfndr-star-color'></i>
										<i class='fa fa-star htlfndr-star-color'></i>
										<i class='fa fa-star htlfndr-star-color'></i>
										<i class='fa fa-star'></i>
									<p>"; echo timeAgo($time_ago); echo"</p>
									";
                                                                 
                                                             }else if($starrating>2&&$starrating<=3){
                                                                  echo"
                                                             
                                                                 
										<i class='fa fa-star htlfndr-star-color'></i>
										<i class='fa fa-star htlfndr-star-color'></i>
										<i class='fa fa-star htlfndr-star-color'></i>
										<i class='fa fa-star'></i>
										<i class='fa fa-star'></i>
										<p>"; echo timeAgo($time_ago); echo"</p>
									";
                                                                 
                                                             }else if($starrating>1&&$starrating<=2){
                                                                  echo"
                                                             
                                                                
										<i class='fa fa-star htlfndr-star-color'></i>
										<i class='fa fa-star htlfndr-star-color'></i>
										<i class='fa fa-star'></i>
										<i class='fa fa-star'></i>
										<i class='fa fa-star'></i>
										<p>"; echo timeAgo($time_ago); echo"</p>
									";
                                                                 
                                                             }else if($starrating>0&&$starrating<=1){
                                                                  echo"
                                                             
                                                                 
										<i class='fa fa-star htlfndr-star-color'></i>
										<i class='fa fa-star'></i>
										<i class='fa fa-star'></i>
										<i class='fa fa-star'></i>
										<i class='fa fa-star'></i>
										<p>"; echo timeAgo($time_ago); echo"</p>
									";
                                                                 
                                                             }else{
                                                                 echo"
                                                                 <p class='htlfndr-Spagere-reviews'>No reviews yet</p>
                                                                 ";
                                                             }
                                                             echo"
                                                                 <p>$clientname said:</p>
                                                                     <p>$review</p>
                                                                                            
                                                                                                </div>
                                                                                            
                                                                                                    ";
                                                                                    }
                                                                                }else{
                                                                                    echo"No reviews yet";
                                                                                }
                                                                                ?>
                                                                          
										
									</article>
								</div><!-- .htlfndr-review-right-side -->
							</div><!-- .htlfndr-visitor-review -->
                  </div>
  </div>
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