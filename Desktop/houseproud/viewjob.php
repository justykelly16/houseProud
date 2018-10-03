
<?php
header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); 
session_start();
include("connect.php");
if((!isset($_SESSION["id_40214842"]))||(empty($_POST['jobid'])))
{
        header("Location: index.php");
    }
    if(($_SESSION["id_40214842"]!=$_POST["clientid"])&&($_SESSION["admin_40214842"]=='No')){
    if((strpos($_SESSION['tasks_40214842'],$_POST['jobcat'])===FALSE)){
       header("Location: index.php"); 
    }
    
     if((strpos($_SESSION['counties_covered_40214842'],$_POST['countyid'])===FALSE)){
       header("Location: index.php"); 
    }
    }
      $id=$_SESSION['id_40214842'];
    $admin=$_SESSION["admin_40214842"];
     if($admin=='No'){
      $firstname=$_SESSION['firstname_40214842'];
          $lastname=$_SESSION['lastname_40214842'];
          $contractor=$_SESSION['contractor_40214842'];
          $pic=$_SESSION['pic_40214842'];
      
       
    }
       if($contractor=='Yes'){
              $contractorid=$_SESSION['contractorid_40214842'];
          }
     $jobid1=mysqli_real_escape_string($conn,$_POST['jobid']);
     
     $query="SELECT PRO_User.id, PRO_User.firstname, PRO_User.lastname, PRO_Post_Task.taskid, 
         PRO_Post_Task.job_title, 
         PRO_Post_Task.Description,PRO_Post_Task.town,PRO_Post_Task.county,
         PRO_Post_Task.Budget, PRO_Post_Task.Due_date,PRO_Jobs.Date_posted,
         PRO_Jobs.status FROM PRO_User INNER JOIN PRO_Post_Task ON 
         PRO_User.id=PRO_Post_Task.userfk INNER JOIN PRO_Jobs ON 
         PRO_Post_Task.taskid=PRO_Jobs.id WHERE PRO_Jobs.id = '$jobid1'";

     $result = mysqli_query($conn, $query) or die(mysqli_errno($conn));
     
     
     $query1="SELECT PRO_User.id, PRO_User.firstname, PRO_User.lastname, PRO_Message.Message, PRO_Message.message_id, PRO_Message.timestamp
           FROM PRO_User INNER JOIN PRO_Message ON PRO_User.id = PRO_Message.userfk 
         WHERE PRO_Message.jobfk = '$jobid1' ORDER BY PRO_Message.timestamp DESC ";
     
      $result1 = mysqli_query($conn, $query1) or die(mysqli_errno($conn));
      
       
    







