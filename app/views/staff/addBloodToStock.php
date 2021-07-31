

<?php $this->start('body'); ?>

			
				
							<!-- <input type="date" id="date" name="date" class="form-control" value="<?= $this->post['date'] ?>"> -->
<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="<?=PROOT?>css/stockform_style.css">


		<body>

		<div class="wrapper">
			<div class="inner">
				<div class="image-holder">
					<img src="<?=PROOT?>img/pouch.jpg" alt="">
				</div>
				<form action="" method="post">
					
						<?= FH::csrfInput() ?>
					<h3>Add Blood To The Stock</h3>
					<div class="bg-white"><?= $this->displayErrors ?></div>

						<div class="form-row">
						<input type="text" id="nic" name="nic" class="form-control" value="" Placeholder="Donor National ID card Number" >
						
					</div>
					<div class="form-row">
						<input type="text" id="bld_bank" name="bld_banks" class="form-control" value="" Placeholder="Blood Bank Name" >
						
					</div>
					
					
  <input class="form-check-input" type="checkbox" value="1" id="bld_rbc" name="bld_rbc">
  <label class="form-check-label" for="bld_cells">
   RBC
  </label>
 
  <input class="form-check-input" type="checkbox"  id="bld_wbc" value="1" name="bld_wbc">
  <label class="form-check-label" for="bld_cells">
   WBC
  </label>

  <input class="form-check-input" type="checkbox" value="1" id="bld_plasma" name="bld_plasma">
  <label class="form-check-label" for="bld_plasma">
   Plasma
  </label>
					
					
					<button type="submit">
						<i class="zmdi zmdi-long-arrow-right"></i>Add
					</button>
				</form>
				
			</div>
		</div>

		<script src="<?=PROOT?>vendor/jquery/jquery-3.3.1.min.js"></script>
		<script src="<?=PROOT?>js/stockform_main.js"></script>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->


				
<?php $this->end(); ?>
