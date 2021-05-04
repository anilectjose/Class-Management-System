<?php 
include 'db2.php';

if(isset($_POST['submit']))
{
	@$name = $_POST['name'];
	@$yr = $_POST['stuyear'];
  if($yr==1 || $yr==2){
    $year=1;
  }
  elseif($yr==3 || $yr==4){
    $year=2;
  }
  else{
    $year=3;
  }

		mysqli_query($con, "INSERT INTO `subject_db`(`subject`, `sem`,`year`) VALUES ('$name','$yr','$year')");

  header("location:add_subj.php");

}
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Add New Subject</title>
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
          <h1><i class="fa fa-dashboard"></i> Add New Subject</h1>
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
            <h3 class="tile-title">Add Subject</h3>
            <div class="tile-body">
              <form class="form-horizontal" method="POST" enctype="">
                <div class="form-group row">
                  <label class="control-label col-md-3">Subject Name</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" placeholder="Enter subject name" name="name" required>
                  </div>
                </div>
                <div class="form-group row">
                <label class="control-label col-md-3">Choose Year</label>
                  <div class="col-md-9">
                    <select class="form-control" id="exampleSelect1" name="stuyear" style="width:280px;" required>
                  <option selected disabled>Choose Year</option>
                  <option value="1">1st Sem</option>
                  <option value="2">2nd Sem</option>
                  <option value="3">3rd Sem</option>
                  <option value="4">4st Sem</option>
                  <option value="5">5nd Sem</option>
                  <option value="6">6rd Sem</option>
                    </select>
                    </label>
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
      <div>
                <a class="btn btn-info" href="subject_view.php"><!-- <i class="fa fa-fw fa-lg fa-check-circle"></i> -->View Subjects</a>
              </div>
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