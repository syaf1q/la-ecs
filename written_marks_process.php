<?php
	session_start();
	extract($_REQUEST);
	include('Connections/connection.class.php');
	$con = connect();
	
	$date = date("Y-m-d");
	
	$username=$_SESSION['username'];
	
	if($idwrittenmark != null){
		$queryupdate="update written_marks set mark1=$mark1, mark2=$mark2, turnitin=$turnitin, total_mark=$total_mark, level=$level, status='SUBMITTED', submitted_dt='$date' where id=$idwrittenmark";
		mysql_query($queryupdate,$con);
	}else{
		$queryinsert="insert into written_marks (mark1, mark2, turnitin, total_mark, level, status, submitted_dt, student_id) values ($mark1, $mark2, $turnitin, $total_mark, $level, 'SUBMITTED', '$date', $studentid)";
		mysql_query($queryinsert,$con);
		$id_oral_marks=mysql_insert_id();
	}
	
?>
<script>
alert('Saved!');
window.location.href='page.php?menushort=written_main';
</script>
