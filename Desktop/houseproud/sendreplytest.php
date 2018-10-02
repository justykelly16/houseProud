<?php
session_start();
if((!isset($_SESSION["id_40214842"])||(empty($_POST))))
{
    header("Location: index.php");
}

include("connect.php");
$id=$_SESSION['id_40214842'];
$message=mysqli_real_escape_string($conn,$_POST['message']);
 $job=mysqli_real_escape_string($conn,$_POST['job']);
$messagefk=mysqli_real_escape_string($conn,$_POST['messagefk']);
 $user=mysqli_real_escape_string($conn,$_POST['user']);
$name=mysqli_real_escape_string($conn,$_POST['name']);
if(isset($_POST['message'])){

  
  
 $select_data="INSERT INTO PRO_Reply (Reply,messagefk,userfk,name) VALUES
     ('$message','$messagefk','$user','$name')";

 $query= mysqli_query($conn, $select_data)or die(mysqli_error($conn));

         

 
 echo "OK";
           
        
      
 }
 else
 {
  echo "fail";
 }
 exit();

?>



