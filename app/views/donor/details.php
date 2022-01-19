<?php $this->start('head'); ?>
<link rel="stylesheet" type="text/css" href="<?= PROOT ?>css/text.css">

<?php $this->end(); ?>
<?php $this->start('body'); ?>
<?php

if (!$this->donation == null) : ?>
	<?php


	$d = $this->donation[0]->date;

	$date = new DateTime($d);
	$date->add(new DateInterval('P3M'));
	$newDate = (array) $date;
	$newDate = str_replace("00:00:00.000000", "", $newDate['date']);
	//dnd($date);
	?>
	<script language="JavaScript">
		TargetDate = "<?= $date->format('Y-m-d') ?>";
		BackColor = "palegreen";
		ForeColor = "navy";

		CountActive = true;
		CountStepper = -1;
		LeadingZero = true;
		DisplayFormat = "%%D%% days";
		//console.log(TargetDate);

		FinishMessage = "You are available to donate blood again";
	</script>

<?php endif; ?>
<script type="text/javascript" src="<?= PROOT ?>app/lib/Google Maps/js/googlemap.js"></script>
<style type="text/css">
	#map {

		width: 100%;
		height: 100%;
		border: 5px solid red;
	}

	#data,
	#allData {
		display: none;
	}
</style>

<section id="breadcrumbs" class="breadcrumbs">
	<div class="container">

		<div class="d-flex justify-content-between align-items-center">
			<h2>Personal Information</h2>

		</div>

	</div>

</section>
<?php if (currentUser() && currentUser()->form == 'not_submitted') : ?>


	<div class="col-sm-12" style="position: relative;">
		<div class="alert fade alert-simple alert-warning alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert">

			<center><i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
				<a style="color:red " href="<?= PROOT ?>donor/form"> <strong class="font__weight-semibold">Attenion!</strong> Please Fill The Donor Form. Click here!</a>
			</center>
		</div>
	</div>

