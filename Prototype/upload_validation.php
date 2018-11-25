<?php

$uploaded = ""; // A variable that will hold a massage
$booknameErr = $descriptionErr = "";
$bookname = $description = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	
	//.........................................check image...............................................................................
	$target_dir = "uploads/"; // Specifies the directory where the file (book's image) is going to be placed
	// Concatinating the folder to the path
	$target_file = $target_dir . basename($_FILES["exchanged_book"]["name"]); // Specifies the path of the file to be uploaded
	$uploadOk = 1; // Flag variable
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); // convert file path into lowercase
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"]))
	{
	    $check = getimagesize($_FILES["exchanged_book"]["tmp_name"]);
	    if($check !== false)
	    {
	        $uploaded = "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    }
	    else
	    {
	        $uploaded = "File is not an image.";
	        $uploadOk = 0;
	    }
	}
	
	// Check if file already exists
	// This check to avoid search conflicts... only one unique name exists to one unique photo
	if (file_exists($target_file))
	{
	    $uploaded = "Sorry, file already exists.";
	    $uploadOk = 0;
	}
	
	// Check file size
	if ($_FILES["exchanged_book"]["size"] > 500000)
	{
	    $uploaded = "Sorry, your file is too large.";
	    $uploadOk = 0;
	}
	
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
	{
	    $uploaded = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadOk = 0;
	}
	
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0)
	{
	    $uploaded = "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	}
	else
	{
	    if (move_uploaded_file($_FILES["exchanged_book"]["tmp_name"], $target_file))
	    {
	        $uploaded = "The file ". basename( $_FILES["exchanged_book"]["name"]). " has been uploaded.";
	    }
	    else
	    {
	        $uploaded = "Sorry, there was an error uploading your file.";
	    }
	}
	
	
	//....................................................validating input fields..........................................................
	
	
	if (empty($_POST["book_name"]))
	{
	  $booknameErr = "Book name is required";
	}
	else
	{
	  $bookname = test_input($_POST["book_name"]);
	}
	
	if (empty($_POST["description_area"]))
	{
		$descriptionErr = "Description is required";
	}
	else
	{
		$description = test_input($_POST["description_area"]);
	}
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
