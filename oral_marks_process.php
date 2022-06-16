<?php
	session_start();
	extract($_REQUEST);
	include('Connections/connection.class.php');
	$con = connect();
	
	$date = date("Y-m-d");
	
	$username=$_SESSION['username'];
	
	if($idoralmark != null){
		$queryupdate="update oral_marks set total_mark=$total_mark, level=$level, status='SUBMITTED', submitted_by='$username', submitted_dt='$date' where id=$idoralmark";
		mysql_query($queryupdate,$con);
	}else{
		$queryinsert="insert into oral_marks (total_mark, level, status, submitted_dt, submitted_by, student_id) values ($total_mark, $level, 'SUBMITTED', '$date', '$username', $studentid)";
		mysql_query($queryinsert,$con);
		$id_oral_marks=mysql_insert_id();
	}
	
?>
<script>
alert('Saved!');
window.location.href='page.php?menushort=oral_main';
</script>
