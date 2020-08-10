<?php
	include "user.php";

	if(isSet($_POST["newProfileButton"])) {
		updateProfile();
	}

	if(isSet($_POST["cancelButton"])) {
		session_start();
		$email = $_SESSION["email"];
		$userType = getUserType($email);
		
		if($userType == "member") {
			header("location: memberHomepage.php");
		}
		
		if($userType == "admin") {
			header("location: adminHomepage.php");
		}
	}
	
	if(isSet($_POST["uploadPictureButton"])) {
	uploadPicture();
	}
?>