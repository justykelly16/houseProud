<?php
session_start();
if((!isset($_SESSION["id_40214842"])||(empty($_POST))))
{
    header("Location: index.php");
}
include("connect.php");

$postjoboffer= mysqli_real_escape_string($conn,$_POST["job-offer"]);
$postconid=mysqli_real_escape_string($conn,$_POST["contractorid"]);
$id=$_SESSION["id_40214842"];
$firstname=$_SESSION['firstname_40214842'];
$lastname=$_SESSION['lastname_40214842'];
$clientjobid=mysqli_real_escape_string($conn,$_GET['jobid']);

if(isset($_POST['job-offer'])){

$query = "UPDATE PRO_Make_Offer SET quote = '$postjoboffer'  WHERE PRO_Make_Offer.jobfk = '$clientjobid'
    AND PRO_Make_Offer.contractorfk = '$postconid'";

$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

     echo "
       
<script>     
alert('Offer has been changed');
window.location.href='myjobs.php';
   </script>
  ";

} else{
     header("Location: index.php");
}
exit;
?>
