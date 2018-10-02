<?php

session_start();

include("connect.php");



if(isset($_POST['username']) && $_POST['username'] != '' && isset($_POST['password']) && $_POST['password'] != '') {
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  if($username != "" && $password != "") {
    try {
      $query = "select * from `PRO_Login` where `email`=:username and `password`=:password";
 $stmt = $db->prepare($query);
      $stmt->bindParam('username', $username, PDO::PARAM_STR);
      $stmt->bindValue('password', $password, PDO::PARAM_STR);
      $stmt->execute();
      $count = $stmt->rowCount();
      $row   = $stmt->fetch(PDO::FETCH_ASSOC);
      if($count == 1 && !empty($row)) {
          
       $_SESSION['id_40214842']   = $row['id'];
        $_SESSION['user_40214842'] = $row['email'];
        
        echo "user-page.php";
      } else {
        echo "invalid";
      }
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  } else {
    echo "Both fields are required!";
  }
} else {
  header('location: index.php');
}
?>
