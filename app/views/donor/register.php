

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
					<div style="font-size:18px"><?= $this->displayErrors ?></div>
					<h3>Donor Registration Form</h3>
					<div class="form-group">
						<div class="form-wrapper">
							<label for="donor_fname">First Name</label>
							<input type="text" id="donor_fname" name="donor_fname" class="form-control" value="">
						</div>
						<div class="form-wrapper">
							<label for="donor_lname">Last Name</label>
							<input type="text" id="donor_lname" name="donor_lname" class="form-control" value="<?= $this->post['donor_lname'] ?>">
						</div>
					</div>
					<div class="form-wrapper">
						<label for="donor_email">Email</label>
						<input type="email" id="donor_email" name="donor_email" class="form-control" value="<?= $this->post['donor_email'] ?>">
					</div>
					<div class="form-group">
						<div class="form-wrapper">
							<label for="donor_mobile">Contact Number</label>
							<input type="text" id="donor_mobile" name="donor_mobile" class="form-control" value="<?= $this->post['donor_mobile'] ?>">
						</div>
						<div class="form-wrapper">
							<label for="nic">National Identity Card No:</label>
							<input type="text" id="nic" name="nic" class="form-control" value="<?= $this->post['nic'] ?>">
						</div>
					</div>
					<div class="form-group">
						<div class="form-wrapper">
							<label for="dob">Date of Birthday</label>
							<input type="date" id="dob" name="dob" class="form-control" value="<?= $this->post['dob'] ?>">
						</div>
						<div class="form-wrapper">
							<label for="donor_age">Age</label>
							<input type="text" id="donor_age" name="donor_age" class="form-control" value="<?= $this->post['nic'] ?>">
						</div>
					</div>
					<div class="form-group">
						<div class="form-wrapper">
							<label for="donor_sex">Gender</label>
							<select name="donor_sex" class="form-control" id="donor_sex" name="donor_sex" value="<?= $this->post['donor_sex'] ?>">
								<option value="none" selected> </option>
								<option value="male">Male</option>
								<option value="female">Female</option>
								<option value="other">other</option>
							</select>
						</div>
						<div class="form-wrapper">
							<label for="donor_bloodgroup">Blood Group</label>
							<select name="donor_bloodgroup" class="form-control" id="donor_bloodgroup" name="donor_bloodgroup"  value="<?= $this->post['donor_bloodgroup'] ?>">
								<option value="none" selected> </option>
								<option value="A+">A+</option>
								<option value="A-">A-</option>
								<option value="B+">B+</option>
								<option value="B-">B-</option>
								<option value="AB+">AB+</option>
								<option value="AB-">AB-</option>
								<option value="O+">O+</option>
								<option value="O-">O-</option>
								<option value="Other">Other</option>
							</select>
						</div>
					</div>
					<div class="form-wrapper">
						<label for="donor_city">City</label>
						<select name="donor_city" class="form-control" id="donor_city" name="donor_city"  value="">
							<option value="" selected="" disabled="" >Select Your City</option>
							<?php foreach($this->cities as $ci): ?>
								<option value="<?= $ci->name_en ?>" ><?= $ci->name_en?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-wrapper">
						<label for="">Password</label>
						<input type="password" id="password" name="password" class="form-control" value="<?=$this->post['password'] ?>">
					</div>
					<div class="form-wrapper">
						<label for="">Confirm Password</label>
						<input type="password" id="confirm" name="confirm" class="form-control" value="<?= $this->post['confirm'] ?>">
					</div>

					<button type="submit">Register Now</button>
				</form>
			</div>
		</div>

	</body>
<?php $this->end(); ?>
