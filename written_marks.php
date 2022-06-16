<?php
	session_start();
	extract($_REQUEST);
	require_once('class/trim_date.php');
	require_once('Connections/connection.class.php');
	$con = connect();
	
?>
<script>
	function goBack() {
		window.location.href='page.php?menushort=written_main';
	}
	
	function tukar(){
		var mark1 = Number(document.getElementById("mark1").value);
		var mark2 = Number(document.getElementById("mark2").value);
		var turnitin = Number(document.getElementById("turnitin").value);
		var total_mark = mark1+mark2-turnitin;
		alert(Number(total_mark));
		
		if(Number(total_mark) != ""){
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
			}else if((total_mark<0) || (total_mark>=0 && total_mark <=16)){
				document.getElementById("level").value="1";
			}else if(total_mark>100){
				alert('Invalid total mark');
				document.getElementById("level").value="";
			}
			document.getElementById("total_mark").value=total_mark;
		}else{
			alert('Null total mark');
		}
	}
	
</script>



<form id="form1" name="form1" method="post" action="written_marks_process.php">
<input type="hidden" id="idwrittenmark" name="idwrittenmark" value="<?php echo $idwrittenmark; ?>" />
<input type="hidden" id="studentid" name="studentid" value="<?php echo $studentid; ?>" />
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div align="right">
      <button type="button" onclick="goBack()" class="btn btn-primary">Back <span class="glyphicon glyphicon-backward" aria-hidden="true"></span></button>
      <button type="submit" class="btn btn-success">Save <span class="glyphicon glyphicon-floppy-open" aria-hidden="true"></span></button>
      </div>
	  
		<?php
		if($idwrittenmark != null){
			$sql="select * from written_marks where id = $idwrittenmark";
			$query=mysql_query($sql,connect());
			$row=mysql_fetch_array($query);
			$total_mark=$row['total_mark'];
			$level = $row['level'];
			$mark1 = $row['mark1'];
			$mark2 = $row['mark2'];
			$turnitin = $row['turnitin'];
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
        <label for="nama_pelanggan">Part A<font color="#FF0000"><b>*</b></font></label>
		<input type="number" class="form-control" id="mark1" name="mark1" onchange=tukar() value="<?php echo $mark1; ?>" />
      </div>
	  <div class="form-group">
        <label for="nama_pelanggan">Part B<font color="#FF0000"><b>*</b></font></label>
		<input type="number" class="form-control" id="mark2" name="mark2" onchange=tukar() value="<?php echo $mark2; ?>" />
      </div>
	  <div class="form-group">
        <label for="nama_pelanggan">Turn it in Mark <font color="#FF0000"><b>*</b></font></label>
		<input type="number" class="form-control" id="turnitin" name="turnitin" onchange=tukar() value="<?php echo $turnitin; ?>" />
      </div>
	  <div class="form-group">
        <label for="nama_pelanggan">Total Mark </label>
		<input type="number" class="form-control" id="total_mark" name="total_mark" readonly value="<?php echo $total_mark; ?>" />
      </div>
	  <div class="form-group">
        <label for="nama_pelanggan">Level </label>
		<input type="number" class="form-control" id="level" name="level" readonly value="<?php echo $level; ?>" />
      </div>
  	</div>
  </div>
</div>
</form>