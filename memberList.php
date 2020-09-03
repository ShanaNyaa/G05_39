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
    include "user.php";

    $memberList = getListOfUser();
    $noOfMember = mysqli_num_rows($memberList);
    echo '<div class="container-fluid">';
    
    echo '<p style="color: white; text-shadow: 2px 2px 5px #000000">There are ' .$noOfMember. ' member</p>';
	echo "<table class='table table-dark table-hover'>";
	$bil = 1;
	echo "<tr><th>#</th><th>User ID</th><th>Email</th><th>Password</th><th>Username</th><th>Contact Number</th>";
	while($row = mysqli_fetch_assoc($memberList)) {
	echo "<tr>";
	$userID = $row["userID"];
		echo "<td>".$bil. "</td>";
		echo "<td>".$row["userID"]."</td>";
		echo "<td>".$row["email"]."</td>";
		echo "<td>".$row["password"]."</td>";
		echo "<td>".$row["username"]."</td>";
		echo "<td>".$row["contactNumber"]."</td>";
		echo "<td>";
			echo '<form action="updateStaffForm.php" method="POST">';
			echo "<input type='hidden' value='$userID' name='usernameToUpdate'>";
			echo '<button type="submit" class="btn btn-primary" name="updateButton">Update</button>';
			echo "</form>";
		echo "</td>";
		echo "<td>";
			echo '<form action="processProfile.php" method="POST">';
			echo "<input type='hidden' value='$userID' name='userIDToDelete'>";
			echo '<button type="submit" class="btn btn-danger" name="deleteButton">Delete</button>';
			echo "</form>";
		echo "</td>";
	echo "</tr>";
	$bil++;
	echo '</div>';
	}
	echo "</table>";
?>