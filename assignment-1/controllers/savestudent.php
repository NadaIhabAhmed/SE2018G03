<?php
	include_once("../controllers/common.php");
	include_once("../models/student.php");
	Database::connect('epiz_22932002_school', 'epiz_22932002', 'db2018');
	$id = safeGet("id", 0);
	if($id==0)
	{
		Student::add($_POST['name']);// i added this sentence ($_POST['name'])
	}
	else
	{
		$student = new Student($id);
		$student->name = safeGet("name");
		$student->save();
	}
	header('Location: ../students.php');
?>