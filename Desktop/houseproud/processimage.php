<?php
session_start();
if(!isset($_SESSION["id_40214842"]))
{
    header("Location: index.php");
}
include("connect.php");
include("functions.php");

$fileExtensions = array('jpeg','.jpg','.png');

$id=$_SESSION['id_40214842'];
$filename = $_FILES['newimg']['name'];
$filetemp = $_FILES['newimg']['tmp_name'];
$fileExtension = substr($filename,strlen($filename)-4,strlen($filename));
$errorflag = 0;




if(empty($filename)){
 $errorflag = 1;
}
if(!in_array($fileExtension,$fileExtensions)){
    $errorflag = 1;
}
if($errorflag==1){
 echo "<script>";
    echo " alert('File extension not allowed. Please upload a JPEG or PNG');
                window.location.href='settings.php';
</script>";
        

 die();

}else{ 
    $filename=myRandom($filename);
    move_uploaded_file($filetemp, "images/$filename");

$insertquery= "UPDATE PRO_User SET profile_picture = '$filename' WHERE id = '$id'";

$result = mysqli_query($conn, $insertquery) or die(mysqli_error($conn));
$_SESSION['pic_40214842']=$filename;
     echo "<script>";
echo " alert('Profile picture has been changed thank you');      
        window.location.href='settings.php';
</script>";
 }




?>
