<?php
session_start();
if((!isset($_SESSION["id_40214842"]))||(empty($_POST['jobid'])))
{
    header("Location: index.php");
}
     if(!isset($_SESSION["contractorid_40214842"]))
{
        header("Location: index.php");
    }

include("connect.php");
$id=$_SESSION['id_40214842'];
$contractorid=$_SESSION['contractorid_40214842'];
 $job=mysqli_real_escape_string($conn,$_POST['jobid']);
 
 
 $sql="DELETE FROM PRO_Make_Offer WHERE contractorfk = '$contractorid' AND jobfk='$job'";
  $check = mysqli_query($conn, $sql);


 mysqli_close($conn);
 
      echo "<script>";
echo " alert('Job has been removed');      
        window.location.href='myjobs.php';
</script>";





