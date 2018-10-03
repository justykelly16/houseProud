
  <?php 
include('connect.php');
if(isset($_POST)&!empty($_POST)){
    $username = mysqli_real_escape_string($conn, $_POST['user_email']);
    $query="SELECT * FROM PRO_Login WHERE email = '$username'";
    
    $result=mysqli_query($conn,$query);
    
    $rows= mysqli_fetch_assoc($result);
    $count= mysqli_num_rows($result);
    
    
    if($count==1){
        $pass = str_shuffle(bin2hex(openssl_random_pseudo_bytes(4)));
        $update="UPDATE PRO_Login SET password= MD5('$pass') WHERE email ='$username'";
        $result = mysqli_query($conn, $update) or die(mysqli_error($conn));
        
        require('phpmailer/class.phpmailer.php');

$mail= new PHPMailer();
$mail->From='admin@houseproud.com';
$mail->FromName = "HouseProud";
$mail->addAddress($rows['email']);
$mail->IsHtml(true);
$mail->Subject = 'Account details';
$mail->Body = "Password has been reset, username is '$username' and new  password is '$pass' ";

echo"     <script>
    alert('An email with your new account details has been sent to ".$rows['email'];echo"');
        window.location.href='index.php'
    </script>";

if(!$mail->send()){
    echo" 
    <script>
    alert(Message could not send)</script>";
  
    
    
    
    echo"Mailer Error: ".$mail->ErrorInfo;
    exit;
        
    }
    }else{
            echo" 
    <script>
    alert(Message could not send)</script>";
    }

}else{
     header("Location: index.php");
}