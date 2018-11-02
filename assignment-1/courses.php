<?php 
	include_once('./controllers/common.php');
	include_once('./components/course_head.php');
	include_once('./models/course.php');
	Database::connect('epiz_22932002_school', 'epiz_22932002', 'db2018');
?>
	
	<div style="padding: 10px 0px 10px 0px; vertical-align: text-bottom;">
		<span style="font-size: 125%;">Courses</span>
		<button class="button float-right edit_course" id="0">Add course</button>
	</div>

    <table class="table table-striped">
    	<thead>
	    	<tr>
	      		<th scope="col">ID</th>
	      		<th scope="col">Name</th>
	      		<th scope="col">Max Degree</th>
	      		<th scope="col">Study year</th>
	      		<th scope="col"></th>
	    	</tr>
	  	</thead>
	  	<tbody>
		  	<?php	
				$courses = Course::all_course(safeGet('keywords'));
				foreach ($courses as $course) {
			?>
    		<tr>
    			<td><?=$course->id?></td>
    			<td><?=$course->name?></td>
    			<td><?=$course->max_degree?></td>
    			<td><?=$course->study_year?></td>
    			<td>
    				<button class="button edit_course" id="<?=$course->id?>">Edit</button>&nbsp;
    				<button class="button delete_course" id="<?=$course->id?>">Delete</button>
				</td>
    		</tr>
    		<?php } ?>
    	</tbody>
    </table>

<?php include_once('./components/tail.php') ?>

<script type="text/javascript">
	$(document).ready(function() {
		$('.edit_course').click(function(event) {
			window.location.href = "editcourse.php?id="+$(this).attr('id');
		});
	
		$('.delete_course').click(function(){
			var anchor = $(this);
			$.ajax({
				url: './controllers/deletecourse.php',
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


