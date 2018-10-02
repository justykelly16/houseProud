<?php
session_start();
if((!isset($_SESSION["id_40214842"])||(empty($_POST))))
{
    header("Location: index.php");
}


include("connect.php");
$id=$_SESSION['id_40214842'];
$messagefk=$_POST['messagefk'];

 $user=mysqli_real_escape_string($conn,$_POST['user']);
 $reply=mysqli_real_escape_string($conn,$_POST['message']);
 $name=mysqli_real_escape_string($conn,$_POST['name']);
 $job=mysqli_real_escape_string($conn,$_POST['job']);
 
 if(isset($_POST['message'])){
 
 $sql="INSERT INTO PRO_private_reply(reply,messagefk,userfk,name) VALUES
     ('$reply','$messagefk','$user','$name')";
  $check = mysqli_query($conn, $sql) or die(mysqli_error($conn));

  
     echo "OK";
 }
 else
 {

 
 echo "Fail";
 }
 exit();

?>



