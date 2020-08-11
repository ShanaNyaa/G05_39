<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Profile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        
    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>
<body>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<?php
    session_start();
    if(!isset($_SESSION["email"]) && $_SESSION["password"] != "") {
        header("location: index.html");
    }
	
	include "user.php";
	$username = getUsername();
	$email = getEmail();
	$password = getPassword();
	$contactNumber = getContactNumber();
	$userID = $_SESSION["userID"];
?>

<hr>
<div class="container bootstrap snippet">
    <div class="row">
  		<div class="col-sm-10">
		<?php
		echo "<h1>".$username."</h1>";
		?>
		</div>
    	<div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="http://www.gravatar.com/avatar/28fd20ccec6865e2d5f0e1f4446eb7bf?s=100"></a></div>
    </div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
              

		<div class="text-center">
		<img src="imageView.php?userID=<?php echo $row["userID"];?>"
		class="avatar img-circle img-thumbnail" alt="avatar">
        <h6>Upload a different photo...</h6>
		<form action="processProfile.php" method="POST" enctype="multipart/form-data">
			<input type="file" name="profilePicture" class="text-center center-block file-upload">
			<input type="submit" name="uploadPictureButton" value="Upload">
		</form>
		</div></hr><br>

               
        <div class="panel panel-default">
            <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
            <div class="panel-body"><a href="http://bootnipets.com">bootnipets.com</a></div>
        </div>
          
          
        <ul class="list-group">
            <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
        </ul> 
               
        <div class="panel panel-default">
            <div class="panel-heading">Social Media</div>
			<div class="panel-body">
            	<i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
            </div>
        </div> 
        </div><!--/col-3-->
    	<div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#settings">Settings</a></li>
            </ul>
			
          <div class="tab-content">
            <div class="tab-pane active" id="settings">
                <hr>
                  <form class="form" action="processProfile.php" method="post" id="registrationForm">
                      <div class="form-group">
         
                        <div class="col-xs-6">
                            <label for="email"><h4>Email</h4></label>
							<input type="email" class="form-control" name="email" id="email" placeholder="email" required title="Change your email if needed"
							<?php
							echo "value='".$email."'";
							?>
							>
						</div>
					</div>
					<div class="form-group">
					
						<div class="col-xs-6">
							<label for="username"><h4>Username</h4></label>
							<input type="text" class="form-control" name="username" id="username" placeholder="username" required title="Change your username if needed"
							<?php
							echo "value='".$username."'";
							?>
							>
						</div>
					</div>
          
					<div class="form-group">
                          
						<div class="col-xs-6">
							<label for="password"><h4>Password</h4></label>
							<input type="password" class="form-control" name="password" id="password" placeholder="enter password" required title="Change your password if needed"
							<?php
							echo "value='".$password."'";
							?>
							>
						</div>
					</div>
          
					<div class="form-group">
						<div class="col-xs-6">
							<label for="contactNumber"><h4>Contact Number</h4></label>
							<input type="text" class="form-control" name="contactNumber" id="contactNumber" placeholder="enter contact number" required title="Change your contact number if needed"
							<?php
							echo "value='".$contactNumber."'";
							?>
							>
						</div>
					</div>
					<div class="form-group">
                          
						<div class="col-xs-6">
							<label for="userID"><h4>IC Number</h4></label>
							<input type="text" readonly class="form-control" name="userID" id="userID" placeholder="enter your ic number" required title="If want to change, please contact the admin"
							<?php
							echo "value='".$userID."'";
							?>
							>
						</div>
					</div>
					<div class="form-group">
                        <div class="col-xs-12">
							<br>
                            <button class="btn btn-lg btn-success" type="submit" name="newProfileButton"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                            <button class="btn btn-lg btn-danger" type="submit" name="cancelButton"><i class="glyphicon glyphicon-remove-sign"></i> Cancel</button>
                        </div>
					</div>
              	</form>
			<hr>
			</div><!--/tab-pane-->
		</div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
                                                      
<script type="text/javascript">
$(document).ready(function() {

    
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.avatar').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $(".file-upload").on('change', function(){
        readURL(this);
    });
});
</script>
</body>
</html>
