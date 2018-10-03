<?php

session_start();
if(!isset($_SESSION["id_40214842"]))
{
        header("Location: index.php");
    }

include("connect.php");
if(!empty($_POST)){
 $id=$_SESSION['id_40214842'];
$firstname = mysqli_real_escape_string($conn, $_POST["first-name"]);

$lastname = mysqli_real_escape_string($conn, $_POST["last-name"]);



$street = mysqli_real_escape_string($conn, $_POST["street"]);

$town = mysqli_real_escape_string($conn, $_POST["town"]);



$county = mysqli_real_escape_string($conn, $_POST["county"]);



$postcode = mysqli_real_escape_string($conn, $_POST["postcode"]);

$phonenumber = mysqli_real_escape_string($conn, $_POST["phone-number"]);


 $query="UPDATE PRO_User SET firstname = '$firstname', lastname = '$lastname',
     Street='$street',Town='$town',County='$county',
         Postcode='$postcode',phone_number='$phonenumber' WHERE PRO_User.id ='$id'";
        $result= mysqli_query($conn, $query)or die(mysqli_error($conn));
        
        $check = "SELECT * FROM PRO_User WHERE id = '$id'";
        $result1= mysqli_query($conn, $check) or die(mysqli_errno($conn));
   
        mysqli_close($conn);
                   echo "
       
<script>     
alert('Details has been changed');
window.location.href='settings.php';
   </script>
  ";
    
}else{
    header("Location: index.php");
}
?>