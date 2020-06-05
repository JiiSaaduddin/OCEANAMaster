<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
		<div class="pull-left image">
			<img src="<?php echo (!empty($user['photo'])) ? '../'.$assets['img'].$user['photo'] : '../'.$assets['img'].'profile.jpg'; ?>" class="img-circle" alt="User Image">
		</div>
		<div class="pull-left info">
			<p><?php echo $user['firstname'].' '.$user['lastname']; ?></p>
			<a><i class="fa fa-circle text-success"></i> Online</a>
		</div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">STATS</li>
        <li class=""><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class=""><a href="attendance_device.php"><i class="fa fa-clock-o"></i> <span>Face Device</span></a></li>
        <li class="header">MASTER</li>
        <li class="treeview">
          <a href="#"><i class="fa fa-check"></i><span>Attendance</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
          <ul class="treeview-menu">
            <li><a href="attendance_.php"><i class="fa fa-circle-o"></i> By Percentage</a></li>
            <li><a href="attendance.php"><i class="fa fa-circle-o"></i> By Hours</a></li>
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Employees</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="employee.php"><i class="fa fa-circle-o"></i> Employee Master</a></li>
            <li><a href="overtime.php"><i class="fa fa-circle-o"></i> Overtime</a></li>
            <li><a href="adjustallowance.php"><i class="fa fa-circle-o"></i> Adjustment Allowance</a></li>
          </ul>
        </li>
		<li class="header">CONFIGURATION</li> 
		            <li><a href="company.php"><i class="fa fa-circle-o"></i> Company</a></li>
		            <li><a href="department.php"><i class="fa fa-circle-o"></i> Department</a></li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
