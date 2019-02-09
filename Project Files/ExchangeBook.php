<?php
	
	$booknameErr = $descriptionErr = $uploadErr = "";
	$count = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if (empty($_POST["book_name"]))
		{
		  $booknameErr = "Book name is required";
		}
		else
		{
			$count += 1;
		}
		if (empty($_POST["description_area"]))
		{
			$descriptionErr = "Description is required";
		}
		else
		{
			$count += 1;
		}
		if ($_FILES['exchanged_book']['size'] == 0 )
		{
		    $uploadErr = "you must upload book cover";
		}
		else
		{
			$count += 1;
		}

		if ($count == 3)
		{
			$_SESSION['var'] = true;
			header('Location:Shop_2.php');
		}
	}
?>
<?php
	//connect to database
	include_once('Database.php'); 
	//if exchange_with button i spressed
	if (isset($_POST['exchange_with'])) {
		//the path to store the uploaded images
		$target = 'uploads/' . basename($_FILES['exchanged_book']['name']);

		//get all the submitted data from the form
		$image = $_FILES['exchanged_book']['name'];
		$description = $_POST['description_area'];
		$b_name = $_POST['book_name'];

		$sql = "INSERT INTO exchangebook (e_name, e_img, e_description) VALUES ('$b_name', '$image', '$description')";

		//store the submitted data in the database
		$result = $conn->query($sql);

		//move the uploaded image to the folder named 
		if (move_uploaded_file($_FILES['exchanged_book']['tmp_name'], $target)) {
			$msg = "image uploaded syccessfully";
		}
		else{
			$msg = "there was a problem in uploading the image";
		}

	}

	
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
	<style type="text/css">
		.span_uploaded
		{
			display: block;
		}
		
		.error
		{
			color: red;
		}
		.div_img
		{
			display: block;
		}
	</style>
</head>
<body>
	<header class="alert alert-primary">
		<h2>Books world</h2>
		<p>Let's Exchange Books :')</p>
	</header>
	<a class="btn btn-outline-primary" href="HomePage.php">Home</a>
		
	

		<?php
			session_start();
			if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
			{ /*If user has logged in*/
				echo "Welcome " . $_SESSION['username'];
				echo"<br>";
				echo "<a class ='btn btn-outline-danger justify-content-end' href='Logout.php'>Logout</a>"; /*logout button*/
			}
			echo"<div class='nav justify-content-center'>";
			echo"<br>";
			if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
			{
				/*$sql = "SELECT * FROM exchangebook";
				$result = $conn->query($sql);
				while($row = $result->fetch_assoc())
				{
					echo"<div class='div_img'><img src='images/".$row['e_img']."' width='100' hight='50'></div>";
				}*/
		
				echo"<br>";
				echo"<form class='form-group mt-2 mt-md-0'  method='post' enctype='multipart/form-data'>
					<input type='hidden' name='size' value='10000'> <!--where the image will appear-->
					<br>
					<label>Book's name:</label>
					<span class='error'>* $booknameErr </span>
					<input class='form-control mr-sm-2' type='text' name='book_name'> <!--write book name here-->
					<label>Upload book's photo:</label>
					<input class='btn btn-outline-primary' type='file' name='exchanged_book'> <!--insert image here-->
					<span class='error'>* $uploadErr </span>
					<br>
					<label>Book's description:</label>
					<span class='error'>* $descriptionErr </span>
					<br>
					<textarea name='description_area' rows='8' cols='80'></textarea> <!--write description here-->
					<input class='btn btn-outline-warning' type='submit' name='exchange_with' value='Exchange With'>
					
					</form>";

			}
			else
			{
				header('Location:Login.php');
			}
			echo"</div>"
		?>
	

	

</body>
</html>


