<?php include('allhead.php'); ?>
<div class="container">
	<div class="row">
	</div>
	<div class="row">
		<div class="col-md-4"></div>

		<div class="col-md-4">
			<fieldset>
				<legend>
					<h3 style="padding-top: 25px;"><span class="glyphicon glyphicon-lock"></span>&nbsp;Admin Login</h3>
				</legend>
				<!-- Admin login form -->
				<form name="adminlogin" action="loginlinkadmin.php" method="POST">
					<div class="control-group form-group">
						<div class="controls">
							<label>Username:</label>
							<input type="text" class="form-control" required style="border-radius:50px 50px;"name="aid">
							<p class="help-block"></p>
						</div>
					</div>
					<div class="control-group form-group">
						<div class="controls">
							<label>Passsword:</label>
							<input type="password" class="form-control" required style="border-radius:50px 50px;"name="apass">
							<p class="help-block"></p>
						</div>
					</div>
					<center>
						<button type="submit" name="login" class="btn btn-success" required style="border-radius:50px 50px;">Login</button>
						<button type="reset" class="btn btn-danger" required style="border-radius:50px 50px;">Reset</button>
					</center>
			</fieldset>
			</form>
		</div>

		<div class="col-md-4"></div>
	</div>
	<?php include('allfoot.php'); ?>