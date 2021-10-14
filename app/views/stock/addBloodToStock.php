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
<link rel="stylesheet" type="text/css" href="<?= PROOT ?>css/check.css">
<link rel="stylesheet" type="text/css" href="<?= PROOT ?>css/add.css">


<!--===============================================================================================-->


<section id="breadcrumbs" class="breadcrumbs">
	<div class="container">

		<div class="d-flex justify-content-between align-items-center">
			<h2> Checked Blood Samples</h2>

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
						<h1>Successfully Added! </h1>
					</div>
				</div>
				<div class="modal-header border-0 mb-2">

				</div>
				<div class="modal-body"> <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button> </div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="centralModalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-notify modal-success" role="document">
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


				<div>
					<h4>CM Number : <span id="cm"></span> </h4>
					<h4>NIC Number : <span id="nic"></span> </h4>
					<h4>Blood Group : <span id="bld_grp"></span> </h4>
				</div>
				<hr>


				<strong>Please Select Blood Cells</strong><br>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" id="bld_rbc" value="1" />
					<label class="form-check-label" for="inlineCheckbox1">RBC</label>
				</div>

				<div class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" id="bld_wbc" value="1" />
					<label class="form-check-label" for="inlineCheckbox2">WBC</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" id="bld_plates" value="1" />
					<label class="form-check-label" for="inlineCheckbox1">Platlets</label>
				</div>

				<div class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" id="bld_plasma" value="1" />
					<label class="form-check-label" for="inlineCheckbox2">Plasma</label>
				</div>



			</div>

			<!--Footer-->
			<div class="modal-footer justify-content-center">
				<a id="add" data-toggle="modal" data-target="#exampleModal" data-dismiss="modal" type="button" class="btn btn-success">Submit <i class="fa fa-check ml-1 text-white"></i></a>

			</div>
		</div>
		<!--/.Content-->
	</div>
</div>

<div id="error" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header justify-content-center">
				<div class="icon-box">
					<i class="fas fa-times fa-4x mb-3 animated rotateIn"></i>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body text-center">
				<h4>Ooops!</h4>
				<p>Something went wrong. Blood not uploaded</p>
				<button class="btn btn-success" data-dismiss="modal">Try Again</button>
			</div>
		</div>
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

		$("#add").click(function() {
			addToStock();
			$('#bld_rbc').val('');
			$('#bld_wbc').val('');
			$('#bld_plates').val('');
			$('#bld_plasma').val('');
			loadData();
		});

		$("#search").load("http://localhost/bloodbank/stock/approvedBlood");
		$("#refresh").click(function() {
			$("#search").load("http://localhost/bloodbank/stock/approvedBlood");
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
				url: "http://localhost/bloodbank/stock/approvedBlood",
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
			url: "http://localhost/bloodbank/stock/approvedBlood",
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



	function add(id) {

		var cm = id;


		//console.log(donor_id);
		$.ajax({
			url: "http://localhost/bloodbank/stock/add",
			method: "POST",
			dataType: "JSON",
			data: {
				cm_no: cm
			},
			success: function(data) {
				console.log("This data", data.nic);

				$('#nic').html(data.nic);
				$('#cm').html(data.cm);
				$('#bld_grp').html(data.bld_grp);


				//loadData();

			}

		});

	};

	function addToStock() {

		var cm = document.getElementById("cm").innerHTML;

		var x = $("#bld_rbc").is(":checked");

		if (x) {
			var rbc = $('#bld_rbc').val();
		} else {
			var rbc = 0;
		}

		var y = $("#bld_wbc").is(":checked");

		if (y) {
			var wbc = $('#bld_wbc').val();
		} else {
			var wbc = 0;
		}


		var z = $("#bld_plates").is(":checked");

		if (z) {
			var plates = $('#bld_plates').val();
		} else {
			var plates = 0;
		}

		var z = $("#bld_plasma").is(":checked");

		if (z) {
			var plasma = $('#bld_plasma').val();
		} else {
			var plasma = 0;
		}

		$.ajax({
			url: "http://localhost/bloodbank/stock/addToStock",
			method: "POST",

			data: {
				cm_no: cm,
				rbc: rbc,
				wbc: wbc,
				plates: plates,
				plasma: plasma,

			},
			success: function(data) {
				console.log("yes", data);

				if (data == 0) {

					$('#error').modal('show');
				}



				//loadData();

			}

		});

	};
</script>



<?php $this->end(); ?>