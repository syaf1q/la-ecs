<?php

session_start();
extract($_REQUEST);
include('Connections/connection.class.php');
$con = connect();
	
//$filename = "C:\tmp\SYS_CALON_ECS WRITING-update_2.csv";
//$filename = "SYS_CALON_ECS WRITING-update_2.csv";
$filename = "ECS_STUDENT_DATA_TN_BATCH_3_2.csv";
 
//Open the file.
$fileHandle = fopen($filename, "r");

//Loop through the CSV rows.
while (($row = fgetcsv($fileHandle, 0, ",")) !== FALSE) {
    //Print out my column data.
    
	/*
	echo 'Sekolah: ' . $row[0] . '<br>';
    echo 'Programe: ' . $row[1] . '<br>';
    echo 'No KP: ' . $row[2] . '<br>';
	echo 'No Matrix: ' . $row[3] . '<br>';
	echo 'Name: ' . $row[4] . '<br>';
	echo 'Code script: ' . $row[5] . '<br>';
	echo 'Marker: ' . $row[6] . '<br>';
    echo '<br>';
	*/
	
	
	
	$sql1="select * from userinfo where username = '$row[6]'";
	$query1=mysql_query($sql1,$con);
	$row1=mysql_fetch_array($query1);
	$marker_id = $row1['id'];
	
	
	$queryinsert1="insert into student (student_name, nric, matrix_no, course,  school, sem_year) values ('$row[4]', '$row[2]', '$row[3]', '$row[1]', '$row[0]', '20212022/2');";
	mysql_query($queryinsert1,$con);
	$id_student=mysql_insert_id();
	echo $queryinsert1;echo '<br>';
	
	$queryinsert2="insert into written_marks (student_id, mark1, mark2, mark3, turnitin, status, marker_id, code_script) values ('$id_student', 0, 0, 0, 0, 'NEW', '$marker_id', '$row[5]');";
	mysql_query($queryinsert2,$con);
	$id_written_marks=mysql_insert_id();
	echo $queryinsert2;echo '<br>';
	
}
?>