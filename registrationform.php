<?php include('allhead.php'); ?>
<script>
	//javascript validation for various fildss
	function validateForm() {
		var fname = document.forms[ "register" ][ "fname" ].value;
		var lname = document.forms[ "register" ][ "lname" ].value;
		var faname = document.forms[ "register" ][ "faname" ].value;
		var course = document.forms[ "register" ][ "course" ].value;
		var dob = document.forms[ "register" ][ "dob" ].value;
		var addrs = document.forms[ "register" ][ "addrs" ].value;
		var gender = document.forms[ "register" ][ "gender" ].value;
		var phno = document.forms[ "register" ][ "phno" ].value;
		var x = document.forms[ "register" ][ "email" ].value;
		var atpos = x.indexOf( "@" );
		var dotpos = x.lastIndexOf( "." );
		var year = document.forms["register"]["year"].value;
        var image = document.forms["register"]["image"].value;
		var pass = document.forms[ "register" ][ "pass" ].value;
		if ( fname == null || fname == "" ) {
			alert( "First Name must be filled out" );
			return false;
		}
		if ( lname == null || lname == "" ) {
			alert( "Last Name must be filled out" );
			return false;
		}
		if ( faname == null || faname == "" ) {
			alert( "Father Name must be filled out" );
			return false;
		}
		if ( course == null || course == "" ) {
			alert( "Course must be filled out" );
			return false;
		}
		if ( dob == null || dob == "" ) {
			alert( "Date of birth must be filled out" );
			return false;
		}
		if ( addrs == null || addrs == "" ) {
			alert( "Address must be filled out" );
			return false;
		}
		if ( gender == null || gender == "" ) {
			alert( "Gender must be filled out" );
			return false;
		}
		if ( phno == null || phno == "" ) {
			alert( "Phone Number must be filled out" );
			return false;
		}
		if ( atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length ) {
			alert( "Not a valid e-mail address" );
			return false;
		}
		if ( pass == null || pass == "" ) {
			alert( "Password must be filled out" );
			return false;
		}
		
		if (year == "") {
            alert("Please select an admission year");
            return false;
        }
        if (image == "") {
            alert("Please upload an image");
            return false;
        }
        return true;
	}
</script>

