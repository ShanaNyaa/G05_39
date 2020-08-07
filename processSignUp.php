<?php
	include "user.php";
	
	if(isSet($_POST["signUpButton"])) {
		addNewUserSignUp();
	}
	
	if(isSet($_POST["updatePasswordButton"])) {
		updatePassword();
	}
?>