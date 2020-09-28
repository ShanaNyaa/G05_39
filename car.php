<?php
function getListOfCar() {
	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	$sqlStr = "select * from car";
	$qry = mysqli_query($con, $sqlStr);
	mysqli_close($con);
	return $qry;
}

function deleteCar() {
	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	$plateNumber = $_POST['plateNumberToDelete'];
	$sqlStr = "DELETE FROM car WHERE plateNumber = '".$plateNumber."'";
	$qry = mysqli_query($con, $sqlStr);
	mysqli_close($con);
	echo "<script>;
	alert('Car deleted successfully');
	window.location.href='adminCarList.php';
	</script>";
}

function getCarInformation() {
	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	$plateNumberToUpdate = $_POST["plateNumberToUpdate"];
	$sqlStr = "select * from car where plateNumber = '".$plateNumberToUpdate."'";
	$qry = mysqli_query($con, $sqlStr);
	mysqli_close($con);
	return $qry;
}

function updateCar() {
	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	$plateNumber = $_POST['plateNumber'];
	$carName = $_POST['carName'];
	$brand = $_POST['brand'];
	$colour = $_POST['colour'];
	$year = $_POST['year'];
	$sqlStr = 'update car set carName = "'.$carName.'", brand = "'.$brand.'", colour = "'.$colour.'", year = "'.$year.'" where plateNumber = "'.$plateNumber.'"';
	mysqli_query($con, $sqlStr);
	echo "<script>;
	alert('Car information updated successfully');
	window.location.href='adminCarList.php';
	</script>";
}

function addCar() {
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
		$sqlStr = "insert into car
		(plateNumber, carName, brand, colour, year) 
		values 
		('$plateNumber', '$carName', '$brand', '$colour', '$year')";
		$qry = mysqli_query($con, $sqlStr); //execute query
		mysqli_close($con);
		echo "<script>;
		alert('Car added successfully');
		window.location.href='adminCarList.php';
		</script>";
    }
}

function getCarInformationToRent() {
    $con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	$plateNumberToRent = $_POST["plateNumberToRent"];
	$sqlStr = "select * from car where plateNumber = '".$plateNumberToRent."'";
	$qry = mysqli_query($con, $sqlStr);
	mysqli_close($con);
	return $qry;
}

function rentCar() {
    include "user.php";

    $plateNumber = $_POST["plateNumber"];
	$carName = $_POST["carName"];
	$brand = $_POST["brand"];
	$colour = $_POST["colour"];
    $year = $_POST["year"];
    $rentDate = $_POST["rentDate"];
    $userID = $_POST["userID"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $contactNumber = $_POST["contactNumber"];

	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	else {
        $sqlStr = "INSERT INTO booking
        (plateNumber, carName, brand, colour, year, rentDate, userID, username, email, contactNumber, approval)
        VALUES
		('$plateNumber', '$carName', '$brand', '$colour', '$year', '$rentDate', '$userID', '$username', '$email', '$contactNumber', 'Waiting For Approval')";
		$qry = mysqli_query($con, $sqlStr); //execute query
		mysqli_close($con);
		deleteCarAfterRent();
    }
}

function deleteCarAfterRent() {
	$con = mysqli_connect("localhost", "web39", "web39", "carrent");
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " .mysqli_connect_error());
	}
	$plateNumber = $_POST['plateNumber'];
	$sqlStr = "DELETE FROM car WHERE plateNumber = '".$plateNumber."'";
	$qry = mysqli_query($con, $sqlStr);
	mysqli_close($con);
	echo "<script>;
	alert('Car rented successfully');
	window.location.href='memberCarList.php';
	</script>";
}
?>