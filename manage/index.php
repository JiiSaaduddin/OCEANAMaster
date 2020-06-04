<?php
  session_start();
  if(isset($_SESSION['admin'])){
    header('location:home.php');
  }
?>
<?php include 'includes/header.php'; ?>
<style>
.lockscreen {
 background-image: url("../assets/images/oceana.jpg"); /* The image used */
  background-color: red; /* Used if the image is unavailable */
  height: 100%; /* You must set a specified height */
  background-position: center; /* Center the image */
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: cover; 
  overflow: hidden;
}
</style>
<body class="lockscreen hold-transition login-page">
<div class="login-box">
  	<div class="login-logo">
  		<b>HRIS Master</b>
  	</div>
  
  	<div class="login-box-body">
		<p class="login-box-msg">Sign in to start your session</p>
		<form action="login.php" method="POST">
			<div class="form-group has-feedback">
					<input type="text" class="form-control" name="username" value="admin" placeholder="input Username" required autofocus>
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" class="form-control" name="password" value="password" placeholder="input Password" required>
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<button type="submit" class="btn btn-default btn-block btn-flat" name="login">Sign In <i class="fa fa-arrow-right pull-right text-muted"></i></button>
				</div>
			</div>
		</form>
  	</div>
  	<?php
  		if(isset($_SESSION['error'])){
  			echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<p>".$_SESSION['error']."</p> 
			  	</div>
  			";
  			unset($_SESSION['error']);
  		}
  	?>
</div>

<?php include 'includes/scripts.php' ?>
</body>
</html>