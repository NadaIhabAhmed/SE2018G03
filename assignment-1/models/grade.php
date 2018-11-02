<?php
	include_once('database.php');

	class Grade extends Database{
		function __construct($id) {
			$sql = "SELECT * FROM grades WHERE id = $id;";
			$statement = Database::$db->prepare($sql);
			$statement->execute();
			$data = $statement->fetch(PDO::FETCH_ASSOC);
			if(empty($data)){return;}
			foreach ($data as $key => $value) {
				$this->{$key} = $value;
			}
		}

		public static function add_grade($student_id, $course_id, $degree, $examine_at) {

			//new method
			$sql = "INSERT INTO grades (student_id, course_id, degree, examine_at) VALUES ('$student_id', '$course_id', '$degree', '$examine_at')";
			//Database::$db->prepare($sql)->execute([$student_id], [$course_id], [$degree], [$examine_at]);
			//try this
			Database::$db->prepare($sql)->execute();

			//old method
			/*$sql = "INSERT INTO grades (student_id) VALUES (?)";
			$sql = "INSERT INTO grades (course_id) VALUES (?)";
			$sql = "INSERT INTO grades (degree) VALUES (?)";
			$sql = "INSERT INTO grades (examine_at) VALUES (?)";
			Database::$db->prepare($sql)->execute([$student_id]);
			Database::$db->prepare($sql)->execute([$course_id]);
			Database::$db->prepare($sql)->execute([$degree]);
			Database::$db->prepare($sql)->execute([$examine_at]);*/
		}

		
		public function delete_grade() { // delete all the record of this id
			$sql = "DELETE FROM grades WHERE id = $this->id;";
			Database::$db->query($sql);
		}
		
		public function save_grade() { //save the record of this id

			//new method
			$sql = "UPDATE grades SET student_id = ?, course_id = ?, degree = ?, examine_at = ? WHERE id = ?;";
			Database::$db->prepare($sql)->execute([$this->student_id, $this->course_id, $this->degree, $this->examine_at, $this->id]);
			//old method
			/*$sql = "UPDATE grades SET student_id = ? WHERE id = ?;";
			$sql = "UPDATE grades SET course_id = ? WHERE id = ?;";
			$sql = "UPDATE grades SET degree = ? WHERE id = ?;";
			$sql = "UPDATE grades SET examine_at = ? WHERE id = ?;";
			Database::$db->prepare($sql)->execute([$this->student_id, $this->id]);
			Database::$db->prepare($sql)->execute([$this->course_id, $this->id]);
			Database::$db->prepare($sql)->execute([$this->degree, $this->id]);
			Database::$db->prepare($sql)->execute([$this->examine_at, $this->id]);*/
		}

		public static function all_grade($keyword) {
			$keyword = str_replace(" ", "%", $keyword);
			$sql = "SELECT * FROM grades WHERE degree like ('%$keyword%');";
			$statement = Database::$db->prepare($sql);
			$statement->execute();
			$grades = [];
			while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
				$grades[] = new Grade($row['id']);
			}
			return $grades;
		}
	
		public static function all_grade_new($keyword) {
			$keyword = str_replace(" ", "%", $keyword);
			//$sql = "SELECT * FROM grades WHERE degree like ('%$keyword%');";
			//joining three tables from the database 
			//i was supposed to link more than three fields but this seemed better
			$sql = "SELECT courses.name AS c_name, students.name AS s_name, grades.degree AS degree
					FROM grades
					INNER JOIN students ON students.id=grades.student_id
					INNER JOIN courses ON courses.id=grades.course_id
					WHERE (students.name LIKE ('%$keyword%') OR courses.name LIKE ('%$keyword%') ) ;";
			//same as the dr's
			$statement = Database::$db->prepare($sql);
			$statement->execute();
			//from w3 school website
			return $statement->fetchAll(PDO::FETCH_OBJ);
		}
	}
?>

