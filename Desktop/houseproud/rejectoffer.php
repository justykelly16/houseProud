<?php
session_start();
if(($_SESSION["id_40214842"])!=($_GET['userid']))
{
    header("Location: index.php");
}


include("connect.php");
$id=$_SESSION['id_40214842'];

 $contractor=mysqli_real_escape_string($conn,$_GET['conid']);
 $job=mysqli_real_escape_string($conn,$_GET['jobid']);
 
 
 
 $sql="UPDATE PRO_Make_Offer SET quote_accepted='Rejected' WHERE contractorfk='$contractor' AND jobfk='$job'";
  $check = mysqli_query($conn, $sql) or die(mysqli_error($conn));

  
     echo "<script>";
echo " alert('Offer has been rejected');      
        window.location.href='viewoffers.php?jobid=$job&userid=$id';
</script>";



 exit();

?>



