<?php 
	include_once("./controllers/common.php");
	include_once('./components/head.php');
	include_once('./models/grade.php');
	$id = safeGet('id');
	Database::connect('epiz_22932002_school', 'epiz_22932002', 'db2018');
	$grade = new Grade($id);
?>

    <h2 class="mt-4"><?=($id)?"Edit":"Add"?> Grade</h2>

    <form action="controllers/savegrade.php" method="post">
    	<input type="hidden" name="id" value="<?=$grade->get('id')?>">
		<div class="card">
			<div class="card-body">
				<div class="form-group row gutters">
					<label for="inputEmail3" class="col-sm-2 col-form-label">Student id</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="student_id" value="<?=$grade->get('student_id')?>" required>
					</div>
					<label for="inputEmail3" class="col-sm-2 col-form-label">Course id</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="course_id" value="<?=$grade->get('course_id')?>" required>
					</div>
					<label for="inputEmail3" class="col-sm-2 col-form-label">Degree</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="degree" value="<?=$grade->get('degree')?>" required>
					</div>
					<label for="inputEmail3" class="col-sm-2 col-form-label">Examine at</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="examine_at" value="<?=$grade->get('examine_at')?>" required>
					</div>
				</div>
		    	<div class="form-group">
		    		<button class="button float-right" type="submit">Add</button>
		    	</div>
		    </div>
		</div>
    </form>

<?php include_once('./components/tail.php') ?>