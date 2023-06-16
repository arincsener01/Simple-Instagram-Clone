<!DOCTYPE html>
<?php
session_start();
include("includes/header.php");

if(!isset($_SESSION['user_email'])){
  
  header("location: index.php");

}
else{ ?>
<html>
<head>
	<?php 
		$user = $_SESSION['user_email'];
		$get_user = "select * from users where user_email='$user'"; 
		$run_user = mysqli_query($connection,$get_user);
		$row=mysqli_fetch_array($run_user);
					
		$user_id = $row['user_id']; 
		$user_name = $row['user_name'];
		?>
		<title><?php echo"$user_name"; ?></title>
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	    <link rel="stylesheet" href="styles/home_style2.css" media="all"/>
</head>
<style>
#cover-img{
	height:400px;
   	width:100%;
}
#profile_img{
	position: absolute;
	top: 160px;
	left: 40px;
}
#update_profile{
  	position: absolute;
  	top: 150px;
  	cursor: pointer;
  	left: 93px;
  	border-radius: 4px;
  	background-color: rgba(0,0,0,0.1);
  	transform: translate(-50%, -50%);
}
#button_profile{
  	position: absolute;
  	top: 115%;
  	left: 50%;
  	cursor: pointer;
  	transform: translate(-50%, -50%);
}
#own_posts{
    border: 5px solid #e6e6e6;
    padding: 40px 50px;
}
#posts_img {
    height:300px;
   	width:100%;
}


</style>
<body>
<div class="row">
	<div class="col-sm-2">
	</div>
	<div class="col-sm-8">
          <?php
          echo "
         	<div>
				<div><img id='cover-img' class='img-rounded' src='cover/$user_cover' alt='cover'/></div>
				<form action='profile.php?user_id=$user_id' method='post' enctype='multipart/form-data'>
					<ul class='nav pull-left' style='position: absolute;top: 10px;left: 40px;'>
				    	<li class='dropdown'>
				        	<button class='dropdown-toggle btn btn-default' data-toggle='dropdown'>Change Cover</button> 
				        	<div class='dropdown-menu'>
				        		<center>
				        		<p> Click <strong>Select Cover</strong> and then click the <br> <strong>Update Cover</strong></p>
				            	<label class='btn btn-info'> Select Cover
						        <input type='file' name='u_cover' size='60' />
						        </label><br><br>
				                <button name='submit' class='btn btn-info'>Update cover</button>
				            	</center>
				            </div>
				        </li>
				    </ul>
	          	</form>
			</div>
         	<div id='profile_img'>
	            <img src='users/$user_image' alt='Profile' class='img-circle' width='180px' height='185px' />
	            <form action='profile.php?user_id=$user_id' method='post' enctype='multipart/form-data'>
	            <label id='update_profile'> Select Profile
	            <input type='file' name='u_image' size='60' />
	            </label>
	            <button id='button_profile' name='update' class='btn btn-info'>Update Profile</button>
	            </form>
          	</div><br>
          "; ?>

           <?php 

            if(isset($_POST['submit'])){

              $u_cover = $_FILES['u_cover']['name'];
              $image_tmp = $_FILES['u_cover']['tmp_name'];
              $random_number = rand(1,100);

              if($u_cover==''){
                // echo "<script>alert('Please Select Cover Image!')</script>";
                echo "<script>window.open('profile.php?user_id=$user_id','_self')</script>";
                exit();
              }else{
              
              move_uploaded_file($image_tmp,"cover/$u_cover.$random_number");
              
              $update = "update users set user_cover='$u_cover.$random_number' where user_id='$user_id'";
              
              $run = mysqli_query($connection,$update); 
              
            //   if($run){
              
            //   echo "<script>alert('Your Cover Updated!')</script>";
            //   echo "<script>window.open('profile.php?user_id=$user_id','_self')</script>";
            //   }
            }
            
            }


          ?>
          </div>
          <?php 

            if(isset($_POST['update'])){

              $u_image = $_FILES['u_image']['name'];
              $image_tmp = $_FILES['u_image']['tmp_name'];
              $random_number = rand(1,100);

              if($u_image==''){
                // echo "<script>alert('Please Select Profile Image on clicking on the profile image area!')</script>";
                echo "<script>window.open('profile.php?user_id=$user_id','_self')</script>";
                exit();
              }else{
              
              move_uploaded_file($image_tmp,"users/$u_image.$random_number");

              
              $update = "update users set user_image='$u_image.$random_number' where user_id='$user_id'";
              
              $run = mysqli_query($connection,$update); 
              
              if($run){
              
            //   echo "<script>alert('Your Profile Updated!')</script>";
              echo "<script>window.open('profile.php?user_id=$user_id','_self')</script>";
              }
            }
            
            }


          ?>
    <div class="col-sm-2">
	</div>
</div>
<?php
    function generateRandomColor() {
        $color = '#';
        $color .= str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT);
        $color .= str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT);
        $color .= str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT);
        return $color;
    }
    $color=generateRandomColor();
