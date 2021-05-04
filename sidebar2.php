<?php
include 'db2.php';
session_start();
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
        <li><a class="app-menu__item active" href="user_dashboard.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="view_students.php"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">View Students</span></a>
        </li>
        <li class="treeview"><a class="app-menu__item" href="view_attendance.php"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">View Attendance</span></a>
        </li>
        <a class="app-menu__item" href="view_marks.php"><li class="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Marks</span>
        </li></a>
        <li><a class="treeview-item" href="stu_noti_view.php"><i class=" app-menu__icon fa fa-file-text"></i> Notifications</a></li>
        </li>
      </ul>
    </aside>