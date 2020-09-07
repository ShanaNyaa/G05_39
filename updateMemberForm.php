<!DOCTYPE html>
<html>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<style>
	body {
		background: url("assets/img/hero-bg.jpg") no-repeat center center fixed;
		background-size: cover;
	}
</style>
<?php
include "user.php";
$qry = getMemberInformation();
$row = mysqli_fetch_assoc($qry);

$userID = $row["userID"];
$email = $row["email"];
$password = $row["password"];
$username = $row["username"];
$contactNumber = $row["contactNumber"];

echo '<div class="container" style="text-align: center; margin-top: 10%; padding-right: 50px; padding-left: 50px; padding-top: 5px; width: 650px">';
echo '<h1 style="color: white; text-shadow: 2px 2px 5px #000000">Edit Account</h1>';
	echo '<div class="card bg-dark">';
		echo '<div class="card-body text-white" style="box-shadow: 2px 2px 5px #000000">';
			echo '<form action="processProfile.php" method="post">';
				echo '<p style="text-shadow: 2px 2px 5px #000000; font-size: 24px; padding-left: 4px">User ID: <input class="text-muted" type="text" name="userID" value="'.$userID.'" readonly>';
				echo '<p style="text-shadow: 2px 2px 5px #000000; font-size: 24px; padding-left: 25px">Email: <input type="email" name="email" value="'.$email.'">';
				echo '<p style="text-shadow: 2px 2px 5px #000000; font-size: 24px; padding-right: 18px">Password: <input type="password" name="password" value="'.$password.'">';
				echo '<p style="text-shadow: 2px 2px 5px #000000; font-size: 24px; padding-right: 23px">Username: <input type="text" name="username" value="'.$username.'">';
				echo '<p style="text-shadow: 2px 2px 5px #000000; font-size: 24px; padding-left: 0px">Contact: <input type="text" name="contactNumber" value="'.$contactNumber.'">';;
				echo '<button type="submit" class="btn btn-primary" style="width: 85%; margin-top: 25px" name="updateButton">Update</button>';
			echo '</form>';
		echo '</div>';
	echo '</div>';
echo '</div>';
?>