<?php
	include_once('Database.php');

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$bookname = $_POST['bookname'];
		$bookdescription = $_POST['bookdescription'];
		$bookauthor = $_POST['bookauthor'];
		$bookisbn = $_POST['bookisbn'];
		$bookprice = $_POST['bookprice'];
		$bookcover = "images/" . $_POST['bookcover'];
		$sql = "INSERT INTO book (b_name, b_isbn, b_price, b_img, b_description, b_author)
				VALUES ('$bookname', '$bookisbn', '$bookprice', '$bookcover', '$bookdescription', '$bookauthor')";
		$conn->query($sql);
	}

	

?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Book</title>
	<meta charset="utf-8">
	<meta http-equiv="X_UA_Compatible" content="IE=edge"> <!--use latest rendering engine-->
	<meta name="viewport" content="width = device-width, initial-scale = 1"> <!--set the page width to the size of the device, and set the zoom level to one-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<header class="alert alert-primary">
		<h2>Books world</h2>
	</header>
		<a class="btn btn-outline-primary" href="index.php">Home</a>

		<?php
			if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
			{ /*If user has logged in*/
				echo "Welcome " . $_SESSION['username'];
				echo"<br>";
				echo "<a class ='btn btn-outline-danger justify-content-end' href='Logout.php'>Logout</a>"; /*logout button*/
			}
		?>
		<div class="nav justify-content-center">
			<form class="form-group" method="POST" action="Admin_Add_Book.php">
				<label>Book's Name</label>
				<input type="text" class="form-control mr-sm-2" name="bookname">
				<label>Description</label>
				<input type="text" class="form-control mr-sm-2" name="bookdescription">
				<label>Author</label>
				<input type="text" class="form-control mr-sm-2" name="bookauthor">
				<label>ISBN</label>
				<input type="text" class="form-control mr-sm-2" name="bookisbn">
				<label>Price</label>
				<input type="text" class="form-control mr-sm-2" name="bookprice">
				<label>Book's Cover</label>
				<input type="file" class="btn btn-outline-primary" name="bookcover">
				<input type="submit" class="btn btn-outline-primary" name="addbook">
			</form>
		</div>
		
</body>
</html>