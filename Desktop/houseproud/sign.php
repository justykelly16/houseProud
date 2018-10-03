<?php
session_start();
include("connect.php");
if(isset($_POST)&!empty($_POST)){
      





$username = mysqli_real_escape_string($conn, $_POST["email"]);

$pass = mysqli_real_escape_string($conn, $_POST["pass"]);

$fname = mysqli_real_escape_string($conn, $_POST["firstname"]);

$lname = mysqli_real_escape_string($conn, $_POST["lastname"]);



$street = mysqli_real_escape_string($conn, $_POST["street"]);

$town = mysqli_real_escape_string($conn, $_POST["town"]);



$county = mysqli_real_escape_string($conn, $_POST["county"]);



$postcode = mysqli_real_escape_string($conn, $_POST["postcode"]);

$phonenumber = mysqli_real_escape_string($conn, $_POST["phone-number"]);
$filename=("profile.png");

 $sql="SELECT * FROM PRO_Login WHERE email = '$username'";

 $check = mysqli_fetch_array(mysqli_query($conn, $sql));


  if(isset($check)){
        echo'email already exist';
        header("Location: index.php");
    }else{
        $query="INSERT INTO PRO_Login (id,email,password,firstname,lastname,Admin) VALUES(NULL,'$username',MD5('$pass'),'$fname','$lname','No');
            ";
        $result= mysqli_query($conn, $query)or die(mysqli_error($conn));
        
       $query1="INSERT INTO PRO_User (id,firstname,lastname,Street,Town,County,Postcode,phone_number,contractor,profile_picture) VALUES(LAST_INSERT_ID(),'$fname','$lname',
     '$street','$town','$county','$postcode','$phonenumber','No','$filename');";
   
        $result1= mysqli_query($conn, $query1)or die(mysqli_error($conn));
    } 
     $checkquery="SELECT * FROM PRO_Login WHERE email = '$username' AND password = MD5('$pass')";
        $result1 = mysqli_query($conn,$checkquery) or die(mysqli_error($conn));
    if(mysqli_num_rows($result1)>0){
        while($row= mysqli_fetch_assoc($result1)){
            $_SESSION["id_40214842"]=$row['id'];
          $_SESSION["email_40214842"]=$row['email'];
          $_SESSION["admin_40214842"]=$row['Admin'];
        
    header("Location: index.php");
        }
}else{
    header("Location: index.php");
}
}else{
     header("Location: index.php");
}
?>