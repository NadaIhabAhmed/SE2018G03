<?php
	include_once("../controllers/common.php");
	include_once("../models/grade.php");
	Database::connect('school', 'root', '');
	$id = safeGet("id", 0);
	if($id==0) {
		Grade::add_grade($_POST['student_id'], $_POST['course_id'], $_POST['degree'], $_POST['degree']);// i added this sentence ($_POST['name'])
	} else {
		$Grade = new Grade($id);
		$Grade->student_id = safeGet("student_id");
		$Grade->course_id = safeGet("course_id");
		$Grade->degree = safeGet("degree");
		$Grade->degree = safeGet("examine_at");

		$Grade->save_grade();
	}
	header('Location: ../grades.php');
?>