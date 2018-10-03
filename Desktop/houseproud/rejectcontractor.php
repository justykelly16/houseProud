<?php
session_start();
include("connect.php");
if(!isset($_SESSION["id_40214842"])&&(($_SESSION["admin_40214842"])=='No'))
{
        header("Location: index.php");
    }


 $id=$_SESSION['id_40214842'];
  $cid=mysqli_real_escape_string($conn,$_GET['cid']);
  
  $sql="SELECT PRO_Login.email, PRO_User.id,PRO_User.firstname,PRO_User.lastname FROM PRO_Login INNER JOIN PRO_User ON 
      PRO_Login.id=PRO_User.id INNER JOIN PRO_Contractor ON PRO_User.id=PRO_Contractor.userfk
      WHERE PRO_Contractor.id='$cid'";
  
   $result= mysqli_query($conn, $sql);
    $rows= mysqli_fetch_assoc($result);
    $conemail=$rows['email'];
    $userid=$rows['id'];
    $userfname=$rows['firstname'];
    $userlname=$rows['lastname'];
   

$query="DELETE PRO_Contractor_verification, PRO_Job_alerts, PRO_Contractor FROM PRO_Contractor_verification INNER JOIN 
    PRO_Contractor ON PRO_Contractor_verification.id=PRO_Contractor.id INNER JOIN PRO_Job_alerts ON
    PRO_Contractor.id=PRO_Job_alerts.contractorfk
    WHERE PRO_Contractor_verification.id ='$cid'";
$result1= mysqli_query($conn, $query) or die(mysqli_errno($conn));






require('phpmailer/class.phpmailer.php');

$mail= new PHPMailer();
$mail->From=("HouseProud");
$mail->FromName = ("Admin");
$mail->addAddress("$conemail");
$mail->IsHtml(true);
$mail->Subject = ("HouseProud");
$mail->Body = ("Dear $userfname $userlname,<break;>
        Sorry at this time we cannot add you to our list of contractors 
        
        Just log in as normal and you are able to search jobs in your chosen locations.
        
        Thanks
        
        HouseProud");
if(!$mail->send()){
    echo 'message could not be sent';
    
    echo"Mailer Error: ".$mail->ErrorInfo;
    exit;
}else{
         echo "<script>";
echo " alert('Contractor has been deleted');      
        window.location.href='pendingcontractors.php';
</script>";
}

mysqli_close($conn);

?>
