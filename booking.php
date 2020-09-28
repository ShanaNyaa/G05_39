<?php
function getListOfBooking() {
	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	$sqlStr = "SELECT * FROM booking";
	$qry = mysqli_query($con, $sqlStr);
	mysqli_close($con);
	return $qry;
}

function getListOfBookingForUser() {
	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
    }
    $userID = $_SESSION["userID"];
	$sqlStr = "SELECT * FROM booking WHERE userID = '".$userID."'";
	$qry = mysqli_query($con, $sqlStr);
	mysqli_close($con);
	return $qry;
}

function approvalAccept() {
    $con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	$plateNumber = $_POST['approvalToAccept'];
	$sqlStr = 'UPDATE booking SET approval = "Approved" WHERE plateNumber = "'.$plateNumber.'"';
	mysqli_query($con, $sqlStr);
	echo "<script>;
	alert('Booking information updated successfully');
	window.location.href='adminBookingList.php';
	</script>";
}

function approvalReject() {
    $con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	$plateNumber = $_POST['approvalToReject'];
	$sqlStr = 'UPDATE booking SET approval = "Rejected" WHERE plateNumber = "'.$plateNumber.'"';
	mysqli_query($con, $sqlStr);
	echo "<script>;
	alert('Booking information updated successfully');
	window.location.href='adminBookingList.php';
	</script>";
}

function approvalDelete() {
    $con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	$plateNumber = $_POST['plateNumber'];
	$sqlStr = "DELETE FROM booking WHERE plateNumber = '".$plateNumber."'";
	$qry = mysqli_query($con, $sqlStr);
	mysqli_close($con);
	approvalAddCarAfterDelete();
}

function approvalAddCarAfterDelete() {
    $plateNumber = $_POST["plateNumber"];
	$carName = $_POST["carName"];
	$brand = $_POST["brand"];
	$colour = $_POST["colour"];
    $year = $_POST["year"];

	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	else {
		$sqlStr = "INSERT INTO car
		(plateNumber, carName, brand, colour, year) 
		VALUES 
		('$plateNumber', '$carName', '$brand', '$colour', '$year')";
		$qry = mysqli_query($con, $sqlStr); //execute query
		mysqli_close($con);
		echo "<script>;
		alert('Booking information deleted successfully');
		window.location.href='adminBookingList.php';
		</script>";
    }
}

?>