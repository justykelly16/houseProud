<?php
session_start();
if(!isset($_SESSION["id_40214842"])||(empty($_POST)))
{
    header("Location: index.php");
}

include("connect.php");
$id=$_SESSION['id_40214842'];

$email=mysqli_real_escape_string($conn,$_POST['email']);
 $pass=mysqli_real_escape_string($conn,$_POST['password']);
 $newpass=mysqli_real_escape_string($conn,$_POST['newpw1']);
  $newpassagain=mysqli_real_escape_string($conn,$_POST['newpw2']);
  
 $select_data="SELECT * FROM PRO_Login WHERE email='$email' AND password =MD5('$pass')";

 $query=mysqli_fetch_array(mysqli_query($conn, $select_data));
 

 
 if(isset($query)){
     
          
         $update="UPDATE PRO_Login SET password = MD5('$newpass') WHERE id = '$id'";
         $result = mysqli_query($conn, $update) or die(mysqli_error($conn));
          
           echo"OK";
           
      
 }
  
 else
 {
  echo "fail";
 }
 exit();

?>



