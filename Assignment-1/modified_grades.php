<?php 
	include_once('./controllers/common.php');
	include_once('./components/modified_grades_head.php');
	include_once('./models/grade.php');
	Database::connect('school', 'root', '');
?>
	
	<div style="padding: 10px 0px 10px 0px; vertical-align: text-bottom;">
		<span style="font-size: 125%;">Modified grades</span>
		<!--<button class="button float-right edit_grade" id="0">Add grade</button>-->
		<br>
		<form action="modified_grades.php" class="form-inline mt-2 mt-md-0">
			<label>Select students or course:&nbsp &nbsp &nbsp </label>
            <input class="form-control mr-sm-2" type="text" name="keywords" placeholder="Search" aria-label="Search" value="<?=safeGet('keywords')?>">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <br>
	</div>

    <table class="table table-striped">
    	<thead>
	    	<tr>
	      		<!--<th scope="col">ID</th>-->
	      		<th scope="col">Student name</th>
	      		<th scope="col">Course name</th>
	      		<th scope="col">Degree</th>
	      		<!--<th scope="col">Examine at</th>
	      		<th scope="col"></th>-->
	    	</tr>
	  	</thead>
	  	<tbody>
		  	<?php	
				$grades = Grade::all_grade_new(safeGet('keywords')); /*i'm supposed to make a new function */
				foreach ($grades as $grade) {
			?>
    		<tr>
    			<!--<td><?=$grade->id?></td>-->
    			<td><?=$grade->s_name?></td>
    			<td><?=$grade->c_name?></td>
    			<td><?=$grade->degree?></td>
    			<!--<td><?=$grade->examine_at?></td>
    			<td>
    				<button class="button edit_grade" id="<?=$grade->id?>">Edit</button>&nbsp;
    				<button class="button delete_grade" id="<?=$grade->id?>">Delete</button>
				</td>-->
    		</tr>
    		<?php } ?>
    	</tbody>
    </table>

<?php include_once('./components/tail.php') ?>

<script type="text/javascript">
	$(document).ready(function() {
		$('.edit_grade').click(function(event) {
			window.location.href = "editgrade.php?id="+$(this).attr('id'); /*i'm supposed to make a new edit file i guess*/
		});
	
		$('.delete_grade').click(function(){
			var anchor = $(this);
			$.ajax({
				url: './controllers/deletegrade.php',
				type: 'GET',
				dataType: 'json',
				data: {id: anchor.attr('id')},
			})
			.done(function(reponse) {
				if(reponse.status==1) {
					anchor.closest('tr').fadeOut('slow', function() {
						$(this).remove();
					});
				}
			})
			.fail(function() {
				alert("Connection error.");
			})
		});
	});
</script>