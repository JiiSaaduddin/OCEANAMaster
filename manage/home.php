<?php include 'includes/session.php'; ?>
<?php include 'functions.php'; ?>
<?php 
	error_reporting(0);
  include '../timezone.php'; 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
  if(isset($_GET['dept'])){
    $dept = $_GET['dept'];
  }
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition !sidebar-mini">
<div class="wrapper">

  	<?php include 'includes/navbar.php'; ?>
  	<?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
		<h1>Attendance Performance</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Dashboard</li>
		</ol>
    </section>

    <!-- Main content -->
    <section class="content"> 
	Dashboard
      </section>
      <!-- right col -->
    </div>
  	<?php include 'includes/footer.php'; ?>

</div>
<!-- ./wrapper -->
 <?php include 'includes/scripts.php'; ?>
</body>
</html>
