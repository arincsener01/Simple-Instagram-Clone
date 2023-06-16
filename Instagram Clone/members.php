<!DOCTYPE html>
<?php
session_start();
include("includes/header.php");
?>
<?php

if(!isset($_SESSION['user_email'])){

	header("location: index.php");

}
else{ ?>
<html>
<head>
	<title>Find Your Friends</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles/home_style2.css" media="all"/>
    <style>
        /* img{
            height: 25%;
            position: absolute;
        } */
    </style>
</head>
<body>
<div class="row">
	<div class="col-sm-12">
		<center><h2>Find Your Friends</h2></center><br><br>
        <!-- <img src="images\search-icon.png" alt=""> -->
		<div class="row">
			<div class="col-sm-4">
			</div>
			<div class="col-sm-4">
			<form class="search_form" action="">
			  <input type="text" placeholder="Search Friends" name="search_user">
			  <button class="btn btn-info" type="submit" name="search_user_btn">Search</button>
			</form>
			</div>
			<div class="col-sm-4">
			</div>
		</div><br><br>
		<?php search_user();?>
	</div>
</div>
</body>
</html>
<?php } ?>
