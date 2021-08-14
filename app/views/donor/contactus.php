<?php $this->start('head'); ?>
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?=PROOT?>img/ct/icons/favicon.ico"/>
<!--===============================================================================================-->

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=PROOT?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=PROOT?>vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=PROOT?>vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=PROOT?>vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=PROOT?>css/ct_util.css">
	<link rel="stylesheet" type="text/css" href="<?=PROOT?>css/ct_main.css">
<!--===============================================================================================-->
	
<?php $this->end(); ?>
<?php $this->start('body'); ?>




    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Contact Us</h2>
        
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <div class="bg-contact100" >
		<div class="container-contact100">
			<div class="wrap-contact100">
				<div class="contact100-pic js-tilt" data-tilt>
					<img src="<?=PROOT?>img/ct/img-01.png" alt="IMG">
				</div>

				<form class="contact100-form validate-form" method="post">
					
					<span class="contact100-form-title">
						Get in touch
					</span>
					 <div ><?= $this->displayErrors ?></div>

					<div class="wrap-input100 validate-input" data-validate = "Name is required">
						<input class="input100" type="text" name="name" placeholder="Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Message is required">
						<textarea class="input100" name="message" placeholder="Message"></textarea>
						<span class="focus-input100"></span>
					</div>

					<div class="container-contact100-form-btn">
						<button class="contact100-form-btn" type="submit">
							Send
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>



<?php $this->end(); ?>