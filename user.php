<?php
function validatePassword($email, $password) {
	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (!$con) {
		echo mysqli_connect_error();
		exit;
	}
	$sql = "SELECT * FROM account where email = '".$email."' and password ='".$password."'";
	$result = mysqli_query($con, $sql);
	$count = mysqli_num_rows($result); //check how many matching record - should be 1 if correct
	if($count == 1){
		return true; //username and password is valid
	}
	else {
		return false; //invalid password
	}
}

	//=================== getUserType
function getUserType($email) {
	$con=mysqli_connect("localhost", "web39", "web39", "carrent");
	if(!$con) {
		echo  mysqli_connect_error(); 
		exit;
	}
	$sql = "SELECT * FROM account where email = '".$email."'";
	$result = mysqli_query($con, $sql);
	$count = mysqli_num_rows($result); //check how many matching record - should be 1 if correct
	if($count == 1){
		$row = mysqli_fetch_assoc($result);
		$userType = $row['userType'];
		return $userType;
	}
}
?>