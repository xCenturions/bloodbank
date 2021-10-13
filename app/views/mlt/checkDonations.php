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
</script>



<?php $this->end(); ?>