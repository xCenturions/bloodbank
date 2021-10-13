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
			<h2>Blood Donation Details</h2>

		</div>

	</div>
</section>
<form action="<?= PROOT ?>staff/searchDonors" method="post" style="margin-top:20px;text-align: center">


	<div class="row" style="margin-left:400px">

		<div class="col-md-3">
			<input class="form-control" id="nic" name="nic" value="" style="width: 300px ; height: 50px;" placeholder="Enter Name or NIC ">

			</select>
		</div>
		<div class="col-md-3">
			<select name="donor_city" class="form-control" id="bld_banks" name="bld_banks" value="" style="width: 300px ; height: 50px;">
				<option value="" selected="" disabled="">Select Blood bank</option>
				<?php foreach ($this->banks as $ci) : ?>
					<option value="<?= $ci->bloodbank ?>"><?= $ci->bloodbank ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="col-md-2">
			From Date<input type="date" name="from_date" id="from_date" class="form-control" placeholder="From Date" />
		</div>
		<div class="col-md-2">
			To Date <input type="date" name="to_date" id="to_date" class="form-control" placeholder="To Date" />
		</div>




		<div class="col-md-1">

			<button type="button" id="refresh" class="btn btn-danger">Reset</button>
		</div>

	</div>

</form>



<div class="container-table100">
	<div class="wrap-table100">

		<div class="table100 ver2 m-b-110">
			<div class="table100-head">
				<table>
					<thead>
						<tr class="row100 head">
							<th class="cell100 column1">Donor Name</th>
							<th class="cell100 column2">Donor NIC</th>
							<th class="cell100 column3">Donated Location</th>
							<th class="cell100 column8">Blood Group</th>
							<th class="cell100 column4">Donated Date</th>

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

<script>
	$(document).ready(function() {


		// 			  $.datepicker.setDefaults({  
		//         dateFormat: 'yy-mm-dd'   
		//    });  
		//    $(function(){  
		//         $("#from_date").datepicker();  
		//         $("#to_date").datepicker();  
		//    });  

		$("#bld_grps").change(function() {
			loadData();
		});
		$("#bld_banks").change(function() {
			loadData();
		});
		$("#to_date").change(function() {
			loadData();
		});

		$("#search").load("http://localhost/bloodbank/reports/donationDetails");
		$("#refresh").click(function() {
			$("#search").load("http://localhost/bloodbank/reports/donationDetails");
			$("#bld_banks").val("");
			$("#from_date").val("");
			$("#to_date").val("");

			$("#nic").val("");
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


		function loadData() {

			var from_date = $('#from_date').val();
			var to_date = $('#to_date').val();

			var name = $("#bld_banks").val();

			console.log(to_date);
			$.ajax({
				url: "http://localhost/bloodbank/reports/donationDetails",
				method: "POST",
				data: {
					bld_banks: name,
					from_date: from_date,
					to_date: to_date
				},
				success: function(data) {
					//console.log("This data", data); 
					$("#search").html(data);



				}


			});

		};







		// $("#bld_grps").change(function(){
		// 		var check =$("#bld_grps").val();
		// 	var name =$("#bld_banks").val();
		// 	console.log(check);
		// 	$.ajax({
		// 		url:"http://localhost/bloodbank/staff/stockDetails",
		// 		method:"POST",
		// 		data:{bld_banks:name , bld_grps:check},
		// 		success:function(data){
		// 			console.log("This data", data); 
		// 			$("#search").html(data);

		// 		}


		// 	});
		// });

		$("#nic").keyup(function() {
			var nic = $("#nic").val();
			var from_date = $('#from_date').val();
			var to_date = $('#to_date').val();


			var name = $("#bld_banks").val();
			console.log(nic);
			$.ajax({
				url: "http://localhost/bloodbank/reports/donationDetails",
				method: "POST",
				data: {
					bld_banks: name,
					from_date: from_date,
					to_date: to_date,
					nic: nic
				},
				success: function(data) {
					console.log("This data", data);
					$("#search").html(data);

				}


			});
		});

	});
</script>



<?php $this->end(); ?>