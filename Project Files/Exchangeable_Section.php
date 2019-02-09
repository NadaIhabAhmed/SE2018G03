<?php
	include_once('Database.php'); // Database connection
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Shop</title>
	<meta charset="utf-8">
	<meta http-equiv="X_UA_Compatible" content="IE=edge"> <!--use latest rendering engine-->
	<meta name="viewport" content="width = device-width, initial-scale = 1"> <!--set the page width to the size of the device, and set the zoom level to one-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
</head>
<body>
	<header class="alert alert-primary">
		<h2>Books world</h2>
	</header>
	<a class="btn btn-outline-primary" href="Index.php">Home</a>

		<?php
			if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { /*If user has logged in*/
				echo "Welcome " . $_SESSION['username'];
				echo"<br>";
				echo "<a class ='btn btn-outline-danger justify-content-end' href='Logout.php'>Logout</a>"; /*logout button*/
			}

			echo"<div class='nav justify-content-center'>"; /*start of a div*/
			//mysql query
			$sql = "SELECT b_name, b_description, b_author, b_isbn, b_price, b_img, b_id
			FROM book";
			$result = $conn->query($sql);
			echo "<table class='table'>"; /*start of a table*/
			echo "<tr> <th>Book</th> <th>Book name</th> <th>Author</th> <th>ISBN</th> <th>Price</th> <th></th></tr>";
			if ($result->num_rows > 0)
			{
			    // output data of each row

			    while($row = $result->fetch_assoc())
			    {
			        echo "<tr>" ."<td>"."<img src='" . $row['b_img']. "' width='50' hight='50'>". "</td>" . "<td>". $row["b_name"]. "</td>". "<td>". $row["b_author"]. "</td>". "<td>".
			        $row["b_isbn"]. "</td>". "<td>". $row["b_price"]. "</td>". "<td>"."<a href='Book.php?id=".$row['b_id']."' class='btn btn-outline-danger' name='buybook'>Exchange With</a>"."</td>";

			    if (isset($_SESSION['admin']) && $_SESSION['admin'] == true)
			    { /*If the logged in user is the Admin*/
			    	echo"<td>"."<a href='Admin.php?id=".$row['b_id']."'class='btn btn-outline-danger' name='delete'>Delete Book</a>"."</td>"; /*Delete button appears only for the Admin*/
				}
			    echo"</tr>";
			    }
			}
			else
			{
			    echo "0 results";
			}

			echo "</table>";
			echo "<a href='My_Cart.php'class='btn btn-outline-success'>My Cart</a>";

			if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) { /*If the logged in user is the Admin*/
			    echo"<a href='Admin_Add_Book.php' class='btn btn-outline-success' name='add'>Add Book</a>"; /*Add button appears only for the Admin*/
			}

			$conn->close(); // connection closed

			echo"</div>"; /*End of div*/
		?>
		
</body>
</html>
	