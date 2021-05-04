<?php
  include "db2.php";

require 'PHPMailer/PHPMailerAutoload.php';

session_start();
    
if(isset($_POST["reset"]))
    {
      

      $email=$_POST['email'];
      //echo $email; exit();

       $reset_query=mysqli_query($con,"SELECT * FROM admin_db WHERE emailid='$email'");

      $count=mysqli_num_rows($reset_query);
      if($count>0)
      {
        $user_data = mysqli_fetch_assoc($reset_query);
      
$mail = new PHPMailer;
 
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = '<emailid>';                   // SMTP username
$mail->Password = '<password>';               // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted
$mail->Port = 465;       
/*$mail->SMTPDebug = 2;*/                             //Set the SMTP port number - 587 for authenticated TLS
$mail->setFrom('<mailid>','<project name>');     //Set who the message is to be sent from

$mail->addAddress($email); ; 
           
//$mail->addCC('example@xyz.com', 'name');
//$mail->addBCC('example@xyz.com', 'name');
$mail->WordWrap = 50;                                  
        
$mail->isHTML(true);                                   
 
$mail->Subject = "Password Recovery";
$mail->Body    = "<html>
<head>
<meta charset='utf-8'>
<title>Password Recovery</title>
</head>

<body>

<table width='200' border='1'>
  <tr>
    <th scope='row'>Mail From</th>
    <td>Department management system</td>
  </tr>
  <tr>
    <th scope='row'>Username</th>
    <td>".$user_data['username']."</td>
  </tr>
  <tr>
    <th scope='row'>Password</th>
    <td>".$user_data['password']."</td>
  </tr>
</table>
We request you to change your password after login.
</body>
</html>
";
  $mail->AltBody = 'msg';
 
  //Read an HTML message body from an external file, convert referenced images to embedded,
  //convert HTML into a basic plain-text alternative body
  //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
 
  if(!$mail->send()) 
  {
     echo 'Message could not be sent.';
     echo 'Mailer Error: ' . $mail->ErrorInfo;
     exit();
  }
  else
  {
    echo "<script>alert('Message has been sent');</script>";
  }  
      }
      else
      {
        echo "<SCRIPT>alert(' email id invalid .Enter  email id given in your profile.');</SCRIPT>";
       echo "<SCRIPT>window.location='forgot_password.php';</SCRIPT>";
      }

}
?>

<!DOCTYPE html>
<html>
<head>
<title>Forgot Password</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
    <script type="text/javascript">
    function validate()
    {

    var email=document.getElementById("email").value.trim();
    
    if(email=="") {
            document.getElementById('sp1').innerHTML="*Please enter your Email*";
            return false;
         }

    function ValidateEmail(inputText)
      {
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if(!(inputText.value.match(mailformat)))
        {
          document.getElementById('sp1').innerHTML = "*Please Enter valid email address*";
              return false; }
        else
        {
        
          clearmsg('sp1');
        }
      }

    }

    function clearmsg(span) {
            document.getElementById(span).innerHTML="";
            return true;
         }

      </script>
<body id="top">

<div class="wrapper row0">
  <div id="topbar" class="clear"> 

    <nav>

    </nav>

  </div>
</div>

<div class="wrapper row1">
  <header id="header" class="clear"> 

    <div id="logo" class="fl_left">
   <center>   <h1><a href="#">Department</a></h1></center>
      <p></p>    </div>
  </header>
</div>

<div class="wrapper row2">
  <div class="rounded">
    <nav id="mainav" class="clear"> 

      
    </nav>
  </div>
</div>
    

<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <!-- main body --> 

     
      
      <div id="comments">

        <h1><center><i class="fa fa-lg fa-fw fa-lock"></i>&nbsp;Forgot Password</center></h1>
        <center>
        <form action="#" method="post">
          <div class="block clear">
            <label for="name">Email <span>*</span></label>
            <input type="email" name="email" id="email" size="22" onkeypress="clearmsg('sp1')">
            <center><span id="sp1" style="color: #F00"></span></center>
          </div>
          <div><center>
            <input name="reset" type="submit" value="Submit" onclick="return validate()">
            &nbsp;
            <input name="reset" type="reset" value="Cancel">
          </center>
          <style type="text/css">
            .text1 {
              position: relative;
              right: 230px;
            }
          </style>
          <p><a class="text1" href="index.php" align="right">Back to Login.</a></p>
          </div>
        </form>
        </center>
      </div>

      <!-- / main body -->
      <div class="clear"></div>
    </main>
  </div>
</div>

<!-- JAVASCRIPTS --> 
<script src="layout/scripts/jquery.min.js"></script> 
<script src="layout/scripts/jquery.fitvids.min.js"></script> 
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>