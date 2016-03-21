<?php  
	include 'databaseConnectionController.php';

	class schoolController
	{
		// Get school
		public function retrieveSchool() {
			$connection = new dbConnection();
			$retrieveSchoolQuery = $connection->connectDatabase()->prepare("SELECT * FROM tblschool");
			$retrieveSchoolQuery->execute();

			if($retrieveSchoolQuery->rowCount()>0)
  			{
  				while ($row = $retrieveSchoolQuery->fetch(PDO::FETCH_ASSOC)) {
				?>
					<tr>
						<td align="center" width="50">
							<a href="schoolDetail.php?schoolId=<?php echo $row['Id']?> " class="btn btn-xs btn-primary border-sharp-edge"><i class="fa fa-pencil"></i> Edit</a>
						</td>
						<td align="center" width="50">
							<a href="#" class="btn btn-xs btn-danger border-sharp-edge"><i class="fa fa-trash"></i> Delete</a>
						</td>
						<td><?php print($row['School']); ?></td>
						<td><?php print($row['Address']); ?></td>
						<td><?php print($row['ContactNo']); ?></td>
					</tr>
				<?php
  				}
  			} else {
				?>
					<tr>
						<td colspan="5" style="color: red;" align="center">No Data</td>
					</tr>
				<?php
  			}
		}

		// Get school by Id
		public function retrieveSchoolById($Id) {
			$connection = new dbConnection();
			$retrieveSchoolQuery = $connection->connectDatabase()->prepare("SELECT * FROM tblschool WHERE Id = '$Id'");
			$retrieveSchoolQuery->execute();

			if($retrieveSchoolQuery->rowCount()>0)
  			{
  				while ($row = $retrieveSchoolQuery->fetch(PDO::FETCH_ASSOC)) {
				?>

					<div class="well border-sharp-edge">
						<div class="row">
							<div class="col-md-6">
								<form class="form-horizontal" role="form" method="POST" action="index.php">
									<div class="form-group">
										<label class="control-label col-sm-4">School</label>
										<div class="col-sm-8">
											<input type="text" class="form-control border-sharp-edge" placeholder="Enter School Name" value="<?php echo $row['School']?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-4">Address</label>
										<div class="col-sm-8"> 
											<input type="text" class="form-control border-sharp-edge" placeholder="Enter School Address" value="<?php echo $row['Address']?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-4">Contact No.</label>
										<div class="col-sm-8"> 
											<input type="text" class="form-control border-sharp-edge" placeholder="Enter School Contact No."value="<?php echo $row['ContactNo']?>" />
										</div>
									</div>
									<div class="form-group"> 
										<div class="col-sm-offset-4 col-sm-8">
											<button type="submit" class="btn btn-primary border-sharp-edge"><i class="fa fa-save"></i> Save</button>
										</div>
									</div>
								</form>
							</div>
							<div class="col-md-6"></div>
						</div>
					</div>
					<table class="table table-bordered table-responsive">
						<tr>
							<td>table over for School Branches</td>
						</tr>
					</table>					
				<?php
  				}
  			} else {
				?>
				<div class="well border-sharp-edge">
					<div class="row">
						<div class="col-md-6">
							<form class="form-horizontal" role="form" method="POST" action="index.php">
								<div class="form-group">
									<label class="control-label col-sm-4">School</label>
									<div class="col-sm-8">
										<input type="text" class="form-control border-sharp-edge" placeholder="Enter School Name" />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-4">Address</label>
									<div class="col-sm-8"> 
										<input type="text" class="form-control border-sharp-edge" placeholder="Enter School Address" />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-4">Contact No.</label>
									<div class="col-sm-8"> 
										<input type="text" class="form-control border-sharp-edge" placeholder="Enter School Contact No." />
									</div>
								</div>
								<div class="form-group"> 
									<div class="col-sm-offset-4 col-sm-8">
										<button type="submit" class="btn btn-primary border-sharp-edge"><i class="fa fa-save"></i> Save</button>
									</div>
								</div>
							</form>		
						</div>
						<div class="col-md-6"></div>
					</div>
				</div>	
				<?php
  			}
		}

		// Add new school
		public function addSchool() {

		}

		// Update school
		public function updateSchool($Id) {

		}

		// Delete school
		public function deleteSchool($Id) {

		}
		
	}

?>