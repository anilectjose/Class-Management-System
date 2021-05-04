<?php
include 'db2.php';
$su_id=$_GET['s_id'];
$res=mysqli_query($con,"SELECT * FROM `student_db` where student_id='$su_id'");
$quer=mysqli_query($con,"SELECT * FROM `attendance_db` where stud_id='$su_id'");
if (isset($_POST["submit"]))
{
  @$at1 = $_POST['att1'];
  @$at2 = $_POST['att2'];
  @$at3 = $_POST['att3'];
  @$at4 = $_POST['att4'];
  @$at5 = $_POST['att5'];
  @$tot = ($at1+$at2+$at3+$at4+$at5)/5;

  $sql=mysqli_query($con,"UPDATE `attendance_db` SET `month1`='$at1', `month2`='$at2', `month3`='$at3', `month4`='$at4', 
  `month5`='$at5',`total`='$tot' where `stud_id`='$su_id'");
  header("location:view_attendance.php");
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Edit Attendance</title>
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
          <h1><i class="fa fa-dashboard"></i> Edit Attendance</h1>
          <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
        </ul>
      </div>
      <div class="col-md-6">
          <div class="tile">
          <?php 
                $count=0;
                while ($row = mysqli_fetch_assoc($res)) { $count++;   ?>
            <h3 class="tile-title"><?php echo $row["name"]; ?></h3>
            <?php } ?><form method="post">
            <div class="tile-body">
            <?php 
                $count=0;
                while ($raw = mysqli_fetch_assoc($quer)) { $count++;   ?>
               <table class="table">
              <thead>
                <tbody>
                    <tr>
                  <th>Sl No.</th>  
                  <th>Month</th>
                  <th>Attendance</th>
                </tr>
              </thead>
              <tbody>
              <?php if(date("m")<=10 && date("m")>5){ ?>
                <tr>
                <td>1</td> 
                  <td>June</td>             
                  <td> <div class="col-md-6">
                    <input class="form-control" type="number" required placeholder="Enter percentage" name="att1" value="<?php echo $raw['month1']; ?>">
                  </div></td>
                </tr>
                <tr>
                <td>2</td> 
                  <td>July</td>             
                  <td> <div class="col-md-6">
                    <input class="form-control" type="number" required placeholder="Enter percentage" name="att2" value="<?php echo $raw['month2']; ?>">
                  </div></td>
                </tr>
                <tr>
                <td>3</td> 
                  <td>August</td>             
                  <td> <div class="col-md-6">
                    <input class="form-control" type="number" required placeholder="Enter percentage" name="att3" value="<?php echo $raw['month3']; ?>">
                  </div></td>
                </tr>
                <tr>
                <td>4</td> 
                  <td>September</td>             
                  <td> <div class="col-md-6">
                    <input class="form-control" type="number" required placeholder="Enter percentage" name="att4" value="<?php echo $raw['month4']; ?>">
                  </div></td>
                </tr>
                <tr>
                <td>5</td> 
                  <td>October</td>             
                  <td> <div class="col-md-6">
                    <input class="form-control" type="number" required placeholder="Enter percentage" name="att5" value="<?php echo $raw['month5']; ?>">
                  </div></td>
                </tr>
                <?php }else{ ?>
                    <tr>
                <td>1</td> 
                  <td>November</td>             
                  <td> <div class="col-md-6">
                    <input class="form-control" type="number" required placeholder="Enter percentage" name="att1" value="<?php echo $raw['month1']; ?>">
                  </div></td>
                </tr>
                <tr>
                <td>2</td> 
                  <td>December</td>             
                  <td> <div class="col-md-6">
                    <input class="form-control" type="number" required placeholder="Enter percentage" name="att2" value="<?php echo $raw['month2']; ?>">
                  </div></td>
                </tr>
                <tr>
                <td>3</td> 
                  <td>January</td>             
                  <td> <div class="col-md-6">
                    <input class="form-control" type="number" required placeholder="Enter percentage" name="att3" value="<?php echo $raw['month3']; ?>">
                  </div></td>
                </tr>
                <tr>
                <td>4</td> 
                  <td>February</td>             
                  <td> <div class="col-md-6">
                    <input class="form-control" type="number" required placeholder="Enter percentage" name="att4" value="<?php echo $raw['month4']; ?>">
                  </div></td>
                </tr>
                <tr>
                <td>5</td> 
                  <td>March</td>             
                  <td> <div class="col-md-6">
                    <input class="form-control" type="number" required placeholder="Enter percentage" name="att5" value="<?php echo $raw['month5']; ?>">
                  </div></td>
                </tr>
                <?php } ?>
               </tbody>
              </tbody>
            </table>
            
            <div class="col-md-8 col-md-offset-3">
                  <input type="submit" class="btn btn-primary" name="submit">&nbsp;&nbsp;&nbsp;
                    <input class="btn btn-secondary" type="reset" value="Reset">
                </div>
      <?php } ?></form>
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