<?php

session_start();
if(!isset($_SESSION["id_40214842"]))
{
        header("Location: index.php");
    }

include("connect.php");
 $id=$_SESSION['id_40214842'];
$bio = mysqli_real_escape_string($conn, $_POST["bio"]);

$trans = mysqli_real_escape_string($conn, $_POST["transportation"]);


if(!empty($_POST)){

 $query="UPDATE PRO_Contractor SET bio = '$bio', Transportation = '$trans' WHERE PRO_Contractor.userfk ='$id'";
        $result= mysqli_query($conn, $query)or die(mysqli_error($conn));
        
       
   
        mysqli_close($conn);
            echo "
       
<script>     
alert('Details has been changed');
window.location.href='settings.php';
   </script>
  ";


        }
else{
    header("Location: index.php");
}
?>