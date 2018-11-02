<?php 
	include_once('./controllers/common.php');
	include_once('./components/grade_head.php');
	include_once('./models/grade.php');
	Database::connect('epiz_22932002_school', 'epiz_22932002', 'db2018');
?>
	
	<div style="padding: 10px 0px 10px 0px; vertical-align: text-bottom;">
		<span style="font-size: 125%;">Grades</span>
		<button class="button float-right edit_grade" id="0">Add grade</button>
	</div>

    <table class="table table-striped">
    	<thead>
	    	<tr>
	      		<th scope="col">ID</th>
	      		<th scope="col">Student id</th>
	      		<th scope="col">Course id</th>
	      		<th scope="col">Degree</th>
	      		<th scope="col">Examine at</th>
	      		<th scope="col"></th>
	    	</tr>
	  	</thead>
	  	<tbody>
		  	<?php	
				$grades = Grade::all_grade(safeGet('keywords'));
				foreach ($grades as $grade) {
			?>
    		<tr>
    			<td><?=$grade->id?></td>
    			<td><?=$grade->student_id?></td>
    			<td><?=$grade->course_id?></td>
    			<td><?=$grade->degree?></td>
    			<td><?=$grade->examine_at?></td>
    			<td>
    				<button class="button edit_grade" id="<?=$grade->id?>">Edit</button>&nbsp;
    				<button class="button delete_grade" id="<?=$grade->id?>">Delete</button>
				</td>
    		</tr>
    		<?php } ?>
    	</tbody>
    </table>

<?php include_once('./components/tail.php') ?>

<script type="text/javascript">
	$(document).ready(function() {
		$('.edit_grade').click(function(event) {
			window.location.href = "editgrade.php?id="+$(this).attr('id');
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