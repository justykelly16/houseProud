<?php



include("connect.php");



if(isset($_POST['user_email']))
{
 $emailId=mysqli_real_escape_string($conn,$_POST['user_email']);

 $checkdata=" SELECT email FROM PRO_Login WHERE email='$emailId' ";

 $query=mysqli_fetch_array(mysqli_query($conn, $checkdata));
 
  if(isset($query)){
        echo'email already exist';
  }
 else
 {
  echo "OK";
 }
 exit();
}
?>