<?php endif; ?>
<section id="blog" class="blog">
	<div class="container" data-aos="fade-up">
		<div class="row">
			<div class="col-lg-8 entries">
				<article class="entry">
					<h2 class="entry-title"> <?= $this->donor->donor_name ?> </h2>
					<div class="row">
						<div class="col">
							<p style="padding-top:10px"><strong>Email : </strong> <?= currentUser()->donor_email ?></p>
							<p style="padding-top:10px"><strong>NIC Number : </strong> <?= currentUser()->nic ?></p>
							<?php if (currentUser()->form == 'submitted') : ?>
								<p style="padding-top:10px"><strong>Mobile Number : </strong> <?= $this->data->mobile ?></p>
								<p style="padding-top:10px"><strong>Blood Group : </strong> <?= $this->data->bloodgroup ?></p>
							<?php endif; ?>
							<p style="padding-top:10px"><strong>Date of Birth : </strong> <?= currentUser()->dob ?></p>
							<p style="padding-top:10px"><strong>Nearest City : </strong> <?= currentUser()->donor_city ?></p>
						</div>
						<div class="entry-content col">

							<?php if ($this->donation != null &&  $newDate != date('Y-m-d')) : ?>
								<div class="read-more">You can Donate blood after
									<!-- <br> -->
									</p><!-- <p style="margin-right:95px">  -->
									<script language="JavaScript" src="https://rhashemian.github.io/js/countdown.js"></script>
									</p>
								</div>
						</div>
					<?php endif; ?>
					</div>

					<h2 class="entry-title" style="padding-top:40px; text-align: center"> My Donated History </h2>

					<div class="container-table100">
						<div class="wrap-table100">

							<div class="table100 ver2 m-b-110">
								<div class="table100-head">
									<table>
										<thead>
											<tr class="row100 head">
												<th class="cell100 column1">Date </th>
												<th class="cell100 column2">Location</th>
												<th class="cell100 column2">Tested Diseases</th>

											</tr>
										</thead>
									</table>
								</div>

								<div class="table100-body js-pscroll">
									<table>
										<tbody>

											<?php if ($this->donation == null) : ?>

												<?= '<center>' . 'No Any Records avaliable' . '</center>' ?>
											<?php else : ?>



												<?php foreach ($this->donation as $do) : ?>

													<td class="cell100 column1"><?= $do->date ?> </td>

													<td class="cell100 column2"><?= $do->location ?> Hospital</td>
													<td class="cell100 column2"><?= $do->tested_disease ?> </td>



													</tr>

												<?php endforeach; ?>
											<?php endif; ?>
										</tbody>
									</table>
								</div>
							</div>

						</div>
					</div>

				</article>
			</div>

			<div class="col-lg-4">
				<div class="sidebar">

					<?php

					$allData = $this->donor;

					$allData = json_encode($allData, true);
					//dnd($allData);

					echo '<div id="allData">' . $allData . '</div>';
					?>


					<h3 class="sidebar-title ">Actions</h3>
					<div class="row">

						<a href="<?= PROOT ?>donor/edit_profile/<?= currentUser()->id ?>" class="btn-get-started animate__animated animate__fadeInUp scrollto"><button type="button" class="btn btn-danger btn-rounded" style="width:70%">Edit My Profile</button></a>
						<a href="<?= PROOT ?>Appo/index" class="btn-get-started animate__animated animate__fadeInUp scrollto" style="padding-top:10px"><button type="button" class="btn btn-danger btn-rounded" style="width:70%">My Appoitments</button></a>
						<?php if (currentUser()->form == 'submitted') : ?>
							<a href="<?= PROOT ?>donor/editForm/<?= currentUser()->id ?>" class="btn-get-started animate__animated animate__fadeInUp scrollto" style="padding-top:10px"><button type="button" class="btn btn-danger btn-rounded" style="width:70%">View Donor Form</button></a>
						<?php else : ?>
							<a href="<?= PROOT ?>donor/form" class="btn-get-started animate__animated animate__fadeInUp scrollto " style="padding-top:10px"><button type="button" class="btn btn-danger btn-rounded" style="width:70%"><span>Fill Donor Form</span></button></a>
						<?php endif; ?>
						<a href="<?= PROOT ?>donor/qrcode/<?= currentUser()->id ?>" class="btn-get-started animate__animated animate__fadeInUp scrollto" style="padding-top:10px"><button type="button" class="btn btn-danger btn-rounded" style="width:70%">Generate QR Code</button></a>
					</div>

					<div style="padding-top:30px"></div>
					<h3 class="sidebar-title">My Location</h3>
					<div id="map" style="width: 340px ; height: 400px;"></div>

				</div>
				<!-- End sidebar -->
			</div>
		</div>


</section>











<!--===============================================================================================-->
<script src="<?= PROOT ?>vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="<?= PROOT ?>vendor/bootstrap/js/popper.js"></script>

<!--===============================================================================================-->
<script src="<?= PROOT ?>vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="<?= PROOT ?>vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script>
	$('.js-pscroll').each(function() {
		var ps = new PerfectScrollbar(this);

		$(window).on('resize', function() {
			ps.update();
		})
	});
</script>
<!--===============================================================================================-->
<script src="<?= PROOT ?>js/appo_tb_main.js"></script>


<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-dFHYjTqEVLndbN2gdvXsx09jfJHmNc8&callback=loadMap">
</script>


<!--===============================================================================================-->
<link rel="icon" type="image/png" href="<?= PROOT ?>img/icons/favicon.ico" />
<!--===============================================================================================-->

<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?= PROOT ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?= PROOT ?>vendor/animate/animate.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?= PROOT ?>vendor/select2/select2.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?= PROOT ?>vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?= PROOT ?>css/appo_tb_util.css">
<link rel="stylesheet" type="text/css" href="<?= PROOT ?>css/appo_tb_main.css">
<!--===============================================================================================-->





<?php $this->end(); ?>