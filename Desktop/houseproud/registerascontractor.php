<?php

session_start();
if(!isset($_SESSION["id_40214842"]))
{
        header("Location: index.php");
    }

include("connect.php");
include("functions.php");
 $id=$_SESSION['id_40214842'];
 $firstname=$_SESSION['firstname_40214842'];
 $lastname=$_SESSION['lastname_40214842'];
$service = implode(",",$_REQUEST["job-category"]);
$counties = implode(",",$_REQUEST["counties"]);


$dob = mysqli_real_escape_string($conn, $_POST["dob"]);

$transportation = mysqli_real_escape_string($conn, $_POST["transportation"]);

$qual = mysqli_real_escape_string($conn, $_POST["qualifications"]);

$bio = mysqli_real_escape_string($conn, $_POST["bio"]);

$cvname =$_FILES["portfolio"]["name"];
$cvtemp=$_FILES["portfolio"]["tmp_name"];

$policename= $_FILES["police"]["name"];
$policetemp=$_FILES["police"]["tmp_name"];

$photoidname =$_FILES["photo_id"]["name"];
$photoidtemp=$_FILES["photo_id"]["tmp_name"];
$errorflag = 0;

if((empty($cvname))||(empty($policename))||(empty($photoidname))){
    $errorflag =1;
}
if($errorflag==1){
 echo "<p>no file</p>";
 header("Location: index.php");
 die();
}
else{
    $cvname=myRandom($cvname);
    move_uploaded_file($cvtemp, "files/$cvname");
    
    $policename=myRandom($policename);
    move_uploaded_file($policetemp, "files/$policename");
    
    $photoidname=myRandom($photoidname);
    move_uploaded_file($photoidtemp, "files/$photoidname");
    
     $query=("INSERT INTO PRO_Contractor(name,Services_provided,bio,Transportation,Qualifications,Date_of_Birth,userfk)
     VALUES('$firstname $lastname','$service','$bio','$transportation','$qual','$dob','$id');
         INSERT INTO PRO_Contractor_verification(id,photo_id,police_check,portfolio) VALUES (LAST_INSERT_ID(),'$photoidname','$policename','$cvname');
         INSERT INTO PRO_Job_alerts(Tasks_wanted,Counties_Covered,contractorfk) VALUES ('$service','$counties',LAST_INSERT_ID())");
       
        
        
        $result= mysqli_multi_query($conn, $query) or die(mysqli_errno($conn));
   
        mysqli_close($conn);
       
    
                
         echo "<script>";
echo " alert('Thank you for your application. Once a decision is made notification will be sent via email');      
        window.location.href='index.php';
</script>";
}





 
 
?>