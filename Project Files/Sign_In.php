<?php
	//connect to database
	include_once('Database.php');
?>
<?php
	
	//check if the logging in user is a registered user to open his profile
	if (isset($_POST['sign_in'])) {
		
		$emaillog = $_POST['Email'];
		$passwordlog = $_POST['Password'];

		$sqllog = "SELECT * FROM user WHERE u_email LIKE '$emaillog' AND u_pwd LIKE '$passwordlog' ";
		$result = $conn->query($sqllog);
		// Mysql_num_row is counting table row
		$count = mysqli_num_rows($result);

		// If result matched $emaillog and $passwordlog, table row must be 1 row
		if($count==1){
			session_start();
			$_SESSION['loggedin'] = true;
			$row = $result->fetch_assoc();
			$_SESSION['username'] = $row['u_fname']; // holds the user first name

			if ($emaillog == 'admin@gmail.com' && $passwordlog == 'admin123') {
				$_SESSION['admin'] = true;
			}
			Header('location:index.php');

		}	
	}
?>

