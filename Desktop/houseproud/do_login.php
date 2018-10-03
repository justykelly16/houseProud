<?php

session_start();



if(isset($_POST['do_login']))
{
    include("connect.php");
 $email=mysqli_real_escape_string($conn,$_POST['email']);
 $pass=mysqli_real_escape_string($conn,$_POST['password']);

 $select_data=mysqli_query("SELECT * FROM PRO_Login WHERE email='$email' AND password ='$pass'");

 $query=mysqli_fetch_array(mysqli_query($conn, $select_data));
 
 if(mysqli_num_rows($query)>0){
     while($row= mysqli_fetch_assoc($query)){
          
          $_SESSION["id_40214842"]=$row['id'];
          $_SESSION["email_40214842"]=$row['email'];
          $_SESSION["admin_40214842"]=$row['Admin'];
           echo"success";
           
      }
 }
  
 else
 {
   header("Location: index.php");
 }
 exit();
}
?>
