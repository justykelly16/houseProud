<?php
session_start();
if(($_SESSION["id_40214842"])!=($_GET['userid']))
{
    header("Location: index.php");
}


include("connect.php");
$id=$_SESSION['id_40214842'];

 $contractor= mysqli_real_escape_string($conn, $_GET['conid']);
 $job=mysqli_real_escape_string($conn,$_GET['jobid']);
 $quote=mysqli_real_escape_string($conn,$_GET['quote']);
 
 
 $sql=("UPDATE PRO_Make_Offer SET quote_accepted='Rejected' WHERE jobfk='$job';
     UPDATE PRO_Make_Offer SET quote_accepted='Accepted' WHERE contractorfk='$contractor' AND
         jobfk='$job';
             UPDATE PRO_Jobs SET status = 'Assigned' WHERE id = '$job';
                 UPDATE PRO_Jobs_assigned SET job_status ='Assigned',contractorfk='$contractor',price='$quote'
                     WHERE id='$job';
         ");
  $check = mysqli_multi_query($conn, $sql) or die(mysqli_error($conn));

  
     echo "<script>";
echo " alert('Offer has been accepted');      
        window.location.href='myjobs.php';
</script>";



 exit();

?>



