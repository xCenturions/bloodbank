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
			<div class="form-left">
				<img src="<?= PROOT ?>img/donor/pt.jpg" alt="form">
				<div class="text-1">
					<p>Register From Here</p>
				</div>

			</div>
			<form class="form-detail" action="" method="post">
				<h2>Donor Registration Form</h2>
				<div><?= $this->displayErrors ?></div>
				<?= FH::csrfInput(); ?>
				<div class="form-row">
					<label for="donor_name">Full Name:</label>
					<input type="text" name="donor_name" id="donor_name" class="input-text" placeholder="ex: Lindsey Wilson" value="<?= $this->post['donor_name'] ?>" required>
				</div>
				<div class="form-row">
					<label for="pt_nic">Your NIC Number:</label>
					<input type="text" name="nic" id="nic" class="input-text" value="<?= $this->post['nic'] ?>" required>
				</div>

				<div class="form-row">
					<label for="dob">Your Email :</label>
					<input type="email" name="donor_email" id="donor_email" class="input-text" value="<?= $this->post['donor_email'] ?>" required>
				</div>
				<div class="form-row">
					<label for="dob">Date of Birth:</label>
					<input type="date" name="dob" id="dob" class="input-text" value="<?= $this->post['dob'] ?>" required>
				</div>
				<div class="form-row">
					<label for="pt_city">Nearest City:</label>
					<select class="form-control" id="donor_city" name="donor_city" value="<?= $this->post['donor_city'] ?>">
						<option value="" selected="" disabled="">Select City</option>
						<?php foreach ($this->cities as $value) : ?>
							<option value="<?= $value->name ?>"><?= $value->name ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-row">
					<label for="dob">Enter A Password :</label>
					<input type="password" name="password" id="password" class="input-text" required>
				</div>
				<div class="form-row">
					<label for="dob">Confirm Your Password :</label>
					<input type="password" name="confirm" id="confirm" class="input-text" required>
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