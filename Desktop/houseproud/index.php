<?php
include ('connect.php');

?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>HouseProud</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<!-- Main styles -->
	<link href="css/style.css" rel="stylesheet" />
	<!--<link rel="stylesheet/less" href="css/style.less" />-->
	<!-- IE styles -->
	<link href="css/ie.css" rel="stylesheet" />
	<!-- Font Awesome -->
	<link href="css/font-awesome.min.css" rel="stylesheet" />
	<!-- OWL Carousel -->
	<link href="css/owl.carousel.css" rel="stylesheet" />
	<!-- Jquery UI -->
	<link href="css/jquery-ui.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="/code_examples/tutorial.css">
        


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
                    <?php
                    session_start();
                    if((isset($_SESSION["id_40214842"]))&&($_SESSION["admin_40214842"]=='No')){
                        $id=$_SESSION["id_40214842"];
                   $query1 = "SELECT PRO_User.id, PRO_User.firstname, PRO_User.lastname, PRO_User.contractor, PRO_User.profile_picture,
PRO_Login.email FROM PRO_User INNER JOIN PRO_Login ON PRO_User.id = PRO_Login.id WHERE PRO_Login.id = '$id'";

    $result1 = mysqli_query($conn, $query1) or die(mysqli_errno($conn));



  if(mysqli_num_rows($result1)>0){
      while($row= mysqli_fetch_assoc($result1)){
            
          $firstname=$row['firstname'];
          $lastname=$row['lastname'];
     
          $contractor=$row['contractor'];
          $pic=$row['profile_picture'];
          
          $_SESSION['firstname_40214842']=$firstname;
          $_SESSION['lastname_40214842']=$lastname;
          $_SESSION['contractor_40214842']=$contractor;
          $_SESSION['pic_40214842']=$pic;
      }
  }
  if($contractor=='Yes'){
     $sql="SELECT PRO_Contractor.id, PRO_Job_alerts.Tasks_wanted, PRO_Job_alerts.Counties_Covered FROM PRO_Job_alerts INNER JOIN PRO_Contractor 
         ON PRO_Job_alerts.contractorfk=PRO_Contractor.id INNER JOIN 
         PRO_User ON PRO_Contractor.userfk=PRO_User.id WHERE PRO_User.id='$id'";
     $result2 = mysqli_query($conn, $sql) or die(mysqli_errno($conn));
     
     $rows= mysqli_fetch_assoc($result2);
     $contractorid=$rows['id'];
     $tasks=$rows['Tasks_wanted'];
     $counties=$rows['Counties_Covered'];
     
     $_SESSION['contractorid_40214842']=$contractorid;
     $_SESSION['tasks_40214842']=$tasks;
     $_SESSION['counties_covered_40214842']=$counties;
  }
    ?>
                        
                        
                        	<header>
		<div class='htlfndr-top-header'>
			<div class='navbar navbar-default htlfndr-blue-hover-nav'>
				<div class='container'>
							<a class='navbar-brand' href='index.php'>
									
									<p class='htlfndr-logo-text'>House <span>Proud</span></p>
								</a>	
						<ul class='nav navbar-nav'>
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
                        
                    

                    <?php 
                    }else if((isset($_SESSION["id_40214842"]))&&($_SESSION["admin_40214842"]=='Yes')){?>
                        <header>
		<div class='htlfndr-top-header'>
			<div class='navbar navbar-default htlfndr-blue-hover-nav'>
				<div class='container'>
							<a class='htlfndr-logo navbar-brand' href='index.php'>
									
									<p class='htlfndr-logo-text'>House <span>Proud</span></p>
								</a>	
						<ul class='nav navbar-nav'>
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
                                                         <li><a href="#" onclick="logout()">Logout</a></li>
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
                   <?php }   else{?>
                     
			<header>
                            
				<div class='htlfndr-top-header'>
					<div class='navbar navbar-default htlfndr-blue-hover-nav'>
						<div class='container'>
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class='navbar-header'>
								<button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#htlfndr-first-nav'>
									<span class='sr-only'>Toggle navigation</span>
									<span class='icon-bar'></span>
									<span class='icon-bar'></span>
									<span class='icon-bar'></span>
								</button>
								<a class='htlfndr-logo navbar-brand' href='index.php'>
									
									<p class='htlfndr-logo-text'>House <span>Proud</span></p>
								</a>
							</div><!-- .navbar-header -->
							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class='collapse navbar-collapse navbar-right' id='htlfndr-first-nav'>
								<!-- List with sing up/sing in links -->
								<ul class='nav navbar-nav htlfndr-singup-block'>
									<li id='htlfndr-singup-link'>
										<a href='#' data-toggle='modal' data-target='#htlfndr-sing-up'><span>sign up</span></a>
									</li>
									<li id='htlfndr-singin-link'>
										<a href='#' data-toggle='modal' data-target='#htlfndr-sing-in'><span>sign in</span></a>
									</li>
                                                                        
								</ul><!-- .htlfndr-singup-block -->
							
							</div><!-- .collapse.navbar-collapse -->
						</div><!-- .container -->
					</div><!-- .navbar.navbar-default.htlfndr-blue-hover-nav-->
				</div><!-- .htlfndr-top-header -->
				<!-- Start of main navigation -->
				<div class='htlfndr-under-header'>
					<nav class='navbar navbar-default'>
						<div class='container'>
							<div class='navbar-header'>
								<button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#htlfndr-main-nav'>
									<span class='sr-only'>Toggle navigation</span>
									<span class='icon-bar'></span>
									<span class='icon-bar'></span>
									<span class='icon-bar'></span>
								</button>
							</div><!-- .navbar-header -->
							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class='collapse navbar-collapse' id='htlfndr-main-nav'>
								<ul class='nav navbar-nav'>
									<li class='active'>
										<a href='index.php'>home</a>
									</li>
									<li>
										<a href='about-us.php'>about</a>
									</li>
								
									
								</ul>
							</div><!-- .collapse.navbar-collapse -->
						</div><!-- .container -->
					</nav><!-- .navbar.navbar-default.htlfndr-blue-hover-nav -->
				</div><!-- .htlfndr-under-header -->
				<!-- End of main navigation -->
				</header>
                   <?php } ?>
                    
				<!-- Start of slider section -->
				<section class='htlfndr-slider-section'>
					<div class='owl-carousel'>
						
						<div class="htlfndr-slide-wrapper">
                                                    <img src="images/chilling.jpg" alt="img-2" />
							<div class="htlfndr-slide-data container">		
							
								<h1 class="htlfndr-slider-title">let us do the hard work</h1>
								 <?php if(isset($_SESSION["id_40214842"])){  ?>
                                                                <a href='postajob.php'><button class='btn-primary'>Get Started</button></a>
                                                                <?php } else{ ?>
                                                                <button data-toggle="modal" data-target="#htlfndr-sing-in" class="btn-primary">Get Started</button>
                                                                <?php } ?>
							</div><!-- .htlfndr-slide-data.container -->
						</div><!-- .htlfndr-slide-wrapper-->
						
					</div>
                                    
					

				</section><!-- .htlfndr-slider-section -->
				<!-- End of slider section -->
				<noscript><h2>You have JavaScript disabled!</h2></noscript>
			
                    

			<!-- Start of main content -->
			<main role="main">
				<!-- Section with popular destinations -->
				<section class="container htlfndr-top-destinations">
					<h2 class="htlfndr-section-title">Services</h2>
					<div class="htlfndr-section-under-title-line"></div>
					<div class="row">
                                                <?php if(isset($_SESSION["id_40214842"])){  ?>
                                             <a href="postajob.php?jobcat=Handyman">
						<div class="col-xs-12 col-sm-4 col-md-4 ">
							<article class="htlfndr-top-destination-block">
								<div class="htlfndr-content-block">
									<img src="images/handyman.jpg" alt="room-1" />
							
								</div><!-- .htlfndr-content-block -->
								<footer class="entry-footer">
									<div class="htlfndr-left-side-footer">
										<h5 class="entry-title">Handyman Services</h5>
									
									</div><!-- .htlfndr-left-side-footer -->
									
								</footer>
							</article><!-- .htlfndr-top-destination-block -->
						</div><!-- .col-sm-4.col-xs-12 -->
                                            </a>
                                            <a href="postajob.php?jobcat=Furniture-Assembly"> 
						<div class="col-xs-12 col-sm-4 col-md-4 ">
							<article class="htlfndr-top-destination-block">
								<div class="htlfndr-content-block">
									<img src="images/furniture_assembly.jpg" alt="room-2" />
							
								</div><!-- .htlfndr-content-block -->
								<footer class="entry-footer">
									<div class="htlfndr-left-side-footer">
										<h5 class="entry-title">Furniture Assembly</h5>
									
								</footer>
							</article><!-- .htlfndr-top-destination-block -->
						</div><!-- .col-sm-4.col-xs-12 -->
                                                </a>
                                            <a href="postajob.php?jobcat=Home-Cleaning"> 
						<div class="col-xs-12 col-sm-4 col-md-4 ">
							<article class="htlfndr-top-destination-block">
								<div class="htlfndr-content-block">
                                                                    <img src="images/home_cleaning.jpg" alt="room-3" />
							
								</div><!-- .htlfndr-content-block -->
								<footer class="entry-footer">
									<div class="htlfndr-left-side-footer">
										<h5 class="entry-title">Home Cleaning</h5>
									
									</div><!-- .htlfndr-left-side-footer -->
									
										
								</footer>
							</article><!-- .htlfndr-top-destination-block -->
						</div><!-- .col-sm-4.col-xs-12 -->
                                            </a>
                                             <a href="postajob.php?jobcat=Removals">
                                                <div class="col-xs-12 col-sm-4 col-md-4 ">
							<article class="htlfndr-top-destination-block">
								<div class="htlfndr-content-block">
									<img src="images/removal.jpg" alt="room-1" />
								
								</div><!-- .htlfndr-content-block -->
								<footer class="entry-footer">
									<div class="htlfndr-left-side-footer">
										<h5 class="entry-title">Removals</h5>
									
									</div><!-- .htlfndr-left-side-footer -->
									
								</footer>
							</article><!-- .htlfndr-top-destination-block -->
						</div><!-- .col-sm-4.col-xs-12 -->
                                            </a>
                                             <a href="postajob.php?jobcat=Gardening">
						<div class="col-xs-12 col-sm-4 col-md-4 ">
							<article class="htlfndr-top-destination-block">
								<div class="htlfndr-content-block">
                                                                    <img src="images/garden.jpg" alt="room-2" />
								
								</div><!-- .htlfndr-content-block -->
								<footer class="entry-footer">
									<div class="htlfndr-left-side-footer">
										<h5 class="entry-title">Gardening Maintenance</h5>
									
									</div><!-- .htlfndr-left-side-footer -->
								
								</footer>
							</article><!-- .htlfndr-top-destination-block -->
						</div><!-- .col-sm-4.col-xs-12 -->
                                            </a>
                                             <a href="postajob.php?jobcat=Window-Cleaning">
						<div class="col-xs-12 col-sm-4 col-md-4 ">
							<article class="htlfndr-top-destination-block">
                                                              
								<div class="htlfndr-content-block">
                                                                  
                                                                    <img src="images/window_cleaning.jpg" alt="room-3" />
                                                                 
								</div><!-- .htlfndr-content-block -->
								<footer class="entry-footer">
									<div class="htlfndr-left-side-footer">
										<h5 class="entry-title">Window Cleaning</h5>
									
                                                                               
								</footer>
							</article><!-- .htlfndr-top-destination-block -->
						</div><!-- .col-sm-4.col-xs-12 -->
                                                </a>
                                                <?php } else{?>  
                                           <a href="#" data-toggle="modal" data-target="#htlfndr-sing-in">
                                            <div class="col-xs-12 col-sm-4 col-md-4 ">
							<article class="htlfndr-top-destination-block">
								<div class="htlfndr-content-block">
									<img src="images/handyman.jpg" alt="room-1" />
							
								</div><!-- .htlfndr-content-block -->
								<footer class="entry-footer">
									<div class="htlfndr-left-side-footer">
										<h5 class="entry-title">Handyman Services</h5>
									
									</div><!-- .htlfndr-left-side-footer -->
									
								</footer>
							</article><!-- .htlfndr-top-destination-block -->
						</div><!-- .col-sm-4.col-xs-12 -->
                                            </a>
                                          <a href="#" data-toggle="modal" data-target="#htlfndr-sing-in">
						<div class="col-xs-12 col-sm-4 col-md-4 ">
							<article class="htlfndr-top-destination-block">
								<div class="htlfndr-content-block">
									<img src="images/furniture_assembly.jpg" alt="room-2" />
							
								</div><!-- .htlfndr-content-block -->
								<footer class="entry-footer">
									<div class="htlfndr-left-side-footer">
										<h5 class="entry-title">Furniture Assembly</h5>
									
								</footer>
							</article><!-- .htlfndr-top-destination-block -->
						</div><!-- .col-sm-4.col-xs-12 -->
                                                </a>
                                            <a href="#" data-toggle="modal" data-target="#htlfndr-sing-in">
						<div class="col-xs-12 col-sm-4 col-md-4 ">
							<article class="htlfndr-top-destination-block">
								<div class="htlfndr-content-block">
                                                                    <img src="images/home_cleaning.jpg" alt="room-3" />
							
								</div><!-- .htlfndr-content-block -->
								<footer class="entry-footer">
									<div class="htlfndr-left-side-footer">
										<h5 class="entry-title">Home Cleaning</h5>
									
									</div><!-- .htlfndr-left-side-footer -->
									
										
								</footer>
							</article><!-- .htlfndr-top-destination-block -->
						</div><!-- .col-sm-4.col-xs-12 -->
                                            </a>
                                           <a href="#" data-toggle="modal" data-target="#htlfndr-sing-in">
                                                <div class="col-xs-12 col-sm-4 col-md-4 ">
							<article class="htlfndr-top-destination-block">
								<div class="htlfndr-content-block">
									<img src="images/removal.jpg" alt="room-1" />
								
								</div><!-- .htlfndr-content-block -->
								<footer class="entry-footer">
									<div class="htlfndr-left-side-footer">
										<h5 class="entry-title">Removals</h5>
									
									</div><!-- .htlfndr-left-side-footer -->
									
								</footer>
							</article><!-- .htlfndr-top-destination-block -->
						</div><!-- .col-sm-4.col-xs-12 -->
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#htlfndr-sing-in">
						<div class="col-xs-12 col-sm-4 col-md-4 ">
							<article class="htlfndr-top-destination-block">
								<div class="htlfndr-content-block">
                                                                    <img src="images/garden.jpg" alt="room-2" />
								
								</div><!-- .htlfndr-content-block -->
								<footer class="entry-footer">
									<div class="htlfndr-left-side-footer">
										<h5 class="entry-title">Gardening Maintenance</h5>
									
									</div><!-- .htlfndr-left-side-footer -->
								
								</footer>
							</article><!-- .htlfndr-top-destination-block -->
						</div><!-- .col-sm-4.col-xs-12 -->
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#htlfndr-sing-in">
						<div class="col-xs-12 col-sm-4 col-md-4 ">
							<article class="htlfndr-top-destination-block">
                                                              
								<div class="htlfndr-content-block">
                                                                  
                                                                    <img src="images/window_cleaning.jpg" alt="room-3" />
                                                                 
								</div><!-- .htlfndr-content-block -->
								<footer class="entry-footer">
									<div class="htlfndr-left-side-footer">
										<h5 class="entry-title">Window Cleaning</h5>
									
                                                                               
								</footer>
							</article><!-- .htlfndr-top-destination-block -->
						</div><!-- .col-sm-4.col-xs-12 -->
                                                </a>
                                                <?php } ?>
					</div><!-- .row -->
				</section><!-- .container.htlfndr-top-destinations -->
				
				<!-- Section called USP section -->
				<section class="container-fluid htlfndr-usp-section">
					<span></span>
   <br>
