<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Instagram Clone Login | Sign Up</title>
</head>
<style>
	body{
		overflow-x: hidden;
		overflow-y: hidden;
	}
	#centered1 {
    position: absolute;
    font-size:10vw;
    top: 30%;
    left: 30%;
    transform: translate(-50%, -50%);
	}
	#centered2 {
    position: absolute;
    font-size:10vw;
    top: 50%;
    left: 40%;
    transform: translate(-50%, -50%);
	}
	#centered3 {
    position: absolute;
    font-size:10vw;
    top: 70%;
    left: 30%;
    transform: translate(-50%, -50%);
	}
	#signup{
		width: 60%;
		border-radius: 30px;
	}
	#login{
		width: 60%;
		background-color: #fff;
		border: 1px solid #1da1f2;
		color: #1da1f2;
		border-radius: 30px;
	}
	#login:hover{
		width: 60%;
		background-color: #fff;
		color: #1da1f2;
		border: 2px solid #1da1f2;
		border-radius: 30px;
	}
	.well{
		background-color: #187FAB;
	}
	/* img{
		display:flex;
		justify-content: center;
		align-items: center;
	} */

</style>
<body>
    <div class="row">
        <div class="col-sm12">
            <div class="well">
                <center><h1 style="color:white;">Instagram</h1></center>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6" style="left:0.5%;">
            <img src="images/instagram3.png" alt="" style="height:20%"; class="img-rounded" title="instagram" >
        </div>
        <div class="col-sm-6" style="left: 8%;">
				
				<img src="images/world1.avif" class="img-rounded" title="Instagram" height="10%">
				<h2><strong>See what's happening in <br> the world right now</strong></h2><br><br>
				<h4><strong>Join Instagram Today.</strong></h4>
				<form method="post" action="">
					<button id="signup" class="btn btn-info btn-lg" name="signup">Sign up</button><br><br>
					<?php
						if(isset($_POST['signup'])){
							echo"<script>window.open('signup.php','_self')</script>";
						}
					?>
					<button id="login" class="btn btn-primary btn-lg" name="login">Login</button>
					<?php
						if(isset($_POST['login'])){
							echo"<script>window.open('signin.php','_self')</script>";
						}
					?>
				</form>
			</div>
    </div>
</body>
</html>