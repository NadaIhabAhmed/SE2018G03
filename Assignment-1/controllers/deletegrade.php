/*<?php
	header('Content-Type: application/json; charset=utf-8');
	include_once("../models/grade.php");
	Database::connect('school', 'root', '');
	$grade = new grade($_GET['id']);
	$grade->delete_grade();
	echo json_encode(['status'=>1]);
?>
