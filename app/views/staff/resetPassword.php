<?php $this->start('body')?>
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="<?=PROOT?>css/reset_style.css">

		<!------add title----------->
		<title>Reset password</title>
		<!-------------------------->

<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				
			</div>
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="wrap">
						<div class="img" style="background-image: url(../img/reset.jpg);"></div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Reset Your password </h3>
			      		</div>
							
			      	</div>
                      	<div ><?=$this->displayErrors ?></div>
							<form action="#" class="signin-form" method="post">
			      		
		            <div class="form-group">
		              <input id="password" name="password" type="password" class="form-control" required>
		              <label class="form-control-placeholder" for="password">New Password</label>
		              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
		            </div>
		            <div class="form-group">
		              <input id="confirm" name="confirm" type="password" class="form-control" required>
		              <label class="form-control-placeholder" for="password">Confirm Password</label>
		              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Reset Password</button>
		            </div>
		           
		          </form>
		        
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="<?=PROOT?>vendor/jquery/jquery.min.js"></script>
  <script src="<?=PROOT?>vendor/jquery/popper.js"></script>
  <script src="<?=PROOT?>vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?=PROOT?>js/reset.js"></script>

<?php $this->end()?>