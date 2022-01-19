<?php $this->start('body'); ?>
<!-- MATERIAL DESIGN ICONIC FONT -->
<link rel="stylesheet" type="text/css" href="<?= PROOT ?>css/roboto-font.css">
<link rel="stylesheet" type="text/css" href="<?= PROOT ?>fonts/line-awesome/css/line-awesome.min.css">
<!-- Jquery -->
<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
<!-- Main Style Css -->
<link rel="stylesheet" href="<?= PROOT ?>css/pt_style.css" />
</head>

<body class="form-v2">
	<div class="page-content">
		<div class="form-v2-content">

			<form class="form-detail" action="" method="post">
				<h2>Staff Registration Form</h2>
				<div><?= $this->displayErrors ?></div>
				<?= FH::csrfInput(); ?>
				<div class="form-row">
					<label for="acl">User Role</label>
					<select class="form-control" id="acl" name="acl" value="<?= $this->post['acl'] ?>" required>
						<option value="" selected="" disabled="">Select User Role</option>

						<option value=["Doctor"]>Doctor</option>
						<option value=["Nurse"]>Nurse</option>
						<option value=["BSK"]>Blood Stock Keeper</option>
						<option value=["MLT"]>Laboratory Technicien</option>

					</select>
				</div>
				<div class="form-row">
					<label for="donor_name">Full Name:</label>
					<input type="text" name="staff_name" id="staff_name" class="input-text" placeholder="ex: Lindsey Wilson" value="<?= $this->post['staff_name'] ?>" required>
				</div>
				<div class="form-row">
					<label for="pt_nic">NIC Number:</label>
					<input type="text" name="nic" id="nic" class="input-text" value="<?= $this->post['nic'] ?>">
				</div>
				<div class="form-row">
					<label for="dob">Username :</label>
					<input type="text" name="username" id="username" class="input-text" value="<?= $this->username ?>">
				</div>

				<div class="form-row">
					<label for="dob">Email :</label>
					<input type="email" name="staff_email" id="staff_email" class="input-text" value="<?= $this->post['staff_email'] ?>">
				</div>

				<div class="form-row">
					<label for="pt_city">Assigned Blood bank</label>
					<select class="form-control" id="assigned" name="assigned" value="<?= $this->post['assigned'] ?>" required>
						<option value="" selected="" disabled="">Select City</option>
						<?php foreach ($this->banks as $value) : ?>
							<option value="<?= $value->bloodbank ?>"><?= $value->bloodbank ?></option>
						<?php endforeach; ?>
					</select>
				</div>

				



				<div class="form-row-last">
					<input type="submit" name="register Now" class="register" value="Register Now">
				</div>
			</form>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
	<script>
		// just for the demos, avoids form submit
		jQuery.validator.setDefaults({
			debug: true,
			success: function(label) {
				label.attr('id', 'valid');
			},
		});
		$("#myform").validate({
			rules: {
				password: "required",
				confirm_password: {
					equalTo: "#password"
				}
			},
			messages: {
				full_name: {
					required: "Please provide an username"
				},
				your_email: {
					required: "Please provide an email"
				},
				password: {
					required: "Please provide a password"
				},
				confirm_password: {
					required: "Please provide a password",
					equalTo: "Wrong Password"
				}
			}
		});
	</script>
</body>
<?php $this->end(); ?>