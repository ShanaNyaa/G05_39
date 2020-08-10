<?php
$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	
	session_start();
	$userID = $_SESSION["userID"];
	
	$sql = 'select imageType, imageData from account where userID = "'.$userID.'"';
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	header("Content-type: " . $row["imageType"]);
	echo $row["imageData"];	
?>