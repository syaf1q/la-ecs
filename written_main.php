<?php
	session_start();
	require_once('class/trim_date.php');
	
	$ut=$_SESSION['id'];
?>
<script>
	$(document).ready(function() {
		$('#example').dataTable();
	} );
	
	function addedtotalmark(id, student_id){
		window.location.href='page.php?menushort=written_marks&idwrittenmark='+id+'&studentid='+student_id;
	}
</script>
<div class="container">
  <div class="row">
    <div class="col-md-12">
    	<div class="page-header"><h3>List of Written Candidates</h3></div>
        	<p class="alert alert-info"> <strong>Click on ACTION button to add / update written mark for each candidate</strong></p>
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Student Name</th>
                        <th>Matrix No.</th>
						<th>NRIC</th>
						<th>School</th>
						<th>Program</th>
						<th>Level</th>
						<th>Total Mark</th>
						<th>Code Script</th>
						<th>Status</th>
						<th>Submitted Date</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $count1=1;
                    $query1="select wm.id, s.id as student_id, s.student_name, s.matrix_no, s.nric, s.course, s.school, wm.status, wm.submitted_dt, wm.level, wm.total_mark, wm.code_script
								from student s
								left join written_marks wm on wm.student_id=s.id
								inner join userinfo ui on ui.id=wm.marker_id
								where ui.id=$ut";
                    $res1 = mysql_query($query1,$con);
                    while($rows1 = mysql_fetch_array($res1)){
                ?> 
                
                    <tr>
                        <td><?php echo $count1++; ?></td>
                        <td><?php echo $rows1['student_name']; ?></td>
                        <td><?php echo $rows1['matrix_no']; ?></td>
						<td><?php echo $rows1['nric']; ?></td>
						<td><?php echo $rows1['school']; ?></td>
						<td><?php echo $rows1['course']; ?></td>
						<td><?php echo $rows1['level']; ?></td>
						<td><?php echo $rows1['total_mark']; ?></td>
						<td><?php echo $rows1['code_script']; ?></td>
						<td><?php echo $rows1['status']; ?></td>
						<td><?php echo $rows1['submitted_dt']; ?></td>
                        <td><a href="#" class="glyphicon glyphicon-edit" onclick="addedtotalmark('<?php echo $rows1['id'];?>', '<?php echo $rows1['student_id'];?>')"/></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
		</div>
	</div>
</div>