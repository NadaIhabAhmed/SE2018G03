<?php
	include_once('Sign_In.php');
	session_start();
	include_once('Head.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Books World</title>
	<meta charset="utf-8">
	<meta http-equiv="X_UA_Compatible" content="IE=edge"> <!--use latest rendering engine-->
	<meta name="viewport" content="width = device-width, initial-scale = 1"> <!--set the page width to the size of the device, and set the zoom level to one-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<style type="text/css">
		
		.form-control-2
		{
			width: 300px;
		}
		
		.nav-link
		{
			font-size: 20px;
		}
		.form-control
		{
			width: 300px;
		}
	
		h4
		{
			color: #ff80ff;
			display: inline;
		}
		.foot
		{
			background-color: lightblue;
		}
		.alert
   		{
   		  margin-bottom: 0px;
   		}
	</style>
</head>
<body>
		<nav class="navbar navbar-expand-lg navbar-light alert" style="background-color: #e3f2fd;" >
			<?php
	  			// if any user is logged in then a message will br diplays says welcome user
				
				if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
				{
				    echo "Welcome " . $_SESSION['username'];
				    echo "&nbsp &nbsp &nbsp &nbsp &nbsp";
				   	if (isset($_SESSION['checkout']) && $_SESSION['checkout'] == true)
				   	{
				   		echo "<h4 class='order'>" . $_SESSION['checkout'] . "<h4>";
				   	}

				    echo"<br>";
				    echo "<a class ='btn btn-outline-secondary justify-content-end' href='Logout.php'>Logout</a>";
				}
			?>
         	<form class="form-inline my-2 my-lg-0">
         	   <a class="btn btn-outline-danger" href="Login.php">Sign In</a>
         	   <a class="btn btn-outline-danger" href="Sign_Up.php">Don't have an account?</a>
         	</form>
     
     
		</nav>
	<div class="body_home">
				
    </div>
 		   <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
 		 <div class="carousel-inner">
 		   <div class="carousel-item active">
 		     <img src="images/lovely_2.png" class="d-block w-100" alt="..." width="3000" height="600">
 		   </div>
 		   <div class="carousel-item">
 		     <img src="images/wall6.jpg" class="d-block w-100" alt="..." width="3000" height="600">
 		   </div>
 		   <div class="carousel-item">
 		     <img src="images/wall5.jpg" class="d-block w-100" alt="..."width="3000" height="600">
 		   </div>
 		 </div>
 		 <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
 		   <span class="carousel-control-prev-icon" aria-hidden="true"></span>
 		   <span class="sr-only">Previous</span>
 		 </a>
 		 <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
 		   <span class="carousel-control-next-icon" aria-hidden="true"></span>
 		   <span class="sr-only">Next</span>
 		 </a>
	</div>
	<footer >
			<h6 class="nav justify-content-center foot">By SE2018G03 / NIA <?php echo date("Y") ;?></h6>
	</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>