<!-- You need <span> and 'htlfndr-lined-title' class for both side line -->
					<div class="container">
						<div class="row">
							<div class="col-sm-4 htlfndr-icon-box">
								<img class="htlfndr-icon icon-drinks" src="images/mail.png" height="75" width="100" alt="icon" />
									<h5 class="htlfndr-section-subtitle">Tell us what you need</h5>
                                                                        <p>Request a job with our quick booking tool.</p>
									
							</div><!-- .col-sm-4.htlfndr-icon-box -->

							<div class="col-sm-4 htlfndr-icon-box">
								<img class="htlfndr-icon icon-drinks" src="images/icon-ups-card.png" height="100" width="100" alt="icon" />
									<h5 class="htlfndr-section-subtitle">Up front pricing</h5>
									<p>Feel secure knowing how much the job will cost.</p>
									
							</div><!-- .col-sm-4.htlfndr-icon-box -->

							<div class="col-sm-4 htlfndr-icon-box">
								<img class="htlfndr-icon icon-drinks" src="images/icon-ups-check.png" height="100" width="100" alt="icon" />
									<h5 class="htlfndr-section-subtitle">Safety First</h5>
									<p>All our professionals are vetted for your piece of mind.</p>
									
							</div><!-- .col-sm-4.htlfndr-icon-box -->
						</div><!-- .row -->
					</div><!-- .container -->
				</section><!-- .container-fluid .htlfndr-usp-section -->
				
			

				<!-- Section with visitors cards -->
				<section class="container htlfndr-top-destinations">
					<h2 class="htlfndr-section-title bigger-title">recent reviews</h2>
					<div class="htlfndr-section-under-title-line"></div>
					<div class="container">
						<div class="row">
							<div class="col-sm-4 col-xs-12 htlfndr-visitor-column">
								<div class="htlfndr-visitor-card">
									<div class="visitor-avatar-side">
										<div class="visitor-avatar">
                                                                                    <img src="images/woman.jpg" height="90" width="90" alt="user avatar" />
										</div><!-- .visitor-avatar -->
									</div><!-- .visitor-avatar-side -->
									<div class="visitor-info-side">
										<h5 class="visitor-user-name">Sara</h5>
										<h6 class="visitor-user-firm">Newtownabbey, County Antrim</h6>
										<p class="visitor-user-text">Booked a house clean all very straight forward. I knew the cost before I booked which was a bonus. Thanks again.</p>
									</div><!-- .visitor-info-side -->
								</div><!-- .htlfndr-visitor-card -->
							</div><!-- .col-sm-4.col-xs-12.htlfndr-visitor-column -->

							<div class="col-sm-4 col-xs-12 htlfndr-visitor-column">
								<div class="htlfndr-visitor-card">
									<div class="visitor-avatar-side">
										<div class="visitor-avatar">
                                                                                    <img src="images/man.jpg" height="90" width="90" alt="user avatar" />
										</div><!-- .visitor-avatar -->
									</div><!-- .visitor-avatar-side -->
									<div class="visitor-info-side">
										<h5 class="visitor-user-name">Thomas</h5>
										<h6 class="visitor-user-firm">Belfast, County Antrim</h6>
										<p class="visitor-user-text">Needed various tasks completed throughout the house. Booked a handyman through HouseProud, very happy will definitely use again</p>
									</div><!-- .visitor-info-side -->
								</div><!-- .htlfndr-visitor-card -->
							</div><!-- .col-sm-4.col-xs-12.htlfndr-visitor-column -->

							<div class="col-sm-4 col-xs-12 htlfndr-visitor-column">
								<div class="htlfndr-visitor-card">
									<div class="visitor-avatar-side">
										<div class="visitor-avatar">
                                                                                    <img src="images/oldwoman.jpg" height="90" width="90" alt="user avatar" />
										</div><!-- .visitor-avatar -->
									</div><!-- .visitor-avatar-side -->
									<div class="visitor-info-side">
										<h5 class="visitor-user-name">Mary</h5>
										<h6 class="visitor-user-firm">Dromara, County Down</h6>
										<p class="visitor-user-text">Great experience and found it easy to book by myself. Contractor was courteous and polite.</p>
                                                                                <br>
									</div><!-- .visitor-info-side -->
								</div><!-- .htlfndr-visitor-card -->
							</div><!-- .col-sm-4.col-xs-12.htlfndr-visitor-column -->
						</div><!-- .row -->
					</div><!-- .container -->
				</section><!-- .container-fluid.htlfndr-visitors-cards -->
			</main>
			<!-- End of main content -->
			
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
		<div id="htlfndr-sing-up">
			<div class="htlfndr-content-card">
				<div class="htlfndr-card-title clearfix">
					<h2 class="pull-left">Sign up</h2> 
				</div>
                            <form id="htlfndr-sing-up-form" method="POST" action="sign.php" onsubmit="return checkall(); ">
					<div class="row">
						<div class="col-md-6">
							<h4>first name</h4>
                                                        <input id="htlfndr-sing-up-name" class="htlfndr-input " type="text" name="firstname" required>
						</div>
						<div class="col-md-6">
							<h4>last name</h4>
							<input id="htlfndr-sing-up-last-name" class="htlfndr-input " type="text" name="lastname" required>
						</div>
					</div>
					<h4>E-mail address</h4>
                                        <input id="htlfndr-sing-up-email" class="htlfndr-input " type="email" name="email" onkeyup="checkemail();" required>
                                        <span id="email_status"></span>
					<h4>Password</h4>
                                        <input id="htlfndr-sing-up-pass" class="htlfndr-input " title="Password must contain at least 6 characters, including UPPER/lowercase and numbers." type="password" name="pass" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
                                                onchange="form.pass-conf.pattern = RegExp.escape(this.value);">
					<h4>Confirm Password</h4>
                                        <input id="htlfndr-sing-up-pass-conf" class="htlfndr-input " type="password" name="pass-conf" onkeyup="checkPass(); return false;" >
                                        <span id="confirmMessage" class="confirmMessage"></span>
                                        <div class="row">
						
						<div class="col-md-6">
							<h4>Street</h4>
							<input id="street" class="htlfndr-input " type="text" name="street" required>
						</div>
                                            <div class="col-md-6">
							<h4>Town</h4>
							<input id="town" class="htlfndr-input " type="text" name="town" required>
                                                        <br>
						</div>
                                        
                                            <div class="col-md-6">
							<h4>Postcode</h4>
							<input id="postcode" class="htlfndr-input " type="text" title='Postcode must be correct format e.g. BT24 8NA' name="postcode" required pattern="[A-Za-z]{1,2}[0-9Rr][0-9A-Za-z]? [0-9][ABD-HJLNP-UW-Zabd-hjlnp-uw-z]{2}">
						</div>
                                            <div class="col-md-6">
							<h4>Phone Number</h4>
							<input id="phone-number" class="htlfndr-input " type="text" name="phone-number" required>
						</div>
                                                 <div class="col-md-6">
                                                
                                                 <h4>County</h4>
                                                                        	<select  name="county" id="htlfndr-dropdown" class="htlfndr-dropdown-input-col-md-6">
											<option value="Down">Down</option>
											<option value="Antrim">Antrim</option>
											<option value="Derry">Derry</option>
											<option value="Armagh">Armagh</option>
											<option value="Tyrone">Tyrone</option>
											<option value="Fermanagh">Fermanagh</option>
										</select>
                                              </div>
					</div>
                                       

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#btnSubmit").click(function () {
            var password = $("#htlfndr-sing-up-pass").val();
            var confirmPassword = $("#htlfndr-sing-up-pass-conf").val();
            if (password !== confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        });
    });
