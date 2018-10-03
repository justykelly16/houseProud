<?php
session_start();
if((!isset($_SESSION["id_40214842"])||(empty($_POST))))
{
    header("Location: index.php");
}
include("connect.php");

$postjobname= mysqli_real_escape_string($conn,$_POST["job-name"]);
$postjobcategory=mysqli_real_escape_string($conn,$_POST["job-category"]);

$poststreet=mysqli_real_escape_string($conn,$_POST["street"]);
$posttown=mysqli_real_escape_string($conn,$_POST["town"]);
$postcode=mysqli_real_escape_string($conn,$_POST["postcode"]);

$postcounty=mysqli_real_escape_string($conn,$_POST["county"]);

$postbudget=mysqli_real_escape_string($conn,$_POST["budget"]);
$postjobdescription=mysqli_real_escape_string($conn,$_POST["contact-message"]);
$postdate= mysqli_real_escape_string($conn, $_POST['htlfndr-date-in']);
$id=$_SESSION["id_40214842"];
$firstname=$_SESSION['firstname_40214842'];
$lastname=$_SESSION['lastname_40214842'];
$jobid=mysqli_real_escape_string($conn,$_GET['jobid']);

$query = "UPDATE PRO_Post_Task SET job_title = '$postjobname', job_category = '$postjobcategory',
    Description = '$postjobdescription', 
    street = '$poststreet', town = '$posttown', county = '$postcounty',
    postcode = '$postcode', Budget = '$postbudget',
        Due_date = '$postdate' WHERE PRO_Post_Task.taskid = '$jobid'";

$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
mysqli_close($conn);

     echo "<script>";
echo " alert('Job has been changed, thank you.');      
        window.location.href='myjobs.php';
</script>";
 

?>
