<?php
	include_once("../controllers/common.php");
	include_once("../models/course.php");
	Database::connect('school', 'root', '');
	$id = safeGet("id", 0);
	if($id==0)
	{
		Course::add_course($_POST['name'], $_POST['max_degree'], $_POST['study_year']);
	}
	else
	{
		$course = new Course($id);
		$course->name = safeGet("name");
		$course->max_degree = safeGet("max_degree");
		$course->study_year = safeGet("study_year");
		$course->save_course();
	}
	header('Location: ../courses.php');
?>

