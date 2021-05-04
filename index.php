<?php
include 'db2.php';
session_start();
if (isset($_POST["submit"]))
{
  $usrname = mysqli_real_escape_string($con,$_POST['usrnm']);
  $epassword = mysqli_real_escape_string($con,$_POST['pswd']);

  $sql=mysqli_query($con,"SELECT * FROM role_db WHERE username='$usrname' AND password='$epassword' and sts=1");
  while ($row = mysqli_fetch_assoc($sql)) {

  if($row['role']=='admin')
  {
    $_SESSION['login_admin']=$row['role_id'];
    header("location: dashboard.php");
  }
  elseif($row['role']=='student')
  {
    $_SESSION['login_admin']=$row['role_id'];
    header("location: user_dashboard.php");
  }
  else
  {
    echo "<script>alert('Username and password are incorrect')</script>";
    echo "<script>window.location='index.php'</script>";
  }
}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login - AJA Admin</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>DMS</h1> 
      </div>
      <div class="login-box">
        <form class="login-form" method="POST" enctype="multipart/form-data">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" type="text" name="usrnm" placeholder="Name" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" name="pswd" id="pd" placeholder="Password">
          </div>
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                <label>
                  <input type="checkbox" onclick="fun()"><span class="label-text">Show Password</span>
                </label>
              </div>
              <a href="forgot_password.php">Forgot Password ?</a>
            </div>
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" name="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
        </form>
       <!--  <form class="forget-form" method="POST">
          <h3 class="login-head"><a class="treeview-item" href="addnoti.php"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" type="text" name="usrnm" placeholder="Name" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input class="form-control" type="text" placeholder="Email" name="email">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" name="reset"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
          </div>
        </form> -->
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
         //shw password function
           function fun()
           {
             var x=document.getElementById("pd");
             if(x.type==="password")
              {
               x.type="text";
              }
             else
              {
               x.type="password";
              }
           }
    </script>
  </body>
</html>