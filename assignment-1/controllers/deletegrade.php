<?php
	header('Content-Type: application/json; charset=utf-8');
	include_once("../models/grade.php");
	Database::connect('epiz_22932002_school', 'epiz_22932002', 'db2018');
	$grade = new grade($_GET['id']);
	$grade->delete_grade();
	echo json_encode(['status'=>1]);
?>
