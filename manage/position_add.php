<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$title = $_POST['title'];
		$rate = $_POST['rate'];
		$rateflat = $_POST['rateflat'];
		$job_type = $_POST['job_type'];

		$sql = "INSERT INTO position (description, rate, rateflat, job_type) VALUES ('$title', '$rate', '$rateflat', '$job_type')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Rank & Rate template added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: position.php');

?>