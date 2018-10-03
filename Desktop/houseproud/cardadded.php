<?php
session_start();
if(!isset($_SESSION["id_40214842"]))
{
    header("Location: index.php");
}
if(isset($_POST)&!empty($_POST)){

include("connect.php");
$id=$_SESSION['id_40214842'];
$cardnum=mysqli_real_escape_string($conn,$_POST['htlfndr-number-card']);
 $cardname=mysqli_real_escape_string($conn,$_POST['htlfndr-new-name-card']);

 $valid=mysqli_real_escape_string($conn,$_POST['htlfndr-new-valid-card']);



  
  
 $select_data="INSERT INTO PRO_Payment (cardholder_name,card_number,valid, userfk) VALUES
     ('$cardname','$cardnum','$valid','$id')";

 $query= mysqli_query($conn, $select_data)or die(mysqli_error($conn));

         

 
      echo "<script>";
echo " alert('Card has been added to payment method');      
        window.location.href='paymentmethods.php';
</script>";
           
        
      
 }
 else
 {
  echo "fail";
 }
 exit();

?>



