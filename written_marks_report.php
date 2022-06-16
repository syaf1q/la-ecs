
<div class="container">
  <div class="row">
    <div class="col-md-12">  
    	<div class="page-header"><h3>Written Marks Students Report</h3></div> 
        <p class="alert alert-info"> <strong>Please select parameters below before generate report</strong></p>
        <form id="form1" name="form1" method="post" action="written_marks_report_jana.php">
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
			<div class="form-group">
				<label for="">Course</label>
            	<select id="course" name="course" class="form-control">
				<option value="">--Select--</option>
				<?php
					$sql1="select distinct course from student";
					$res1 = mysql_query($sql1,$con);
					while($rows1 = mysql_fetch_array($res1)){
				?>
                  <option value="<?php echo $rows1['course']; ?>"><?php echo $rows1['course']; ?></option>
				<?php } ?>
				  <option value="%">All</option>
                </select>
          	</div>
			<div class="form-group">
				<label for="">Marker</label>
            	<select id="marker" name="marker" class="form-control">
				<option value="">--Select--</option>
				<?php
					$sql1="select id, fullname from userinfo where usertype=3";
					$res1 = mysql_query($sql1,$con);
					while($rows1 = mysql_fetch_array($res1)){
				?>
                  <option value="<?php echo $rows1['id']; ?>"><?php echo $rows1['fullname']; ?></option>
				<?php } ?>
				  <option value="%">All</option>
                </select>
          	</div>
            <p>
            	<button type="submit" class="btn btn-success">Generate <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></button>
            </p>
        </form>
    </div>
  </div>
</div>
</div>