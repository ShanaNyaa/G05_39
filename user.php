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

	//getUserType from email
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

function addNewUserSignUp() {
	$userID = $_POST["userID"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$username = $_POST["username"];
	$contactNumber = $_POST["contactNumber"];
	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	else {
		echo "Connected";
		$sqlStr = "insert into account
		(userID, email, password, username, contactNumber, userType) 
		values 
		('$userID', '$email', '$password', '$username', '$contactNumber', 'member')";
		$qry = mysqli_query($con, $sqlStr); //execute query
		mysqli_close($con);
		echo "<script>;
		alert('Sign up successful');
		window.location.href='login.html';
		</script>'";
	}
}

function getUserInformation() {
	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	$userID = $_POST["userID"];
	$sqlStr = "select * from account where userID = '".$userID."'";
	$qry = mysqli_query($con, $sqlStr);
	mysqli_close($con);
	return $qry;
}

function updatePassword() {
	$qry = getUserInformation();
	$row = mysqli_fetch_assoc($qry);
	$userID = $_POST["userID"];
	$email = $row["email"];
	$password = $_POST["password"];
	$username = $row["username"];
	$contactNumber = $row["contactNumber"];
	$userType = $row["userType"];
	
	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	else {
		$sqlStr = 'update account set email = "'.$email.'", password = "'.$password.'", username = "'.$username.'", contactNumber = "'.$contactNumber.'", userType = "'.$userType.'" where userID = "'.$userID.'"';
		$qry = mysqli_query($con, $sqlStr); //execute query
		mysqli_close($con);
		echo "<script>;
		alert('Set new password successful');
		window.location.href='login.html';
		</script>'";
	}
}

function getUsername() {
	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	$userID = $_SESSION["userID"];
	$sql = "select * from account where userID = '".$userID."'";
	$result = mysqli_query($con, $sql);
	$count = mysqli_num_rows($result); //check how many matching record - should be 1 if correct
	if($count == 1){
		$row = mysqli_fetch_assoc($result);
		$username = $row['username'];
		return $username;
	}
}

function getContactNumber() {
	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	$userID = $_SESSION["userID"];
	$sql = "select * from account where userID = '".$userID."'";
	$result = mysqli_query($con, $sql);
	$count = mysqli_num_rows($result); //check how many matching record - should be 1 if correct
	if($count == 1){
		$row = mysqli_fetch_assoc($result);
		$contactNumber = $row['contactNumber'];
		return $contactNumber;
	}
}

function getUserID() {
	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	$email = $_SESSION["email"];
	$sql = "select * from account where email = '".$email."'";
	$result = mysqli_query($con, $sql);
	$count = mysqli_num_rows($result); //check how many matching record - should be 1 if correct
	if($count == 1){
		$row = mysqli_fetch_assoc($result);
		$userID = $row['userID'];
		return $userID;
	}
}

function getEmail() {
	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	$userID = $_SESSION["userID"];
	$sql = "select * from account where userID = '".$userID."'";
	$result = mysqli_query($con, $sql);
	$count = mysqli_num_rows($result); //check how many matching record - should be 1 if correct
	if($count == 1){
		$row = mysqli_fetch_assoc($result);
		$email = $row['email'];
		return $email;
	}
}

function getPassword() {
	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	$userID = $_SESSION["userID"];
	$sql = "select * from account where userID = '".$userID."'";
	$result = mysqli_query($con, $sql);
	$count = mysqli_num_rows($result); //check how many matching record - should be 1 if correct
	if($count == 1){
		$row = mysqli_fetch_assoc($result);
		$password = $row['password'];
		return $password;
	}
}

function updateProfile() {
	$qry = getUserInformation();
	$row = mysqli_fetch_assoc($qry);
	$userID = $_POST["userID"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$username = $_POST["username"];
	$contactNumber = $_POST["contactNumber"];
	$userType = $row["userType"];
	
	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	else {
		$sqlStr = 'update account set email = "'.$email.'", password = "'.$password.'", username = "'.$username.'", contactNumber = "'.$contactNumber.'", userType = "'.$userType.'" where userID = "'.$userID.'"';
		$qry = mysqli_query($con, $sqlStr); //execute query
		mysqli_close($con);
		if($userType == "member") {
			echo "<script>;
			alert('Information updated successfully');
			window.location.href='memberHomepage.php';
			</script>";
		}
		if($userType == "admin") {
			echo "<script>;
			alert('Information updated successfully');
			window.location.href='adminHomepage.php';
			</script>";
		}
	}
}

function uploadPicture() {
	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	
	session_start();
	$userID = $_SESSION["userID"];
	$email = getEmail();
	$userType = getUserType($email);

	$imgData = addslashes(file_get_contents($_FILES['profilePicture']['tmp_name']));
	$imageProperties = getimageSize($_FILES['profilePicture']['tmp_name']);
	$sqlStr = 'update account set imageType = "'.$imageProperties['mime'].'", imageData = "'.$imgData.'" where userID = "'.$userID.'"';
	mysqli_query($con, $sqlStr);
	if($userType == "member") {
		echo "<script>;
		alert('Profile picture updated successfully');
		window.location.href='memberHomepage.php';
		</script>";
	}
	if($userType == "admin") {
		echo "<script>;
		alert('Profile picture updated successfully');
		window.location.href='adminHomepage.php';
		</script>";
	}
}
?>