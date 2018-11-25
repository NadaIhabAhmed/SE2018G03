<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="Already Have An Acount?">
	<link rel="stylesheet" type="text/css" href="Style_Proceed_To_Checkout.css">
	<title>My Cart</title>
</head>
<body class="body_proceed_to_checkout">
	<div class="header_proceed_to_checkout">
		<h1 class="h1-header">Books World</h1>
	</div>
	<div class="div_proceed_to_checkout">
		<h1 class="h1_proceed_to_checkout">Checkout</h1>
		<form name = "register" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<label class="name-s">First Name</label>
			<br>
			<input class="name-i" type="text" name="name" placeholder="Name" " >
			
			<br>
			<label class="mobile-s">Mobile</label>
			<br>
			<input class="mobile-i" type="text" name="Mobile" placeholder="012********" ">
			<br>
			<label class="postal_code_s">Postal code</label>
			<br>
			<input type="text" class="postal_code_i" name="postal_cose">
			<br>
			<label class="city_s">City</label>
			<br>
			<input type="text" class="city_i" name="city">
			<br>
			<label class="country_s">Country</label>
			<br>
			<input type="text" class="country_i" name="country">
			<br>
			<label class="address-s">Shipping address</label>
			<br>
			<textarea name="address" rows="5" cols="40"></textarea>
			<br>
			<label class="address-s">Billing address</label>
			<br>
			<textarea name="address" rows="5" cols="40"></textarea>
			<br>
			<input class="submit-1" type="submit" name="continue" value="Continue">
			<br>
		</form>
	</div>
</body>
</html>