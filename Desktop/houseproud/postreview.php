<?php
session_start();
if(!isset($_SESSION["id_40214842"])||(empty($_POST)))
{
    header("Location: index.php");
}


include("connect.php");
$id=$_SESSION['id_40214842'];
$message=mysqli_real_escape_string($conn,$_POST['review-text']);

 $rating=mysqli_real_escape_string($conn,$_POST['htlfndr-review-radio-cleanliness']);
 $contractor=mysqli_real_escape_string($conn,$_POST['contractorid']);
 $name=mysqli_real_escape_string($conn,$_POST['name']);
 $job=mysqli_real_escape_string($conn,$_POST['jobid']);
 

 
 $sql="INSERT INTO PRO_Rate_Contractor(id,Star_rating,review,name,contractorfk) VALUES
     ('$job','$rating','$message','$name','$contractor')";
  $check = mysqli_query($conn, $sql) or die(mysqli_error($conn));

  
header("Location: thankyou.php");



?>



