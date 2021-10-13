<?php $this->start('body'); ?>
<!-- Google font -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

<!-- Bootstrap -->

<!-- Custom stlylesheet -->
<link type="text/css" rel="stylesheet" href="<?= PROOT ?>css/appo_style.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<body>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-md-push-5">
						<div class="booking-cta">
							<h1>Make An Appointment </h1>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi facere, soluta magnam consectetur molestias itaque
								ad sint fugit architecto incidunt iste culpa perspiciatis possimus voluptates aliquid consequuntur cumque quasi.
								Perspiciatis.
							</p>
						</div>
					</div>
					<div class="col-md-4 col-md-pull-7">
						<div class="booking-form">
							<form class="form" action="" method="post">
								<?= FH::csrfInput() ?>
								<div class="input-group has-validation mt-2">
								</div>
								<div class="form-group">
									<div class=" mt-2">
										<label for="location">Select Location Type</label>
										<div class="input-group has-validation mt-2">
											<select class="form-control" id="location_type" name="location_type" value="<?= $this->appoint->location_type ?>">
												<option value="" selected="" disabled="">Select Location type</option>
												<?php foreach ($this->location_types as $value) : ?>
													<option value="<?= $value->id ?>"><?= $value->location_type ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class=" mt-2">
										<label for="location">Nearest Location</label>
										<div class="input-group has-validation mt-2">
											<select class="form-control" id="location" name="location" value="<?= $this->appoint->location ?>">
												<div id="location" name="location"></div>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">Preffered Date </span>
											<input class="form-control" type="date" min="<?= date('Y-m-d'); ?>" id="preffered_date" name="preffered_date" value="<?= $this->appoint->preffered_date ?>" required>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">Preffered Time </span>
											<select name="preffered_time" id="preffered_time" value="<?= $this->appoint->preffered_time ?>" required><?= get_times(); ?></select>

										</div>
									</div>

									<div class="form-btn">
										<button type="submit" class="submit-btn">Schedule Now</button>
									</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function() {
			$("#location_type").change(function() {
				var check = $(this).val();
				console.log(check);
				$.ajax({
					url: "http://localhost/bloodbank/appo/getLocation",
					method: "GET",
					data: {
						typeID: check
					},
					success: function(data) {
						console.log("This data", data);
						$("#location").html(data);
					}


				});
			});
		});
	</script>
</body>
<?php $this->end(); ?>