<?php $this->setSiteTitle('Donor Details'); ?>

<?php $this->start('head'); ?>
<?= $this->content('head'); ?>
<?php $this->end(); ?>


<?= $this->start('body'); ?>
<?= $this->content('body'); ?>

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
<link rel="stylesheet" href="<?= PROOT ?>css/bd_style.css">
<!--===============================================================================================-->

<!----add title------------->
<title>Check Donation</title>
<!-------------------------->

<div id="donation" class="modal fade " tabindex="-1" role="dialog">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container1" style="height:725px">

					<div class="top">
						<p style="font-size: 20px;">Donation Record </p>
					</div>


					<div class="menu">
						<h6>REGISTRATION</h6>
						<p> &nbsp;&nbsp;&nbsp;Above Donor name and ID card number verified? <strong>&nbsp;&nbsp;&nbsp; <span id="verified"></span></strong>

						</p>
						<p> &nbsp;&nbsp;&nbsp;DIN issuing officer's Signature:<strong>&nbsp;&nbsp;&nbsp; <span id="din_name"></span></strong></p>
					</div>

					<div class="box">
						<h6>QR Code</h6>
						<img id="img1" style="width:100px" src="data:image/png;base64, <?= $this->qr_image; ?>" alt="">

					</div>


					<div class="medical">
						<h6>MEDICAL ASSESSMENT</h6>
					</div>

					<div class="mosignature">
						<p>(Medical Officer's Signature : <strong>&nbsp;&nbsp;&nbsp;<span id="mo_name"></span></p>
					</div>
					<div class="box1">
						<label><b>Weight(kg): <span id="weight"></span></b></label>

					</div>

					<div class="donor">
						<table>
							<tr>
								<td>
									<h6> &nbsp;&nbsp;&nbsp;Donor's Name &nbsp;&nbsp;&nbsp; : </h6>
								</td>
								<td>

									<div style="width:500px;font-weight:bold" id="donor_name"></div>

								</td>
							</tr>
							<tr>
								<td>
									<h6> &nbsp;&nbsp;&nbsp;History</h6>
								</td>
								<td>
									<p>&nbsp;&nbsp;&nbsp;Feeling well?/Adequate overnight sleep(>6hrs)?/ Last meal<4hrs? Ever hospitalised?<br>
											&nbsp;&nbsp;&nbsp;Any allergies,illnesses or medications?/ High risk behaviours? (Q6 review)</p>
								</td>
							</tr>
							<tr>
								<td>
									<h6> &nbsp;&nbsp;&nbsp;Examination</h6>
								</td>
								<td>
									<p>&nbsp;&nbsp;&nbsp;iii Looking or Pallor?/Icterus? Alcohol smell / Infected wounds / Venepuncture site lesions</p>
									<div class="new1">
										<label>CVS status pulse:</label>
									</div>
									<div class="new2">
										<strong><span style="font-weight:bold;" id="cvs" name="cvs"></span>/min &nbsp;&nbsp;&nbsp;</strong>
									</div>
									&nbsp;&nbsp;&nbsp;
									<div class="new3">
										<label>&nbsp;&nbsp;&nbsp;BP:</label>
									</div>

									<div class="new4">
										<span id="bp" style="font-weight:bold;" name="bp"></span>/mmHg &nbsp;&nbsp;&nbsp;
									</div>

									<label style="font-size:14px">Remarks</label>: <strong>&nbsp;&nbsp;&nbsp;<span style="font-weight:bold;" id="remarks" name="remarks"></span></strong>
								</td>
							</tr>
							<tr>
								<td>
									<h6> &nbsp;&nbsp;&nbsp;Counselling </h6>
								</td>
								<td style="font-size:14px">
									<label>Option for CUE if applicable </label>&nbsp;&nbsp;&nbsp;<span style="font-weight:bold;" id="cue" name="cue"></span>&nbsp;&nbsp;&nbsp;
									<label>Inform possible PD call-up </label>&nbsp;&nbsp;&nbsp;<span style="font-weight:bold;" id="pd" name="pd"></span>
								</td>
							</tr>
							<tr>
								<td>
									<h6> &nbsp;&nbsp;&nbsp;Outcome :</h6>
								</td>
								<td style="font-size:14px">
									<label>Donor to be accepted if Hd >12.5g/dl </label>>&nbsp;&nbsp;&nbsp;<span style="font-weight:bold;" id="hd" name="hd"></span>&nbsp;&nbsp;&nbsp;
									<label>Temporary deferral </label>&nbsp;&nbsp;&nbsp;<span id="temporary_deferral" name="temporary_deferral"></span> &nbsp;&nbsp;&nbsp;
									<label>Permanent deferral </label>&nbsp;&nbsp;&nbsp;<span id="permanent_deferral" name="permanent_deferral"></span>
								</td>
							</tr>
						</table>
						<label style="font-size:14px"> &nbsp;&nbsp;&nbsp; Remarks/Reasons for Deferral</label> <span style="font-weight:bold;" id="reasons_deferral" name="reason_deferral" size="100"></span>
					</div>
					<hr width="100%" size="5">


					<div class="medical">
						<h6>Hb TEST & BAG ISSUE</h6>
					</div>
					<div class="osignature">
						<p>(Officer's Signature <span style="font-weight:bold;" id="of_name" name="of_name" size="85"></span>)</p>
					</div>
					<div class="test" style="margin-left:20px">
						<p>Check Donor Name and ID Card No for correctness,before registration</p>
						<p>Hb level :>12.5g/dl <span style="font-weight:bold;" id="hb_lvl1" name="hb_lvl1"></span> &nbsp;&nbsp;&nbsp;
							<12.5g /dl <span id="hb_lvl2"></span> &nbsp;&nbsp;&nbsp;
								Blood bag type: &nbsp;&nbsp;<span style="font-weight:bold;" id="blood_bag"></span>

						</p>
					</div>
					<hr width="100%" size="5">

					<div class="medical">
						<h6>BLOOD COLLECTION</h6>
					</div>
					<div class="osignature">
						<p>(Phlebotomist's Signature <span style="font-weight:bold;" id="ph_name" name="ph_name"></span>)</p>
					</div>
					<div class="blood">
						<p><b>දායකයාගේ නම හා පැකට්ටු අංකය නිවැරදිදැයි පරීක්ෂා කරන්න.</b></p>
						<p>
							<label style="margin-left:20px"><b>ලේ ගැනීම ඇරඹු වේලාව:</b></label>
							<span style="width:100px;font-size:14px" class="sinhala" id="st_time" name="st_time"></span> &nbsp;&nbsp;&nbsp;
							<label><b>අවසාන් වූ වේලාව:</b></label>
							<span style="width:100px;font-size:14px" class="sinhala" id="et_time" name="et_time"></span> &nbsp;&nbsp;&nbsp;
							<label><b>ලේ ප්‍රමාණය:</b></label>
							<span style="width:100px;font-size:14px" class="sinhala" id="amount" name="amount"></span>

						</p>

						<div class="delta1">
							<p>
								<b style="margin-left:20px">ලේ ලබා ගැනීම සිදු කළ අයගේ අත්සන:</b>
								<span style="font-weight:bold;" class="sinhala" id="name" name="name" size="'100"></span> &nbsp;&nbsp;&nbsp;<br>

							</p>
						</div>
						<div class="box2">
							<label style="font-size:14px"><b>C.M.No.:</b></label>
							<span style="font-weight:bold;" type="text" id="cm_no"></span>
						</div>

					</div>


				</div>

			</div>
			<div class="modal-footer">

				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!--===============================================================================================-->










<section id="breadcrumbs" class="breadcrumbs">
	<div class="container">

		<div class="d-flex justify-content-between align-items-center">
			<h2> Unchecked Blood Samples</h2>

		</div>

	</div>
</section>
<form action="<?= PROOT ?>staff/searchDonors" method="post" style="margin-top:20px;text-align: center">


	<div class="row" style="margin-left:400px">

		<div class="col-md-3">
			<input class="form-control" id="cm_no" name="cm_no" value="" style="width: 300px ; height: 50px;" placeholder="Enter CM Number ">

			</select>
		</div>

		<div class="col-md-2">
			From Date<input type="date" name="from_date" id="from_date" class="form-control" placeholder="From Date" />
		</div>
		<div class="col-md-2">
			To Date <input type="date" name="to_date" id="to_date" class="form-control" placeholder="To Date" />
		</div>




		<div class="col-md-1">

			<button type="button" data-toggle="modal" data-target="#modalSubscriptionForm" id="refresh" class="btn btn-danger">Reset</button>
		</div>

	</div>



</form>



<div class="container-table100">
	<div class="wrap-table100" style="width:90%">

		<div class="table100 ver2 m-b-110">
			<div class="table100-head">
				<table>
					<thead>
						<tr class="">
							<th class=" ">CM Number</th>
							<th class="">Donor NIC</th>
							<th class=" ">Donor Name</th>
							<th class=" ">Blood Group</th>
							<th class=" ">Donated Date</th>
							<th class=" ">Donation Record</th>
							<th class=" ">Status</th>

						</tr>
					</thead>
				</table>
			</div>

			<div class="table100-body js-pscroll" id="search" name="search">
			</div>
		</div>
	</div>
</div>
</div>

<script src="<?= PROOT ?>vendor/jquery/jquery-3.2.1.min.js"></script>



<div class='container'>
	<div class="modal fade" style="top:20%;" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content p-4" style="align-items: center;border-radius: 30px;">
				<div class='top'>
					<div class="success-checkmark">
						<div class="check-icon">
							<span class="icon-line line-tip"></span>
							<span class="icon-line line-long"></span>
							<div class="icon-circle"></div>
							<div class="icon-fix"></div>
						</div>
					</div>
					<div>
						<h1>Succesfully Approved! </h1>
					</div>
				</div>
				<div class="modal-header border-0 mb-2">

				</div>
				<div class="modal-body"> <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button> </div>
			</div>
		</div>
	</div>
</div>
<div class='container'>
	<div class="modal fade" style="top:20%;" id="rejectedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content p-4" style="align-items: center;border-radius: 30px;">
				<div class='top'>
					<div class="success-checkmark">
						<div class="check-icon">
							<span class="icon-line line-tip"></span>
							<span class="icon-line line-long"></span>
							<div class="icon-circle"></div>
							<div class="icon-fix"></div>
						</div>
					</div>
					<div>
						<h1>Succesfully Rejected! </h1>
					</div>
				</div>
				<div class="modal-header border-0 mb-2">

				</div>
				<div class="modal-body"> <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button> </div>
			</div>
		</div>
	</div>
</div>



<!-- Central Modal Medium Danger -->
<div class="modal fade" id="centralModalDanger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-notify modal-danger" role="document">
		<!--Content-->
		<div class="modal-content">
			<!--Header-->
			<div class="modal-header">
				<p class="heading lead">Please enter the reason for reject</p>

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="white-text">&times;</span>
				</button>
			</div>

			<!--Body-->
			<div class="modal-body">
				<div class="text-center">
					<i class="fas fa-ban fa-4x mb-3 animated rotateIn"></i>
					<div>
						<h3>CM Number : <span id="d_id"></span> </h3>
					</div>
					<textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
					<label for="message">Your message</label>

				</div>
			</div>

			<!--Footer-->
			<div class="modal-footer justify-content-center">
				<a id="reject" data-toggle="modal" data-target="#rejectedModal" data-dismiss="modal" type="button" class="btn btn-danger">Submit <i class="fa fa-check ml-1 text-white"></i></a>

			</div>
		</div>
		<!--/.Content-->
	</div>
</div>
<!-- Central Modal Medium Danger-->


<!--===============================================================================================-->

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

<script>
	$(document).ready(function() {



		$("#to_date").change(function() {
			loadData();
		});

		$("#reject").click(function() {
			rejected();
			$("#message").val("");

		});

		$("#search").load("http://localhost/bloodbank/mlt/check");
		$("#refresh").click(function() {
			$("#search").load("http://localhost/bloodbank/mlt/check");
			$("#bld_banks").val("");
			$("#from_date").val("");
			$("#to_date").val("");

			$("#cm_no").val("");
		});



		$("#cm_no").keyup(function() {
			var cm_no = $("#cm_no").val();
			var from_date = $('#from_date').val();
			var to_date = $('#to_date').val();



			console.log(cm_no);
			$.ajax({
				url: "http://localhost/bloodbank/mlt/check",
				method: "POST",
				data: {
					from_date: from_date,
					to_date: to_date,
					cm_no: cm_no
				},
				success: function(data) {
					console.log("This data", data);
					$("#search").html(data);

				}


			});
		});


	});


	function loadData() {

		var from_date = $('#from_date').val();
		var to_date = $('#to_date').val();

		var name = $("#bld_banks").val();

		console.log(to_date);
		$.ajax({
			url: "http://localhost/bloodbank/mlt/check",
			method: "POST",
			data: {
				bld_banks: name,
				from_date: from_date,
				to_date: to_date
			},
			success: function(data) {
				console.log("This data", data);
				$("#search").html(data);



			}


		});

	};




	function approve(id) {

		var cm = id;
		//console.log(donor_id);
		$.ajax({
			url: "http://localhost/bloodbank/mlt/approved",
			method: "POST",
			data: {
				cm_no: cm
			},
			success: function(data) {
				console.log("This data", data);

				loadData();

			}

		});

	};

	function rejected(id) {

		var text = $('#message').val();
		var donor_id = id;
		$('#d_id').html(id);

		var d_id = document.getElementById("d_id").innerHTML;
		console.log(d_id);
		$.ajax({
			url: "http://localhost/bloodbank/mlt/rejected",
			method: "POST",
			data: {
				text: text,
				cm_no: d_id
			},
			success: function(data) {
				console.log("text", text);
				console.log("id", d_id);

				loadData();

			}

		});

	};

	function view(id) {


		var cm = id;

		$.ajax({
			url: "http://localhost/bloodbank/mlt/checkDonations",
			method: "POST",
			dataType: "JSON",
			data: {

				cm_no: cm
			},
			success: function(data) {
				console.log("text", data);

				$('#verified').html(data.verified);
				$('#weight').html(data.weight);
				$('#donor_name').html(data.donor_name);
				$('#mo_name').html(data.mo_name);
				$('#D').html(data.D);
				$('#Q').html(data.Q);
				$('#S').html(data.S);
				$('#T').html(data.T);
				$('#amount').html(data.amount);
				$('#bp').html(data.bp);
				$('#cm_no').html(data.cm_no);
				$('#cue').html(data.cue);
				$('#cvs').html(data.cus);
				$('#din_name').html(data.din_name);
				$('#et_time').html(data.et_time);
				$('#hb_lvl1').html(data.hb_lvl1);
				$('#hb_lvl2').html(data.hb_lvl2);
				$('#hd').html(data.hd);
				$('#history').html(data.history);
				$('#of_name').html(data.of_name);
				$('#pd').html(data.pd);
				$('#permanent_deferral').html(data.permanent_deferral);
				$('#ph_name').html(data.ph_name);
				$('#resons_deferral').html(data.resons_deferral);
				$('#st_time').html(data.st_time);
				$('#temporary_deferral').html(data.temporary_deferral);
				$('#remarks').html(data.remarks);




			}

		});

	};
</script>



<?php $this->end(); ?>