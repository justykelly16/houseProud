
<?php
session_start();
include("connect.php");
if(($_SESSION["id_40214842"])!=$_GET['userid'])
{
        header("Location: index.php");
    }
    
    if((empty($_GET['userid']))){
        header("Location: index.php");
    }
   
        $id=$_SESSION['id_40214842'];
    $admin=$_SESSION["admin_40214842"];
  
   
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
  
    



mysqli_close($conn);



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
<body class="single">
<!-- Overlay preloader-->
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
                                                    
                                                    
                                                          <?php 
                                                    if($contractor=='Yes'){
                                                        echo"<li><a href='viewconprofile.php?conid=$contractorid'><i class='fa fa-user'></i> my contractor profile</a></li> 
                                                            <li><a href='browsejobs.php'><i class='fa fa-book'></i>browse jobs</a></li>
                                                            ";
                                                        
                                                    }
                                                    ?>
                                                            
                                                        
                                                   
                                                    
							<li><a href="paymentmethods.php"><i class="fa fa-credit-card"></i> payment methods</a></li>
                                                        <li><a href="completedjobs.php"><i class="fa fa-history"></i> my completed jobs</a></li>
							<li><a href="settings.php"><i class="fa fa-wrench"></i> settings</a></li>
						</ul>
                                        </div>
					</div><!-- .htlfndr-user-person-navigation -->
				</div><!-- .htlfndr-user-person-navigation-wrapper -->
			
				<div class="row htlfndr-contact-page">
				
				<div  class="row">
				<div class="col-md-6">	
				<div class="htlfndr-card-title clearfix">
					
					<h2 class="pull-left">Add Card</h2>
				</div>
                                    <form id="htlfndr-contact-form" method="POST" action="cardadded.php">
					<h4>Card  Number</h4>
                                        <input id="htlfndr-add-credit-card" class="htlfndr-input " type="tel" size='12'  maxlength="12" name="htlfndr-number-card" placeholder="XXXX XXXX XXXX XXXX" required>
					<div class="htlfndr-info-card row">	
						<div class="col-md-9 col-sm-9 htlfndr-card-name">
							<h4>Cardholder Name</h4>
                                                        <input id="htlfndr-new-name-card" class="htlfndr-input" type="text" name="htlfndr-new-name-card" required >
						</div>
						<div class="col-md-3 col-sm-3 htlfndr-card-valid">
							<h4>Valid Thru</h4>
                                                        <input id="htlfndr-new-valid-card" class="htlfndr-input" type="tel" maxlength="4" size='4' name="htlfndr-new-valid-card" placeholder="mm/yy" required>
						</div>
					</div>
					<input type="submit" value="Save" class='btn-primary'>
				</form>
			
                                </div>
                                </div>
				
			</div><!-- .row .htlfndr-contact-page -->
		</main><!-- .htlfndr-Spagere-single-content -->
		</div><!-- .container -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-1.11.3.min.js"></script>
<!-- Include Jquery UI script file -->
<script src="js/jquery-ui.min.js"></script>
<!-- Include Query UI Touch Punch is a small hack that enables the use of touch events on sites using the jQuery UI user interface library. -->
<script src="js/jquery.responsiveTabs.min.js"></script>
<script src="js/jquery.ui.touch-punch.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<!-- Include Touch Menu Hover script file -->
<script src="js/jquery.ui.touch-punch.min.js"></script>
<!-- Include Owl Carousel script file -->
<script src="js/owl.carousel.min.js"></script>

<!-- Include main script file -->
<script type="text/javascript" src="js/jquery.custom-select.js"></script>
<script src="js/script.js"></script>

<!--<script src="js/less.min.js" ></script> -->
</body>
</html>