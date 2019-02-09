<?php
	session_start();
	//connect to databade
	include_once('Database.php');
	$nameErr = $mobileErr = $postalErr = $cityErr = $countryErr = $addressErr = "";
	$count = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if (empty($_POST["name"]))
		{
		  $nameErr = "Name is required";
		}
		else
		{
			$count += 1;
		}
		if (empty($_POST["mobile"]))
		{
			$mobileErr = "Mobile is required";
		}
		else
		{
			$count += 1;
		}
		if (empty($_POST['city']))
		{
			$cityErr = "City is required";
		}
		else
		{
			$count += 1;
		}
		if (empty($_POST['country']))
		{
			$countryErr = "Country is required";
		}
		else
		{
			$count += 1;
		}
		if (empty($_POST['address']))
		{
			$addressErr = "Address is required";
		}
		else
		{
			$count += 1;
		}
		if (empty($_POST['postal_code']))
		{
			$postalErr = "Postal Code is required";
		}
		else
		{
			$count += 1;
		}

		if ($count == 6)
		{
			$_SESSION['checkout'] = 'Congrats! Your order has been placed';
			header('Location:HomePage.php');

			//store data in the database
			$name = $_POST['name'];
			$postal_code = $_POST['postal_code'];
			$mobile = $_POST['mobile'];
			$address = $_POST['address'];
			$city = $_POST['city'];
			$country = $_POST['country'];
			$sql = "INSERT INTO shipping_details (name, address, postal_code, city, state, phone)
			VALUES ('$name', '$address', '$postal_code', '$city', '$country', 'mobile')";
			$result = $conn->query($sql);
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Checkout</title>
	<meta charset="utf-8">
	<meta http-equiv="X_UA_Compatible" content="IE=edge"> <!--use latest rendering engine-->
	<meta name="viewport" content="width = device-width, initial-scale = 1"> <!--set the page width to the size of the device, and set the zoom level to one-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<style type="text/css">
		span
		{
			color: red;
		}
	</style>
</head>
<body>
	<header class="alert alert-primary">
		<h2>Books world</h2>
		<p>Proceed to Checkout</p>
	</header>
		<a class="btn btn-outline-primary" href="HomePage.php">Home</a>
		<div class="nav justify-content-center">

			<form class="form-group mt-2 mt-md-0" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
				<label>First Name</label>
				<span >*<?php echo $nameErr;?></span>
				<input class="form-control mr-sm-2" type="text" name="name" placeholder="Name">
				<label>Mobile</label>
				<span >*<?php echo $mobileErr;?></span>
				<input class="form-control mr-sm-2" type="text" name="mobile" placeholder="012********" ">
				<label>Postal code</label>
				<span >*<?php echo $postalErr;?></span>
				<input type="text" class="form-control mr-sm-2" name="postal_code">
				<label>City</label>
				<span >*<?php echo $cityErr;?></span>
				<input type="text" class="form-control mr-sm-2" name="city">
				<label>Country</label>
				<span >*<?php echo $countryErr;?></span>
				<input type="text" class="form-control mr-sm-2" name="country">
				<label>Shipping and Billing address</label>
				<span >*<?php echo $addressErr;?></span>
				<br>
				<textarea name="address" rows="5" cols="40" name="address"></textarea>
				<br>
				<button class="btn btn-outline-success" name="submit" value="Place order">Place order</button>
		</form>	
		</div>
		

</body>
</html>