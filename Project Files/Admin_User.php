<?php
//Here the Admin can delete Users

$id = $_GET['id'];
include_once('Database.php');
//Create query based on the ID passed from you table
//query : delete where book_id = $id
// on success delete : redirect the page to original page using header() method

// sql to delete a record
$sql = "DELETE FROM user WHERE u_id = $id"; 
$conn->query($sql);
header('Location: Users.php'); //If book.php is your main page where you list your all records


?>