<?php $this->start('head'); ?>

<?php $this->end(); ?>
<?php $this->start('body'); ?>

<head>
	<meta charset="utf-8">
	<title>Form-v2 by Colorlib</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
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
				<!-- <img src="<?= PROOT ?>img/pt.jpg" alt="form"> -->
				<div class="text-1">
					<p>Register A Patient Here</p>
				</div>

			</div>
			<form class="form-detail" action="" method="post">
				<h2>Patient Registration Form</h2>
				<div><?= $this->displayErrors ?></div>
				<div class="form-row">
					<label for="pt_name">Full Name:</label>
					<input type="text" name="pt_name" id="pt_name" class="input-text" placeholder="ex: Lindsey Wilson">
				</div>
				<div class="form-row">
					<label for="pt_nic">Patient NIC Number:</label>
					<input type="text" name="pt_nic" id="pt_nic" class="input-text" required>
				</div>
				<div class="form-row">
					<label for="sex">Gender : </label>
					<select name="sex" class="input-text" id="sex" name="sex" required>
						<option value="none" selected> </option>
						<option value="male">Male</option>
						<option value="female">Female</option>
						<option value="other">other</option>
					</select>
				</div>
				<div class="form-row">
					<label for="dob">Date of Birth:</label>
					<input type="date" name="dob" id="dob" class="input-text" required>
				</div>
				<div class="form-row">
					<label for="pt_bloodgroup">Blood Group :</label>
					<select name="pt_bloodgroup" class="input-text" id="pt_bloodgroup" name="pt_bloodgroup" required>
						<option value="" selected> </option>
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
				<div class="form-row">
					<label for="qty">Number of Blood pints:</label>
					<input type="text" name="qty" id="qty" class="input-text" required>
				</div>
				<div class="form-row">
					<label for="pt_city">Patient City:</label>
					<input type="text" name="pt_city" id="pt_city" class="input-text" required>
				</div>
				<div class="form-row">
					<label for="pt_mobile">Patient Mobile:</label>
					<input type="text" name="pt_mobile" id="pt_mobile" class="input-text" required>
				</div>

				<div class="form-row-last">
					<input id="submit" type="submit" name="register" class="register" value="Register">
				</div>
			</form>
		</div>
	</div>

	<div class='container'>
		<div class="modal fade" style="top:20%;" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content p-4" style="align-items: center;border-radius: 30px;">
					<div class='top'>
						<div class="success-checkmark">
							<div class="check-icon">
								<span class="icon-line line-tip"></span>
								<span class="icon-line line-long"></span>
								<div class="icon-circle"></div>
								<div class="icon-fix"></div>
							</div>
						</div>
						<div>
							<h1>Succesfully Approved! </h1>
						</div>
					</div>
					<div class="modal-header border-0 mb-2">

					</div>
					<div class="modal-body"> <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button> </div>
				</div>
			</div>
		</div>
	</div>
	<script src="<?= PROOT ?>vendor/jquery/jquery-3.2.1.min.js"></script>
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




</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
<?php $this->end(); ?>