<!DOCTYPE HTML>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<!-- SweetAlert JavaScript -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<style>
	body {
		background: url("background.jpg") no-repeat center center fixed;
		background-size: cover;
	}
</style>
<?php
session_start();
include "user.php";
$_SESSION["email"] = $_POST["email"];
$_SESSION["password"] = $_POST["password"];
$email = $_POST["email"];
$password = $_POST["password"];
$isValidUser = validatePassword($email, $password);

if($isValidUser) {
    $userType = getUserType($email);
    if($userType == 'member')
	    header("location: memberHomepage.php");
    if($userType == 'admin')
        header("location: adminHomepage.html");
}

else {
	displayWrongCredentials();
}

function displayWrongCredentials() {
	echo "<script>;
	alert('Wrong email or password');
	window.location.href='login.html';
	</script>'";
}
?>