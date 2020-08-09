<?php
	include "user.php";

	if(isSet($_POST["newProfileButton"])) {
		updateProfile();
	}

	if(isSet($_POST["cancelButton"])) {
		header("location: memberHomepage.php");
	}
	
	if(isSet($_POST["uploadPictureButton"])) {
	uploadPicture();
	}
?>