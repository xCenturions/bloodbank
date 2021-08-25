

<?php $this->start('body'); ?>
<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="<?-PROOT?>fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="<?=PROOT?>css/donor_reg_style.css">


	<body>

		<div class="wrapper" style="background-image: url(../img/donor/login/bg-registration-form-2.jpg);">
			<div class="inner">
				<form action="" method="post">
					<?= FH::csrfInput() ?>
					<div class="bg-white"><?= $this->displayErrors ?></div>
					<h3>Staff Registration Form</h3>
						<div class="form-group">
						<div class="form-wrapper">
							<label for="acl">User Role</label>
							<select name="acl" class="form-control" id="acl" name="acl">
								 <option value="" selected disabled hidden>Select User type</option>
									<option value=["Doctor"]>Doctor</option>
									<option value=["Nurse"]>Nurse </option>
								
								
							</select>
						</div>
						
					</div>
					<div class="form-group">
						<div class="form-wrapper">
							<label for="staff_name">Full Name</label>
							<input type="text" id="staff_name" name="staff_name" class="form-control" >
						</div>
						<div class="form-wrapper">
						<label for="staff_email">Email</label>
						<input type="email" id="staff_email" name="staff_email" class="form-control" >
					</div>
						
					</div>
					<div class="form-group">
						<div class="form-wrapper">
							<label for="username">username</label>
							<input type="text" id="username" name="username" class="form-control" >
						</div>
					
					</div>
					
					
					<div class="form-group">
						<div class="form-wrapper">
							<label for="staff_mobile">Contact Number</label>
							<input type="text" id="staff_mobile" name="staff_mobile" class="form-control" >
						</div>
					
					</div>
					
				
					<div class="form-wrapper">
						<label for="staff_address">City</label>
						<input type="text" id="staff_address" name="staff_address" class="form-control" >
					</div>
				<div class="form-group">
					<div class="form-wrapper">
						<label for="">Password</label>
						<input type="password" id="password" name="password" class="form-control" >
					</div>
					<div class="form-wrapper">
						<label for="">Confirm Password</label>
						<input type="password" id="confirm" name="confirm" class="form-control" >
					</div>
				</div>		
					<button type="submit">Register Now</button>
				</form>
			</div>
		</div>

	</body>
<?php $this->end(); ?>
