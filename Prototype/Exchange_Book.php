<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="Exchange your book">
	<link rel="stylesheet" type="text/css" href="Style_Exchange_Book.css">
	<title>Exchange your book</title>
</head>
<body class="body_exchange_book">
	<!--............................................................................... -->
			<?php include 'upload_validation.php' ;?>
	<!--............................................................................... -->
	<div class="header_exhange_book">
		<h1 class="h1-header">Books World 
			<?php
				for($i = 0; $i < 50; $i++)
				{
					echo "&nbsp"; // leave spaces between the main title (Books World) and subtitle (Lets Exchange Books)
				}
			?>

		 <span class="h2_header">Lets Exchange Books :)</span> </h1> <!--End of header h1-header-->
	</div>
	<div class="exchange_book_div_center">
		<form class="exchanged_book_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
			<img class="exchange_book_img" src="" width="150px" height="150px">
			<br>
			<br>
			<label class="book_name_label">Book's name:</label>
			<br>
			<input class="book_name" type="text" name="book_name">
			<span class="error">*<?php echo $booknameErr ;?></span>
			<br>
			<br>
			<label class="upload_book_photo">Upload book's photo:</label>
			<br>
			<input type="file" name="exchanged_book" id="exchanged_book">
			<span class="error">* </span>
			<br>
			<br>
			<label class="description">Book's description:</label>
			<br>
			<textarea class="textarea_description" name="description_area" rows="8" cols="80"></textarea>
			<span class="error">* <?php echo $descriptionErr ;?></span>
			<br>
			<input class="exchange_button" type="submit" name="exchange_with" value="Exchange With"><!--this buttom is supposed to direct the user to the exchangeable books' section 
			to choose any book he likes in exchange to the uploaded book -->
			<span><?php echo $uploaded ;?></span>
		</form>
	</div>
	
</body>
</html>