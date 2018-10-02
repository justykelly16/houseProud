<?php

session_start();

include("connect.php");


$email=mysqli_real_escape_string($conn,$_POST['email']);
 $pass=mysqli_real_escape_string($conn,$_POST['password']);
 $select_data="SELECT * FROM PRO_Login WHERE email='$email' AND password =MD5('$pass')";

 $query=mysqli_query($conn, $select_data)or die(mysqli_error($conn));
 
 if(mysqli_num_rows($query)>0){
     while($row= mysqli_fetch_assoc($query)){
          
          $_SESSION["id_40214842"]=$row['id'];
          $_SESSION["email_40214842"]=$row['email'];
          $_SESSION["admin_40214842"]=$row['Admin'];
          
           echo"OK";
           
      }
 }
  
 else
 {
  echo "fail";
 }
 exit();

?>



