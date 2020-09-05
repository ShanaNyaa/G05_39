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
    $memberList = getListOfMember();

    if (isSet($_POST["searchByUserID"])) {
        $memberList = searchMemberByUserID();
    }

    if (isSet($_POST["searchByEmail"])) {
		$memberList = searchMemberByEmail();
	}
	
	if (isSet($_POST["searchByUsername"])) {
		$memberList = searchMemberByUsername();
	}
	
	if (isSet($_POST["searchByContactNumber"])) {
		$memberList = searchMemberByContactNumber();
	}
	
	if (isSet($_POST["displayAllButton"])) {
		$memberList = getListOfMember();
	}
	
	if (isSet($_POST["addUser"])) {
		header("location: addUser.php");
	}

    $noOfMember = mysqli_num_rows($memberList);
    echo '<div class="container-fluid">';
    displaySearchPanel();
    echo '<p style="color: white; text-shadow: 2px 2px 5px #000000">There are ' .$noOfMember. ' member</p>';
	echo "<table class='table table-dark table-hover'>";
	$bil = 1;
	echo "<tr><th>#</th><th>User ID</th><th>Email</th><th>Username</th><th>Contact Number</th>";
	while($row = mysqli_fetch_assoc($memberList)) {
	echo "<tr>";
	$userID = $row["userID"];
		echo "<td>".$bil. "</td>";
		echo "<td>".$row["userID"]."</td>";
		echo "<td>".$row["email"]."</td>";
		echo "<td>".$row["username"]."</td>";
		echo "<td>".$row["contactNumber"]."</td>";
		echo "<td>";
			echo '<form action="updateMemberForm.php" method="POST">';
			echo "<input type='hidden' value='$userID' name='userIDToUpdate'>";
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
    
    function displaySearchPanel() {
        echo '<form style="margin-top: 5px" action="memberList.php" method="POST">';
        echo '<p style="color: white; text-shadow: 2px 2px 5px #000000">Search Member: ';
        echo '<input class="form mr-sm-2" type="text" name="searchValue">';
        echo '<button type="submit" class="btn btn-primary mr-sm-2" name="searchByUserID">Search By User ID</button>';
        echo '<button type="submit" class="btn btn-dark mr-sm-2" name="searchByEmail">Search By Email</button>';
        echo '<button type="submit" class="btn btn-secondary mr-sm-2" name="searchByUsername">Search By Username</button>';
        echo '<button type="submit" class="btn btn-info mr-sm-2" name="searchByContactNumber">Search By Contact Number</button>';
        echo '<button type="submit" class="btn btn-danger mr-sm-2" name="displayAllButton">Display All</button>';
        echo '<button type="submit" class="btn btn-light mr-sm-2" name="addUser">Add User</button></p>';
        echo '</form>';
    }
?>