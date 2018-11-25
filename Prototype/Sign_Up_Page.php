<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="description" content="Sign up page">
		<link rel="stylesheet" type="text/css" href="Style_Sign_Up.css">
		<title>Sign Up</title>
	</head>
	<body class="body_sign_up">
		<div class="header_sign_up">
			<h1 class="h1-header">Books World</h1>
		</div>
		<div class = "div2">
			<h1 class="h1-s">Join us and sign up here</h1>
			<!--.....................................validation..............................................-->
			<?php include 'Validation_Form_0.php' ;?>
			<!--...................................................................................-->
			<p><span class="error">* required field</span></p>
			<form name = "register" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<label class="name-s">First Name</label>
				<br>
				<input class="name-i" type="text" name="fname" placeholder="First name" value=" <?php echo $fname;?>" >
				<?php
					$_SESSION["fname"] = $fname;
				?>
				<span class="error">* <?php echo $fnameErr;?></span>
				<br>
				<label class="name-s">Last Name</label>
				<br>
				<input class="name-i" type="text" name="lname" placeholder="Last name" value=" <?php echo $lname;?>" >
				<span class="error">* <?php echo $lnameErr;?></span>
				<br>
				<label class="email-s">Email</label>
				<br>
				<input class="email-i" type="text" name="email" placeholder="me@email.com" value="<?php echo $email ;?>">
				<span class="error">* <?php echo $emailErr ;?></span>
				<br>
				<label class="password-s">Password</label>
				<br>
				<input class="password-i" type="password" name="password" placeholder="************" value="<?php echo $password ;?>">
				<span class="error">* <?php echo $passwordErr ;?></span>
				<br>
				<label class="password-s">Confirm Password</label>
				<br>
				<input class="password-i" type="password" name="conpassword" placeholder="************" value="<?php echo $conpassword ;?>">
				<span class="error">* <?php echo $conpasswordErr ;?></span>
				<br>
				<label class="dob-s">Date of birth</label>
				<br>
				<select name="day">
					<?php
						for($day = 1; $day <= 31; $day++)
						{
							echo "<option name='$day'>" . $day . "</option>";
						}
					?>
				</select>
				<select name="month">
					<?php
						for($month = 1; $month <= 12; $month++)
						{
							echo "<option name='$month'>" . $month . "</option>";
						}
					?>
				</select>
				<select name="year">
					<?php 
						for($year = 1950; $year <= 2018; $year++)
						{
							echo "<option value = '$year'>" . $year .  "</option>";
						}
					 ?>
				</select>
				<br>
				<label class="mobile-s">Mobile</label>
				<br>
				<input class="mobile-i" type="text" name="Mobile" placeholder="012********" value="<?php echo $mobile;?>">
				<span class="error">* <?php echo $mobileErr;?></span>
				<br>
				<select class="mf" name="Gender">
					<option value="Female">Female</option>
					<option value="Male">Male</option>
				</select>
				<br>
				<label class="address-s">Address</label>
				<br>
				<textarea name="address" rows="5" cols="40"><?php echo $address;?></textarea>
				<span class="error">* <?php echo $addressErr ;?> </span>
				<br>
				<input class="submit-1" type="submit" name="Sign up" value="Sign up">
				<br>
			</form>
		</div>
	</body>
</html>