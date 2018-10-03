<?php
session_start();
if(($_SESSION["contractorid_40214842"])!=($_POST['conid']))
{
        header("Location: index.php");
    }
       


include("connect.php");

$message=mysqli_real_escape_string($conn,$_POST['review-text']);

 $rating=mysqli_real_escape_string($conn,$_POST['htlfndr-review-radio-cleanliness']);
 $client=mysqli_real_escape_string($conn,$_POST['clientid']);
 $name=mysqli_real_escape_string($conn,$_POST['name']);
 $job=mysqli_real_escape_string($conn,$_POST['jobid']);
 

 
 $sql="INSERT INTO PRO_rate_client(Star_rating,review,name,userfk,jobfk) VALUES
     ('$rating','$message','$name','$client','$job')";
  $check = mysqli_query($conn, $sql) or die(mysqli_error($conn));

  
header("Location: thankyou.php");



?>



