<?php
include("includes/connection.php");


	if(isset($_POST['sign_up'])){

	$first_name = htmlentities(mysqli_real_escape_string($connection,$_POST['first_name']));
	$last_name = htmlentities(mysqli_real_escape_string($connection,$_POST['last_name']));
	$passtemp = htmlentities(mysqli_real_escape_string($connection,$_POST['u_pass']));
	$pass = password_hash($passtemp, PASSWORD_BCRYPT) ;
	$email = htmlentities(mysqli_real_escape_string($connection,$_POST['u_email']));
	$country = htmlentities(mysqli_real_escape_string($connection,$_POST['u_country']));
	$gender = htmlentities(mysqli_real_escape_string($connection,$_POST['u_gender']));
	$birthday = htmlentities(mysqli_real_escape_string($connection,$_POST['u_birthday']));
	$status = "verified";
	$posts = "no";
	$newgid = sprintf('%05d', rand(0, 999999));
	
	$username = strtolower($first_name . "_" . $last_name . "_" . $newgid);
	$check_username_query = "select user_name from users where user_email='$email'";
	$run_username = mysqli_query($connection,$check_username_query);
	

	if(strlen($pass) < 6){

	echo "<script>alert('Password should be minimum 6 characters!')</script>";
	exit();
	}

	$check_email = "select * from users where user_email='$email'";
	$run_email = mysqli_query($connection,$check_email);

	$check = mysqli_num_rows($run_email);

	if($check==1){

	echo "<script>alert('Email already exist, please try another!')</script>";
	echo "<script>window.open('signup.php','_self')</script>";
	exit();
	}
	
	$rand = rand(1, 3); 

		if($rand == 1)
			$profile_pic = "head_red.png";
		else if($rand == 2)
			$profile_pic = "head_sun_flower.png";
		else if($rand == 3)
			$profile_pic = "head_turqoise.png";

	$insert = "insert into users (f_name,l_name,user_name,describe_user,Relationship,user_pass,user_email,user_country,user_gender,user_birthday,user_image,user_cover,user_reg_date,status,posts,recovery_account) values ('$first_name','$last_name','$username','Hello Instagram.This is my default status.','........','$pass','$email','$country','$gender','$birthday','$profile_pic','default_cover.jpg',NOW(),'$status','$posts','bunasonrabakacagiz')";

	$query = mysqli_query($connection,$insert);

	if($query){

	echo "<script>alert('Hello $first_name, your account has been created successfully.')</script>";
	echo "<script>window.open('signin.php','_self')</script>";

	}
	else {

	echo "<script>alert('Registration failed, try again!')</script>";
	echo "<script>window.open('signup.php','_self')</script>";
	}
}
?>