?>
<div class="row">
	<div class="col-sm-2">
	</div>
	<div class="col-sm-2" style="background-color: <?php echo $color ?>; text-align: center; left:0.8%; border-radius: 5px;">
		<?php
		echo"
		<center><h2><strong>Personal Info</strong></h2></center><br>
		<center><h4><strong>$first_name $last_name</strong></h4></center>
        <p><strong><i style='white;'> $describe_user</i></strong></p><br>
        <p><strong>From: </strong> $user_country</p><br>
        <p><strong>Member Since: </strong> $register_date</p><br>
        <p><strong>Gender: </strong>  $user_gender</p><br>
        <p><strong>Date Of Birth: </strong>  $user_birthday</p><br>
        ";
        ?>
	</div>
	<div class="col-sm-6">
		<!--Displaying Users own Posts-->

		<?php
			global $connection;
	
			if(isset($_GET['user_id'])){
			$user_id = $_GET['user_id'];
			}
			$get_posts = "select * from posts where user_id='$user_id' ORDER by 1 DESC LIMIT 5";
			
			$run_posts = mysqli_query($connection,$get_posts);
			
			while($row_posts=mysqli_fetch_array($run_posts)){
		
			$post_id = $row_posts['post_id'];
			$user_id = $row_posts['user_id'];
			$content = $row_posts['post_content'];
			$upload_image = $row_posts['upload_image'];
			$post_date = $row_posts['post_date'];
			
			//getting the user who has posted the thread
			
			$user = "select * from users where user_id='$user_id' AND posts='yes'"; 
			
			$run_user = mysqli_query($connection,$user); 
			$row_user=mysqli_fetch_array($run_user);
			
			$user_name = $row_user['user_name'];
			$user_image = $row_user['user_image'];
			
			//now displaying all at once 

			if($content=="No" && strlen($upload_image) >= 1){
			echo "
			<div id='own_posts'>
				<div class='row'>
					<div class='col-sm-2'>
						<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
					</div>
					<div class='col-sm-6'>
						<h3><a style='text-decoration: none;cursor: pointer;color: #3897f0;' href='user_profile.php?user_id=$user_id'>$user_name</a></h3>
						<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
					</div>
					<div class='col-sm-4'>
						
					</div>
				</div>
				<div class='row'>
					<div class='col-sm-12'>
						<img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
					</div>
				</div><br>
				<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-success'>View</button></a>
				<a href='functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a>
			</div><br/><br/>
			";


			}
			else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
			echo "
			<div id='own_posts'>
				<div class='row'>
					<div class='col-sm-2'>
						<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
					</div>
					<div class='col-sm-6'>
						<h3><a style='text-decoration: none;cursor: pointer;color: #3897f0;' href='user_profile.php?user_id=$user_id'>$user_name</a></h3>
						<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
					</div>
					<div class='col-sm-4'>
						
					</div>
				</div>
				<div class='row'>
					<div class='col-sm-12'>
						<p>$content</p>
						<img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
					</div>
				</div><br>
				<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-success'>View</button></a>
				<a href='functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a>
			</div><br/><br/>
			";


			}
			else{

			echo "
			
			<div id='own_posts'>
				<div class='row'>
					<div class='col-sm-2'>
						<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
					</div>
					<div class='col-sm-6'>
						<h3><a style='text-decoration: none;cursor: pointer;color: #3897f0;' href='user_profile.php?user_id=$user_id'>$user_name</a></h3>
						<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
					</div>
					<div class='col-sm-4'>
						
					</div>
				</div>
				<div class='row'>
					<div class='col-sm-2'>
					</div>
					<div class='col-sm-6'>
						<h3><p>$content</p></h3>
					</div>
					<div class='col-sm-4'>
						
					</div>
				</div>
			";
			global $connection;
	
			if(isset($_GET['user_id'])){
			$user_id = $_GET['user_id'];
			}
			$get_posts = "select user_email from users where user_id='$user_id'";
			$run_user = mysqli_query($connection,$get_posts);
			$row=mysqli_fetch_array($run_user);

			$user_email = $row['user_email'];

			$user = $_SESSION['user_email'];
			$get_user = "select * from users where user_email='$user'"; 
			$run_user = mysqli_query($connection,$get_user);
			$row=mysqli_fetch_array($run_user);
					
			$user_id = $row['user_id'];
			$u_email = $row['user_email'];

			if($u_email != $user_email){
				echo"<script>window.open('profile.php?user_id=$user_id','_self')</script>";
			}else{

			echo"
				<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-success'>View</button></a>
				<a href='edit_post.php?post_id=$post_id' style='float:right;'><button  class='btn btn-info'>Edit</button></a>
				<a href='functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a>
			</div><br/><br/><br/>
			";
			}
		}
			include("functions/delete_post.php");
			
		}
	

		?>


	</div>
	<div class="col-sm--2">
		
	</div>
</div>	
</body>
</html>
<?php } ?>