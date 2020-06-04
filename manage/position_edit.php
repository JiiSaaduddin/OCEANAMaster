<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$title = $_POST['title'];
		$rate = $_POST['rate'];
		$rateflat = $_POST['rateflat'];
		$job_type = $_POST['job_type'];

		$sql = "UPDATE position SET description = '$title', rate = '$rate', rateflat='$rateflat', job_type='$job_type' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Rank & Rate template updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:position.php');

?>