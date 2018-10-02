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
         $email=$_SESSION['email_40214842'];
    $contractor=$_SESSION['contractor_40214842'];
     $pic=$_SESSION['pic_40214842'];
              if($contractor=='Yes'){
              $contractorid=$_SESSION['contractorid_40214842'];
              
              $query2="SELECT PRO_Contractor.bio, PRO_Contractor.Transportation FROM PRO_Contractor
                  WHERE PRO_Contractor.id='$contractorid'";
              
              $result2=mysqli_query($conn, $query2) or die(mysqli_errno($conn));
              if(mysqli_num_rows($result2)>0){
      while($row= mysqli_fetch_assoc($result2)){
          $bio=$row['bio'];
          $trans=$row['Transportation'];
          
      }
          }
              }
       
    $query = "SELECT PRO_User.id, PRO_User.firstname, PRO_User.lastname, PRO_User.Street, PRO_User.Town, PRO_User.County, PRO_User.Postcode, PRO_User.phone_number,
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
				
               
     
        			<div class="htlfndr-user-panel col-md-9 col-sm-8 htlfndr-setting-page">
					<div class="htlfndr-setting">
                                            <?php if($admin=='No'){ ?>
						<h2>Change <b>Personal Information</b></h2>
						
                                                <form  class="htlfndr-form-setting" id="htlfndr-settings-form" method="post" action="saveinfochanges.php" >
							<div class="row">
								<div class="col-md-5 htlfndr-form-setting-cols">
									<label for="first-name" class="">First Name</label><br>
									<input id="first-name" class="htlfndr-input" type="text" name="first-name" value="<?php echo $firstname?>" required="required"><br>
									<label for="last-name" class="">Last Name</label><br>
									<input id="last-name" class="htlfndr-input" type="text" name="last-name" value="<?php echo $lastname?>" required><br>
									
									<label for="street" class="">Street</label><br>
									<input id="street" class="htlfndr-input" type="text" name="street" value="<?php echo $street ?>" required><br>
									<label for="town" class="">Town</label><br>
									<input id="town" class="htlfndr-input" type="text" name="town" value="<?php echo $town ?>" required><br>
								</div>
								<div class="col-md-5 htlfndr-form-setting-cols">
									
											          <div id="htlfndr-input-4" class="htlfndr-input-wrapper">
									<label for="county" class="">County</label><br>
                                                                        	<select name="county" id="htlfndr-dropdown" class="htlfndr-dropdown">
                                                                                    <option value="<?php echo $county ?>"><?php echo $county ?></option>
											<option value="Down">Down</option>
											<option value="Antrim">Antrim</option>
											<option value="Derry">Derry</option>
											<option value="Armagh">Armagh</option>
											<option value="Tyrone">Tyrone</option>
											<option value="Fermanagh">Fermanagh</option>
										</select>
                                                                                                  </div>
                                                                        <br>
									
									<label for="postcode" class="">Postal Code</label><br>
									<input id="postcode" class="htlfndr-input" type="text" name="postcode" value="<?php echo $postcode ?>" required><br>
                                                                        <label for="phone-number" class="">Phone Number</label><br>
									<input id="phone-number" class="htlfndr-input" type="text" name="phone-number" value="<?php echo $phone ?>" required><br>
                                                                       
								</div>
							</div>
							<input type="submit" value="Save changes" class="btn-primary">						
						</form>
                                            <?php } ?>
                                                    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
   <script type="text/javascript">
                                                    $(function () {
        $("#btnSubmit").click(function () {
            var password = $("#settings-new-pass").val();
            var confirmPassword = $("#settings-new-pass-again").val();
            if (password !== confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        });
    });
</script>
 <script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
    function check_password()
{
 var email=$("#email").val();
 var pass=$("#settings-cur-pass").val();
  var password = $("#settings-new-pass").val();
  var confirmPassword = $("#settings-new-pass-again").val();
 if(email!=="" && pass!=="")
 {
 
  $.ajax
  ({
  type:'POST',
  url:'updatepassword.php',
  data:{
   
   
   email:email,
   password:pass,
   newpw1:password,
   newpw2:confirmPassword
  },
  success:function(response) {
  if(response==="OK")
  {
    window.location.href="settings.php";
    alert("password successfully changed");
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
   
								
						<h2>Change <b>Password</b></h2>
                                                 <div class="row">
                                                <form  class="htlfndr-change-setting" id="htlfndr-settings-pass" action="settings.php" method="POST" onsubmit="return check_password();">
							
									<label for="settings-cur-pass" class="">Current Password</label><br>
									<input id="settings-cur-pass" class="htlfndr-input" type="password" name="settings-cur-pass" required ><br>
									<label for="settings-new-pass" class="">New Password</label><br>
									<input name="settings-new-pass" id="settings-new-pass" class="htlfndr-input" title="Password must contain at least 6 characters, including UPPER/lowercase and numbers." type="password"  required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
                                                onchange="form.pass-conf.pattern = RegExp.escape(this.value);"><br>
									<label for="settings-new-pass-again" class="">New Password Again</label><br>
									<input name="settings-new-pass-again" id="settings-new-pass-again" class="htlfndr-input" type="password" onkeyup="checkPass(); return false;" ><br>
                                                                        <span id="confirmMessage" class="confirmMessage"></span>
                                                                        <input id='email' type='hidden' name='email' value="<?php echo "$email"; ?>">
                                                                        

							
							<input type="submit" value="Save password" id='btnSubmit' class="btn-primary">						
						</form>
                                                 </div>
                                               
                                                <h2>Change Profile Picture</h2>
                                                  <div class="row">
                                                <form enctype="multipart/form-data" action="processimage.php" method="POST">
                                                   
                                                        <label>Select Image</label>
                                                        <input name="newimg" type="file" required>
                                                        <input type="submit" value="Change Picture" id='btnSubmit1' class="btn-primary">	
                                                        <br>
                                               
                                                    
                                                    
                                                </form>
                                                 </div>
                                                <br>
                                                <br>
                                                <?php if($contractor=='Yes'){ ?>
                                                
						<h2>Change <b>Contractor Details</b></h2>
						  <div class="row">
                                                <form class="htlfndr-form-setting" id="htlfndr-settings-forms" method="post" action="savecontractorchanges.php">
							
									<label for="bio" class="">Bio</label><br>
                                                                        <textarea id="bio" rows="5" style="width:380px; height: 200px" class="htlfndr-input"  name="bio" required="required"><?php echo $bio?></textarea><br>
									<label for="transportation" class="">Transportation</label><br>
									<input id="transportation" class="htlfndr-input" type="text" name="transportation" value="<?php echo $trans?>" required><br>
                                                              <input type="submit" value="Save changes" class="btn-primary">	
                                                              <br>
									</form>
                                                      
							
												
							</div>
								
							
                                
                                            <?php } ?>
                                
                                                
					</div><!--.htlfndr-setting -->
				</div><!-- .htlfndr-user-tabs-5 -->
		
</main>
=
</div>

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