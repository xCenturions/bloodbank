<?php $this->start('body'); ?>

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
<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">

				<div class="table100 ver2 m-b-110">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column1">Location </th>
									<th class="cell100 column2">LocationType</th>
									<th class="cell100 column3">Date</th>
									<th class="cell100 column4">Time</th>
									<th class="cell100 column4">Delete </th>

								</tr>
							</thead>
						</table>
					</div>

					<div class="table100-body js-pscroll">
						<table>
							<tbody>
								<?php foreach($this->appoint as $appoint): ?>
								<tr class="row100 body">
									<td class="cell100 column1"><?= $appoint->location;?></td>
									<td class="cell100 column2"><?= $appoint->location_type;?></td>
									<td class="cell100 column3"><?= $appoint->preffered_date;?></td>
									<td class="cell100 column4"><?= $appoint->preffered_time;?></td>

									<td class="cell100 column5">
										<a href="<?=PROOT?>appo/delete/<?=$appoint->id?>" class="btn btn-danger btn-xs" onclick="if(!confirm('Are you sure?')){return false};">
												<i class="glyphicon glyphicon-pencil"></i>Delete
										</a>

									</td>


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
