<?php
  include "car.php";

  if(isSet($_POST["deleteButton"])) {
		deleteCar();
	}

	if(isSet($_POST["updateButton"])) {
		updateCar();
  }

  if(isSet($_POST["addButton"])) {
		addCar();
  }

  if(isSet($_POST["rentButton"])) {
    rentCar();
  }
?>