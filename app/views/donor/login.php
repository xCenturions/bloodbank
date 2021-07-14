<?php $this->start('head'); ?>
<?php $this->end(); ?>
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
		      	<h3 class="mb-4 text-center"><b>Have an account?</b></h3>
		      	<form action="<?=PROOT?>donor/login" method="post" class="form">
							<?= FH::csrfInput(); ?>
							<div ><?=$this->displayErrors ?></div>
		      		<div class="form-group">
		      			<input type="text" name="nic" class="form-control" placeholder="National Identity Card Number" id="nic"required>
		      		</div>
	            <div class="form-group">
	              <input id="password" name="password" type="password" class="form-control" placeholder="Password" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" value="login"class="form-control btn btn-primary submit px-3">Log In</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary" for="remember_me">Remember Me
									  <input type="checkbox"  name="remember_me" id="remember_me" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#" style="color: #fff">Forgot Password</a>
								</div>
	            </div>
	          </form>
	          <p class="w-100 text-center"> Don't have an account ?  <a href="<?=PROOT?>donor/register" ><font color="blue" >click here to register</font></a> </p>

		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="<?=PROOT?>js/jquery.min.js"></script>
  <script src="<?=PROOT?>js/login_popper.js"></script>
  <script src="<?=PROOT?>js/bootstrap.min.js"></script>
  <script src="<?=PROOT?>js/login_main.js"></script>

<?php $this->end(); ?>
