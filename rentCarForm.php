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
session_start();
if(!isset($_SESSION["email"]) && $_SESSION["password"] != "") {
    header("location: index.html");
}

include "user.php";
$userID = $_SESSION["userID"];
$email = getEmail();
$username = getUsername();
$contactNumber = getContactNumber();

include "car.php";
$qry = getCarInformationToRent();
$row = mysqli_fetch_assoc($qry);

$plateNumber = $row["plateNumber"];
$carName = $row["carName"];
$brand = $row["brand"];
$colour = $row["colour"];
$year = $row["year"];


echo '<div class="row">';
    echo '<div class="col">';
        echo '<div class="container" style="text-align: center; margin-top: 1%; padding-right: 50px; padding-left: 50px; padding-top: 5px; width: 1050px">';
        echo '<h1 style="color: white; text-shadow: 2px 2px 5px #000000">Location</h1>';
            echo '<div class="card bg-dark">';
                echo '<div class="card-body text-white" style="box-shadow: 2px 2px 5px #000000">';
                    echo '<iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7968.133560232437!2d101.755948!3d3.076843!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf4a4c4afb051143a!2sPUBLIC%20AUTO%20WORLD%20SDN%20BHD!5e0!3m2!1sen!2sus!4v1596375673300!5m2!1sen!2sus" frameborder="0" style="border:0; width: 100%; height: 350px;" allowfullscreen></iframe>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    echo '</div>';
    echo '<div class="col">';
        echo '<div class="container" style="text-align: center; margin-top: 1%; padding-right: 50px; padding-left: 50px; padding-top: 5px; width: 650px">';
        echo '<h1 style="color: white; text-shadow: 2px 2px 5px #000000">Car Information</h1>';
            echo '<div class="card bg-dark">';
                echo '<div class="card-body text-white" style="box-shadow: 2px 2px 5px #000000">';
                    echo '<form action="processCar.php" method="post">';
                        echo '<p style="text-shadow: 2px 2px 5px #000000; font-size: 24px; padding-right: 7px">Plate: <input class="text-muted" type="text" name="plateNumber" value="'.$plateNumber.'" readonly>';
                        echo '<p style="text-shadow: 2px 2px 5px #000000; font-size: 24px; padding-right: 19px">Name: <input class="text-muted" type="text" name="carName" value="'.$carName.'" readonly>';
                        echo '<p style="text-shadow: 2px 2px 5px #000000; font-size: 24px; padding-right: 18px">Brand: <input class="text-muted" type="text" name="brand" value="'.$brand.'" readonly>';
                        echo '<p style="text-shadow: 2px 2px 5px #000000; font-size: 24px; padding-right: 27px">Colour: <input class="text-muted" type="text" name="colour" value="'.$colour.'" readonly>';
                        echo '<p style="text-shadow: 2px 2px 5px #000000; font-size: 24px; padding-left: 0px">Year: <input class="text-muted" type="text" name="year" value="'.$year.'" readonly>';
                    echo '</form>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    echo '</div>';
echo '</div>';

echo '<div class="row">';
    echo '<div class="col">';
        echo '<div class="container" style="text-align: center; margin-bottom: 1%; margin-right: 4%; padding-right: 50px; padding-left: 50px; padding-top: 5px; width: 650px">';
        echo '<h1 style="color: white; text-shadow: 2px 2px 5px #000000">Rent Car</h1>';
            echo '<div class="card bg-dark">';
                echo '<div class="card-body text-white" style="box-shadow: 2px 2px 5px #000000">';
                    echo '<form action="processCar.php" method="post">';
                        echo '<input type="hidden" name="plateNumber" value="'.$plateNumber.'" readonly>';
                        echo '<input type="hidden" name="carName" value="'.$carName.'" readonly>';
                        echo '<input type="hidden" name="brand" value="'.$brand.'" readonly>';
                        echo '<input type="hidden" name="colour" value="'.$colour.'" readonly>';
                        echo '<input type="hidden" name="year" value="'.$year.'" readonly>';
                        echo '<input type="date" name="rentDate">';
                        echo '<input type="hidden" name="userID" value="'.$userID.'" readonly>';
                        echo '<input type="hidden" name="email" value="'.$email.'" readonly>';
                        echo '<input type="hidden" name="username" value="'.$username.'" readonly>';
                        echo '<input type="hidden" name="contactNumber" value="'.$contactNumber.'" readonly>';
                        echo '<button type="submit" class="btn btn-primary" style="width: 85%; margin-top: 25px" name="rentButton">Rent</button>';
                    echo '</form>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    echo '</div>';
echo '</div>';
?>
</html>