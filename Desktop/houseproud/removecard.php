<?php
session_start();
if((!isset($_SESSION["id_40214842"])))
{
    header("Location: index.php");
}

if(empty($_POST['cardid'])){
    header("Location: index.php");
}


include("connect.php");
$id=$_SESSION['id_40214842'];
 $card=mysqli_real_escape_string($conn,$_POST['cardid']);
 
 
 $sql="DELETE FROM PRO_Payment WHERE userfk = '$id' AND id='$card'";
  $check = mysqli_query($conn, $sql);


 
 
      echo "<script>";
echo " alert('Card has been removed');      
        window.location.href='paymentmethods.php';
</script>";





