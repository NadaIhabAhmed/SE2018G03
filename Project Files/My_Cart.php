<?php 
session_start();
include_once('Database.php');

?>
 

<!DOCTYPE html>
<html>
<head>
	
	<title>Exchange your book</title>
	<title>Books World</title>
	<meta charset="utf-8">
	<meta http-equiv="X_UA_Compatible" content="IE=edge"> <!--use latest rendering engine-->
	<meta name="viewport" content="width = device-width, initial-scale = 1"> <!--set the page width to the size of the device, and set the zoom level to one-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
</head>
<body>
	<header class="alert alert-primary">
		<h2>Books world</h2>
		<p>My Cart</p>
	</header>
	<a class="btn btn-outline-primary" href="Index.php">Home</a>
		
	<?php
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
		{ /*If user has logged in*/
			echo "Welcome " . $_SESSION['username'];
			echo"<br>";
			echo "<a class ='btn btn-outline-danger justify-content-end' href='Logout.php'>Logout</a>"; /*logout button*/
		}
		else
		{
			header('Location:Login.php');
		}
	?>
		 
	
	<?php 
	
		$items = $_SESSION['cart'];
		$cartitems = explode(",", $items);

		$items_2 = $_SESSION['cart_2'];
		$cartitems_2 = explode(",", $items_2);
	?>
		
		  <h3 class="alert alert-warning">My Cart</h3>
		  <table class="table">
		  	<tr>
		  		<th>S.NO</th>
		  		<th>Book</th>
		  		<th>Item Name</th>
		  		<th>Price</th>
		  		<th></th>
		  	</tr>
			<?php
			$total = '';
			$i=1;
			 foreach ($cartitems as $key=>$id) {
				$sql = "SELECT * FROM book WHERE b_id = $id";
				$res=$conn->query($sql);
				$r = $res->fetch_assoc();
			?>	  	
		  	<tr>
		  		<td><?php echo $i; ?></td>
		  		<td><?php echo "<img width='50' hight='50' src=".$r['b_img'].">" ;?></td>
		  		<td> <?php echo $r['b_name']; ?></td>
		  		<td><?php echo $r['b_price']; ?>L.E.</td>
		  		<td><a class="btn btn-outline-danger" href="Delete_Cart.php?remove=<?php echo $key; ?>">Remove</a></td>
		  	</tr>
			<?php 
				$total = $total + $r['b_price'];
				$i++; 
				} 
			?>
			<tr>
				<td><strong>Total Price</strong></td>
				<td><strong><?php echo $total; ?>L.E.</strong></td>
				<td><a href="Shop.php" class="btn btn-outline-success">Continue Shopping</a></td>
				<!--<td><a href="Checkout.php" class="btn btn-outline-danger">Checkout</a></td>-->
			</tr>
		  </table>
		  <h3 class="alert alert-warning">Exhcange Books Cart</h3>
		   <table class="table">
		  	<tr>
		  		<th>S.NO</th>
		  		<th>Book</th>
		  		<th>Item Name</th>
		  		<th></th>
		  	</tr>
			<?php
			 foreach ($cartitems_2 as $key=>$id_2) {
				$sql = "SELECT * FROM exchangebook WHERE e_id = $id_2";
				$res=$conn->query($sql);
				$r = $res->fetch_assoc();
			?>	  	
		  	<tr>
		  		<td><?php echo $i; ?></td>
		  		<td><?php echo "<img width='50' hight='50' src=images/".$r['e_img'].">" ;?></td>
		  		<td> <?php echo $r['e_name']; ?></td>
		  		<td><a class="btn btn-outline-danger" href="Delete_Cart_2.php?remove=<?php echo $key; ?>">Remove</a></td>
		  	</tr>
			<?php 
				$i++; 
				} 
			?>
			<tr>
				<td><a href="Shop_2.php" class="btn btn-outline-success">Exchange another book</a></td>
				<td><a href="Checkout.php" class="btn btn-outline-primary">Checkout</a></td>
			</tr>
		  </table>


		
</body>
</html>