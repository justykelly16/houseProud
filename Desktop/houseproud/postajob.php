<?php
session_start();
include("connect.php");
if(!isset($_SESSION["id_40214842"]))
{
        header("Location: index.php");
    }
    
    if(isset($_GET['jobcat'])){
        $jobcat=mysqli_real_escape_string($conn,$_GET['jobcat']);
    }
       
    $admin=$_SESSION["admin_40214842"];
    $id=$_SESSION['id_40214842'];
    if($admin=='No'){ 
   $contractor=$_SESSION['contractor_40214842'];
    $pic=$_SESSION['pic_40214842'];
              if($contractor=='Yes'){
              $contractorid=$_SESSION['contractorid_40214842'];
          }
    
    $query = "SELECT PRO_User.id, PRO_User.firstname, PRO_User.lastname, PRO_User.Street, PRO_User.Town, PRO_User.County,  PRO_User.Postcode, PRO_User.phone_number,
PRO_Login.email FROM PRO_User INNER JOIN PRO_Login ON PRO_User.id = PRO_Login.id WHERE PRO_Login.id = '$id'";

    $result = mysqli_query($conn, $query) or die(mysqli_errno($conn));

mysqli_close($conn);

  if(mysqli_num_rows($result)>0){
      while($row= mysqli_fetch_assoc($result)){
            
          $firstname=$row['firstname'];
          $lastname=$row['lastname'];
          
          $street=$row['Street'];
          $town=$row['Town'];
          
          $county=$row['County'];
         
          $postcode=$row['Postcode'];
          $phone=$row['phone_number'];
          
        
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
	<div class="container">
          
		<main id="htlfndr-contact-us" class="htlfndr-main-content" role="main">	
                    <br>
               		<div class="htlfndr-user-person-navigation-wrapper hidden-sm hidden-xs col-md-3">
                                    
					<div class="widget htlfndr-widget-archive">
					<div class="htlfndr-widget-main-content htlfndr-widget-padding">
                                             <?php if($admin=='No'){ ?>
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
                                             <?php }else if($admin=='Yes'){?>
                                            <h3 class="htlfndr-user-name">Admin</h3>
						
						<ul role="tablist">
                                                    <li><a href="contractors.php"><i class="fa fa-user"></i>contractors</a></li>
                                                    <li><a href="pendingcontractors.php"><i class="fa fa-clock-o"></i>pending contractors</a></li>
                                                    <li><a href="customers.php"><i class="fa fa-user"></i>customers</a></li>
                                                     <li><a href="messages.php.php"><i class="fa fa-envelope-o"></i>messages</a></li>
                                                    <li><a href="settings.php"><i class="fa fa-wrench"></i> settings</a></li>
                                                     
                                             <?php }?> 
                                               
						</ul>
                                            
                                        </div>
					</div><!-- .htlfndr-user-person-navigation -->
				</div><!-- .htlfndr-user-person-navigation-wrapper -->
			
				<h1 class="text-left">Post a Job</h1>
				
				<div  class="row">
					<div class="col-md-6">
						<form action="jobposted.php" id="htlfndr-contact-form" method="post">
							<label for="job-name" class="htlfndr-required htlfndr-top-label">Job Name</label>
							<input id="job-name" class="htlfndr-review-form-input" type="text" name="job-name" required>
                                                        
                                                        <?php if(isset($_GET['jobcat'])){ ?>
                                                        <div id="htlfndr-input-4" class="htlfndr-input-wrapper">
							<label for="job-category" class="htlfndr-required htlfndr-top-label">Job category</label>
                                                        <select name="job-category" id="htlfndr-dropdown" class="htlfndr-dropdown">
                                                        <option value="<?php echo $jobcat ?>"><?php echo $jobcat ?></option>
                                                        </select>
                                                        </div>
                                                        <?php }else{ ?>
                                                        <div id="htlfndr-input-4" class="htlfndr-input-wrapper">
							<label for="job-category" class="htlfndr-required htlfndr-top-label">Job category</label>
							<select name="job-category" id="htlfndr-dropdown" class="htlfndr-dropdown">
											<option value="Handyman">Handyman</option>
											<option value="Furniture-Assembly">Furniture-Assembly</option>
											<option value="Home-Cleaning">Home-Cleaning</option>
											<option value="Removals">Removals</option>
											<option value="Gardening ">Gardening </option>
											<option value="Window-Cleaning">Window-Cleaning</option>
										</select>
                                                        </div>
                                                        <?php } ?>
							
                                                        <label for="street" class="htlfndr-required htlfndr-top-label">Street</label>
							<input id="street" class="htlfndr-review-form-input" type="text" name="street" required>
                                                        <label for="town" class="htlfndr-required htlfndr-top-label">Town</label>
							<input id="town" class="htlfndr-review-form-input" type="text" name="town" required>
                                                       
                                                        		          <div id="htlfndr-input-4" class="htlfndr-input-wrapper">
									<label for="county" class="">County</label><br>
                                                                        	<select name="county" id="htlfndr-dropdown" class="htlfndr-dropdown">
											<option value="Down">Down</option>
											<option value="Antrim">Antrim</option>
											<option value="Derry">Derry</option>
											<option value="Armagh">Armagh</option>
											<option value="Tyrone">Tyrone</option>
											<option value="Fermanagh">Fermanagh</option>
										</select>
                                                        </div>
                                                      
                                                        <label for="postcode" class="htlfndr-required htlfndr-top-label">Postcode</label>
							<input id="postcode" class="htlfndr-review-form-input" type="text" title='Postcode must be correct format e.g. BT24 8NA' name="postcode" required pattern="[A-Za-z]{1,2}[0-9Rr][0-9A-Za-z]? [0-9][ABD-HJLNP-UW-Zabd-hjlnp-uw-z]{2}">
                                                       	<label for="budget" class="htlfndr-required htlfndr-top-label">Budget &pound;</label>
                                                        <input id="budget" class="htlfndr-review-form-input" type="number" min="1" max="1000" name="budget" required>						
							<label for="job-description" class="htlfndr-required htlfndr-top-label">Job Description</label>
                                                        <textarea id="job-description" class="htlfndr-review-form-input" rows="10" name="contact-message"></textarea>
                                         	<div class="htlfndr-float-input first-float">
								<label for="htlfndr-date-in" class="htlfndr-input-label">Due date</label>
								<div id="htlfndr-input-date-in" class="htlfndr-input-wrapper">
                                                                    <input type="text" name="htlfndr-date-in" id="htlfndr-date-in" class="search-Spagere-input" required/>
									<button type="button" class="htlfndr-clear-datepicker"></button>
								</div><!-- #htlfndr-input-date-in.htlfndr-input-wrapper -->
							</div><!-- .htlfndr-float-input -->
							<input type="submit" value="Post your job" class="btn-primary">
                                                        	
				
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