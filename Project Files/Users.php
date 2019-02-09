<?php
	include_once('Database.php'); // Database connection
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Users</title>
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
			$sql = "SELECT u_fname, u_lname, u_gender, u_email, u_id, u_contact, u_city
			FROM user";
			$result = $conn->query($sql);
			echo "<table class='table'>"; /*start of a table*/
			echo "<tr> <th>First Name</th> <th>Last Name</th> <th>Email</th> <th>Mobile</th> <th>City</th> <th></th></tr>";
			if ($result->num_rows > 0)
			{
			    // output data of each row

			    while($row = $result->fetch_assoc())
			    {
			        echo "<tr>" ."<td>".$row["u_fname"]. "</td>" . "<td>". $row["u_lname"]. "</td>". "<td>". $row["u_email"]. "</td>". "<td>".
			        $row["u_contact"]. "</td>". "<td>". $row["u_city"]. "</td>". "<td>"."<a href='Admin_User.php?id=".$row['u_id']."'class='btn btn-outline-danger' name='delete'>Delete User</a>"."</td>" . "</tr>";
			    }
			}
			else
			{
			    echo "0 results";
			}

			echo "</table>";
			$conn->close(); // connection closed

			echo"</div>"; /*End of div*/
		?>
		
</body>
</html>
	
