<?php
session_start();
if(!isset($_SESSION["id_40214842"])||(empty($_POST)))
{
    header("Location: index.php");
}
 if(isset($_POST)){

include("connect.php");
$id=$_SESSION['id_40214842'];


 $sentby=mysqli_real_escape_string($conn,$_POST['reportfrom']);
 $comment=mysqli_real_escape_string($conn,$_POST['comment']);
 $page=mysqli_real_escape_string($conn,$_POST['site']);
$conid=mysqli_real_escape_string($conn,$_POST['con']);
 

 
 $sql="INSERT INTO PRO_report_admin(sentby,reportpage,message,conid) VALUES
     ('$sentby','$page','$comment','$conid')";
  $check = mysqli_query($conn, $sql) or die(mysqli_error($conn));

  
     echo "<script>";
echo " alert('Thank you for your report. Admin will now look into this');      
        window.location.href='$page';
</script>";
 }
 else
 {

 header("Location: index.php");
 
 }
 exit();

?>



