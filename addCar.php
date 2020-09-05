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
<title>Add Car</title>
<body>
	<div class="container" style="text-align: center; margin-top: 10%; padding-right: 50px; padding-left: 50px; padding-top: 5px; width: 650px">
		<h1 style="color: white; text-shadow: 2px 2px 5px #000000">Create a Car</h1>
		<div class="card bg-dark">
			<div class="card-body text-white" style="box-shadow: 2px 2px 5px #000000">
				<form action="processCar.php" method="post">
                    <p style="text-shadow: 2px 2px 5px #000000; font-size: 24px; padding-right: 9px">Plate: <input type="text" name="plateNumber" placeholder="Plate Number" required>
                    <p style="text-shadow: 2px 2px 5px #000000; font-size: 24px; padding-right: 19px">Name: <input type="text" name="carName" placeholder="Name" required>
                    <p style="text-shadow: 2px 2px 5px #000000; font-size: 24px; padding-right: 18px">Brand: <input type="text" name="brand" placeholder="Brand" required>
					<p style="text-shadow: 2px 2px 5px #000000; font-size: 24px; padding-right: 26px">Colour: <input type="text" name="colour" placeholder="Colour" required>
                    <p style="text-shadow: 2px 2px 5px #000000; font-size: 24px; padding-right: 0px">Year: <input type="text" name="year" placeholder="Year" required>
                    </p>
					<button type="submit" class="btn btn-primary" style="width: 85%" name="addButton">Register</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>