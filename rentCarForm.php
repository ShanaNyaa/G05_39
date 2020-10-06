<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Member Rent Car Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        @import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
@media(min-width:768px) {
    body {
        margin-top: 50px;
    }
    /*html, body, #wrapper, #page-wrapper {height: 100%; overflow: hidden;}*/
}

#wrapper {
    padding-left: 0;    
}

/*#page-wrapper {
    width: 100%;        
    padding: 0;
    background-color: #fff;
}*/

@media(min-width:768px) {
    #wrapper {
        padding-left: 225px;
    }

    #page-wrapper {
        padding: 22px 10px;
    }
}

/* Top Navigation */

.top-nav {
    padding: 0 15px;
}

.top-nav>li {
    display: inline-block;
    float: left;
}

.top-nav>li>a {
    padding-top: 20px;
    padding-bottom: 20px;
    line-height: 20px;
    color: #fff;
}

.top-nav>li>a:hover,
.top-nav>li>a:focus,
.top-nav>.open>a,
.top-nav>.open>a:hover,
.top-nav>.open>a:focus {
    color: #fff;
    background-color: #1a242f;
}

.top-nav>.open>.dropdown-menu {
    float: left;
    position: absolute;
    margin-top: 0;
    /*border: 1px solid rgba(0,0,0,.15);*/
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    background-color: #fff;
    -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
    box-shadow: 0 6px 12px rgba(0,0,0,.175);
}

.top-nav>.open>.dropdown-menu>li>a {
    white-space: normal;
}

/* Side Navigation */

@media(min-width:768px) {
    .side-nav {
        position: fixed;
        top: 60px;
        left: 225px;
        width: 225px;
        margin-left: -225px;
        border: none;
        border-radius: 0;
        border-top: 1px rgba(0,0,0,.5) solid;
        overflow-y: auto;
        background-color: #222;
        /*background-color: #5A6B7D;*/
        bottom: 0;
        overflow-x: hidden;
        padding-bottom: 40px;
    }

    .side-nav>li>a {
        width: 225px;
        border-bottom: 1px rgba(0,0,0,.3) solid;
    }

    .side-nav li a:hover,
    .side-nav li a:focus {
        outline: none;
        background-color: #1a242f !important;
    }
}

.side-nav>li>ul {
    padding: 0;
    border-bottom: 1px rgba(0,0,0,.3) solid;
}

.side-nav>li>ul>li>a {
    display: block;
    padding: 10px 15px 10px 38px;
    text-decoration: none;
    /*color: #999;*/
    color: #fff;    
}

.side-nav>li>ul>li>a:hover {
    color: #fff;
}

.navbar .nav > li > a > .label {
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  position: absolute;
  top: 14px;
  right: 6px;
  font-size: 10px;
  font-weight: normal;
  min-width: 15px;
  min-height: 15px;
  line-height: 1.0em;
  text-align: center;
  padding: 2px;
}

.navbar .nav > li > a:hover > .label {
  top: 10px;
}

.navbar-brand {
    padding: 5px 15px;
}

body {
		background: url("assets/img/hero-bg.jpg") no-repeat center center fixed;
		background-size: cover;
	}
    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
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
?>
<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="memberHomepage.php">
                <img src="http://placehold.it/200x50&text=HOME" alt="LOGO">
            </a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">           
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Member User <b class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="profile.php"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="index.html"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="memberCarList.php"><i class="fa fa-fw fa-car"></i> Car List</a>
                </li>
                <li>
                    <a href="memberBookingList.php"><i class="fa fa-fw fa-book"></i> Booking List</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main">
                <div class="col-sm-4 col-md-6 well well-sm" style="background-color: #343A40; color: white; text-align: center; border-radius: 5px; box-shadow: 2px 2px 5px #000000" id="content">
                    <h1 style="text-shadow: 2px 2px 5px #000000">Location</h1>
                    <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7968.133560232437!2d101.755948!3d3.076843!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf4a4c4afb051143a!2sPUBLIC%20AUTO%20WORLD%20SDN%20BHD!5e0!3m2!1sen!2sus!4v1596375673300!5m2!1sen!2sus" frameborder="0" style="border:0; width: 100%; height: 350px;" allowfullscreen></iframe>
                </div>
                    <div class="col-sm-4 col-md-6 well well-sm" style="background-color: #343A40; color: white; text-align: center; border-radius: 5px; box-shadow: 2px 2px 5px #000000">
                        <h1 style="text-shadow: 2px 2px 5px #000000">Car Information</h1>
                        <?php
                            echo '<form action="processCar.php" method="post">';
                                echo '<p style="text-shadow: 2px 2px 5px #000000; font-size: 24px; padding-right: 7px">Plate: <input class="text-muted" type="text" name="plateNumber" value="'.$plateNumber.'" readonly>';
                                echo '<p style="text-shadow: 2px 2px 5px #000000; font-size: 24px; padding-right: 19px">Name: <input class="text-muted" type="text" name="carName" value="'.$carName.'" readonly>';
                                echo '<p style="text-shadow: 2px 2px 5px #000000; font-size: 24px; padding-right: 18px">Brand: <input class="text-muted" type="text" name="brand" value="'.$brand.'" readonly>';
                                echo '<p style="text-shadow: 2px 2px 5px #000000; font-size: 24px; padding-right: 25px">Colour: <input class="text-muted" type="text" name="colour" value="'.$colour.'" readonly>';
                                echo '<p style="text-shadow: 2px 2px 5px #000000; font-size: 24px; padding-left: 0px">Year: <input class="text-muted" type="text" name="year" value="'.$year.'" readonly>';
                            echo '</form>';
                        ?>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-sm-7 col-md-7">
                    <div class="container">
                    </div>
                </div>
                    <div class="col-sm-4 col-md-4 well well-sm" style="background-color: #343A40; color: white; text-align: center; border-radius: 5px; box-shadow: 2px 2px 5px #000000">
                        <h1 style="text-shadow 2px 2px 5px #000000">Rent</h1>
                        <?php
                            echo '<form action="processCar.php" method="post" style="color: black">';
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
                        ?>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<script type="text/javascript">
$(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $(".side-nav .collapse").on("hide.bs.collapse", function() {                   
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-right").addClass("fa-angle-down");
    });
    $('.side-nav .collapse').on("show.bs.collapse", function() {                        
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");        
    });
})    
</script>
</body>
</html>
