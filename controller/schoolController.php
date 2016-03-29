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
							<a href="../../subController/deleteSchoolSubController.php?SchoolId=<?php echo $row['Id']?>" class="btn btn-xs btn-danger border-sharp-edge"><i class="fa fa-trash"></i> Delete</a>
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
								<form class="form-horizontal" role="form" method="POST" action="../../subController/updateSchoolSubController.php?schoolId=<?php echo $_GET["schoolId"]?>">
									<div class="form-group">
										<div class="col-sm-4"></div>
											<div class="col-sm-8">
												<?php
													$this->invalidEntryMessage();
												?>
											</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-4">School</label>
										<div class="col-sm-8">
											<input type="text" class="form-control border-sharp-edge" name="schoolName" placeholder="Enter School Name" value="<?php echo $row['School']?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-4">Address</label>
										<div class="col-sm-8"> 
											<input type="text" class="form-control border-sharp-edge" name="schoolAddress" placeholder="Enter School Address" value="<?php echo $row['Address']?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-4">Contact No.</label>
										<div class="col-sm-8"> 
											<input type="text" class="form-control border-sharp-edge" name="schoolContactNo"placeholder="Enter School Contact No."value="<?php echo $row['ContactNo']?>" />
										</div>
									</div>
									<div class="form-group"> 
										<div class="col-sm-offset-4 col-sm-8">
											<button type="submit" class="btn btn-primary border-sharp-edge" name="saveSchool"><i class="fa fa-save"></i> Save</button>
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
							<form class="form-horizontal" role="form" method="POST" action="../../subController/addSchoolSubController.php">
								<div class="form-group">
									<div class="col-sm-4"></div>
									<div class="col-sm-8">
										<?php
											$this->invalidEntryMessage();
										?>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-4">School</label>
									<div class="col-sm-8">
										<input type="text" class="form-control border-sharp-edge" name="schoolName" placeholder="Enter School Name" value="<?php 
																if(isset($_GET["invalidEntryError"])) {
																	if(isset($_SESSION["rememberSchoolNameData"])) {
																		echo $_SESSION['rememberSchoolNameData'];
																		unset($_SESSION["emptySchoolNameError"]);
																	} 
																} else {
																	unset($_SESSION['emptySchoolNameError']);
																}
															 ?>" />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-4">Address</label>
									<div class="col-sm-8"> 
										<input type="text" class="form-control border-sharp-edge" name="schoolAddress" placeholder="Enter School Address" value="<?php 
																if(isset($_GET["invalidEntryError"])) {
																	if(isset($_SESSION["rememberSchoolAddressData"])) {
																		echo $_SESSION['rememberSchoolAddressData'];
																		unset($_SESSION["emptySchoolAddressError"]);
																	} 
																} else {
																	unset($_SESSION['emptySchoolAddressError']);
																}
															 ?>" />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-4">Contact No.</label>
									<div class="col-sm-8"> 
										<input type="text" class="form-control border-sharp-edge" name="schoolContactNo"placeholder="Enter School Contact No." value="<?php 
																if(isset($_GET["invalidEntryError"])) {
																	if(isset($_SESSION["rememberSchoolContactNoData"])) {
																		echo $_SESSION['rememberSchoolContactNoData'];
																		unset($_SESSION["emptySchoolContactNoError"]);
																	} 
																} else {
																	unset($_SESSION['emptySchoolContactNoError']);
																}
															 ?>" />
									</div>
								</div>
								<div class="form-group"> 
									<div class="col-sm-offset-4 col-sm-8">
										<button type="submit" class="btn btn-primary border-sharp-edge" name="saveSchool"><i class="fa fa-save"></i> Save</button>
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

		// Invalid entry messages
		public function invalidEntryMessage() {
			$emptyField = "";
			if(isset($_SESSION["emptySchoolNameError"])) {
				$emptyField = "School Name";
				?>
					<div class="alert alert-danger border-sharp-edge">
						<?php 
							echo "<strong> ".$emptyField."</strong> field is empty."; 
						?>
					</div>
				<?php
				unset($_SESSION["emptySchoolNameError"]);
			} else if(isset($_SESSION["emptySchoolAddressError"])) {
				$emptyField = "Address";
				?>
					<div class="alert alert-danger border-sharp-edge">
						<?php 
							echo "<strong> ".$emptyField."</strong> field is empty."; 
						?>
					</div>
				<?php
				unset($_SESSION["emptySchoolAddressError"]);
			} else if(isset($_SESSION["emptySchoolContactNoError"])) {
				$emptyField = "Contact No.";
				?>
					<div class="alert alert-danger border-sharp-edge">
						<?php 
							echo "<strong> ".$emptyField."</strong> field is empty."; 
						?>
					</div>
				<?php
				unset($_SESSION["emptySchoolContactNoError"]);
			} else if(isset($_SESSION["successfullySaveSchool"])) {
				?>
					<div class="alert alert-success border-sharp-edge">
						<?php 
							echo "<strong>Successfully Saved! <i class='fa fa-check'></i> </strong> "; 
						?>
					</div>
				<?php
				unset($_SESSION["successfullySaveSchool"]);
			} else if(isset($_SESSION["successfullyUpdateSchool"])) {
				?>
					<div class="alert alert-success border-sharp-edge">
						<?php 
							echo "<strong>Successfully Updated! <i class='fa fa-check'></i> </strong> "; 
						?>
					</div>
				<?php
				unset($_SESSION["successfullyUpdateSchool"]);
			} else if(isset($_SESSION["schoolRecorded"])) {
				?>
					<div class="alert alert-danger border-sharp-edge">
						<?php 
							echo "<strong>The School you enter is already recorded! </strong> "; 
						?>
					</div>
				<?php
				unset($_SESSION["schoolRecorded"]);
			} else {
				$emptyField = "";
			}
		}

		// remember data after submitting the form
		public function rememberSchoolData() {
			$_SESSION["rememberSchoolNameData"] = $_POST["schoolName"];
			isset($_SESSION["rememberSchoolNameData"]);

			$_SESSION["rememberSchoolAddressData"] = $_POST["schoolAddress"];
			isset($_SESSION["rememberSchoolAddressData"]);

			$_SESSION["rememberSchoolContactNoData"] = $_POST["schoolContactNo"];
			isset($_SESSION["rememberSchoolContactNoData"]);
		}

		// Add new school
		public function addSchool($schoolName, $schoolAddress, $schoolContactNo) {
			try {
				$connection = new dbConnection();
				$addSchoolQuery = $connection->connectDatabase()->prepare("INSERT INTO tblschool (School, Address, ContactNo) VALUES(:school, :address, :contactNo)");

				$addSchoolQuery->bindparam(":school", $schoolName);
				$addSchoolQuery->bindparam(":address", $schoolAddress);
				$addSchoolQuery->bindparam(":contactNo", $schoolContactNo);

				$addSchoolQuery->execute();

				return true;
			} catch(PDOException $e) {
				echo $e->getMessage();
			}
		}

		// Update school
		public function updateSchool($schoolId, $schoolName, $schoolAddress, $schoolContactNo) {
			try {
				$connection = new dbConnection();
				$updateSchoolQuery = $connection->connectDatabase()->prepare("UPDATE tblschool SET School=:school, Address=:address, ContactNo=:contactNo WHERE Id = $schoolId");

				$updateSchoolQuery->bindparam(":school", $schoolName);
				$updateSchoolQuery->bindparam(":address", $schoolAddress);
				$updateSchoolQuery->bindparam(":contactNo", $schoolContactNo);

				$updateSchoolQuery->execute();
				return true;
			} catch(PDOException $e) {
				echo $e->getMessage();
			}
		}

		// Delete school
		public function deleteSchool($schoolId) {
			try {
				$connection = new dbConnection();
				$deleteSchoolQuery = $connection->connectDatabase()->prepare("DELETE FROM tblschool WHERE Id = $schoolId");
				$deleteSchoolQuery->execute();
				
				return true;
			} catch(PDOException $e) {
				echo $e->getMessage();
			}
		}
		
	}

?>