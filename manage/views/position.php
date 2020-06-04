<!-- Add -->
<div class="modal " id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add Template</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="position_add.php">
				<div class="form-group">
                  	<label for="title" class="col-sm-3 control-label">Rank Title</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="title" name="title" required>
                  	</div>
				</div>
				<div class="form-group">
					<label for="rate" class="col-sm-3 control-label">Salary Rate</label>
					<div class="col-sm-4"> 
						<label>Daily Rate</label>
						<input type="text" class="form-control" id="rate" name="rate" onchange="document.getElementById('rateflat').value = '0.00'" onclick="document.getElementById('rate').value = ''" onkeyup="document.getElementById('rateflat').value = '0.00'" placeholder="0.00" required >
					</div>
					<div class="col-sm-4"> 
						<label>Fixed Rate</label>
						<input type="text" class="form-control" id="rateflat" name="rateflat" onchange="document.getElementById('rate').value = '0.00'"  onclick="document.getElementById('rateflat').value = ''" onkeyup="document.getElementById('rate').value = '0.00'" placeholder="0.00" required >
					</div>
				</div>
				<div class="form-group" >
					<label for="job_type" class="col-sm-3 control-label">Employement Type</label>
					<div class="col-sm-9"> 
					<select name="job_type" class="form-control" required > 
						<option></option>
						<?php foreach($job_type as $recId => $loadjob):
							echo '<option value="'.$recId.'">'.$loadjob.'</option>'; //close your tags!!
							endforeach;
							?>
					</select>
					</div>
				</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
            	</form>
				
          	</div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal " id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Update Template</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="position_edit.php">
            		<input type="hidden" id="posid" name="id">
                <div class="form-group">
                    <label for="edit_title" class="col-sm-3 control-label">Position Title</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_title" name="title">
                    </div>
                </div>
				<div class="form-group">
					<label for="rate" class="col-sm-3 control-label">Salary Rate</label>
					<div class="col-sm-4"> 
						<label>Daily Rate</label>
						<input type="text" class="form-control" id="edit_rate" name="rate" onchange="document.getElementById('edit_rateflat').value = '0.00'" onclick="document.getElementById('edit_rate').value = ''" onkeyup="document.getElementById('edit_rateflat').value = '0.00'" placeholder="0.00" required >
					</div>
					<div class="col-sm-4"> 
						<label>Fixed Rate</label>
						<input type="text" class="form-control" id="edit_rateflat" name="rateflat" onchange="document.getElementById('edit_rate').value = '0.00'"  onclick="document.getElementById('edit_rateflat').value = ''" onkeyup="document.getElementById('edit_rate').value = '0.00'" placeholder="0.00" required >
					</div>
				</div>
				<div class="form-group" >
					<label for="job_type" class="col-sm-3 control-label">Employement Type</label>
					<div class="col-sm-9"> 
					<select id="job_type" name="job_type" class="form-control" required > 
						<option></option>
						<?php foreach($job_type as $recId => $loadjob):
							echo '<option value="'.$recId.'">'.$loadjob.'</option>'; //close your tags!!
							endforeach;
							?>
					</select>
					</div>
				</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal " id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Deleting...</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="position_delete.php">
            		<input type="hidden" id="del_posid" name="id">
            		<div class="text-center">
	                	<p>DELETE TEMPLATE</p>
	                	<h2 id="del_position" class="bold"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>


     