<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="description" content="this is a trial page">
		<link rel="stylesheet" type="text/css" href="Style_Home_Page.css">
		<title>Books World</title>
	</head>
	<body>
		<!--.....................................body up............................................-->
		<div class="body-up">
			<!--..................................header...............................................-->
			<div class="header" id="back-to-top">
				<h1 class="h1-header">Books World</h1>
				<div class="div-header">
					<!--.................................sign in form...................................-->
					<form class="sign_in_div" action="user_interface_1.php" method="post">
						<label class="email-2">Email</label>
						<input class="email-1" type="text" name="email" placeholder="me@email.com">
						<label class="password-2">Password</label>
						<input class="password-1" type="password" name="Password" placeholder="password">
						<input class="submit-2" type="submit" name="Sign in" value="Sign in">
					</form>
				</div>
			</div>
			<!--....................................navigation bar......................................-->
			<div class="nav">
				<ul class="ul-1">
					<li><a href = "index.php" class = "home">Home</a></li>
					<li><a href = "Under_Construction.php" class = "aboutus">About us</a></li>
					<li><a href= "Exchange_Book.php" class="exchange_books">Exchange Books</a></li>
					<li><a href= "My_Cart.php" class="mycart">My Cart</a></li>
					<li><a href= "#selected-books" class="shop">Shop</a></li>
				</ul>
			</div>
			<div class="row">
				<div class="left-section up">
					<!--
					<div class="shopping">
						<a href=""><img src="images/onlinestore.png" width="40px" height="40px" title="Let's Shop"></a>
						<a href=""><img src="images/shoppingcart.jpg" width="40px" height="40px" title="My cart"></a>
					</div>
				-->
					<div class="social-media">
						<a href="https://www.facebook.com"><img src="images/facebook.png" title="facebook" width="40px" height="40px"></a>
						<br>
						<a href="https://www.google.com"><img src="images/google.png" title="google" width="40px" height="40px"></a>
						<br>
						<a href="https://www.instagram.com"><img src="images/instagram.png" title="instagram" width="40px" height="40px"></a>
					</div>
				</div>
				<div class="center up">
					<p class="p-center">There is no friend as loyal as a book</p>
					<br>
					<br>
					<form class="search_form">
						<label class="search-field-label" >Search by Book's name, author's name or ISBN</label>
						<input class="search-field" type="text" name="search"  placeholder="search the entire store">
					</form>
				</div>
				<div class="right-section up">

					<a class="donnot_have_an_account" href="Sign_Up_Page.php">Don't have an account?</a>
				</div>
			</div>
		</div>
		<div class="body-middle">
			<div class="row">
				<div class="left-section middle">
				</div>
				<div class="center middle">
					<h1 class="Under_Construction">This section is under construction :')</h1>
					<div class="selected-books" id="selected-books">
						<ul class="ul-selected-books">
							<li><a href=""><img src="images/fangirl.jpg" width="100px" height="100px"  name="fangirl by rainbow rowell"></a></li>
							<li><a href=""><img src="images/hpcursed.jpg" width="100px" height="100px" name="harry potter bu j.k.rolling"></a></li>
							<li><a href=""><img src="images/hgcatching.jpg" width="100px"height="100px"name="hunger games by suzan collins"></a></li>
						</ul>
					</div>
				</div>
				<div class="right-section middle">
					
				</div>
			</div>
		</div>
		<div class="footer">
			<a href="#back-to-top" class="backtotop">Back To top</a>
			<h5 class="h5-footer">By SE2018G03 / NIA <?php echo date("Y") ;?> &copy &reg</h5>
		</div>

	</body>
</html>