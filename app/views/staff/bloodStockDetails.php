
<?php $this->setSiteTitle('Donor Details'); ?>

<?php $this->start('head'); ?>
<?= $this->content('head'); ?>
<?php $this->end(); ?>


<?= $this->start('body'); ?>
<?= $this->content('body'); ?>

<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?=PROOT?>img/icons/favicon.ico"/>
<!--===============================================================================================-->

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=PROOT?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=PROOT?>vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=PROOT?>vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=PROOT?>vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=PROOT?>css/appo_tb_util.css">
	<link rel="stylesheet" type="text/css" href="<?=PROOT?>css/appo_tb_main.css">
<!--===============================================================================================-->


<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Blood Stock Details</h2>
      <ol>
        <li><a href="index.html">Home</a></li>
        <li>Team</li>
      </ol>
    </div>

  </div>
</section>

<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">

				<div class="table100 ver2 m-b-110">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column1">Donor NIC</th>
									<th class="cell100 column2">Blood Group</th>
									<th class="cell100 column3">Blood Bank Name</th>
									<th class="cell100 column4">RBC</th>
									<th class="cell100 column5">WBC </th>
									<th class="cell100 column6">Plasma </th>
									<th class="cell100 column7">Platlets </th>

								</tr>
							</thead>
						</table>
					</div>

					<div class="table100-body js-pscroll">
						<table>
							<tbody>
                                
								<?php foreach($this->stock as $stock): ?>
                                   
                                        
                                    <td class="cell100 column1">
                                        <!-- <a href="<?=PROOT?>staff/stockData/<?= $stock->id ?>" > -->
                                            <?= $stock->donor_nic; ?>
                                        <!-- </a> -->
                                        </td>
									<td class="cell100 column2"><?= $stock->bld_grps;?></td>
									<td class="cell100 column3"><?= $stock->bld_banks;?></td>

									<?php if($stock->bld_rbc == 1): ?>
									<td class="cell100 column4"><i class="bi bi-check-lg"></i></td>
									<?php else: ?>
										<td class="cell100 column4"><i class="bi bi-dash-lg"></i></td>
									<?php endif; ?>

									<?php if($stock->bld_wbc == 1): ?>
									<td class="cell100 column5"><i class="bi bi-check-lg"></i></td>
									<?php else: ?>
										<td class="cell100 column5"><i class="bi bi-dash-lg"></i></td>
									<?php endif; ?>

									<?php if($stock->bld_plasma == 1): ?>
									<td class="cell100 column6"><i class="bi bi-check-lg"></i></td>
									<?php else: ?>
										<td class="cell100 column6"><i class="bi bi-dash-lg"></i></td>
									<?php endif; ?>

									<?php if($stock->bld_plates == 1): ?>
									<td class="cell100 column7"><i class="bi bi-check-lg"></i></td>
									<?php else: ?>
										<td class="cell100 column7"><i class="bi bi-dash-lg"></i></td>
									<?php endif; ?>





								</tr>

								  <?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
</div>
</div>
</div>



        <!--===============================================================================================-->
        	<script src="<?=PROOT?>vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        	<script src="<?=PROOT?>vendor/bootstrap/js/popper.js"></script>

        <!--===============================================================================================-->
        	<script src="<?=PROOT?>vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        	<script src="<?=PROOT?>vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        	<script>
        		$('.js-pscroll').each(function(){
        			var ps = new PerfectScrollbar(this);

        			$(window).on('resize', function(){
        				ps.update();
        			})
        		});


        	</script>
        <!--===============================================================================================-->
        	<script src="<?=PROOT?>js/appo_tb_main.js"></script>


<?php $this->end(); ?>

