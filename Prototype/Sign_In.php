<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="Already Have An Acount?">
	<link rel="stylesheet" type="text/css" href="style_sign_in.css">
	<title>Already Have An Acount?</title>
</head>
<body class="body_sign_in">
	<div class="header_sign_in">
		<h1 class="h1-header">Books World</h1>
	</div>
	<div class="sign_in_div">
		<h1>Already Have An Acount?</h1>
		<form class="sign-in-form">
			<label class="email-2">Email</label>
			<br>
			<input class="email-1" type="text" name="email" placeholder="me@email.com">
			<br>
			<label class="password-2">Password</label>
			<br>
			<input class="password-1" type="password" name="Password" placeholder="password">
			<br>
			<input class="submit-2" type="submit" name="Sign in" value="Sign in">
		</form>
		<br>
		<br>
		<a class="donnot_have_an_account" href="Sign_Up_Page.php">Don't have an acount?</a>
	</div>
</body>
</html>