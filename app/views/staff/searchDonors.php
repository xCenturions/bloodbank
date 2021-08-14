
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
<script type="text/javascript" src="<?=PROOT?>app/lib/Google Maps/js/googlemap.js"></script>
	<style type="text/css">
		
		#map {
			
			width: 100%;
			height: 100%;
			border: 5px solid red;
		}
		#data, #allData {
			display: none;
		}
	</style>

    <section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2 style="text-align: center">Search Donors By City</h2>
    
    </div>

  </div>
</section>



	<?php  

		 $allData = $this->allData;
			
			    $allData= json_encode($allData, true);
	
			
			echo '<div id="allData">' . $allData . '</div>';			
		 ?>

<div class="row">
    <form action="<?=PROOT?>staff/searchDonors" method="post" style="margin-top:20px;text-align: center">



					
						<center><select name="donor_city" class="form-control" id="donor_city" name="donor_city"  value="" style="width: 400px ; height: 50px;">
							<option value="" selected="" disabled="" >Select City</option>
							<?php foreach($this->cities as $ci): ?>
								<option value="<?= $ci->name ?>" ><?= $ci->name?></option>
							<?php endforeach; ?>
						</select></center>

					 <div>
        <input type="submit" class="btn btn-primary btn-danger" value="search" >
      </div>

</form>


<div  id="map" style="margin-left: 50px;width: 800px ; height: 800px;margin-top: 40px"></div>



		<div class="container-table100"   style="width: 1000px ; height: 800px;">
			<div class="wrap-table100">

				<div class="table100 ver2 m-b-110">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column1">Donor Name </th>
									<th class="cell100 column2">NIC</th>
									<th class="cell100 column3">Email</th>
									<th class="cell100 column4">City</th>
									<th class="cell100 column4">Mobile </th>

								</tr>
							</thead>
						</table>
					</div>

					<div class="table100-body js-pscroll">
						<table>
							<tbody>
                            
                                
								<?php foreach($this->allData as $donor): ?>
                                   
                                        
                                    <td class="cell100 column1">
                                        <a href="<?=PROOT?>staff/donorData/<?= $donor->id ?>" >
                                            <?= $donor->donor_fname.' '.$donor->donor_lname; ?>
                                        </a>
                                        </td>
									<td class="cell100 column2"><?= $donor->nic;?></td>
									<td class="cell100 column3"><?= $donor->donor_email;?></td>
									<td class="cell100 column4"><?= $donor->donor_city;?></td>
									<td class="cell100 column4"><?= $donor->donor_mobile;?></td>



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

                              

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-dFHYjTqEVLndbN2gdvXsx09jfJHmNc8&callback=loadMap">
</script>


<?php $this->end(); ?>
