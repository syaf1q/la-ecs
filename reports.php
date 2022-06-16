<script>
	function written_report(){
		window.location.target="_blank"
		window.open('page.php?menushort=written_report','_blank');
	}
	function oral_report(){
		window.location.target="_blank"
		window.open('page.php?menushort=oral_report','_blank');
	}
</script>
<div class="container">
  <div class="row">
    <div class="col-md-12">   
        <div class="panel panel-primary">
        	<div class="panel-heading">LA-ECS Reports</div>
  			<div class="panel-body">
            	<table>
                	<tr>
                    	<td>
                        	<button onclick="written_report()" class="btn btn-danger btn-lg" type="button" aria-expanded="false">Written Marks Report</button>
                        </td>
						<td>
                        	&nbsp;
                        </td>
						<td>
                        	<button onclick="oral_report()" class="btn btn-danger btn-lg" type="button" aria-expanded="false">Oral Marks Report</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
  </div>
</div>