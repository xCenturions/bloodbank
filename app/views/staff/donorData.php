<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Personal Information</h2>
      <ol>
        <li><a href="index.html">Home</a></li>
        <li>Team</li>
      </ol>
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
            <h4><?= $this->data->displayName();  ?></h4>
            <span></span>

            <p><strong>Email : </strong> <?= $this->data->donor_email ?></p>
            
<span></span>
           
            <a href="<?= PROOT ?>donor/qrcode/<?= $this->data->id?>" class="btn-get-started animate__animated animate__fadeInUp scrollto"><button type="button" class="btn btn-danger btn-rounded">Generate QR Code</button></a>
            <a href="<?= PROOT ?>staff/donateBlood/<?= $this->data->id?>" class="btn-get-started animate__animated animate__fadeInUp scrollto"><button type="button" class="btn btn-danger btn-rounded">Add donor's blood to stock</button></a>
          </div>
        </div>
      </div>

     
      
      

      <?php $this->end(); ?>