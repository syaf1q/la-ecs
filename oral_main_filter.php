<?php
	session_start();
	extract($_REQUEST);
	require_once('class/trim_date.php');
	require_once('Connections/connection.class.php');
	$con = connect();
	
	$ut=$_SESSION['id'];
	
?>
<script>
	$(document).ready(function() {
		$('#example').dataTable();
	} );
	
	function gogo(){
		yearsem = document.getElementById("yearsem").value;
		school = document.getElementById("school").value;
		
		window.location.href='page.php?menushort=oral_main&yearsem='+yearsem+'&school='+school;
	}
</script>

<div class="container">
  <div class="row">
    <div class="col-md-12">
    	<div class="page-header"><h3>Search Oral Candidates</h3></div>
        	<p class="alert alert-info"> <strong>Please select parameters below</strong></p>
		    <div class="form-group">
				<label for="">Year/Sem</label>
            	<select id="yearsem" name="yearsem" class="form-control">
				<option value="">--Select--</option>
				<?php
					$sql1="select distinct sem_year from student";
					$res1 = mysql_query($sql1,$con);
					while($rows1 = mysql_fetch_array($res1)){
				?>
                  <option value="<?php echo $rows1['sem_year']; ?>"><?php echo $rows1['sem_year']; ?></option>
				<?php } ?>
				  <option value="%">All</option>
                </select>
          	</div>
            <div class="form-group">
				<label for="">School</label>
            	<select id="school" name="school" class="form-control">
				<option value="">--Select--</option>
				<?php
					$sql1="select distinct school from student";
					$res1 = mysql_query($sql1,$con);
					while($rows1 = mysql_fetch_array($res1)){
				?>
                  <option value="<?php echo $rows1['school']; ?>"><?php echo $rows1['school']; ?></option>
				<?php } ?>
				  <option value="%">All</option>
                </select>
          	</div>
			
            <p>
				<button type="submit" class="btn btn-success" onclick="gogo()">Go <span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
            </p>
	</div>
  </div>
</div>