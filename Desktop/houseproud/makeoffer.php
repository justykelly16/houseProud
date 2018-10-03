<?php
session_start();
if((!isset($_SESSION["id_40214842"]))||(empty($_POST['offer'])))
{
    header("Location: index.php");
}
     if((!isset($_SESSION["contractorid_40214842"]))||(empty($_POST['offer'])))
{
        header("Location: index.php");
    }

include("connect.php");
$id=$_SESSION['id_40214842'];
$offer=mysqli_real_escape_string($conn,$_POST['offer']);
 $job=mysqli_real_escape_string($conn,$_POST['job']);
 $contractor=mysqli_real_escape_string($conn,$_POST['contractor']);
 
 $sql="SELECT * FROM PRO_Make_Offer WHERE contractorfk = '$contractor' AND jobfk='$job'";
  $check = mysqli_query($conn, $sql);

if(mysqli_num_rows($check)==0){
    
      $select_data="INSERT INTO PRO_Make_Offer (quote,quote_accepted,contractorfk,jobfk) VALUES
     ('$offer','Pending','$contractor','$job')";
         

 $query= mysqli_query($conn, $select_data)or die(mysqli_error($conn));

         
 mysqli_close($conn);
 
 echo "OK";

  
  

           
        
      
 }else if(mysqli_num_rows($check)==1){
     $update="UPDATE PRO_Make_Offer SET quote='$offer', quote_accepted='Pending' WHERE 
         contractorfk='$contractor' AND jobfk='$job'";
     
      $query= mysqli_query($conn, $update)or die(mysqli_error($conn));

         
 mysqli_close($conn);
 
 echo "OK";

 }
 else
 {
 echo "fail";
 }
 exit();

?>



