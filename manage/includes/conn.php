<?php
	$conn = new mysqli('localhost', 'root', '', 'oceanahris');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

?>
