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
   
$sql1="DELETE FROM PRO_report_admin WHERE conid = '$cid' ";
$result1= mysqli_query($conn, $sql1);







require('phpmailer/class.phpmailer.php');

$mail= new PHPMailer();
$mail->From=("HouseProud");
$mail->FromName = ("Admin");
$mail->addAddress("$conemail");
$mail->IsHtml(true);
$mail->Subject = ("HouseProud");
$mail->Body = ("Dear $userfname $userlname,<break;>
        
        We have noticed some unacceptable behaviour on your account. Anymore and we would have to remove your account.
        
        Thanks
        
        HouseProud");
if(!$mail->send()){
    echo 'message could not be sent';
    
    echo"Mailer Error: ".$mail->ErrorInfo;
    exit;
}else{
         echo "<script>";
echo " alert('Contractor has been sent a warning');      
        window.location.href='messages.php';
</script>";
}

mysqli_close($conn);

?>
