<?php
  // Create database connection
include_once('Database.php');

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($conn, $_POST['image_text']);

  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO readingcommunity (image, image_text) VALUES ('$image', '$image_text')";
  	// execute query
    $conn->query($sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $sql_2 = "SELECT * FROM readingcommunity";
  $result = $conn->query($sql_2);
?>
<!DOCTYPE html>
<html>
<head>
<title>Reading Community</title>
  <meta charset="utf-8">
  <meta http-equiv="X_UA_Compatible" content="IE=edge"> <!--use latest rendering engine-->
  <meta name="viewport" content="width = device-width, initial-scale = 1"> <!--set the page width to the size of the device, and set the zoom level to one-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</style>
</head>
<body>
  <header class="alert alert-primary">
    <h2>Books world</h2>
  </header>
  <a class="btn btn-outline-primary" href="Index.php">Home</a>
  <div class="container">
    <p class="alert alert-warning">Upload Book's cover in which you want to write a review for</p>
  <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img width='60' hight='60' src='images/".$row['image']."' >";
      	echo "<p>".$row['image_text']."</p>";
      echo "</div>";
    }
  ?>
  
    
     <form class="form-group" method="POST" action="Reading_Community.php" enctype="multipart/form-data">
        <input type="hidden" name="size" value="1000000">
        <input type="file" name="image" class="btn btn-outline-primary">
        <textarea id="text" cols="40" rows="4"  name="image_text" placeholder="Share your opinion with us :') " class="form-control"></textarea>
        <button type="submit" name="upload" class="btn btn-outline-primary">POST</button>
    </form>
  </div>
 
</body>
</html>