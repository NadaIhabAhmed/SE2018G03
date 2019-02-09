<!DOCTYPE html>
<html>
<head>
	<title>Sign Up Now</title>
	<meta charset="utf-8">
	<meta http-equiv="X_UA_Compatible" content="IE=edge"> <!--use latest rendering engine-->
	<meta name="viewport" content="width = device-width, initial-scale = 1"> <!--set the page width to the size of the device, and set the zoom level to one-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<style type="text/css">
		.form-control
		{
			width: 400px;
			margin-bottom: 10px;
		}
		.Address
		{
			height: 100px;
		}
		.error
		{
			color: red;
		}
	</style>
</head>
<body>
	<header class="alert alert-primary">
		<h2>Books world</h2>
	</header>
		<a class="btn btn-outline-primary" href="Index.php">Home</a>
	<div class="">
		<div class="nav justify-content-center">
			<p>Join us and sign up here :')</p>
		</div>
		<div class="d-flex justify-content-center">
			<!----------------------------------------------------------------------------------------------------->
			<?php
				include_once('Sign_Up_Validation.php');
			?>
			<!----------------------------------------------------------------------------------------------------->


			<form class="form-group mt-2 mt-md-0" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
				<span class="error">* <?php echo $emailErr;?></span>
				<label>Email:</label>
        	    <input class="form-control mr-sm-2 Email" type="text" placeholder="Email" name="Email" value=" <?php echo $Email?>">
				<span class="error">* <?php echo $passwordErr;?></span>
				<label>Password:</label>
        	   	<input class="form-control mr-sm-2 Password" type="password" placeholder="Password" name="Password">
        	   	<span class="error">* <?php echo $conpasswordErr;?></span>
				<label>Confirm Password:</label>
        	   	<input class="form-control mr-sm-2 Confirm_Password" type="password" placeholder="Confirm Password" name="Confirm_Password">
        	   	<span class="error">* <?php echo $fnameErr;?></span>
				<label>First Name:</label>
        	    <input class="form-control mr-sm-2 First_Name" type="text" placeholder="First Name" name="First_Name" value="<?php echo $First_Name?>">
        	    <span class="error">* <?php echo $lnameErr;?></span>
				<label>Last Name:</label>
        	    <input class="form-control mr-sm-2 Last_Name" type="text" placeholder="Last Name" name="Last_Name" value="<?php echo $Last_Name?>">
				<label>Date of birth:</label>
        	    <select name="day">
        	    	<?php
        	    		for($day = 1; $day < 32; $day = $day + 1)
        	    		{
        	    			echo "<option>" . $day . "</option>";
        	    		}
        	    	?>
        	    </select>
        	    <select name="month">
        	    	<?php
        	    		for($month = 1; $month < 13; $month = $month + 1)
        	    		{
        	    			echo "<option>" . $month . "</option>";
        	    		}
        	    	?>
        	    </select>
        	    <select name="year">
        	    	<?php
        	    		for($year = 1930; $year < 2019; $year = $year + 1)
        	    		{
        	    			echo "<option>" . $year . "</option>";
        	    		}
        	    	?>
        	    </select>
        	    <br>
				<label>Gender:</label>
        	    <select name="Gender">
        	    	<?php
        	    		echo "<option>Female</option>";
        	    		echo "<option>Male</option>";
        	    	?>
        	    </select>
        	    <br>
				<label>Phone Number:</label>
        	    <input class="form-control mr-sm-2 Phone_Number" type="text" placeholder="Phone Number" name="Phone_Number" value="<?php echo $Phone_Number?>">
        	    <span class="error">* <?php echo $mobileErr;?></span>
				<label>Adderss:</label>
        	    <input class="form-control mr-sm-2 Address" type="text" placeholder="Address" name="Address" value="<?php echo $Address?>">
        	    <span class="error">* <?php echo $addressErr;?></span>
        	   	<button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="sign_in">Sign in</button>
       		</form>
			
		</div>
	</div>


</body>
</html>


