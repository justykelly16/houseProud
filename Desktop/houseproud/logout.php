<?php

session_start();
setcookie(session_name(), '', 100);
session_cache_limiter ('private_no_expire, must-revalidate');
session_unset();
session_destroy();
$_SESSION = array();
header("Location: index.php");
  
  exit;
  
  ?>
  



  