?>
<?php
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
        <link rel="stylesheet" type="text/css" href="/code_examples/tutorial.css">
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
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
    function send_message()
{
 var message=$("#message").val();
 var job =$("#jobid").val();
 
 var user=$('#user').val();
 
 if(message!=="")
 {
 
  $.ajax
  ({
  type:'POST',
  url:'sendmessage.php',
  data:{
   
   
   message:message,
   job:job,
   
   user:user
  
  },
  success:function(response) {
  if(response==="OK")
  {
    location.reload();
    alert('Message sent, now able to view in the comments section');
  }
  else
  {
   
    alert('Wrong Details');
  }
  }
  });
 }

 else
 {
  alert('Please Fill All The Details');
 }

 return false;
}
    </script>   
  
			
                                		   
			<div class="widget htlfndr-room-details">
						<div id="htlfndr-accordion-1" class="htlfndr-widget-main-content htlfndr-widget-padding">
                                            
                                            <?php 
                                            $sql="SELECT job_status FROM PRO_Jobs_assigned WHERE id = '$jobid1'";
                                            $check= mysqli_query($conn, $sql) or die(mysqli_errno($conn));
                                            $rows= mysqli_fetch_assoc($check);
                                            $assign=$rows['job_status'];
                                            if($assign=='Open'){
                                               if(mysqli_num_rows($result)>0){
      while($row= mysqli_fetch_assoc($result)){
                                                        $userid=$row['id'];
                                                        $jobid=$row['taskid'];
                                                        $jobtitle=$row['job_title'];
                                                        
                                                        $clientfirstname=$row['firstname'];
                                                        $clientlastname=$row['lastname'];

                                                        
                                                        $town=$row['town'];
                                                       
                                                        $budget=$row['Budget'];
                                                        $duedate=$row['Due_date'];
                                                        $status=$row['status'];
                                                        $dateposted=$row['Date_posted'];
                                                        $descript=$row['Description'];
                                                        $county=$row['county'];
                                                        
                                                      
                                                        
                                                      
                                                      $currenttime=$dateposted;
                                                      $time_ago= strtotime($currenttime);



                                                        echo"
                                            
				<h2 class='widget-title htlfndr-accordion-title'>$jobtitle </h2>
				<div class='htlfndr-accordion-inner'>
				<p class='htlfndr-details'><span>Posted By: </span> <a href='userprofile.php?userid=$userid'><span>$clientfirstname $clientlastname</span></a></p>
                                    <p>"; echo timeAgo($time_ago); echo "</p>
				</div>
                                <div class='htlfndr-accordion-inner'>
                                <p class='htlfndr-details'><span><i class='fa fa-map-marker'></i> Location: </span> <span>$town $county</span></p>
                                    <p class='htlfndr-details'><span><i class='fa fa-calendar'></i> Due Date: </span> <span>$duedate</span></p>
                                    </div>
                                    <div class='htlfndr-accordion-inner'>
                                    <p class='htlfndr-details'><span>Job Budget: </span> <span>&pound$budget</span></p>
                                        </div>
                                        <div class='htlfndr-accordion-inner'>
						<p>Details</p>
						<p>$descript</p>
                                                    </div>
                                                 <div class='htlfndr-accordion-inner'>   
                                                    ";
                                                
                                    
                                                    if($id==$userid){
                                                        
                                                        
                                                        echo"                	        <div class='htlfndr-elements-content'  id='htlfndr-but'>
                                                            <form method='POST' action='viewoffers.php'>
                                                                   
                                                                        <input type='hidden' value='$jobid' name='jobid'>
                                                                           <input type='hidden' value='$userid' name='userid'> 
                                    <input type='submit' value='View Offers' class='btn-primary' style='float: left'>
                                    </form>
                                                                  <form method='POST' action='editjob.php'>
                                                                   <input type='hidden' value='$jobid' name='jobid'>       
                                    <input type='submit' value='Edit Job' class='btn-primary' style='float: left'>
                                                                   </form>
                                                                                                  <a onclick ='removeFunction$jobid()'>	        
                                    <input type='submit' value='Remove Job' class='btn-primary'>
                                                                    </a>
                                                                  </div>
						
					</div>
                                        <br>
                                                                                                                      <script>
              
                                                        function removeFunction$jobid() {
                                                       var del = confirm('Are you sure want to cancel job?');

                                                       if(del){
                                                            location.href = 'removejob.php?jobid=$jobid';
                                                       }
                                                       }
                                                       </script>
                                                
                                                            
";
                                                    }
                                                    else{
                                                       
                                                         $sql="SELECT * FROM PRO_Make_Offer WHERE contractorfk = '$contractorid' AND jobfk='$jobid1'";
                                                             $check = (mysqli_query($conn, $sql));

                                                            if(mysqli_num_rows($check)>0){
                                                                 while($row= mysqli_fetch_assoc($check)){
                                                                     $offer=$row['quote'];
                                                        $offerstatus=$row['quote_accepted'];
                                                        
                                                            if($offerstatus=='Rejected'){
                                                                               echo"
                                               
                                           
						<a href='#' class='htlfndr-book-now-button' data-toggle='modal' data-target='#htlfndr-sing-up'><span>Make Offer</span></a>
					<br>
						</div>
                                                ";
                                                            }else{
                                                        echo" 
                                                            <p class='htlfndr-details'><span>Offer: </span> <span>&pound$offer</span></p>
                                                                <p class='htlfndr-details'><span>Offer Status: </span> <span>$offerstatus</span></p>
                                                                    </div>
                                                                    
                                                                            ";
                                                    
                                                                
                                                        
                                                    echo"
                                                                       	        <div class='htlfndr-elements-content'  id='htlfndr-but'>
                                                                                <form method='POST' action='editjoboffer.php'>
                                                                    	        
                                    <input type='hidden' name='jobid' value='$jobid1'>
                                        <input type='hidden' name='conid' value='$contractorid'>
                                    <input type='submit' value='Edit Offer' class='btn-primary'>
                                    </form>
                                                                    
                                                                    <br>
                                </div>
					<br>	
					</div>
                                                            <br>";
                                                            }
                                                            }} else{
                                                        
                                                    echo"
                                               
                                           
						<a href='#' class='htlfndr-book-now-button' data-toggle='modal' data-target='#htlfndr-sing-up'><span>Make Offer</span></a>
					<br>
						</div>
                                                ";
                                                    }
                                                    echo"
                                                <div class='htlfndr-accordion-inner'> 
                                            <h5>Comments</h5>
                                            </div>
                                       
                                       
                                                    ";}
     
                                                                    }}
                                                     $i=0;            
                                             if(mysqli_num_rows($result1)>0){
                                                 
                                                 
                                    while($row= mysqli_fetch_assoc($result1)){
                                        $messageid=$row['message_id'];
                                        $senderid=$row['id'];
                                        $fname=$row['firstname'];
                                        $lname=$row['lastname'];
                                        $message=$row['Message'];
                                        $timesent=$row['timestamp'];
                                       
                                        
                                        
                                        $timeposted=strtotime($timesent);
                                        
                                        $query2="SELECT * FROM PRO_Reply WHERE messagefk='$messageid'";
                                        
                                        $result2 = mysqli_query($conn, $query2) or die(mysqli_errno($conn));
                                        
                                        
                                                
                                          
                                              
                                                echo"
                                             <div class='htlfndr-accordion-inner'> 
                                             ";
                                                if($senderid==$userid){ 
                                                    echo"
                                                
                                            <p class='htlfndr-details'><a href='userprofile.php?userid=$senderid'<span>$fname $lname</span></a> <span class='pull-right'>"; echo timeAgo($timeposted); echo"</span></p>
                                               
                                            <p>$message</p>
                                                
                                               ";
                                                } else{
                                                      
                                                       $query4="SELECT id FROM PRO_Contractor WHERE userfk ='$senderid'";
                                                       $res1=mysqli_query($conn, $query4) or die(mysqli_errno($conn));
                                                       if(mysqli_num_rows($res1)==1){
                                                           $rows= mysqli_fetch_assoc($res1);
                                                           $conuid=$rows['id'];
                                                       }
                                                          
                                                    echo"
                                                         <p class='htlfndr-details'><a href='viewconprofile.php?conid=$conuid'<span>$fname $lname</span></a> <span class='pull-right'>"; echo timeAgo($timeposted); echo"</span></p>
                                               
                                            <p>$message</p>
                                                
                                                        ";
                                                }
                                                 if(mysqli_num_rows($result2)>0){
                                    while($row= mysqli_fetch_assoc($result2)){
                                        $reply=$row['Reply'];
                                        $replytime=$row['time'];
                                        $replyname=$row['name'];
                                        $replyuser=$row['userfk'];
                                        
                                        
                                        $replytimeposted= strtotime($replytime);
                                        
                                                                                                                             echo"
                                            
                                             <ol class='htlfndr-comment-list children'>
                                                ";
                                                   if($replyuser==$userid){ 
                                                       
                                                       echo"
                                                                                                                            
                                               <p class='htlfndr-details'><a href='userprofile.php?userid=$replyuser'<span>$replyname</span></a> <span class='pull-right'>"; echo timeAgo($replytimeposted); echo"</span></p>
                                              
                                              <p>$reply</p>

                                            </ol>
                                            <br>
                                        ";
                                                   }else{
                                                       $query3="SELECT id FROM PRO_Contractor WHERE userfk ='$replyuser'";
                                                       $res=mysqli_query($conn, $query3) or die(mysqli_errno($conn));
                                                       if(mysqli_num_rows($res)==1){
                                                           $rows= mysqli_fetch_assoc($res);
                                                           $conid=$rows['id'];
                                                       }
                                                                                      echo"
                                                                                                                            
                                               <p class='htlfndr-details'><a href='viewconprofile.php?conid=$conid'<span>$replyname</span></a> <span class='pull-right'>"; echo timeAgo($replytimeposted); echo"</span></p>
                                              
                                              <p>$reply</p>

                                            </ol>
                                            <br>
                                        ";  
                                                   }
                                    }
                                            
                                            
                                          }
                                          
                                         
                                            echo"  
                                          <div class='htlfndr-elements-tab collapsed pull-right' data-target='#typography$messageid' data-toggle='collapse'><span><i class='fa fa-reply'></i> Reply</span><i class='caret'></i></div>
                                          <ul id='typography$messageid' class='collapse'>
                                              <div>
							  <form action='#'  method='POST' onsubmit='return send_reply$i();' >
                                        <textarea name='reply_message$i' id='reply_message$i' rows='6' class='htlfndr-review-form-input' required></textarea>
                                            <input id='messagefk$i' type='hidden' name='messagefk$i' value='$messageid'> 
                                            <input id='name$i' type='hidden' name='name$i' value='$firstname $lastname'>
                                                <input id='replyuser$i' type='hidden' name='replyuser$i' value='$id'>
                                                   
                                                     <input id='jobid$i' type='hidden' name='jobid$i' value='$jobid1'> 
                                            <input type='submit'  class='btn-primary' value='Submit'><br>
                                            </form>
                                            </div>
						</ul>
                                                
                                             <br>
                                             </div>
                                             <br>
                                             
                                             
                                             
                                      ";    
                                                                                echo"
                                            <script type='text/javascript' src='jquery.js'></script>
<script type='text/javascript'>
    function send_reply$i()
{
 var messagefk=$('#messagefk$i').val();
 var job =$('#jobid$i').val();
 var message=$('#reply_message$i').val();
 var user=$('#replyuser$i').val();
 var name=$('#name$i').val();
 if(message!=='')
 {
 
  $.ajax
  ({
  type:'POST',
  url:'sendreplytest.php',
  data:{
   
   
   message:message,
   messagefk:messagefk,
   job:job,
   name:name,
   user:user
  
  },
  success:function(response) {
  if(response==='OK')
  {
    
    alert('Reply sent, now able to view in the comments section');
    location.reload();
  }
  else
  {
   
    alert('Wrong Details');
  }
  }
  });
 }

 else
 {
  alert('Please Fill All The Details');
 }

 return false;
}
    </script>  "; 	
                     $i++;                        
                                          
                                    }
 
                                             
         
                                            
                                   } 
                                             
                                  
                                    
                                         
                                    else{
                                       
                                        echo" <div class='htlfndr-accordion-inner'> 
                                            <h6>No Comments</h6>
                                            </div>";
                                    }
                                    
                                    if($id!=$userid){
                                    echo" <div class='htlfndr-accordion-inner'> 
                                        <form action='viewjob.php?jobid=$jobid' method='POST' onsubmit='return send_message();'>
                                        <textarea name='message' id='message' rows='6' class='htlfndr-review-form-input' placeholder='Ask $clientfirstname a question' required></textarea>
                                            <input id='jobid' type='hidden' name='jobid' value='$jobid'> 
                                            
                                                <input id='user' type='hidden' name='user' value='$id'>
                                            <input type='submit' value='Submit' class='btn-primary'><br>
                                            </form>
					</div>
                                        <div>
                                        </div>
                                        <br>
                                            ";}     }
                                            
                                            else if($assign=='Cancelled'){
                                                echo"
                                            
                                                                  <div class='alert alert-warning'>
					  <i class='fa fa-exclamation'></i>Job has been cancelled
					</div> ";
                                                
                                            }else if($assign=='Assigned'){
                                            
                                            echo"
                                                
                             
                                                
                                                 
					<div class='alert alert-success'>
					  <i class='fa fa-check'></i>Job has been Assigned
                                          </div>
                                          
                                                    ";
                                            }else{
                                                echo"Unavailable Job";
                                            }
                                            ?>
                                
				
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
                                                            <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

 <script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
    function make_offer()
{
 var offer=$("#offer").val();
 var contractor=$("#contractor").val();
  var job= $("#job").val();
  
 if(offer!==""){
 
  $.ajax
  ({
  type:'POST',
  url:'makeoffer.php',
  data:{
   
   
   offer:offer,
   contractor:contractor,
   job:job
  },
  success:function(response) {
  if(response==="OK")
  {
        location.reload();
    alert("Offer has been made job can now be viewed in my jobs");
  }
  else
  {
   
    alert("You have already made an offer for this job to edit offer go to my jobs");
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
         <div id="htlfndr-sing-up">
			<div class="htlfndr-content-card">
				<div class="htlfndr-card-title clearfix">
					<h2 class="pull-left">Make Offer</h2> 
				</div>
                            <form id="htlfndr-sing-up-form" method="POST" action="settings.php" onsubmit="return make_offer();">
					
						<div class="htlfndr-card-title clearfix">
							<h4><?php echo $jobtitle ?></h4>
                                                        <br>
						</div>
						
					<div class="htlfndr-card-title clearfix">
                                            <h4><i class='fa fa-calendar'></i> Due Date: <?php echo $duedate ?></h4>
                                            <h4><i class='fa fa-map-marker'></i> Location: <?php echo "$town $county" ?></h4>
                                            
                                        </div>
                                        <div class="htlfndr-card-title clearfix">
					<h4>Job Budget: <?php echo "&pound$budget" ?></h4>
                                        </div>
                                 <div class="htlfndr-card-title clearfix">
                                <h4>Offer &pound;</h4>
                                <input id="offer" class="htlfndr-input " type="number" min="1" max="1000" name="offer" required >
                                <input id="contractor" type="hidden" name="contractor" value="<?php echo "$contractorid"; ?>">
                                <input id="job" type="hidden" name="job" value="<?php echo "$jobid"; ?>">
                                <p>If offer is accepted you are agreeing that job can be completed before the due date</p>
                        
                                
                        </div>
                            <div class="htlfndr-card-title clearfix">   
                              <input type="submit" id="btnSubmit" value="Make Offer" class="htlfndr-book-now-button" >
                            
					</div>
				</form>
			</div>
		</div>

    <div id="htlfndr-sing-in">
			<div class="htlfndr-content-card">
				<div class="htlfndr-card-title clearfix">
					<h2 class="pull-left">Reply</h2> 
				</div>
                            <form id="htlfndr-sing-in-form" action="settings.php" method="POST" onsubmit="return send_reply();">
					
                                        <textarea id="reply"  name="reply" rows="5" style="min-width: 100%" required></textarea>
                                        <input id="messageid" type="hidden" name="messageid" value="<?php echo "$messagefk"; ?>">
                                        <input id="user" type="hidden" name="user" value="<?php echo"$id"; ?>">
                                        <input id="job1" type="hidden" name="job1" value="<?php echo "$jobid"; ?>">
                                        <br>
                                       
                  
					<div class="clearfix">
						
						<input type="submit" name="reply" value="Reply" class="htlfndr-book-now-button">
                                              
					</div>
				</form>
  

			</div>
 

		</div>



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