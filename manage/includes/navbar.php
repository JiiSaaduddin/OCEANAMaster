<header class="main-header">
    <!-- Logo -->
    <a href="home.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>OC</b>ANA</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>OCEANA</b>HRIS System</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
		
	<div class="navbar-custom-menu">
		<ul class="nav navbar-nav">

		<!--li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-download"></i> Generate</a>
            <ul class="dropdown-menu">
				<li><a href="payroll.php"><i class="fa fa-copy"></i> <span>General Payroll</span></a></li>
				<li><a href="payroll_department.php"><i class="fa fa-copy"></i> <span>Department Payroll</span></a></li>
				<li><a href="payroll_employee.php"><i class="fa fa-copy"></i> <span>Employee Payroll</span></a></li>
				<li><a href="schedule_employee.php"><i class="fa fa-clock-o"></i> <span>Schedule</span></a></li>
            </ul>
		</li-->
		
		<li class="dropdown ">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-download"></i> Payroll</a>
			<ul class="dropdown-menu">
				<li><a href="payroll.php"><i class="fa fa-copy"></i> <span>By Company</span></a></li>
				<li><a href="payroll_department.php"><i class="fa fa-copy"></i> <span>By Department</span></a></li>
				<li><a href="payroll_employee.php"><i class="fa fa-copy"></i> <span>By Employee</span></a></li>
				<li class=""><span>Schedule</span></li>
				<li><a href="schedule_employee.php"><i class="fa fa-clock-o"></i> <span>Print Schedule</span></a></li>
			</ul>
		</li>
		
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cogs"></i> Setup</a>
			<ul class="dropdown-menu">
				<li title="View additional deductions?"><a href="deduction.php"><i class="fa fa-balance-scale"></i>Deductions</a></li>
				<li title="View Employee Templates"><a href="position.php"><i class="fa fa-windows"></i> Position Templates</a></li>
				<li title="View Schedules"><a href="schedule.php"><i class="fa fa-calendar-o"></i> Schedules</a></li>
				<li><hr></li>
				<li title="View Schedules"><a href="schedule.php"><i class="fa fa-calendar-o"></i> Schedules</a></li>
				<li><hr></li>
				<li title="View SSS Table?"><a href="sss.php"><i class="fa fa-folder"></i> SSS Contribution Table</a></li>
				<li title="View Phil-Health Table?"><a href="gov-philhealth.php"><i class="fa fa-folder"></i> PHIC Contribution Table</a></li>
			</ul>
		</li>
		
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo (!empty($user['photo'])) ? '../'.$assets['img'].$user['photo'] : '../'.$assets['img'].'profile.jpg'; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $user['firstname'].' '.$user['lastname']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
				<img src="<?php echo (!empty($user['photo'])) ? '../'.$assets['img'].$user['photo'] : '../'.$assets['img'].'profile.jpg'; ?>" class="img-circle" alt="User Image">
				<p>
					<?php echo $user['firstname'].' '.$user['lastname']; ?>
					<small>Member since <?php echo date('M. Y', strtotime($user['created_on'])); ?></small>
				</p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#profile" data-toggle="modal" class="btn btn-default btn-flat" id="admin_profile">Update</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <?php include 'views/profile.php'; ?>
