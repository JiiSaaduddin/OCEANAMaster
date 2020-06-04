<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>SSS Contribution Table</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Employees</li>
        <li class="active">SSS</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content"> 
      <div class="row">
        <div class="col-xs-12">
          <div class="box"> 
            <div class="box-body">
              <table class="table table-bordered">
				<thead>  
					<tr> 
						<th>Range of Compensation</th>
						<th>ER</th>
						<th>EE</th>
						<th>EC</th> 
						<th>Total</th> 
					</tr>
				</thead>
				<tbody>
                  <?php
                    $sql = "select * from sss1 ";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      echo "
                        <tr>  
						<td>".$row['roc_from']." - ".$row['roc_to']."</td> 
						<td>".$row['ss_er']."</td> 
						<td>".$row['ss_ee']."</td>  
						<td>".$row['ec_er']."</td>  
						<td>".$row['total_contrib']."</td>  
                        </tr>
                      ";
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div> 
</div>
<?php include 'includes/scripts.php'; ?>
 
</body>
</html>
