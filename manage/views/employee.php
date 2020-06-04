<!-- Add -->
<div class="modal " id="addnew">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><b>Employee Master Recording</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="employee_add.php" enctype="multipart/form-data">
			<div class="box box-info">
				<div class="box-header with-border"><h3 class="box-title">Personal Information</h3></div>
				<div class="form-group">
					<div class="col-sm-12"> 
						<input type="file" name="photo" id="photo">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-1"><label>Prefix*</label>
						<input type="radio" name="prefix" value="Mr." required>Mr.
						<input type="radio" name="prefix" value="Mrs." required>Mrs.
					</div>
					<div class="col-sm-3"><label>Firstname *</label>
						<input type="text" class="form-control" id="firstname" name="firstname" required>
					</div>
					<div class="col-sm-2"><label>MI</label>
						<select class="form-control" name="mname" id="mname">
							<option value="" selected></option>
							<?php foreach(range('a','z') as $v){ ?>
								<option value="<?php echo strtoupper($v)?>"><?php echo strtoupper($v)?></option>
							<?php } ?>
						</select> 
					</div>
					<div class="col-sm-4"><label>Lastname *</label>
						<input type="text" class="form-control" id="lastname" name="lastname" required>
					</div>
					<div class="col-sm-2"><label>Suffix</label>
						<select class="form-control" name="suffix" id="suffix">
							<option value="" selected></option>
							<option value="Jr.">Jr.</option>
							<option value="Sr.">Sr.</option>
							<option value="II">II</option>
							<option value="III">III</option>
							<option value="IV">IV</option>
						</select> 
					</div>
				</div>
			
				<div class="form-group">
					
					<div class="col-sm-5"><label>Home Address *</label>
					  <input class="form-control" name="address" id="address" placeholder="# / Street / Brgy.">
					</div>
					<div class="col-sm-2"><label>City *</label>
					  <input class="form-control" name="city" id="city" placeholder="City" value="Davao City"required>
					</div>
					<div class="col-sm-3"><label>Municipality *</label>
					  <input class="form-control" name="municipality" id="municipality" placeholder="Municipality" value="Davao del sur"required>
					</div>
					<div class="col-sm-2"><label>Country *</label>
					  <input class="form-control" name="country" id="country" placeholder="Country" value="Philippines" required>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-3"><label>Date of Birth *</label>
						<div class="date">
							<input type="text" class="form-control" id="datepicker_add" name="birthdate">
						</div>
					</div>
					<div class="col-sm-7"><label>Place of Birth</label> 
						<input type="text" class="form-control" name="placebirth" id="placebirth">
					</div>
					<div class="col-sm-2"><label>Gender</label>
						<select class="form-control" name="gender" id="gender" required>
							<option value="" selected></option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select> 
					</div> 
				</div>
			</div>
				
			<div class="box box-primary">
				<div class="box-header with-border"><h3 class="box-title">Contact Details</h3></div>
				<div class="form-group"> 
					<div class="col-sm-4"><label>Phone Number *</label>
						<input type="text" class="form-control" id="contact" name="contact"  data-inputmask='"mask": "(+63) 999-9999999"' data-mask >
					</div>
					<div class="col-sm-4"><label>Personal Email *</label>
						<input type="text" class="form-control" id="email1" name="email1" placeholder="youremail@gmail.com">
					</div>
					<div class="col-sm-4"><label>Corporate Email</label>
						<input type="email" class="form-control" id="email2" name="email2" placeholder="youremail@abfiph.com">
					</div>
				</div>
			</div>
			<div class="box box-danger">
				<div class="box-header with-border"><h3 class="box-title">Master Data *</h3></div>
				<div class="form-group"> 
					<div class="col-sm-2"><label>Company *</label>
						<select class="form-control" name="company" id="company" required>
						<option value="" selected></option>
						<?php  $sql = "SELECT * FROM companies";
							$query = $conn->query($sql);
							while($crow = $query->fetch_assoc()){
								echo "<option value='".$crow['id']."'>".$crow['company']."</option>";
							}
						?>
						</select>
					</div> 
					<div class="col-sm-2"><label>Department *</label>
						<select class="form-control" name="department" id="department" required>
						<option value="" selected></option>
						<?php  $sql = "SELECT * FROM departments";
							  $query = $conn->query($sql);
							  while($drow = $query->fetch_assoc()){
								echo "
								  <option value='".$drow['id']."'>".$drow['department']."</option>
								";
							  }
							?>
						</select>
					</div>
					<div class="col-sm-2"><label>Position *</label>
						<select class="form-control" name="position" id="position" required>
							<option value="" selected></option>
							<?php $sql = "SELECT * FROM position";
								$query = $conn->query($sql);
								while($prow = $query->fetch_assoc()){
									echo "<option value='".$prow['id']."'>".$prow['description']."</option>";
								}
								?>
						</select>
					</div>
					<div class="col-sm-3"><label>Select Schedule *</label>
						<select class="form-control" id="schedule" name="schedule" required>
						<option value="" selected></option>
						<?php $sql = "SELECT * FROM schedules";
							$query = $conn->query($sql);
							while($srow = $query->fetch_assoc()){
								echo "<option value='".$srow['id']."'>".$srow['time_in'].' - '.$srow['time_out']."</option>";
							}
							?>
						</select>
					</div>
					
				</div>
			</div>
			
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>
            	<button type="submit" class="btn btn-primary btn-lg btn-flat" name="add"><i class="fa fa-check"></i> Finish</button>
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
            	<h4 class="modal-title"><b><span class="employee_id"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="employee_edit.php">
            		<input type="hidden" class="empid" name="id">
                <div class="form-group">
                    <label for="edit_firstname" class="col-sm-3 control-label">Firstname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_firstname" name="firstname">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_lastname" class="col-sm-3 control-label">Lastname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_lastname" name="lastname">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_address" class="col-sm-3 control-label">Address</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" name="address" id="edit_address"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="datepicker_edit" class="col-sm-3 control-label">Birthdate</label>

                    <div class="col-sm-9"> 
                      <div class="date">
                        <input type="text" class="form-control" id="datepicker_edit" name="birthdate">
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_contact" class="col-sm-3 control-label">Contact Info</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_contact" name="contact">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_gender" class="col-sm-3 control-label">Gender</label>

                    <div class="col-sm-9"> 
                      <select class="form-control" name="gender" id="edit_gender">
                        <option selected id="gender_val"></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_position" class="col-sm-3 control-label">Change Template</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="position" id="edit_position">
                        <option selected id="position_val"></option>
                        <?php
                          $sql = "SELECT * FROM position";
                          $query = $conn->query($sql);
                          while($prow = $query->fetch_assoc()){
                            echo "
                              <option value='".$prow['id']."'>".$prow['description']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_schedule" class="col-sm-3 control-label">Change Schedule</label>

                    <div class="col-sm-9">
                      <select class="form-control" id="edit_schedule" name="schedule">
                        <option selected id="schedule_val"></option>
                        <?php
                          $sql = "SELECT * FROM schedules";
                          $query = $conn->query($sql);
                          while($srow = $query->fetch_assoc()){
                            echo "
                              <option value='".$srow['id']."'>".$srow['time_in'].' - '.$srow['time_out']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-default btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
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
            	<h4 class="modal-title"><b><span class="employee_id"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="employee_delete.php">
            		<input type="hidden" class="empid" name="id">
            		<div class="text-center">
	                	<p>DELETE EMPLOYEE</p>
	                	<h2 class="bold del_employee_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-default btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Update Photo -->
<div class="modal " id="edit_photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="del_employee_name"></span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="employee_edit_photo.php" enctype="multipart/form-data">
                <input type="hidden" class="empid" name="id">
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-default btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>    