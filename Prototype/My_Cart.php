<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="Already Have An Acount?">
	<link rel="stylesheet" type="text/css" href="Style_My_Cart.css">
	<title>My Cart</title>
</head>
<body class="body_my_cart">
	<div class="header_my_cart">
		<h1 class="h1-header">Books World</h1>
	</div>
	<div class="div_cart_table">
		<h1 class="h1_my_cart">My Cart</h1>
		<table class="cart_table">
			<thead>
				<tr class="tr_head">
					<td>No.</td>
					<td>Product</td>
					<td>Quantity</td>
					<td>Price</td>
					<td>Delete</td>
				</tr>
			</thead>
			<tbody>
				<!--here i must write a foreach loop that loops the entire database and then prints every book in the data base-->
			</tbody>
			<tfoot>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td class="total">Total:</td>
				</tr>
			</tfoot>
		</table>
		<a class="proceed_to_checkout" href="Proceed_To_Checkout.php" >Proceed to checkout</a>
	</div>
</body>
</html>