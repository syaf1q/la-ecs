<?php
	session_start();
	extract($_REQUEST);
	require_once('class/trim_date.php');
	require_once('Connections/connection.class.php');
	$con = connect();
	
?>
<script>
	function goBack() {
		window.location.href='page.php?menushort=oral_main';
	}
	
	function tukar(){
		var total_mark = document.getElementById("total_mark").value;
		if(total_mark != ""){
			if(total_mark>=85 && total_mark<=100){
				document.getElementById("level").value="6";
			}else if(total_mark>=69 && total_mark <=84){
				document.getElementById("level").value="5";
			}else if(total_mark>=53 && total_mark <=68){
				document.getElementById("level").value="4";
			}else if(total_mark>=33 && total_mark <=52){
				document.getElementById("level").value="3";
			}else if(total_mark>=17 && total_mark <=32){
				document.getElementById("level").value="2";
			}else if(total_mark>=0 && total_mark <=16){
				document.getElementById("level").value="1";
			}else if(total_mark>100){
				alert('Invalid total mark');
				document.getElementById("level").value="";
			}
		}else{
			alert('Null total mark');
		}
	}
</script>



<form id="form1" name="form1" method="post" action="oral_marks_process.php">
<input type="hidden" id="idoralmark" name="idoralmark" value="<?php echo $idoralmark; ?>" />
<input type="hidden" id="studentid" name="studentid" value="<?php echo $studentid; ?>" />
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div align="right">
      <button type="button" onclick="goBack()" class="btn btn-primary">Back <span class="glyphicon glyphicon-backward" aria-hidden="true"></span></button>
      <button type="submit" class="btn btn-success">Save <span class="glyphicon glyphicon-floppy-open" aria-hidden="true"></span></button>
      </div>
	  
		<?php
		if($idoralmark != null){
			$sql="select * from oral_marks where id = $idoralmark";
			$query=mysql_query($sql,connect());
			$row=mysql_fetch_array($query);
			$total_mark=$row['total_mark'];
			$level = $row['level'];
			$student_id = $row['student_id'];
		}
		
		$sql1="select * from student where id = $student_id";
		$query1=mysql_query($sql1,connect());
		$row1=mysql_fetch_array($query1);
		$student_name = $row1['student_name'];
		$matrix_no = $row1['matrix_no'];
		$course = $row1['course'];
		$school = $row1['school'];
		$sem_year = $row1['sem_year'];
		?>
		
	  <div class="form-group">
		<label>Student Name: <?php echo $student_name;?></label><br>
		<label>Year/Semester: <?php echo $sem_year;?></label><br>
		<label>School: <?php echo $school;?></label><br>
		<label>Course: <?php echo $course;?></label><br>
		<label>Matrix No: <?php echo $matrix_no;?></label><br>
	  </div>
      <div class="form-group">
        <label for="nama_pelanggan">Total Mark <font color="#FF0000"><b>*</b></font></label>
		<input type="number" class="form-control" id="total_mark" name="total_mark" onchange=tukar() value="<?php echo $total_mark; ?>" />
      </div>
      <div class="form-group">
        <label for="nama_pasangan">Level</label>
        <input type="text" class="form-control" id="level" name="level" readonly="readonly" value="<?php echo $level; ?>" />
      </div>
  	</div>
  </div>
</div>
</form>