<?php
function validatePassword($email, $password) {
	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (!$con) {
		echo mysqli_connect_error();
		exit;
	}
	$stmt = $con->prepare("SELECT * FROM account WHERE email = ?");
	$stmt->bind_param("s", $email);
	$stmt->execute();
	$user = $stmt->get_result()->fetch_assoc();

	if ($user && password_verify($password, $user["password"])) {
		return true;
	}
	else {
		return false;
	}

	/*$sql = "SELECT * FROM account WHERE email = '".$email."' AND password ='".$password."'";
	$result = mysqli_query($con, $sql);
	$count = mysqli_num_rows($result); //check how many matching record - should be 1 if correct
	if($count == 1){
		return true; //username AND password is valid
	}
	else {
		return false; //invalid password
	}*/
}

	//getUserType from email
function getUserType($email) {
	$con=mysqli_connect("localhost", "web39", "web39", "carrent");
	if(!$con) {
		echo  mysqli_connect_error(); 
		exit;
	}
	$sql = "SELECT * FROM account WHERE email = '".$email."'";
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
	$_SESSION["userID"] = $userID;
	$_SESSION["email"] = $email;
	$password = $_POST["password"];
	$username = $_POST["username"];
	$contactNumber = $_POST["contactNumber"];
	$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	else {
		if ($email == getEmail() || $userID == getUserID()){
			echo "<script>
			alert('User ID or email has been used');
			window.location.href='signUp.html';
			</script>";
		}

		else {
			$sqlStr = "INSERT INTO account
			(userID, email, password, username, contactNumber, imageType, imageData, userType) 
			values 
			('$userID', '$email', '$hashedPassword', '$username', '$contactNumber', NULL, NULL, 'member')";
			$qry = mysqli_query($con, $sqlStr); //execute query
			mysqli_close($con);
			echo "<script>;
			alert('Sign up successful');
			window.location.href='login.html';
			</script>";
		}
	}
}

function getUserInformation() {
	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	$userID = $_POST["userID"];
	$sqlStr = "SELECT * FROM account WHERE userID = '".$userID."'";
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
		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
		$sqlStr = 'update account set email = "'.$email.'", password = "'.$hashedPassword.'", username = "'.$username.'", contactNumber = "'.$contactNumber.'", userType = "'.$userType.'" WHERE userID = "'.$userID.'"';
		$qry = mysqli_query($con, $sqlStr); //execute query
		mysqli_close($con);
		echo "<script>;
		alert('Set new password successful');
		window.location.href='login.html';
		</script>";
	}
}

function getUsername() {
	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	$userID = $_SESSION["userID"];
	$sql = "SELECT * FROM account WHERE userID = '".$userID."'";
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
	$sql = "SELECT * FROM account WHERE userID = '".$userID."'";
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
	$sql = "SELECT * FROM account WHERE email = '".$email."'";
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
	$sql = "SELECT * FROM account WHERE userID = '".$userID."'";
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
	$sql = "SELECT * FROM account WHERE userID = '".$userID."'";
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
		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
		$sqlStr = 'UPDATE account SET email = "'.$email.'", password = "'.$hashedPassword.'", username = "'.$username.'", contactNumber = "'.$contactNumber.'", userType = "'.$userType.'" WHERE userID = "'.$userID.'"';
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
	$sqlStr = 'UPDATE account SET imageType = "'.$imageProperties['mime'].'", imageData = "'.$imgData.'" WHERE userID = "'.$userID.'"';
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

function deleteUser() {
	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	$userID = $_POST['userIDToDelete'];
	$sqlStr = "delete from account WHERE userID = '".$userID."'";
	$qry = mysqli_query($con, $sqlStr);
	mysqli_close($con);
	echo "<script>;
	alert('Account deleted successfully');
	window.location.href='userList.php';
	</script>";
}

function getListOfUser() {
	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	$sqlStr = "SELECT * FROM account";
	$qry = mysqli_query($con, $sqlStr);
	mysqli_close($con);
	return $qry;
}

function searchMemberByUserID() {
	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	$userIDToSearch = $_POST["searchValue"];
	$sqlStr = "SELECT * FROM account WHERE userID LIKE '".$userIDToSearch."%'";
	$qry = mysqli_query($con, $sqlStr);
	mysqli_close($con);
	return $qry;
}

function searchMemberByEmail() {
	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	$emailToSearch = $_POST["searchValue"];
	$sqlStr = "SELECT * FROM account WHERE email LIKE '%".$emailToSearch."%'";
	$qry = mysqli_query($con, $sqlStr);
	mysqli_close($con);
	return $qry;
}

function searchMemberByUsername() {
	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	$usernameToSearch = $_POST["searchValue"];
	$sqlStr = "SELECT * FROM account WHERE username LIKE '%".$usernameToSearch."%'";
	$qry = mysqli_query($con, $sqlStr);
	mysqli_close($con);
	return $qry;
}

function searchMemberByContactNumber() {
	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	$contactNumberToSearch = $_POST["searchValue"];
	$sqlStr = "SELECT * FROM account WHERE contactNumber LIKE '".$contactNumberToSearch."%'";
	$qry = mysqli_query($con, $sqlStr);
	mysqli_close($con);
	return $qry;
}

function getMemberInformation() {
	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	$userIDToUpdate = $_POST["userIDToUpdate"];
	$sqlStr = "SELECT * FROM account WHERE userID = '".$userIDToUpdate."'";
	$qry = mysqli_query($con, $sqlStr);
	mysqli_close($con);
	return $qry;
}

function updateUser() {
	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	$userID = $_POST['userID'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$username = $_POST['username'];
	$contactNumber = $_POST['contactNumber'];
	$sqlStr = 'UPDATE account SET email = "'.$email.'", password = "'.$password.'", username = "'.$username.'", contactNumber = "'.$contactNumber.'" WHERE userID = "'.$userID.'"';
	mysqli_query($con, $sqlStr);
	echo "<script>;
	alert('Account updated successfully');
	window.location.href='userList.php';
	</script>";
}

function addUser() {
	$userID = $_POST["userID"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$username = $_POST["username"];
	$contactNumber = $_POST["contactNumber"];
	$userType = $_POST["userType"];

	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	else {
		$sqlStr = "INSERT INTO account
		(userID, email, password, username, contactNumber, imageType, imageData, userType) 
		VALUES 
		('$userID', '$email', '$password', '$username', '$contactNumber', NULL, NULL, '$userType')";
		$qry = mysqli_query($con, $sqlStr); //execute query
		mysqli_close($con);
		echo "<script>;
		alert('Account added successfully');
		window.location.href='userList.php';
		</script>";
	}
}

?>