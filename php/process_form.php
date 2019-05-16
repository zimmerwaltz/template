<?php 

//error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// entering data into db starts 

//local database details
//$host = "localhost";
//$user = "root";
//$password = "admin@123#";
//$dbname= "db_test";

//zubin.xyz database details
$host = "localhost";
$user = "ajax_admin";
$password = "admin@123#";
$dbname= "db_ajax_tester";


//opening a connection
$con = mysqli_connect($host,$user,$password,$dbname);
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
else{
//    echo 'successfully connected to database';
}

//selecting the database
mysqli_select_db($con,$dbname); 


//grabbing form data
$name = $_POST["name"];
$email = $_POST["email"];
$number = $_POST["number"];
$city = $_POST["city"];
$message = $_POST["message"];

if (!empty($name) && !empty($email) && !empty($number) && !empty($city)){
    
    addUser($name,$email,$number,$city,$message,$con);
    
    //echo "1 record added";
    echo "<p class='success-message'>Hi <strong>".$name."</strong> thanks for submitting the form!</p>";
    
}
else{
    // managing empty fields at the server level
    echo "<p class='error-message'>Please enter the required fields</p>";
}


function addUser($name,$email,$number,$city,$message,$con){
//executing the query
    $query="INSERT INTO users (name, email, number, city, message) VALUES ('$name','$email','$number','$city','$message')";

    if (!mysqli_query($con,$query)){
        die('Error: ' . mysqli_error());
    }  
    
}

//closing the connection
mysqli_close($con);


// entering data into db ends



//email functionality starts

require 'php_mailer/PHPMailerAutoload.php';


$message = '
<html>
<head>
  <title>Email service</title>
</head>
<body>
<table style="width:100%;background-color:#FFF;padding:10px;font-family:sans-serif;line-height:25px;border: 0px solid #ccc;">
  <tr style="text-align:center;background-color:#343434;">
    <td colspan="2"><img src="http://zubin.xyz/images/z_logo.svg" style="max-width:7%"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Name :</strong>'.$name.'</td>
  </tr>
  <tr>
    <td><strong>Email :</strong>'.$email.'</td>
  </tr>
   <tr>
     <td><strong>Number :</strong>'.$number.'</td>
  </tr>
   <tr>
     <td><strong>Number :</strong>'.$city.'</td>
  </tr>
  <tr>
    <td><strong>Message: </strong>'.$message.'</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr style="background-color:#efefef">
    <td colspan="2" style="text-align:center;font-weight:200"><em>This email was sent from the contact form on <a href="zubin.xyz">zubin.xyz</a></em></td>
  </tr>
</table>
</body>
</html>
';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
//$mail->Host = 'cp-48.webhostbox.net';  // Specify main and backup SMTP servers
//$mail->SMTPAuth = true;                               // Enable SMTP authentication
//$mail->Username = 'admin@aspirise.org';                 // SMTP username
//$mail->Password = 'admin@123#';                           // SMTP password
//$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
//$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('zubincharles666@gmail.com', 'Admin at zubin.xyz');
$mail->addAddress('zubin.charles@gmail.com', 'zubin.xyz');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('zubincharles666@gmail.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'New message on template at zubin.xyz';
$mail->Body    = $message;
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

//email functionality ends



?>