<div class="container" style="max-width: 1200px;">
	<div class="row">
		<?PHP
		include( "database.php" );
		if ( isset( $_POST[ 'submit' ] ) ) {
			$fname = $_POST[ 'fname' ];
			$lname = $_POST[ 'lname' ];
			$faname = $_POST[ 'faname' ];
			$course = $_POST[ 'course' ];
			$dob = $_POST[ 'dob' ];
			$addrs = $_POST[ 'addrs' ];
			$gender = $_POST[ 'gender' ];
			$phno = $_POST[ 'phno' ];
			$email = $_POST[ 'email' ];
			$pass = $_POST[ 'pass' ];
             $year = $_POST['year'];
            $imageName = $_FILES['image']['name'];
            $imageTemp = $_FILES['image']['tmp_name'];
            $uploadPath = "uploads/" . $imageName;
            move_uploaded_file($imageTemp, $uploadPath);
             


			$done = "
			<center>
			<div class='alert alert-success fade in __web-inspector-hide-shortcut__'' style='margin-top:10px;'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>&times;</a>
			<strong><h3 style='margin-top: 10px;
			margin-bottom: 10px;'> Register Successfully Complete. Now You Can Login With Your Email & Password</h3>
			</strong>
			</div>
			</center>
			";

			$sql = "INSERT INTO `studenttable` (`FName`, `LName`, `FaName`, `DOB`, `Addrs`, `Gender`, `PhNo`, `Eid`, `Pass`,`Course`,`Year`, `Image`) VALUES ('$fname','$lname','$faname','$dob','$addrs','$gender','$phno','$email','$pass','$course','$year', '$imageName')";
			//close the connection
			mysqli_query( $connect, $sql );

			echo $done;
		}

		?>

	</div>
	<div class="row">
		<div class="col-md-3"></div>

		<div class="col-md-6">
			<form name="register" action="" method="POST" onsubmit="return validateForm()">
				<fieldset>
					<legend>
						<center><h3 style="padding-top: 25px;"> Student Registration Form </h3></center>
					</legend>
					<div class="control-group form-group">
						<div class="controls">
							<label>First Name: <span style="color: #ff0000;">*</span></label>
							
							<input type="text" placeholder="Enter your First name" class="form-control" name="fname" id="fname" required style="border-radius:50px 50px;" maxlength="30">
							<p class="help-block"></p>
						</div>
					</div>

					<div class="control-group form-group">
						<div class="controls">
							<label>Last Name: <span style="color: #ff0000;">*</span></label>
							<input type="text" placeholder="Enter your Last name" class="form-control" name="lname" id="lname" required style="border-radius:50px 50px;" maxlength="30">
							<p class="help-block"></p>
						</div>
					</div>

					<div class="control-group form-group">
						<div class="controls">
							<label>Father Name: <span style="color: #ff0000;">*</span></label>
							<input type="text" placeholder="Enter your Father name" class="form-control" name="faname" id="faname" required style="border-radius:50px 50px;" maxlength="30">
							<p class="help-block"></p>
						</div>
					</div>

					<div class="control-group form-group">
						<div class="controls">
							<label>Course: <span style="color: #ff0000;">*</span></label>
							<input type="text" placeholder="Enter your Course name" class="form-control" name="course" id="course" required style="border-radius:50px 50px;" maxlength="25">
							<p class="help-block"></p>
						</div>
					</div>
                     
					 <div class="control-group form-group">
                        <div class="controls">
                            <label> Year: <span style="color: #ff0000;">*</span></label>
                            <select name="year" id="year" class="form-control" required style="border-radius:50px 50px;">
                                <option value="">Select Year</option>
                                 <option value="Freshman">First Year</option>
                                <option value="Sophomore">Second Year</option>
                                <option value="Junior">Third Year</option>
                                <option value="Senior">Final Year</option>
                            </select>
                            <p class="help-block"></p>
                        </div>
                    </div>
					 
					<div class="control-group form-group">
						<div class="controls">
							<label>Date of Admission: <span style="color: #ff0000;">*</span></label>
							<input type="Date" placeholder="Enter your Course name" class="form-control" name="dob" id="dob" required style="border-radius:50px 50px;">
							<p class="help-block"></p>
						</div>
					</div>

					<div class="control-group form-group">
						<div class="controls">
							<label>Address: <span style="color: #ff0000;">*</span></label>
							<textarea class="form-control" name="addrs" id="addrs"></textarea>
							<p class="help-block"></p>
						</div>
					</div>

					<div class="control-group form-group">
						<div class="controls">
							<label>Gender: <span style="color: #ff0000;">*</span></label>
							<p>
								<label>
								<input type="radio" name="gender" value="Male" id="Gender_0" checked>
								Male</label>
															

								<label>
								<input type="radio" name="gender" value="Female" id="Gender_1">
								Female</label>
							
								<br>
							</p>
							<p class="help-block"></p>
						</div>
					</div>

					<div class="control-group form-group">
						<div class="controls">
							<label>Contact <span style="color: #ff0000;">*</span></label>
							<input type="tel" pattern="^\d{10}$" placeholder="Enter your Contact number" required class="form-control" name="phno" id="phno" required style="border-radius:50px 50px;" maxlength="10">
							<p class="help-block"></p>
						</div>
					</div>
                    
					<div class="control-group form-group">
						<div class="controls">
							<label>Email Id: <span style="color: #ff0000;">*</span></label>
							<input type="text" class="form-control" placeholder="Enter your Email Id" name="email" id="email" required style="border-radius:50px 50px;" maxlength="50">
							<p class="help-block"></p>
						</div>
					</div>


					<div class="control-group form-group">
						<div class="controls">
							<label>Password: <span style="color: #ff0000;">*</span></label>
							<input type="password" class="form-control" placeholder="Enter your Password" name="pass" id="pass" required style="border-radius:50px 50px;" maxlength="30">
							<p class="help-block"></p>
						</div>
					</div>
					

                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Upload ID card(JPG): <span style="color: #ff0000;">*</span></label>
                            <input type="file" class="form-control" name="image" id="image" accept="image/jpeg" required style="border-radius:50px 50px;">
                            <p class="help-block"></p>
                        </div>
                    </div>
					
                     <center>
					<button type="submit" name="submit" class="btn btn-primary" required style="border-radius:50px 50px;">Register</button>
					<button type="reset" name="reset" class="btn btn-danger" required style="border-radius:50px 50px;" >Clear</button>
                     </center>

				</fieldset>
			</form>
		</div>

		<div class="col-md-3"></div>
	</div>
</div>
<?php include('allfoot.php'); ?>