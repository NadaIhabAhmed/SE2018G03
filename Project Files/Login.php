<?php
	include_once('Sign_In.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
	<meta charset="utf-8">
	<meta http-equiv="X_UA_Compatible" content="IE=edge"> <!--use latest rendering engine-->
	<meta name="viewport" content="width = device-width, initial-scale = 1"> <!--set the page width to the size of the device, and set the zoom level to one-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<style type="text/css">
		.form-control
		{
			width: 300px;
			margin-bottom: 20px;
		}
		.div_semi_total
		{
			width: 350px;
			height: 300px;
		}
		.div_total
		{
			margin-top: 80px;
		}
	</style>

</head>
<body>
	<header class="alert alert-primary">
		<h2>Books World</h2>
    </header>
		<a class="btn btn-outline-primary" href="index.php">Home</a>

    <div class="div_total nav justify-content-center">
		<div class="div_semi_total alert alert-warning">
			<form class="form mt-2 mt-md-0" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    	       	<input class="form-control mr-sm-2" type="text" placeholder="Email" name="Email">
    	       	<input class="form-control mr-sm-2" type="password" placeholder="Password" name="Password">
    	       	<button class="btn btn-outline-success" type="submit" name="sign_in">Sign in</button>
    	       	<a class="btn btn-outline-danger" href="Sign_Up.php">Don't have an account?</a>
    	    </form>			
    	</div>
    </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
