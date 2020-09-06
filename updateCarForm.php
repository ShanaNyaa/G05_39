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
include "car.php";
$qry = getCarInformation();
$row = mysqli_fetch_assoc($qry);

$plateNumber = $row["plateNumber"];
$carName = $row["carName"];
$brand = $row["brand"];
$colour = $row["colour"];
$year = $row["year"];

echo '<div class="container" style="text-align: center; margin-top: 10%; padding-right: 50px; padding-left: 50px; padding-top: 5px; width: 650px">';
echo '<h1 style="color: white; text-shadow: 2px 2px 5px #000000">Edit Car</h1>';
	echo '<div class="card bg-dark">';
		echo '<div class="card-body text-white" style="box-shadow: 2px 2px 5px #000000">';
			echo '<form action="processCar.php" method="post">';
				echo '<p style="text-shadow: 2px 2px 5px #000000; font-size: 24px; padding-right: 7px">Plate: <input class="text-muted" type="text" name="plateNumber" value="'.$plateNumber.'" readonly>';
				echo '<p style="text-shadow: 2px 2px 5px #000000; font-size: 24px; padding-right: 19px">Name: <input type="text" name="carName" value="'.$carName.'">';
				echo '<p style="text-shadow: 2px 2px 5px #000000; font-size: 24px; padding-right: 18px">Brand: <input type="text" name="brand" value="'.$brand.'">';
				echo '<p style="text-shadow: 2px 2px 5px #000000; font-size: 24px; padding-right: 27px">Colour: <input type="text" name="colour" value="'.$colour.'">';
				echo '<p style="text-shadow: 2px 2px 5px #000000; font-size: 24px; padding-left: 0px">Year: <input type="text" name="year" value="'.$year.'">';;
				echo '<button type="submit" class="btn btn-primary" style="width: 85%; margin-top: 25px" name="updateButton">Update</button>';
			echo '</form>';
		echo '</div>';
	echo '</div>';
echo '</div>';
?>