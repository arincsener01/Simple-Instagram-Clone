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
	<title><?php echo $user_name?> welcome to your home page!</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles/home_style2.css" media="all"/>
</head>
<body>
<div class="row">
	<div id="insert_post" class="col-sm-12">
		<center>
	  	<form action="home.php?id=<?php echo $user_id;?>" method="post" id="f" enctype='multipart/form-data'>
		<textarea class="form-control" id="content" rows="4" name="content" placeholder="What's in your Mind ?"></textarea><br/>
		<label class="btn btn-warning" id="upload_image_button"> Select Image
		<input type='file' name='upload_image' size="30" />
		</label>
		<button id="btn-post" class="btn btn-success" name="sub">Post</button>
		</form>
		<?php insertPost();?>
		</center>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<center><h2><strong>News Feed</strong></h2><br></center>
		<?php get_posts();?> 
	</div>
</div>
</body>
</html>
<?php } ?>