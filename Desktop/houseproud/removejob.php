
<?php
session_start();
include("connect.php");
if((!isset($_SESSION["id_40214842"])))
{
        header("Location: index.php");
    }
       if(empty($_GET['jobid'])){
           header("Location:index.php");
       }
   
     
   $jobid=mysqli_real_escape_string($conn,$_GET['jobid']);
   
      
   $update=("UPDATE PRO_Jobs SET status = 'Cancelled' WHERE id = $jobid;
           UPDATE PRO_Jobs_assigned SET job_status='Cancelled' WHERE id = '$jobid';
               UPDATE PRO_Make_Offer SET quote_accepted ='Cancelled' WHERE jobfk='$jobid' ");
   
        

     $result = mysqli_multi_query($conn, $update) or die(mysqli_errno($conn));
   
  
       echo "<script>";
echo " alert('Job has been cancelled');      
        window.location.href='myjobs.php';
</script>";
    



mysqli_close($conn);





