<?php

session_start();

include("connect.php");

$username = mysqli_real_escape_string($conn, $_POST["email"]);

$pass = mysqli_real_escape_string($conn, $_POST["password"]);



 $sql="SELECT * FROM PRO_Login WHERE email = '$username' AND password ='$pass'";

 $check = mysqli_fetch_array(mysqli_query($conn, $sql));


  
        
    
 
        
        $checkquery="SELECT * FROM PRO_Login WHERE email = '$username' AND password = '$pass'";
        $result1 = mysqli_query($conn,$checkquery) or die(mysqli_error($conn));
   
        mysqli_close($conn);
    
    if(mysqli_num_rows($result1)>0){
        while($row= mysqli_fetch_assoc($result1)){
             $email=$row['email'];
                $id=$row['id'];
                
                
                
                $_SESSION["user_40214842"]=$email;
                $_SESSION["id_40214842"]=$id;
               
        
    header("Location: user-page.php");
        }
}else{
    header("Location: index.php");
}

?>