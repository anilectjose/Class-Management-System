<?php 

include 'db2.php';

if(isset($_POST['name']))
{
	@$name = $_POST['name'];
	@$email = $_POST['email'];
	@$gende = $_POST['gender'];
	@$mobile = $_POST['phone'];
	@$adress = $_POST['address'];
	@$yr = $_POST['stuyear'];
	@$password = $_POST['pswd'];
	@$username = $_POST['uname'];

  $fileName=$_FILES["file"]["name"];
  $targetDir="images/";
  $targetFilePath = $targetDir . $fileName; 
  move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);

		mysqli_query($con, "INSERT INTO `role_db`(`username`, `password`, `role`,`sts`) VALUES ('$username','$password','student',1)");
	     $roleid =mysqli_insert_id($con);

	     mysqli_query($con, "INSERT INTO `student_db`(`name`, `phone`, `email`, `gender`, `address`, `year`, `status`, `image`, `role_id`) VALUES
        ('$name','$mobile','$email','$gende','$adress','$yr',1,'$fileName','$roleid')");

      mysqli_query($con, "INSERT INTO `attendance_db`(`stud_id`, `month1`, `month2`, `month3`, `month4`, `month5`, `total`) 
      VALUES ('$roleid',100,100,100,100,100,100)");

  header("location:add_students.php");

}
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Add Students</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <?php
include 'header.php';
?>
   <?php
   include 'sidebar.php';
   ?>
    <!-- Sidebar menu-->
   
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Add Students</h1>
          <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
        </ul>
      </div>
</div>
<div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Register</h3>
            <div class="tile-body">
              <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                  <label class="control-label col-md-3">Name</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" placeholder="Enter full name" name="name">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Phone</label>
                  <div class="col-md-8">
                    <input class="form-control" type="number" placeholder="Enter number" name="phone">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Email</label>
                  <div class="col-md-8">
                    <input class="form-control col-md-8" type="email" placeholder="Enter email address" name="email">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Address</label>
                  <div class="col-md-8">
                    <textarea class="form-control" rows="4" placeholder="Enter your address" name="address"></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Gender</label>
                  <div class="col-md-9">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" value="male" name="gender">Male
                      </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" value="female" name="gender">Female
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                <label class="control-label col-md-3">Choose Year</label>
                  <div class="col-md-9">
                    <select class="form-control" id="exampleSelect1" name="stuyear">
                  <option selected disabled>Choose Year</option>
                  <option value="1">1st Year</option>
                  <option value="2">2nd Year</option>
                  <option value="3">3rd Year</option>
   
                    </select>
                    </label>
                    </div>
                  </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Photo</label>
                  <div class="col-md-8">
                    <input class="form-control" type="file" name="file">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Username</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" placeholder="Enter username" name="uname">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Password</label>
                  <div class="col-md-8">
                    <input class="form-control" type="password" placeholder="Enter a password" name="pswd">
                  </div>
                </div>
            </div>
            <div class="tile-footer">
              <div class="row">
                <div class="col-md-8 col-md-offset-3">
                  <input type="submit" class="btn btn-primary" name="submit">&nbsp;&nbsp;&nbsp;<input class="btn btn-secondary" type="reset" value="Reset">
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="js/plugins/chart.js"></script>
    <script type="text/javascript">
      var data = {
      	labels: ["January", "February", "March", "April", "May"],
      	datasets: [
      		{
      			label: "My First dataset",
      			fillColor: "rgba(220,220,220,0.2)",
      			strokeColor: "rgba(220,220,220,1)",
      			pointColor: "rgba(220,220,220,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(220,220,220,1)",
      			data: [65, 59, 80, 81, 56]
      		},
      		{
      			label: "My Second dataset",
      			fillColor: "rgba(151,187,205,0.2)",
      			strokeColor: "rgba(151,187,205,1)",
      			pointColor: "rgba(151,187,205,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(151,187,205,1)",
      			data: [28, 48, 40, 19, 86]
      		}
      	]
      };
      var pdata = [
      	{
      		value: 300,
      		color: "#46BFBD",
      		highlight: "#5AD3D1",
      		label: "Complete"
      	},
      	{
      		value: 50,
      		color:"#F7464A",
      		highlight: "#FF5A5E",
      		label: "In-Progress"
      	}
      ]
      
      var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      var lineChart = new Chart(ctxl).Line(data);
      
      var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      var pieChart = new Chart(ctxp).Pie(pdata);
    </script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
  </body>
</html>