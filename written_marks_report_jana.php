<?php
	ini_set('session.gc_maxlifetime', 10*60*60);
	session_start();
	extract($_REQUEST);
	include('Connections/connection.class.php');
	require_once('class/trim_date.php');
	$con = connect();
	
?>
<div align="center">Written Marks Report </div><br />
<table align="center" border="1" width="100%" style="border-collapse:collapse">
	<tr>
    	<td><b>No</b></td>
        <td><b>Year/Sem</b></td>
        <td><b>School</b></td>
        <td><b>Course</b></td>
        <td><b>Name</b></td>
        <td><b>NRIC</b></td>
		<td><b>Matrix No.</b></td>
		<td><b>Part A</b></td>
		<td><b>Part B</b></td>
		<td><b>Turnit In</b></td>
		<td><b>Total mark</b></td>
		<td><b>Level</b></td>
		<td><b>Status</b></td>
		<td><b>Submitted By</b></td>
		<td><b>Submitted Date</b></td>
    </tr>
    <?php 
	  $count1=1;
	  $query="select s.student_name, s.nric, s.matrix_no, s.course, s.school, s.sem_year, wm.mark1, wm.mark2, wm.turnitin, wm.total_mark, wm.level, wm.status, ui.fullname, wm.submitted_dt
				from student s
				left join written_marks wm on wm.student_id=s.id
				left join userinfo ui on ui.id=wm.marker_id
				where s.sem_year like '$yearsem'
				and s.school like '$school'
				and s.course like '$course'
				and ui.id like '$marker'
			  ";
	  $res=mysql_query($query,connect());
	  while($rows=mysql_fetch_array($res)){

	?>
    <tr>
    	<td><?php echo $count1; ?></td>
    	<td><?php echo $rows['sem_year']; ?></td>
        <td><?php echo $rows['school']; ?></td>
        <td><?php echo $rows['course']; ?></td>
        <td><?php echo $rows['student_name']; ?></td>
		<td><?php echo $rows['nric']; ?></td>
		<td><?php echo $rows['matrix_no']; ?></td>
		<td><?php echo $rows['mark1']; ?></td>
		<td><?php echo $rows['mark2']; ?></td>
		<td><?php echo $rows['turnitin']; ?></td>
		<td><?php echo $rows['total_mark']; ?></td>
		<td><?php echo $rows['level']; ?></td>
		<td><?php echo $rows['status']; ?></td>
		<td><?php echo $rows['fullname']; ?></td>
		<td><?php echo trim_tarikh3($rows['submitted_dt']); ?></td>
    </tr>
    <?php $count1++; } ?>
</table>
