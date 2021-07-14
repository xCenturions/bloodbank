<?php $this->start('body'); ?>
<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

	<!-- Bootstrap -->


	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="<?=PROOT?>css/appo_style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--  Respond.js doesn't work if you view the page via file:// -->
<!--
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> -->




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
                  <!-- <div class="form-group">
                    <span class="form-label">Location Type</span>
                    <input type="text" id="nearest_location" name="nearest_location" class="form-control" value="<?= $this->appoint->nearest_location ?>">
                  </div> -->
								<div class="form-group">
									<span class="form-label">Nearest Location</span>
									<input type="text" id="nearest_location" name="nearest_location" class="form-control" value="<?= $this->appoint->nearest_location ?>">
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">Preffered Date </span>
											<input class="form-control" type="date" min="<?= date('Y-m-d'); ?>" id="preffered_date" name="preffered_date" value="<?= $this->appoint->preffered_date ?>"required>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">Preffered Time </span>
                      <select name="preffered_time" id="preffered_time" value="<?= $this->appoint->preffered_time ?>"required><?= get_times(); ?></select>

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
</body>
<?php $this->end(); ?>
