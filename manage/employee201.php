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
		<h1>Employee Profile</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Employee</a></li>
			<li class="active">Profile</li>
		</ol>
    </section>

    <!-- Main content -->
    <section class="content">

	<div class="row">
	<?php $empid = $_REQUEST['empid'];
		$sql = "SELECT * FROM employees LEFT JOIN position ON position.id = employees.position_id
		WHERE employees.id ='$empid'";
		$query = $conn->query($sql);
		while($row = $query->fetch_assoc())
		{
		?> 
		<div class="col-md-3">

			<div class="box box-primary">
				<div class="box-body box-profile">
				<img class="!profile-user-img img-responsive !img-circle" src="<?php echo (!empty($row['photo'])) ? '../'.$assets['img'].$row['photo'] : '../'.$assets['img'].'profile.jpg'; ?>">
					<h3 class="profile-username text-center"><?php echo $row['firstname'].' '.$row['lastname']; ?></h3>
					<p class="text-muted text-center"><?php echo $row['description']?></p>
					<ul class="list-group list-group-unbordered">
						<li class="list-group-item"><b>Birthday</b> <a class="pull-right"><?php echo $row['birthdate'];?></a></li> 
						<li class="list-group-item"><b>Date Hired</b> <a class="pull-right"><?php echo $row['date_hired'];?></a></li> 
						<li class="list-group-item"><b>Date Resigned</b> <a class="pull-right"><?php echo $row['date_hired'];?></a></li> 
						<li class="list-group-item"><b>Date Member</b> <a class="pull-right"><?php echo $row['created_on'];?></a></li> 
					</ul>
					<a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
				</div>
			</div> 

			<!-- About Me Box -->
			<div class="box box-primary">
				<div class="box-header with-border"><h3 class="box-title">About Me</h3> </div> 
				<div class="box-body">
					<strong><i class="fa fa-book margin-r-5"></i> Education </strong>
					<?php $sql = "SELECT * FROM employees201_education
						WHERE rel_id ='$empid'";
						$query = $conn->query($sql);
						while($educ = $query->fetch_assoc())
						{
						?>
						<p class="text-muted"><b><?php echo $educ['educ_type'].":</b><br>".strtoupper($educ['educ_name']);?></p>
						<?php 
						} 
						?>
					<hr>
					<strong><i class="fa fa-map-marker margin-r-5"></i> Location </strong>
						<p class="text-muted"><?php echo strtoupper($row['city'].", ".$row['region'].", ".$row['country']);?></p>
					<hr> 
					<strong><i class="fa fa-file-text-o margin-r-5"></i> Awards </strong>
						<?php $sql = "SELECT * FROM employees201_awards
						WHERE rel_id ='$empid'";
						$query = $conn->query($sql);
						while($awards = $query->fetch_assoc())
						{
						?>
						<p class="text-muted"><?php echo $awards['award'];?></p>
						<?php 
						} 
						?>
				</div> 
			</div> 
		</div>
	 
		<div class="col-md-9">
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs text-center">
					<li class="active"><a href="#activity" data-toggle="tab"><i class="fa fa-bullhorn fa-2x"></i><br>Activity</a></li>
					<li><a href="#workhistory" data-toggle="tab"><i class="fa fa-bookmark-o fa-2x"></i><br>Work Experience</a></li>
					<li><a href="#internalrelation" data-toggle="tab"><i class="fa fa-exclamation-triangle fa-2x"></i><br>IR/NTE</a></li>
					<li><a href="#dependents" data-toggle="tab"><i class="fa fa-sitemap fa-2x"></i><br>Dependents</a></li>
					<li><a href="#trainings" data-toggle="tab"><i class="fa fa-certificate fa-2x"></i><br>Trainings</a></li>
					<li><a href="#medical" data-toggle="tab"><i class="fa fa-user-md fa-2x"></i><br>Medical</a></li>
				</ul>
				<div class="tab-content">
					<div class="active tab-pane" id="activity">
						<h3>Activity</h3><hr>
						<?php $sql = "SELECT * FROM announcement";
						$query = $conn->query($sql);
						while($bullhorn = $query->fetch_assoc())
						{
						?> 
						<div class="post">
							<div class="user-block">
								<img class="img-circle img-bordered-sm" src="../assets/dist/img/user1-128x128.jpg" alt="user image">
								<span class="username">
									<a href="#"><?php echo $bullhorn['title'];?></a>
								</span>
								<span class="description"><?php echo $bullhorn['posted_by'];?> - <?php echo $bullhorn['date_created'];?></span>
							</div> 
							<p><?php echo $bullhorn['content'];?></p>  
						</div> 
						<?php
						}
						?>
					</div> 
					<div class="tab-pane" id="workhistory">  
						<h3>Work Experience</h3><hr>
						<ul class="timeline timeline-inverse"> 
						<?php $sql = "SELECT * FROM employees201_history
							WHERE rel_id ='$empid'";
							$query = $conn->query($sql);
							while($workhistory = $query->fetch_assoc())
							{
								$date = new DateTime($workhistory['date_to']);
								$workhistorydatefrom = $date->format('F d, Y');
							?> 
							<li class="time-label"><span class="bg-red"><?php echo $workhistorydatefrom;?></span></li> 
							<li><i class="fa fa-envelope bg-blue"></i>
								<div class="timeline-item">
									<span class="time"><?php echo "Salary: P".(number_format($workhistory['salary'],2));?></span>
									<h3 class="timeline-header"><a href="#"><?php echo $workhistory['position']." - ".$workhistory['company'];?></a></h3>
									<div class="timeline-body">
										No description.
									</div> 
								</div>
							</li> 
							<?php 
							} 
							?>
						</ul>
					</div> 
					<div class="tab-pane" id="internalrelation">
						<h3>Internal Relation / NTE</h3>
						<div class="box"> 
							<div class="box-body table-responsive no-padding">
								<table class="table table-hover">
									<tr>
										<th>Case&nbsp;#</th>
										<th>Employee</th>
										<th>Department</th>
										<th>Received</th>
										<th>Reported&nbsp;By</th>
										<th>Nature</th>
										<th>Gravity</th>
										<th>Hierarchy</th>
										<th>Served</th>
										<th>Prepared&nbsp;BY</th>
										<th>Returned</th>
									</tr>
									<?php $sql = "SELECT * FROM employees201_industrial_relation
									WHERE rel_id ='$empid'";
									$query = $conn->query($sql);
									while($irnte = $query->fetch_assoc())
									{
									?> 
									<tr>
										<td><?php echo $irnte['case_no'];?></td>
										<td><?php echo $irnte['employee_name'];?></td>
										<td><?php echo $irnte['department'];?></td>
										<td><?php echo $irnte['ir_received'];?></td>
										<td><?php echo $irnte['reported_by'];?></td>
										<td><span class="label label-danger"><?php echo $irnte['nature_offense'];?></span></td>
										<td><span class="label label-warning"><?php echo $irnte['gravity_offense'];?></span></td>
										<td><?php echo $irnte['hierarchy_sansctions'];?></td>
										<td><?php echo $irnte['date_served'];?></td>
										<td><?php echo $irnte['prepared_by'];?></td>
										<td><?php echo $irnte['date_returned'];?></td>
									</tr>
									<?php 
									} 
									?>
								</table>
							</div> 
						</div>
					</div>
					<div class="tab-pane" id="dependents">
						<h3>Dependents</h3><hr>
						<link rel="stylesheet" href="../assets/dist/css/tree.css">
						<div id="container"> 
							<ol class="tree text-center">
								<lix><a href="#"><img class="img-circle img-responsive" src="<?php echo (!empty($row['photo'])) ? '../'.$assets['img'].$row['photo'] : '../'.$assets['img'].'profile.jpg'; ?>"><?php echo ($row['gender']=="Male"?"Father (You)":"Mother (You)")?></a>
								<ol>
								<?php $sql = "SELECT * FROM employees201_dependents
								WHERE rel_id ='$empid'";
								$query = $conn->query($sql);
								while($tree = $query->fetch_assoc())
								{
								?> 
								<lix><a href="#"><img class="img-circle" src="<?php echo (!empty($tree['attachment'])) ? '../'.$assets['img'].$tree['attachment'] : '../'.$assets['img'].'profile.jpg'; ?>"><?php echo $tree['relationship']."<br><b>".$tree['dependent_name'];?></b><br><span><?php echo $tree['dependent_dob'];?></span></a></lix> 
								<?php
								}
								?>
								</ol>
							</ol> 
						</div>
					</div>
					<div class="tab-pane" id="trainings">
						<h3>Trainings</h3><hr>
						<?php $sql = "SELECT * FROM employees201_training
							WHERE rel_id ='$empid'";
							$query = $conn->query($sql);
							while($trainings = $query->fetch_assoc())
							{
							?> 
							<div class="col-md-4"> 
								<div class="box box-widget widget-user"> 
									<div class="widget-user-header bg-aqua-active">
										<h3 class="widget-user-username"><?php echo $trainings['training_name'];?></h3>
										<h5 class="widget-user-desc"><?php echo $trainings['training_venue'];?></h5>
									</div>
									<div class="widget-user-image"></div>
									<div class="box-footer">
										<div class="row">
											<div class="col-sm-6 border-right">
												<div class="description-block">
													<h5 class="description-header">From</h5>
													<span class="description-text"><?php echo $trainings['date_from'];?></span>
												</div> 
											</div> 
											<div class="col-sm-6 border-right">
												<div class="description-block">
													<h5 class="description-header">To</h5>
													<span class="description-text"><?php echo $trainings['date_to'];?></span>
												</div> 
											</div> 
										</div> 
									</div>
								</div> 
							</div>
							<?php
							}
							?>
						</div>
						<div class="tab-pane" id="medical">
							<h3>Medical Documents</h3><hr>
							<?php $sql = "SELECT * FROM employees201_medical
							WHERE rel_id ='$empid'";
							$query = $conn->query($sql);
							while($medical = $query->fetch_assoc())
							{
							?>
							<div class="col-md-6">
								<div class="box box-widget">
									<div class="box-header with-border">
									<div class="user-block">
										<span class="username"><a href="#"><?php echo $medical['purpose'];?></a></span>
										<span class="description"> </span>
									</div> 
									<div class="box-tools"> 
										<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> 
									</div> 
									</div> 
									<div class="box-body">
										<img class="pad " width="100%" src="<?php echo (!empty($medical['attachment'])) ? '../'.$assets['img'].$medical['attachment'] : '../'.$assets['img'].'profile.jpg'; ?>">
									</div> 
								</div> 
							</div>
							<?php
							}
							?>
						</div>
				</div> 
			</div> 
		</div> 
	<?php 
		} 
	?>
	</div> 
</section> 
</div>
<?php include 'includes/footer.php'; ?> 
</div>
<?php include 'includes/scripts.php'; ?> 
</body>
</html>
