<?php
	include_once('database.php');

	class Course extends Database{
		function __construct($id) {
			$sql = "SELECT * FROM courses WHERE id = $id;";
			$statement = Database::$db->prepare($sql);
			$statement->execute();
			$data = $statement->fetch(PDO::FETCH_ASSOC);
			if(empty($data)){return;}
			foreach ($data as $key => $value) {
				$this->{$key} = $value;
			}
		}



		public static function add_course($name, $max_degree, $study_year) {

			//new method
			$sql = "INSERT INTO courses (name, max_degree, study_year) VALUES ('$name', '$max_degree', '$study_year')";
			//Database::$db->prepare($sql)->execute([$name], [$max_degree], [$study_year]);
			//try this
			Database::$db->prepare($sql)->execute();

			//old method
			/*$sql = "INSERT INTO courses (name) VALUES (?)";
			$sql = "INSERT INTO courses (max_degree) VALUES (?)";
			$sql = "INSERT INTO courses (study_year) VALUES (?)";
			Database::$db->prepare($sql)->execute([$name]);
			Database::$db->prepare($sql)->execute([$max_degree]);
			Database::$db->prepare($sql)->execute([$study_year]);*/
		}

		
		public function delete_course() { // delete all the record of this id
			$sql = "DELETE FROM courses WHERE id = $this->id;";
			Database::$db->query($sql);
		}

		
		public function save_course() {
			//new method
			$sql = "UPDATE courses SET name = ?,max_degree= ?,study_year=? WHERE id = ?;";
			Database::$db->prepare($sql)->execute([$this->name,$this->max_degree,$this->study_year, $this->id]);

			//old method
			/*$sql = "UPDATE courses SET name = ? WHERE id = ?;";
			$sql = "UPDATE courses SET max_degree = ? WHERE id = ?;";
			$sql = "UPDATE courses SET study_year = ? WHERE id = ?;";
			Database::$db->prepare($sql)->execute([$this->name, $this->id]);
			Database::$db->prepare($sql)->execute([$this->max_degree, $this->id]);
			Database::$db->prepare($sql)->execute([$this->study_year, $this->id]);*/
		}

		public static function all_course($keyword) {
			$keyword = str_replace(" ", "%", $keyword);
			$sql = "SELECT * FROM courses WHERE name like ('%$keyword%');";
			$statement = Database::$db->prepare($sql);
			$statement->execute();
			$courses = [];
			while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
				$courses[] = new Course($row['id']);
			}
			return $courses;
		}

	}

?>