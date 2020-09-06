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
    $carList = getListOfCar();

    if (isSet($_POST["searchByPlateNumber"])) {
        $carList = searchCarByPlateNumber();
    }

    if (isSet($_POST["searchByName"])) {
		$carList = searchCarByName();
	}
	
	if (isSet($_POST["searchByBrand"])) {
		$carList = searchCarByBrand();
	}
	
	if (isSet($_POST["searchByColour"])) {
		$carList = searchCarByColour();
    }
    
    if (isSet($_POST["searchByYear"])) {
        $carList = searchCarByYear();
    }
	
	if (isSet($_POST["displayAllButton"])) {
		$carList = getListOfCar();
	}

    $noOfCar = mysqli_num_rows($carList);
    echo '<div class="container-fluid">';
    displaySearchPanel();
    echo '<p style="color: white; text-shadow: 2px 2px 5px #000000">There are ' .$noOfCar. ' car(s)</p>';
	echo "<table class='table table-dark table-hover'>";
	$bil = 1;
	echo "<tr><th>#</th><th>Plate Number</th><th>Name</th><th>Brand</th><th>Colour</th><th>Year</th>";
	while($row = mysqli_fetch_assoc($carList)) {
        echo "<tr>";
        $plateNumber = $row["plateNumber"];
            echo "<td>".$bil. "</td>";
            echo "<td>".$row["plateNumber"]."</td>";
            echo "<td>".$row["carName"]."</td>";
            echo "<td>".$row["brand"]."</td>";
            echo "<td>".$row["colour"]."</td>";
            echo "<td>".$row["year"]."</td>";
            echo "<td>";
                echo '<form action="rentCarForm.php" method="POST">';
                echo "<input type='hidden' value='$plateNumber' name='plateNumberToRent'>";
                echo '<button type="submit" class="btn btn-primary" name="rentButton">Rent</button>';
                echo "</form>";
            echo "</td>";
        echo "</tr>";
        $bil++;
        echo '</div>';
	}
    echo "</table>";
    
    function displaySearchPanel() {
        echo '<form style="margin-top: 5px" action="memberCarList.php" method="POST">';
        echo '<p style="color: white; text-shadow: 2px 2px 5px #000000">Search Car: ';
        echo '<input class="form mr-sm-2" type="text" name="searchValue">';
        echo '<button type="submit" class="btn btn-primary mr-sm-2" name="searchByPlateNumber">Search By Plate Number</button>';
        echo '<button type="submit" class="btn btn-dark mr-sm-2" name="searchByName">Search By Name</button>';
        echo '<button type="submit" class="btn btn-secondary mr-sm-2" name="searchByBrand">Search By Brand</button>';
        echo '<button type="submit" class="btn btn-info mr-sm-2" name="searchByColour">Search By Colour</button>';
        echo '<button type="submit" class="btn btn-success mr-sm-2" name="searchByYear">Search By Year</button>';
        echo '<button type="submit" class="btn btn-danger mr-sm-2" name="displayAllButton">Display All</button>';
        echo '</form>';
    }