</script>

<script>
    function checkemail(){
        var email=document.getElementById('htlfndr-sing-up-email').value;
        if(email){
            $.ajax({
                type:'POST',
                url: 'checkdata.php',
                data:{
                    user_email:email                    
                },
                success: function (response){
                    $('#email_status').html(response);
                    if(response=="OK"){
                        return true;
                    }
                    else{
                        return false;
                    }
                }
            });
        }
        else{
            $('#email_status').html("");
            return false;
        }
            }
    function checkall()
{
 var emailhtml=document.getElementById("email_status").innerHTML;
 if((emailhtml)=="OK")
 {
  return true;
 }
 else
 {
  return false;
 }
}
    </script>



					<div class="clearfix">
						<span>Have an Account? 
							<a data-target="#htlfndr-sing-in" data-toggle="modal" href="#">
								<span>Sing in</span>
							</a>
						</span>
						<input type="submit" id="btnSubmit" value="Sign up" class="pull-right">
					</div>
				</form>
			</div>
		</div>
		<div id="htlfndr-sing-in">
			<div class="htlfndr-content-card">
				<div class="htlfndr-card-title clearfix">
					<h2 class="pull-left">Sign in</h2> 
				</div>
      <script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
    function do_login()
{
 var email=$("#emailid").val();
 var pass=$("#password").val();
 if(email!=="" && pass!=="")
 {
 
  $.ajax
  ({
  type:'POST',
  url:'login.php',
  data:{
   
   
   email:email,
   password:pass
  },
  success:function(response) {
  if(response=="OK")
  {
    window.location.href="index.php";
  }
  else
  {
   
    alert("Wrong Details");
  }
  }
  });
 }

 else
 {
  alert("Please Fill All The Details");
 }

 return false;
}
    </script>
    <form id="htlfndr-sing-in-form" name="htlfndr-sing-in-form" action="user-page.php" method="POST" onsubmit="return do_login();">
					<h4>E-mail address</h4>
					<input id="emailid" class="htlfndr-input " type="text" name="emailid" required>
                                        
					<h4>Password</h4>
                                        <input id="password" class="htlfndr-input " type="password" name="password" required>
                                       
                  
					<div class="clearfix">
						<span>Don't Have an Account? 
							<a data-target="#htlfndr-sing-up" data-toggle="modal" href="#">
								<span>Sign up</span>
							</a>
						</span>
                                            <br>
                                            <span>Forgot Password? 
							<a data-target="#htlfndr-edit-card" data-toggle="modal" href="#">
								<span>Click Here</span>
							</a>
						</span>
                                            <br>
						<input type="submit" name="login" id="login_button" value="Login" class="pull-right">
                                              
					</div>
				</form>
  

			</div>
 

		</div>
                	<div id="htlfndr-edit-card">
			<div class="htlfndr-content-card">
				<div class="htlfndr-card-title clearfix">
					<a class="glyphicon glyphicon-remove pull-right" href="#"  data-dismiss="modal"></a>
					<h2 class="pull-left">Forgot Password</h2> 
				</div>
                            <form id="htlfndr-contact-form" method="POST" action='resetpassword.php'>
					<h4>Email Address</h4>
                                        <input id="user_email" class="htlfndr-input " type="email" name="user_email" onkeyup="checkvalidemail();"required>
					
					<input type="submit" value="Reset Password">
				</form>
			</div>
		</div>
                <script>
                     function checkvalidemail(){
        var email=document.getElementById('user_email').value;
        if(email){
            $.ajax({
                type:'POST',
                url: 'checkvaliddata.php',
                data:{
                    user_email:email
                    
                },
                success: function (response){
                    $('#email_status').html(response);
                    if(response=="OK"){
                        return true;
                    }
                    else{
                        alert("Wrong Details");
                    }
                }
            });
        }
        else{
            $('#email_status').html("");
            return false;
        }
        
    }
                </script>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery-1.11.3.min.js"></script>
		<!-- Include Jquery UI script file -->
		<script src="js/jquery-ui.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<!-- Include Query UI Touch Punch is a small hack that enables the use
		 of touch events on sites using the jQuery UI user interface library. -->
		<script src="js/jquery.ui.touch-punch.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<!-- Include Owl Carousel script file -->
		<script src="js/owl.carousel.min.js"></script>
		<!-- Include main script file -->
		<script src="js/script.js"></script>

		<!--<script src="js/less.min.js" ></script> -->
	</body>
        
</html>