<?php
include 'db2.php';
@session_start();
$RId=$_SESSION['login_admin'];
$sq=mysqli_query($con,"SELECT * FROM `role_db` WHERE role_id='$RId'")
?>
<div class="app-sidebar__overlay" data-toggle="sidebar">\</div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
      <?php 
                $count=0;
                while ($bla = mysqli_fetch_assoc($sq)) { $count++;   ?>  
        <div>
          <p class="app-sidebar__user-name"><?php echo ucwords($bla['username']); ?></p>
          <p class="app-sidebar__user-designation"><?php echo $bla['role']; ?></p>
        </div>
        <?php } ?>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="dashboard.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Students</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="add_students.php"><i class="icon fa fa-circle-o"></i> Add Students</a></li>
            <li><a class="treeview-item" href="edit_students.php"><i class="icon fa fa-circle-o"></i> Edit Students</a></li>
            <li><a class="treeview-item" href="enable_online.php"><i class="icon fa fa-circle-o"></i> Enable/Disable</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Attendance</span><i class="    treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="add_attendance.php"><i class="icon fa fa-circle-o"></i> Add Attendance</a></li>
            <li><a class="treeview-item" href="view_attendance.php"><i class="icon fa fa-circle-o"></i> View attendance</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Marks</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
          <li><a class="treeview-item" href="add_subj.php"><i class="icon fa fa-circle-o"></i>Add Subject</a></li>
            <li><a class="treeview-item" href="add_marks.php"><i class="icon fa fa-circle-o"></i> Add Marks</a></li>
            <li><a class="treeview-item" href="view_marks.php"><i class="icon fa fa-circle-o"></i>View Marks</a></li>
          </ul>
        </li>
        <li><a class="treeview-item" href="add_noti.php"><i class=" app-menu__icon fa fa-file-text"></i> Add Notification</a></li>
        </li>
      </ul>
    </aside>