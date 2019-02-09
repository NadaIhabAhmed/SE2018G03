<!---------------------------------------------------------------------->
<!-------------------------For the Exchangeable Section------------------------->
<!---------------------------------------------------------------------->

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
		<p>Let's Exchange Books :')</p>
	</header>
	<a class="btn btn-outline-primary" href="Index.php">Home</a>
		
	

		<?php
			session_start();
			if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
			{ /*If user has logged in*/
				echo "Welcome " . $_SESSION['username'];
				echo"<br>";
				echo "<a class ='btn btn-outline-danger justify-content-end' href='Logout.php'>Logout</a>"; /*logout button*/
			
				
				if(isset($_GET['id_2']) & !empty($_GET['id_2']))
				{
					if(isset($_SESSION['cart_2']) & !empty($_SESSION['cart_2']))
					{
			 
						$items_2 = $_SESSION['cart_2'];
						$cartitems_2 = explode(",", $items_2);
						if(in_array($_GET['id_2'], $cartitems_2)){
							header('location: Shop_2.php?status=incart');
						}
						else
						{
							$items_2 .= "," . $_GET['id_2'];
							$_SESSION['cart_2'] = $items_2;
							header('location: Shop_2.php?status=success');
							
						}
			 
					}
					else
					{
						$items_2 = $_GET['id_2'];
						$_SESSION['cart_2'] = $items_2;
						header('location: Shop_2.php?status=success');
					}
					
				}
				else
				{
					header('location: Shop_2.php?status=failed');
				}
			
			
				}
			else
			{
	   			header('Location:Login.php');
	 		}
	?>
	
</body>
</html>


