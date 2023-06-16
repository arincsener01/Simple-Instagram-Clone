<?php 
session_start();

include("includes/connection.php"); 



	if(isset($_POST['login'])){
	
	$email = htmlentities(mysqli_real_escape_string($connection,$_POST['email']));
	$rawPass = htmlentities(mysqli_real_escape_string($connection,$_POST['pass']));

	$select_user = "select * from users where user_email='$email' AND status='verified'";
	
	$query = mysqli_query($connection, $select_user);
    $user = mysqli_fetch_assoc($query);

	if(password_verify($rawPass, $user["user_pass"]) ){

	$query = mysqli_query($connection,$select_user); 
	
	$check_user = mysqli_num_rows($query);
	}
   
	if($check_user==1){
	
	$_SESSION['user_email']=$email;
	
	echo "<script>window.open('home.php','_self')</script>";
	
	}
	else {
	echo "<script>alert('Wrong information, try again!')</script>";
	}
	
	}
	

?>