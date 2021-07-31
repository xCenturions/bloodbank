<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Personal Information</h2>
      
    </div>

  </div>
</section>

<section id="team" class="team ">
  <div class="container">

    <div class="row">

      <!-- <div class="col-lg-6"> -->
        <div class="member d-flex align-items-start">
          <!-- <div class="pic"><img src="assets/img/team/team-1.jpg" class="img-fluid" alt=""></div> -->
          <div class="member-info">
            <h4><?= $this->donor->displayName();  ?></h4>
            <span></span>

           
            <p><strong>Email : </strong> <?= currentUser()->donor_fname ?></p>
            <p><strong>Email : </strong> <?= currentUser()->donor_email ?></p>
            <p><strong>Email : </strong> <?= currentUser()->donor_email ?></p>
            <p><strong>Email : </strong> <?= currentUser()->donor_email ?></p>
            <p><strong>Email : </strong> <?= currentUser()->donor_email ?></p>
            <p><strong>Email : </strong> <?= currentUser()->donor_email ?></p>
            <p><strong>Email : </strong> <?= currentUser()->donor_email ?></p>
            <p><strong>Email : </strong> <?= currentUser()->donor_email ?></p>
            <p><strong>Email : </strong> <?= currentUser()->donor_email ?></p>


            <a href="<?= PROOT ?>donor/edit_profile/<?= currentUser()->id?>"class="btn-get-started animate__animated animate__fadeInUp scrollto"><button type="button" class="btn btn-danger btn-rounded">Edit My Profile</button></a>
            <a href="<?= PROOT ?>Appo/index"class="btn-get-started animate__animated animate__fadeInUp scrollto"><button type="button" class="btn btn-danger btn-rounded">My Appoitments</button></a>
            <a href="<?= PROOT ?>donor/qrcode/<?= currentUser()->id?>"class="btn-get-started animate__animated animate__fadeInUp scrollto"><button type="button" class="btn btn-danger btn-rounded">Generate QR Code</button></a>

			
          </div>
        </div>
      </div>

      
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


<section id="breadcrumbs" class="breadcrumbs" style="margin-top : 50px">
  <div class="container" >

    <div class="d-flex justify-content-between align-items-center">
      <h2>Donated History</h2>
     
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
									<th class="cell100 column1">Date </th>
									<th class="cell100 column2">Location</th>
									
								</tr>
							</thead>
						</table>
					</div>

					<div class="table100-body js-pscroll">
						<table>
							<tbody>
                
                    
								<?php foreach($this->donation as $do): ?>   
                                        
                    <td class="cell100 column1"><?= $do->date ?> </td>
                 
                    <td class="cell100 column2"><?= $do->bld_banks ?></td>
                 
								

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