<?php
session_start();
include("connect.php");
if(!isset($_SESSION["id_40214842"]))
{
        header("Location: index.php");
    }
       
   
    $id=$_SESSION['id_40214842'];
    $admin=$_SESSION["admin_40214842"];
 
   
    $query = "SELECT PRO_Post_Task.taskid, PRO_Post_Task.job_title, PRO_Post_Task.job_category, PRO_Post_Task.Description, 
        PRO_Post_Task.street, PRO_Post_Task.town, PRO_Post_Task.Budget,
        PRO_Post_Task.county, PRO_Post_Task.postcode, PRO_Post_Task.Due_date,
        PRO_Post_Task.userfk, PRO_Jobs.status, PRO_Jobs.Date_posted FROM PRO_Post_Task 
        INNER JOIN PRO_Jobs ON PRO_Post_Task.taskid = PRO_Jobs.id WHERE PRO_Post_Task.userfk = '$id'";
    
  ;

    $result = mysqli_query($conn, $query) or die(mysqli_errno($conn));
    
    
    if($admin=='No'){
       
     
          
         
          $firstname=$_SESSION['firstname_40214842'];
          $lastname=$_SESSION['lastname_40214842'];
          $contractor=$_SESSION['contractor_40214842'];
          $pic=$_SESSION['pic_40214842'];
      
          if($contractor=='Yes'){
              $contractorid=$_SESSION['contractorid_40214842'];
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
                             
                                  
                                	<div class="htlfndr-user-panel col-md-9 col-sm-8 htlfndr-booking-page" id="htlfndr-user-tab-2">
                                           
                             <?php 
                             if($admin=='No'){
                             if($contractor=='Yes'){
                                 echo"
                                      <h2>My Jobs As A</h2>
                                	<div class='htlfndr-steps'>
						<ul class='htlfndr-progress'>
							<li class='htlfndr-active-step'>
								<a href='#htlfndr-user-tab-1' class='htlfndr-step-description' >Customer</a>
							</li>
							<li>
								 <a href='#htlfndr-user-tab-2' class='htlfndr-step-description'>Worker</a>
							</li>
							
						</ul>
					</div><!-- .htlfndr-steps --> 
                                     
";
                                 
                             }
                             }
                             
                             ?>
                                            <?php if(mysqli_num_rows($result)>0){ ?>
                                        </div>
                                   <div class="htlfndr-user-panel col-md-9 col-sm-8 htlfndr-booking-page" id="htlfndr-user-tab-1">
                                    <table class="table">
						 <thead>
							 <tr>
									 <th>Job Title</th>
								 <th>Job Category</th>
								 <th>Location</th>
								 <th>Due Date</th>
								 <th>Cost</th>
                                                                 <th>Status</th>
                                                                 <th></th>
							 </tr>
						 </thead>
						 <tbody>
                                                     <?php
                                            } else{
                                                echo"<p class='htlfndr-step-description'> No Jobs Available </p>";
                                            }
                                                      if(mysqli_num_rows($result)>0){
                                                    while($row= mysqli_fetch_assoc($result)){
                                                        $jobid=$row['taskid'];
                                                        $jobtitle=$row['job_title'];
                                                        $jobcat=$row['job_category'];
                                                        

                                                        $street=$row['street'];
                                                        $town=$row['town'];
                                                        
                                                        $budget=$row['Budget'];
                                                        $duedate=$row['Due_date'];
                                                        $status=$row['status'];
                                                        $dateposted=$row['Date_posted'];
                                                        $descript=$row['Description'];
                                                        $county=$row['county'];
                                                       
                                                        $postcode=$row['postcode'];
                                                       
                                                        
                                                            


                                                      
                                                      if((($status)=='Open')|| (($status)=='Assigned')){
         
                                                     echo"
                                                    
							<tr>
								<td class='htlfndr-scope-row'>$jobtitle</td>
								<td data-title='Category'>$jobcat</td>
								<td data-title='Location'>$street $town</td>
								<td data-title='Due Date'>$duedate</td>
								<td data-title='Budget'>&pound$budget</td>
                                                                    <td data-title='Status'>$status</td>";
                                                     if($status=='Assigned'){echo"<td>
                                                         <form method='POST' action='viewmyjob.php'>
                                                             <input type='hidden' value='$jobid' name='jobid'>
                                                                 <input type='hidden' value='$id' name='userid'>
                                                                
                                                                   <input type='submit' value='View' class='btn-primary'> 
                                                                   </form></td>
                                                                        
							</tr>";
                                                     }else{
                                                         echo"<td><form method='POST' action='viewjob.php'>
                                                                <input type='hidden' value='$id' name='clientid'>
                                                                     <input type='hidden' value='$jobcat' name='jobcat'>
                                                                         <input type='hidden' value='$county' name='countyid'>
                                                                             <input type='hidden' value='$jobid' name='jobid'>
                                                                   <input type='submit' value='View' class='btn-primary'>
                                                                   </form></td>
                                                             </tr>
                                                             ";
                                                     }
                                                        
                                                    }}
                                                      }
                                                      ?>
                                                     		</tbody>
 					</table>
					        <div class="htlfndr-elements-content"  id="htlfndr-but">
                                                    <a href="postajob.php">
                                                        <input type="submit" value="Post a Job" class="btn-primary"></a>
                                    <br>
                                    <br>
                                </div>
                                    
				
                                                     
                                                     <?php
                                     if($admin=='No'){                  
                                if($contractor=='Yes'){
                                    
                                    echo"   <div class='container'>
                                              
                                	<div class='htlfndr-steps'>
						<ul class='htlfndr-progress'>
							<li class='htlfndr-active-step'>
								<a href='#htlfndr-user-tab-2' class='htlfndr-step-description' >Worker</a>
							</li>
							<li>
								 <a href='#htlfndr-user-tab-1' class='htlfndr-step-description'>Customer</a>
							</li>
							
						</ul>
                                                </div>
					</div><!-- .htlfndr-steps --> 
                                           
                                  
                                        ";
                                    $sqlquery=" SELECT PRO_Contractor.id, PRO_Job_alerts.Tasks_wanted, PRO_Job_alerts.Counties_Covered
                                        FROM PRO_Job_alerts INNER JOIN PRO_Contractor ON PRO_Job_alerts.contractorfk=PRO_Contractor.id 
                                        INNER JOIN PRO_User ON PRO_Contractor.userfk=PRO_User.id WHERE PRO_User.id  = '$id'";
                                    
                                   
                                    
                                      
                                    
                                    $result2 = mysqli_query($conn, $sqlquery) or die(mysqli_errno($conn));
                                    
                                    if(mysqli_num_rows($result2)>0){
                                                    while($row= mysqli_fetch_assoc($result2)){
                                                        $contractorid=$row['id'];
                                                        $tasks=$row['Tasks_wanted'];
                                                        $countiescovered=$row['Counties_Covered'];
                                                        
                                                        
                                                        $_SESSION['contractorid_40214842']=$contractorid;
                                                        $_SESSION['tasks_40214842']=$tasks;
                                                        $_SESSION['covered_40214842']=$countiescovered;
                                                      
                                                    }
                                    }
                                    
                                    $sql ="SELECT PRO_Jobs.status, PRO_Make_Offer.quote, PRO_Make_Offer.quote_accepted, PRO_Jobs_assigned.job_status,
                                        PRO_Post_Task.job_title, PRO_Post_Task.taskid, PRO_Post_Task.job_category, PRO_Post_Task.Description,
                                        PRO_Post_Task.street, PRO_Post_Task.town,PRO_Post_Task.county, PRO_Post_Task.postcode,PRO_Jobs.Date_posted,
                                        PRO_Post_Task.Budget,PRO_Post_Task.Due_date,PRO_User.id, PRO_User.firstname, PRO_User.lastname FROM PRO_Jobs INNER JOIN PRO_Make_Offer ON PRO_Jobs.id = 
                                        PRO_Make_Offer.jobfk INNER JOIN PRO_Jobs_assigned ON PRO_Make_Offer.jobfk=PRO_Jobs_assigned.id 
                                        INNER JOIN PRO_Post_Task ON PRO_Jobs_assigned.id=PRO_Post_Task.taskid 
                                        INNER JOIN PRO_User ON PRO_Post_Task.userfk=PRO_User.id WHERE PRO_Make_Offer.contractorfk='$contractorid'";
                                    
                                      $result3 = mysqli_query($conn, $sql) or die(mysqli_errno($conn));
                                    
                                    if(mysqli_num_rows($result3)>0){
                                        echo"  <table class='table'>
						 <thead>
							 <tr>
                                                                    <th>Client</th>
									 <th>Job Title</th>
								 <th>Job Category</th>
								 <th>Location</th>
								 <th>Due Date</th>
								 <th>Budget</th>
                                                                 <th>Offer</th>
                                                                 <th>Status</th>
                                                                 <th></th>
							 </tr>
						 </thead>
						 <tbody>
                                            ";
                                                    while($row= mysqli_fetch_assoc($result3)){
                                                        $clientjobid=$row['taskid'];
                                                        $clientjobtitle=$row['job_title'];
                                                        $clientjobcat=$row['job_category'];
                                                       
                                                        $clientid=$row['id'];
                                                       
                                                        $clienttown=$row['town'];
                                                       
                                                        $clientbudget=$row['Budget'];
                                                        $clientduedate=$row['Due_date'];
                                                        $clientstatus=$row['status'];
                                                        $clientdateposted=$row['Date_posted'];
                                                        $clientdescript=$row['Description'];
                                                        $clientcounty=$row['county'];
                                                        
                                                        $clientpostcode=$row['postcode'];
                                                        $jobstatus=$row['status'];
                                                        $quote=$row['quote'];
                                                        $quotedecision=$row['quote_accepted'];
                                                        $assignedstatus=$row['job_status'];
                                                        $clientfirstname=$row['firstname'];
                                                        $clientlastname=$row['lastname'];
                                                        
                                                            
                                                           
                                                        if($jobstatus!='Completed'){
                                                  
                                                        
                                                         echo"
                                                    
							<tr>
								<td class='htlfndr-scope-row'>$clientfirstname $clientlastname</td>
                                                                    <td data-title='Title'>$clientjobtitle</td>
								<td data-title='Category'>$clientjobcat</td>
								<td data-title='Location'> $clienttown</td>
								<td data-title='Due Date'>$clientduedate</td>
								<td data-title='Budget'>&pound$clientbudget</td>
                                                                    
                                                                    <td data-title='Offer'>&pound$quote</td>
                                                                        ";
                                                         if($quotedecision=='Accepted'){ echo"
                                                                    <td data-title='Status'><b>$quotedecision<b></td>
                                                                        ";
                                                         } else{
                                                             echo" <td data-title='Status'>$quotedecision</td>
                                                                 ";
                                                         }
                                                          if($quotedecision=='Accepted'){echo"<td>
                                                            <form method='POST' action='viewmyjob.php'>
                                                             <input type='hidden' value='$clientjobid' name='jobid'>
                                                                 <input type='hidden' value='$id' name='userid'>
                                                                  
                                                                 
                                                                   <input type='submit' value='View' class='btn-primary'> 
                                                                   </form></td>
                                                                     </tr>
                                                                     </tbody>
							
                                                                  ";
                                                     }else if($quotedecision=='Cancelled'){
                                                           echo"<td>
                                                             <form method='POST' action='deletejob.php'>
                                                                
                                                                    
                                                                        <input type='hidden' value='$clientjobid' name='jobid'>
                                                                   <input type='submit' value='Remove' class='btn-primary'>
                                                                   </form></td>
                                                             </tr>
                                                             </tbody>";
                                                         
                                                         
                                                     }else if($quotedecision=='Rejected'){
                                                         echo"<td>
                                                             <form method='POST' action='viewjob.php'>
                                                                <input type='hidden' value='$clientid' name='clientid'>
                                                                    <input type='hidden' value='$clientjobcat' name='jobcat'>
                                                                        <input type='hidden' value='$clientcounty' name='countyid'>
                                                                            <input type='hidden' value='$clientjobid' name='jobid'>
                                                                   <input type='submit' value='View' class='btn-primary'>
                                                                   </form></td>
                                                                   <td>
                                                             <form method='POST' action='deletejob.php'>
                                                                
                                                                    
                                                                        <input type='hidden' value='$clientjobid' name='jobid'>
                                                                   <input type='submit' value='Remove' class='btn-primary'>
                                                                   </form></td>
                                                             </tr>
                                                             </tr>
                                                             </tbody>";
                                                             
                                                     }else{
                                                          echo"<td>
                                                             <form method='POST' action='viewjob.php'>
                                                                <input type='hidden' value='$clientid' name='clientid'>
                                                                    <input type='hidden' value='$clientjobcat' name='jobcat'>
                                                                        <input type='hidden' value='$clientcounty' name='countyid'>
                                                                            <input type='hidden' value='$clientjobid' name='jobid'>
                                                                   <input type='submit' value='View' class='btn-primary'>
                                                                   </form></td>";
                                                         
                                                     }
                                                        
                                                    }                        		
                                                        
                                                    }
                                    
                                    
                                       echo"      
 					</table>
				
                                    
				</div><!-- .htlfndr-user-tabs-2 -->
                                                        ";
                                }else{
                                    echo"<p class='htlfndr-step-description'>No Jobs Available</p>";
                                }
                                
                                                     }
                                    
                                    
                                     }
                                                    
                               
                                
                                
                                ?>
                                       
                             
                                   </div>	
				
                </main>
             </div>
        </div>


		

<br>
<br>
<br>


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