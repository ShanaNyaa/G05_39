<!DOCTYPE html>

<style>
	body{
		 background-color:#e6fff2;
	}
</style>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<html>

<?php
 echo '<title>Mat Car Rental</title>';
 echo '<body>';
  echo '<div style="text-align:center">'; 
 echo '<img src="image/headerbanner.jpg" alt="Mountain View" style="width:80%;height:228px;">';
   
 echo '<h1>Welcome to Mat Car Rental<h1>';
 ?>
 <div class="w3-container">
  <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-green w3-xlarge">Login</button>
  <br><br span class="w3-right w3-padding w3-hide-small w3-small">or<br><a href="#">Register?</a></span>
  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px;">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
      </div>

      <form class="w3-container" action="login/checkLogin.php" method="post">
        <div class="w3-section">
          <label><b>Username</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="username" required>
          <label><b>Password</b></label>
          <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="password" required>
          <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit" name="loginButton">Login</button>
          </div>
      </form>

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
      </div>

    </div>
  </div>
</div>
<?php
 echo '</div>';

echo '</body>';
 ?>
 
 </html>
 
 