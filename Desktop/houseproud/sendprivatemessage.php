<?php
session_start();
if(!isset($_SESSION["id_40214842"])||(empty($_POST)))
{
    header("Location: index.php");
}

include("connect.php");
$id=$_SESSION['id_40214842'];
$message=mysqli_real_escape_string($conn,$_POST['message']);
 $job=mysqli_real_escape_string($conn,$_POST['job']);

 $user=mysqli_real_escape_string($conn,$_POST['user']);

if(isset($_POST['message'])){

  
  
 $select_data="INSERT INTO PRO_Private_message (Message,jobfk,userfk) VALUES
     ('$message','$job','$user')";

 $query= mysqli_query($conn, $select_data)or die(mysqli_error($conn));

         

 
 echo "OK";
           
        
      
 }
 else
 {
  echo "fail";
 }
 exit();

?>



