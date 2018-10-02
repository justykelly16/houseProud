<?php

session_start();
if((!isset($_SESSION["id_40214842"])||(empty($_POST))))
{
        header("Location: index.php");
    }

include("connect.php");
 $id=$_SESSION['id_40214842'];
$firstname = mysqli_real_escape_string($conn, $_POST["first-name"]);

$lastname = mysqli_real_escape_string($conn, $_POST["last-name"]);



$street = mysqli_real_escape_string($conn, $_POST["street"]);

$town = mysqli_real_escape_string($conn, $_POST["town"]);



$county = mysqli_real_escape_string($conn, $_POST["county"]);



$postcode = mysqli_real_escape_string($conn, $_POST["postcode"]);

$phonenumber = mysqli_real_escape_string($conn, $_POST["phone-number"]);
$filename=("profile.png");

 $query="INSERT INTO PRO_User (id,firstname,lastname,Street,Town,City,County,Country,Postcode,phone_number,contractor,profile_picture) VALUES('$id','$firstname','$lastname',
     '$street','$town','$county','$postcode','$phonenumber','No',$filename) ";
        $result= mysqli_query($conn, $query)or die(mysqli_error($conn));
        
        $check = "SELECT * FROM PRO_User WHERE id = '$id'";
        $result1= mysqli_query($conn, $check) or die(mysqli_errno($conn));
   
        mysqli_close($conn);
       
    if(mysqli_num_rows($result1)>0){
        while($row= mysqli_fetch_assoc($result1)){
                $id=$row['id'];
                $firstname=$row['firstname'];
                $lastname=$row['lastname'];
               
                $street=$row['Street'];
                $town=$row['Town'];
                $city=$row['City'];
                $county=$row['County'];
                $country=$row['Country'];
                $postcode=$row['Postcode'];
                $phonenumber=$row['phone_number'];
                $pic=$row['profile_picture'];
                
                $_SESSION["user_40214842"]=$email;
                $_SESSION["id_40214842"]=$id;
                $_SESSION["firstname_40214842"]=$firstname;
                $_SESSION["lastname_40214842"]=$lastname;
               
                $_SESSION["street_40214842"]=$street;
                $_SESSION["town_40214842"]=$town;
                $_SESSION["city_40214842"]=$city;
                $_SESSION["country_40214842"]=$country;
                $_SESSION["county_40214842"]=$county;
                $_SESSION["postcode_40214842"]=$postcode;
                $_SESSION["phone_number_40214842"]=$phonenumber;
                $_SESSION["pic_40214842"]=$pic;
                
        
    header("Location: myjobs.php");
        }
}else{
    header("Location: index.php");
}
?>