<?php $this->start('body'); ?>
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
			<h2 style="text-align: center">All Admins </h2>

		</div>

	</div>
</section>






<form action="" method="post" style="margin-top:20px;text-align: center">


	<div class="row" style="margin-left:400px">

		<div class="col-md-3">
			<input class="form-control" id="nic" name="nic" value="" style="width: 300px ; height: 50px;" placeholder="Enter Name or NIC ">

			</select>
		</div>
		<div class="col-md-3">
			<select  class="form-control" id="bld_banks" name="bld_banks" value="" style="width: 300px ; height: 50px;">
				<option value="" selected="" disabled="">Select BloodBank</option>
				<?php foreach ($this->banks as $ci) : ?>
					<option value="<?= $ci->bloodbank ?>"><?= $ci->bloodbank ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		




		<div class="col-md-1">

			<button type="button" id="refresh" class="btn btn-danger">Reset</button>
		</div>

	</div>

</form>


<!-- <div id="allData"></div>


<div  id="map" style="margin-left: 50px;width: 800px ; height: 800px;margin-top: 40px"></div> -->



<div class="container-table100">
	<div class="wrap-table100">

		<div class="table100 ver2 m-b-110">
			<div class="table100-head">
				<table>
					<thead>
						<tr class="row100 head">
							<th class="cell100 column1">Donor Name </th>
							<th class="cell100 column2">NIC</th>
							<th class="cell100 column3">Blood Group</th>
							<th class="cell100 column4">City</th>
							<th class="cell100 column4">Mobile </th>
							<th class="cell100 column5">Contact </th>

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
						<h1>Message Sent! </h1>
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
				<p class="heading lead">Request Blood From Donor</p>

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="white-text">&times;</span>
				</button>
			</div>

			<!--Body-->
			<div class="modal-body">
				<div class="text-center">
					<i class="fas fa-envelope fa-4x mb-3 animated rotateIn"></i>
					<div style="display: none" id="d_id"></div>
					<textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
					<label for="message">Your message</label>

				</div>
			</div>

			<!--Footer-->
			<div class="modal-footer justify-content-center">
				<a id="sendMessage" data-toggle="modal" data-target="#exampleModal" data-dismiss="modal" type="button" class="btn btn-danger">Send Message <i class="fa fa-check ml-1 text-white"></i></a>

			</div>
		</div>
		<!--/.Content-->
	</div>
</div>






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



<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDShTgmiNPXaMdP7sTepyLZSSiFJmb5MvE&callback=loadMap">
</script>

<script>
	$(document).ready(function() {
		$("#search").load("http://localhost/bloodbank/reports/admins");
		$("#refresh").click(function() {
			$("#search").load("http://localhost/bloodbank/reports/admins");
			$("#bld_banks").val("");
			$("#donor_bloodgroup").val("");
			$("#nic").val("");
		});



		$("#sendMessage").click(function() {


			send();
			$("#message").val("");

		});


		// $("#allData").load("http://localhost/bloodbank/staff/allDonors" );
		// var data1=$("#data").val();

		// $.ajax({
		// 		url:"http://localhost/bloodbank/staff/allDonors",
		// 		method:"POST",
		// 		// dataType:"html",
		// 		data:{allData:data1},
		// 		success:function(data1){
		// 			console.log("This data", data1); 
		// 			$("#allData").html(data1);
		// 		}
		// 		});

		$("#donor_bloodgroup").change(function() {

			var name = $("#donor_city").val();
			var check = $("#donor_bloodgroup").val();
			console.log(check);
			$.ajax({
				url: "http://localhost/bloodbank/reports/admins",
				method: "POST",
				data: {
					donor_bloodgroup: check,
					donor_city: name
				},
				success: function(data) {
					console.log("This data", data);
					$("#search").html(data);
					check.reset();
					name.reset();
				}


			});
		});

		$("#bld_banks").change(function() {
			var check = $("#donor_bloodgroup").val();
			var name = $("#bld_banks").val();
			console.log(check);
			$.ajax({
				url: "http://localhost/bloodbank/reports/admins",
				method: "POST",
				data: {
					bld_banks: name,
					donor_bloodgroup: check
				},
				success: function(data) {
					console.log("This data", data);
					$("#search").html(data);

				}


			});
		});

		$("#nic").keyup(function() {
			var nic = $("#nic").val();
			var check = $("#donor_bloodgroup").val();
			var name = $("#bld_banks").val();
			console.log(check);
			$.ajax({
				url: "http://localhost/bloodbank/reports/admins",
				method: "POST",
				data: {
					bld_banks: name,
					donor_bloodgroup: check,
					nic: nic
				},
				success: function(data) {
					console.log("This data", data);
					$("#search").html(data);

				}


			});
		});

	});







	function send(id) {
		var text = $('#message').val();
		var donor_id = d_id;

		$('#d_id').html(id);

		var d_id = document.getElementById("d_id").innerHTML;

		//console.log(donor_id);
		$.ajax({
			url: "http://localhost/bloodbank/staff/sendMessage",
			method: "POST",
			data: {
				donor_id: d_id,
				message: text,
			},
			success: function(data) {
				console.log("This data", data);
				console.log("text", text);
				console.log("id", d_id);


			}

		});

	};
</script>



<?php $this->end(); ?>