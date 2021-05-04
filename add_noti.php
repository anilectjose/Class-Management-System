<?php 

include 'db2.php';
 if(isset($_POST['notifica']))
 {

    $noti=$_POST['notific'];
    $etime=date("j/m/Y h:i A");

    mysqli_query($con,"INSERT INTO `notification_db`(`content`,`time`) VALUES ('$noti','$etime')");

        echo "<script>alert('Added');</script>";
        echo "<script>window.history.back();</script>";
 }


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Add Notification</title>
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
          <h1><i class="fa fa-dashboard"></i> Add Notification</h1>
          <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
        </ul>
      </div>
      <div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Notification</h3>
            <div class="tile-body">
              <form class="row" avtion="#" method="POST">
                <div class="form-group col-md-3">
                  <label class="control-label">Content</label>
                  <input class="form-control" type="text" placeholder="Enter anything to notify" id="notif" name="notific" onkeyup="clearmsg('sp1')"><span id="sp1" style="color:#F00"></span>
              <span id="sp6" style="color:#F00"></span>
                 </div>
                <div class="form-group col-md-4 align-self-end">
                  <button class="btn btn-primary" name="notifica" name="submit" onclick="return valid()"><i class="fa fa-fw fa-lg fa-check-circle"></i>Notify</button>
                </div>
              </form>
            </div>
        </div> <div>
                <a class="btn btn-primary" href="noti_view.php"><!-- <i class="fa fa-fw fa-lg fa-check-circle"></i> -->View Coming notification</a>
              </div>
          </div>
      </div>
    </main>
    <script type="text/javascript">
      function valid()
            {
              var name = document.getElementById('notif').value.trim();
              var qualification = document.getElementsByName('check[]');

               if (name=="") 
                {
                  document.getElementById('sp1').innerHTML = "Please Add Notification"; 
                  return false;
                }
            
      function clearmsg(span)
              {
                document.getElementById(span).innerHTML="";
                return true;
              }
            }
    </script>
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