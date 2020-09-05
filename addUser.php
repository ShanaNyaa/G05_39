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
<title>Add Account</title>
<body>
	<div class="container" style="text-align: center; margin-top: 10%; padding-right: 50px; padding-left: 50px; padding-top: 5px; width: 650px">
		<h1 style="color: white; text-shadow: 2px 2px 5px #000000">Create an Account</h1>
		<div class="card bg-dark">
			<div class="card-body text-white" style="box-shadow: 2px 2px 5px #000000">
				<form action="processProfile.php" method="post">
                    <p style="text-shadow: 2px 2px 5px #000000; font-size: 24px; padding-right: 9px">User ID: <input type="text" name="userID" placeholder="User ID" required>
                    <p style="text-shadow: 2px 2px 5px #000000; font-size: 24px; padding-left: 12px">Email: <input type="email" name="email" placeholder="Email" required>
                    <p style="text-shadow: 2px 2px 5px #000000; font-size: 24px; padding-right: 30px">Password: <input type="password" name="password" placeholder="Password" required>
					<p style="text-shadow: 2px 2px 5px #000000; font-size: 24px; padding-right: 38px">Username: <input type="text" name="username" placeholder="Username" required>
                    <p style="text-shadow: 2px 2px 5px #000000; font-size: 24px; padding-right: 14px">Contact: <input type="text" name="contactNumber" placeholder="Contact Number" required>
					<p style="text-shadow: 2px 2px 5px #000000; font-size: 24px; padding-right: 228px">User Type: <select input name="userType">
                        <option>member</option>
                        <option>admin</option>
                    </select>
                    </p>
					<button type="submit" class="btn btn-primary" style="width: 85%" name="addButton">Register</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>