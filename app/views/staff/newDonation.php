
<?php $this->start('body'); ?>
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="<?=PROOT?>css/login_style.css">

	</head>
	<body class="img js-fullheight" style="background-image: url(../img/donor/login/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section"></h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center"><b>Please Enter Donor's NIC Number</b></h3>
		      	<form action="<?=PROOT?>staff/newDonation" method="post" class="form">
							<?= FH::csrfInput(); ?>
							<div ><?=$this->displayErrors ?></div>
		      		<div class="form-group">
		      			<input type="text" name="nic" class="form-control" placeholder="National Identity Card Number" id="nic">
		      		</div>
	            
	            <div class="form-group">
	            	<button type="submit" value="login"class="form-control btn btn-primary submit px-3">Search</button>
	            </div>
	           
	          </form>
	          

		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="<?=PROOT?>vendor/jquery/jquery.min.js"></script>
  <script src="<?=PROOT?>js/login_popper.js"></script>
  <script src="<?=PROOT?>vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?=PROOT?>js/login_main.js"></script>




<?php $this->end(); ?>
